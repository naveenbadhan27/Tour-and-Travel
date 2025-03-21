<?php
include "./config.php";

$query = $_GET['query'];
$sql = "SELECT * FROM travel_packages WHERE package_name LIKE '%$query%' 
-- OR location LIKE '%$query%'
";
$result = $db->query($sql);
$search_results = $result->fetch_all(MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Search Results</title>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/style.css">
    <script src="./js/bootstrap.bundle.js"></script>
</head>

<body>
    <?php
    include 'Header.php';
    ?>

    <div class="container mt-4">
        <h2>Search Results</h2>
        <div class="row">
            <?php if (count($search_results) > 0): ?>
                <?php foreach ($search_results as $package): ?>
                    <div class="col-md-4">
                        <div class="card mb-3">
                            <img src="https://static.vecteezy.com/system/resources/thumbnails/030/486/881/small_2x/suitcase-full-of-landmarks-and-travel-accessory-on-3d-rendering-3d-illustration-ai-generated-photo.jpeg"
                                class="card-img-top" alt="<?php echo $package['package_name']; ?>" />
                            <!-- <img src="images/<?php echo $package['image']; ?>" class="card-img-top" alt="<?php echo $package['package_name']; ?>"> -->
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $package['package_name']; ?></h5>
                                <p class="text-success">$<?php echo $package['total_amount']; ?></p>
                                <a href="package_details.php?id=<?php echo $package['id']; ?>"
                                    class="btn btn-sm btn-primary">View Details</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>No packages found.</p>
            <?php endif; ?>
        </div>
    </div>
</body>

</html>

<?php $db->close(); ?>