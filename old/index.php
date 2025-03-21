<?php
session_start();
include "./config.php";

// Fetch packages based on type
$package_types = ["Honeymoon", "Family Trip", "Adventure", "Business Trip"];
$packages = [];

foreach ($package_types as $type) {
    $sql = "SELECT * FROM travel_packages tp
LEFT JOIN package_images pi ON tp.id = pi.package_id AND pi.is_cover = 1 WHERE tp.package_type='$type' LIMIT 4";
    $result = $db->query($sql);
    $packages[$type] = $result->fetch_all(MYSQLI_ASSOC);
}

// Fetch latest packages
// $sql_latest = "SELECT * FROM travel_packages LIMIT 6";
$sql_latest = "SELECT * FROM travel_packages tp
LEFT JOIN package_images pi ON tp.id = pi.package_id AND pi.is_cover = 1 LIMIT 6";
$result_latest = $db->query($sql_latest);
$latest_packages = $result_latest->fetch_all(MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/style.css">
    <script src="./js/bootstrap.bundle.js"></script>
</head>

<body>
    <?php
    include 'Header.php';
    ?>


    <!-- <div class="home row m-0 shadow justify-content-center align-items-center">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    <h4 class="text-center">
                        <img src="https://cdn-icons-png.flaticon.com/512/5776/5776824.png" class="icon" /> Holiday
                        Pakage
                    </h4>
                    <div class="row m-0">
                        <div class="col-lg-4">
                            <p>From City</p>
                            <input type="text" class="form-control" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->

    <!-- <div class="row m-0 bg-light">
        <div class="col-lg-3">
            <div class="card">
                <div class="card-body">
                    <h4 class="text-center">Honeymoon</h4>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="card">
                <div class="card-body">
                    <h4 class="text-center">Family Trip</h4>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="card">
                <div class="card-body">
                    <h4 class="text-center">Adventure</h4>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="card">
                <div class="card-body">
                    <h4 class="text-center">Business Trip</h4>
                </div>
            </div>
        </div>
    </div> -->

    <div class="container">
        <!-- Search Section -->
        <div class="p-5 mb-4 bg-light rounded-3 text-center">
            <h1 class="display-5 fw-bold">Find Your Perfect Trip</h1>
            <p class="lead">Search packages based on your destination or travel type.</p>
            <form action="search.php" method="GET" class="d-flex justify-content-center">
                <input type="text" name="query" class="form-control w-50"
                    placeholder="Search by destination or package name" required>
                <button type="submit" class="btn btn-primary ms-2">Search</button>
            </form>
        </div>

        <!-- Travel Packages by Type -->
        <?php foreach ($packages as $type => $package_list): ?>
            <h2 class="mt-4"><?php echo $type; ?> Packages</h2>
            <div class="row">
                <?php foreach ($package_list as $package): ?>
                    <div class="col-md-3">
                        <div class="card mb-3">
                            <img src="admin/<?php echo $package['image_path']; ?>" class="card-img-top"
                                alt="<?php echo $package['package_name']; ?>" />
                            <!-- <img src="images/<?php echo $package['image']; ?>" class="card-img-top" alt="<?php echo $package['package_name']; ?>"> -->
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $package['package_name']; ?></h5>
                                <p class="card-text"><?php echo substr($package['package_type'], 0, 50); ?></p>
                                <p class="text-success">₹<?php echo $package['total_amount']; ?></p>
                                <a href="package_details.php?id=<?php echo $package['id']; ?>"
                                    class="btn btn-sm btn-primary">View Details</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endforeach; ?>

        <!-- Latest Packages -->
        <h2 class="mt-5">Latest Packages</h2>
        <div class="row">
            <?php foreach ($latest_packages as $package): ?>
                <div class="col-md-4">
                    <div class="card mb-3">
                        <img src="admin/<?php echo $package['image_path']; ?>" class="card-img-top"
                            alt="<?php echo $package['package_name']; ?>" />
                        <!-- <img src="images/<?php echo $package['image']; ?>" class="card-img-top"
                            alt="<?php echo $package['name']; ?>"> -->
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $package['package_name']; ?></h5>
                            <p class="text-success">₹<?php echo $package['total_amount']; ?></p>
                            <a href="package_details.php?id=<?php echo $package['id']; ?>"
                                class="btn btn-sm btn-primary">View Details</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

</body>

</html>

<?php $db->close(); ?>