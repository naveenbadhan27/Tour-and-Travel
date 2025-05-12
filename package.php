<?php
session_start();

include "./config.php";


$type = $_GET['id'];

// $sql_latest = "SELECT tp.*
//         FROM travel_packages tp
//         LEFT JOIN package_images pi ON tp.id = pi.package_id AND pi.is_cover = 1
//         WHERE tp.package_type = '$type'";
// $result_latest = $db->query($sql_latest);
// $latest_packages = $result_latest->fetch_all(MYSQLI_ASSOC);


$sql = "SELECT tp.*, pi.image_path 
        FROM travel_packages tp
        LEFT JOIN package_images pi ON tp.id = pi.package_id AND pi.is_cover = 1
        WHERE tp.package_type = ?";

$stmt = $db->prepare($sql);
$stmt->bind_param("s", $type);
$stmt->execute();
$result = $stmt->get_result();



// while ($row = $result->fetch_assoc()) {
//     echo "Package ID: " . htmlspecialchars($row['id']) . "<br>";
//     echo "Package Name: " . htmlspecialchars($row['package_name']) . "<br>";
//     // echo $row['image_path'];

//     if (!empty($row['image_path'])) {
//         echo "<img src='admin/" . htmlspecialchars($row['image_path']) . "' alt='Package Image' width='200'><br><br>";
//     } else {
//         echo "No Image Available<br><br>";
//     }
// }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>WanderEase Travels</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500;600;700&family=Poppins:wght@200;300;400;500;600&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">


    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>

    <!-- Spinner Start -->
    <div id="spinner"
        class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-secondary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->

    <?php
    include "Header.php";
    ?>

    <!-- Contact Start -->
    <div class="container-fluid contact overflow-hidden pb-5">
        <div class="container py-5">
            <div class="office pt-5">
                <div class="section-title text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="sub-style">
                        <h5 class="sub-title text-primary px-3">Worlwide Offices</h5>
                    </div>
                    <h1 class="display-5 mb-4">Explore <?php echo $type; ?> Packages Worldwide</h1>
                </div>
                <div class="row g-4 justify-content-center">
                    <?php

                    // if (sizeof($latest_packages) <= 0) {
                    ?>
                    <!-- <div class="alert alert-warning text-center fw-bold">
                            Sorry, no Package Available for <?php
                            // echo $type;
                            ?>
                        </div> -->

                    <?php
                    // }
                    

                    while ($row = $result->fetch_assoc()) {
                        // echo "Package ID: " . htmlspecialchars($row['id']) . "<br>";
                        // echo "Package Name: " . htmlspecialchars($row['package_name']) . "<br>";
                        // // echo $row['image_path'];
                    
                        // if (!empty($row['image_path'])) {
                        //     echo "<img src='admin/" . htmlspecialchars($row['image_path']) . "' alt='Package Image' width='200'><br><br>";
                        // } else {
                        //     echo "No Image Available<br><br>";
                        // }
                    
                        ?>

                        <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.1s">
                            <div class="office-item p-4">
                                <div class="office-img mb-4">
                                    <img src="admin/<?php echo htmlspecialchars($row['image_path']); ?>"
                                        class="img-fluid w-100 rounded" alt="">
                                </div>
                                <div class="office-content d-flex flex-column">
                                    <h4 class="mb-2 text-capitalize"><?php echo htmlspecialchars($row['package_name']) ?>
                                    </h4>
                                    <small class="h6 text-capitalize"><?php
                                    echo htmlspecialchars($row['package_type'])
                                        ?></small>
                                    <a href="#" class="text-muted fs-5 mb-2">₹<?php
                                    echo htmlspecialchars($row['total_amount'])
                                        ?></a>
                                    <p class="mb-0">Persons : <?php
                                    echo htmlspecialchars($row['total_persons'])
                                        ?></p>
                                    <a href="package_details.php?id=<?php echo htmlspecialchars($row['id']) ?>"
                                        class="btn btn-sm btn-primary">View Details</a>
                                </div>
                            </div>
                        </div>

                        <?php
                    }
                    ?>

                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->

    <?php

    include 'Footer.php';

    ?>

    <!-- Back to Top -->
    <a href="#" class="btn btn-primary btn-lg-square back-to-top"><i class="fa fa-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>


    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>