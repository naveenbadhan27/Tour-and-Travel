<?php
session_start();

include "./../config.php";

if (!isset($_SESSION['login_admin'])) {
    header('location: Dashboard.php');
}


if (isset($_POST['add_cabs'])) {
    // if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cab_name = $_POST['cab_name'];
    $driver_name = $_POST['driver_name'];
    $contact = $_POST['contact'];
    $cab_number = $_POST['cab_number'];
    $cab_type = $_POST['cab_type'];
    $seating_capacity = $_POST['seating_capacity'];
    $fare_per_km = $_POST['fare_per_km'];

    $sql = "INSERT INTO cabs (cab_name, driver_name, contact, cab_number, cab_type, seating_capacity, fare_per_km) 
                VALUES (?, ?, ?, ?, ?, ?, ?)";

    $stmt = $db->prepare($sql);
    $stmt->bind_param("sssssid", $cab_name, $driver_name, $contact, $cab_number, $cab_type, $seating_capacity, $fare_per_km);

    if ($stmt->execute()) {
        echo "<script>alert('Cab added successfully!'); window.location.href='Cabs.php';</script>";
    } else {
        echo "<script>alert('Error adding cab');</script>";
    }

    $stmt->close();
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
    $id = $_POST['id'];
    $sql = "DELETE FROM cabs WHERE id = ?";
    $stmt = $db->prepare($sql);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo "<script>alert('Cab deleted successfully'); window.location.href='Cabs.php';</script>";
    } else {
        echo "<script>alert('Error deleting cab'); window.location.href='Cabs.php';</script>";
    }

    $stmt->close();
}

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
                <div class="col-xl-4 col-md-6">
                    <div class="card shadow">
                        <div class="card-body">
                            <h2 class="mb-4">Add Cabs</h2>
                            <form method="POST">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Cab Name</label>
                                        <input type="text" name="cab_name" class="form-control" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Driver Name</label>
                                        <input type="text" name="driver_name" class="form-control" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Contact</label>
                                        <input type="text" name="contact" class="form-control" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Cab Number</label>
                                        <input type="text" name="cab_number" class="form-control" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Cab Type</label>
                                        <input type="text" name="cab_type" class="form-control" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Seating Capacity</label>
                                        <input type="number" name="seating_capacity" class="form-control" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Fare per KM</label>
                                        <input type="number" name="fare_per_km" class="form-control" step="0.01"
                                            required>
                                    </div>
                                </div>
                                <button type="submit" name="add_cabs" class="btn btn-primary">Add Cab</button>
                            </form>

                        </div>
                    </div>
                </div>

                <div class="col-xl-8 col-md-6">
                    <table class="table table-bordered table-striped">
                        <thead class="table-dark">
                            <tr>
                                <th>ID</th>
                                <th>Cab Name</th>
                                <th>Driver Name</th>
                                <th>Contact</th>
                                <th>Cab Number</th>
                                <th>Cab Type</th>
                                <th>Seating Capacity</th>
                                <th>Fare per KM</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql = "SELECT * FROM cabs";
                            $result = $db->query($sql);
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo "<tr>
                                <td>{$row['id']}</td>
                                <td>{$row['cab_name']}</td>
                                <td>{$row['driver_name']}</td>
                                <td>{$row['contact']}</td>
                                <td>{$row['cab_number']}</td>
                                <td>{$row['cab_type']}</td>
                                <td>{$row['seating_capacity']}</td>
                                <td>{$row['fare_per_km']}</td>
                                <td>
                                    <form method='POST' action='' onsubmit='return confirm(\"Are you sure you want to delete this cab?\");'>
                                        <input type='hidden' name='id' value='{$row['id']}'>
                                        <button type='submit' class='btn btn-danger btn-sm'>Delete</button>
                                    </form>
                                </td>
                              </tr>";
                                }
                            } else {
                                echo "<tr><td colspan='9' class='text-center'>No cabs found</td></tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <?php
    include "Footer.php";
    ?>
</body>

</html>