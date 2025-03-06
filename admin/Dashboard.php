<?php
session_start();

include "./../config.php";

if (!isset($_SESSION['login_admin'])) {
    header('location: Dashboard.php');
}

$sql = "SELECT 
    (SELECT COUNT(*) FROM hotels) AS hotel_count,
    (SELECT COUNT(*) FROM cabs) AS cab_count,
    (SELECT COUNT(*) FROM flights) AS flight_count,
    (SELECT COUNT(*) FROM travel_packages) AS package_count";

$result = $db->query($sql);
$data = $result->fetch_assoc();

?>

<!doctype html>
<html lang="en">

<head>
    <title>Dashboard</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap"
        id="main-font-link" />
    <link rel="stylesheet" href="./assets/fonts/phosphor/duotone/style.css" />
    <link rel="stylesheet" href="./assets/fonts/tabler-icons.min.css" />
    <link rel="stylesheet" href="./assets/fonts/feather.css" />
    <link rel="stylesheet" href="./assets/fonts/fontawesome.css" />
    <link rel="stylesheet" href="./assets/fonts/material.css" />
    <link rel="stylesheet" href="./assets/css/style.css" id="main-style-link" />
    <link rel="stylesheet" href="./assets/css/style-preset.css" />

</head>

<body>
    <?php
    include('Navbar.php');
    ?>

    <div class="pc-container">
        <div class="pc-content">
            <!-- [ Main Content ] start -->
            <div class="row">
                <!-- [ sample-page ] start -->
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-secondary-dark dashnum-card text-white overflow-hidden">
                        <span class="round small"></span>
                        <span class="round big"></span>
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <div class="avtar avtar-lg">
                                        <i class="text-white ti ti-credit-card"></i>
                                    </div>
                                </div>
                            </div>
                            <span class="text-white d-block f-34 f-w-500 my-2">
                                <?php echo $data['hotel_count']; ?>
                                <i class="ti ti-arrow-up-right-circle opacity-50"></i>
                            </span>
                            <p class="mb-0 opacity-50">Total Hotels</p>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-md-6">
                    <div class="card bg-warning dashnum-card text-white overflow-hidden">
                        <span class="round small"></span>
                        <span class="round big"></span>
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <div class="avtar avtar-lg">
                                        <i class="text-white ti ti-credit-card"></i>
                                    </div>
                                </div>
                            </div>
                            <span class="text-white d-block f-34 f-w-500 my-2">
                                <?php echo $data['cab_count']; ?>
                                <i class="ti ti-arrow-up-right-circle opacity-50"></i>
                            </span>
                            <p class="mb-0 opacity-50">Total Cabs</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-info dashnum-card text-white overflow-hidden">
                        <span class="round small"></span>
                        <span class="round big"></span>
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <div class="avtar avtar-lg">
                                        <i class="text-white ti ti-credit-card"></i>
                                    </div>
                                </div>
                            </div>
                            <span class="text-white d-block f-34 f-w-500 my-2">
                                <?php echo $data['flight_count']; ?>
                                <i class="ti ti-arrow-up-right-circle opacity-50"></i>
                            </span>
                            <p class="mb-0 opacity-50">Total Flights</p>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-md-6">
                    <div class="card bg-success dashnum-card text-white overflow-hidden">
                        <span class="round small"></span>
                        <span class="round big"></span>
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <div class="avtar avtar-lg">
                                        <i class="text-white ti ti-credit-card"></i>
                                    </div>
                                </div>
                            </div>
                            <span class="text-white d-block f-34 f-w-500 my-2">
                                <?php echo $data['package_count']; ?>
                                <i class="ti ti-arrow-up-right-circle opacity-50"></i>
                            </span>
                            <p class="mb-0 opacity-50">Total Packages</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <?php
    include "Footer.php";
    ?>
</body>

</html>