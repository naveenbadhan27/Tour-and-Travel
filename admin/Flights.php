<?php
session_start();

include "./../config.php";

if (!isset($_SESSION['login_admin'])) {
    header('location: Dashboard.php');
}


if (isset($_POST['add_flight'])) {
    // if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $airline = $_POST['airline'];
    $flight_number = $_POST['flight_number'];
    $departure_airport = $_POST['departure_airport'];
    $arrival_airport = $_POST['arrival_airport'];
    $departure_time = $_POST['departure_time'];
    $arrival_time = $_POST['arrival_time'];
    $price = $_POST['price'];

    $sql = "INSERT INTO flights (airline, flight_number, departure_airport, arrival_airport, departure_time, arrival_time, price) 
                VALUES (?, ?, ?, ?, ?, ?, ?)";

    $stmt = $db->prepare($sql);
    $stmt->bind_param("ssssssd", $airline, $flight_number, $departure_airport, $arrival_airport, $departure_time, $arrival_time, $price);

    if ($stmt->execute()) {
        echo "<script>alert('Flight added successfully!'); window.location.href='Flights.php';</script>";
    } else {
        echo "<script>alert('Error adding flight');</script>";
    }

    $stmt->close();
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
    $id = $_POST['id'];
    $sql = "DELETE FROM flights WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo "<script>alert('Flight deleted successfully'); window.location.href='Flights.php';</script>";
    } else {
        echo "<script>alert('Error deleting flight'); window.location.href='Flights.php';</script>";
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
                            <h2 class="mb-4">Add Flight</h2>
                            <form method="POST">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Airline</label>
                                        <input type="text" name="airline" class="form-control" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Flight Number</label>
                                        <input type="text" name="flight_number" class="form-control" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Departure Airport</label>
                                        <input type="text" name="departure_airport" class="form-control" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Arrival Airport</label>
                                        <input type="text" name="arrival_airport" class="form-control" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Departure Time</label>
                                        <input type="datetime-local" name="departure_time" class="form-control"
                                            required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Arrival Time</label>
                                        <input type="datetime-local" name="arrival_time" class="form-control" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Price</label>
                                        <input type="number" name="price" class="form-control" step="0.01" required>
                                    </div>
                                </div>
                                <button type="submit" name="add_flight" class="btn btn-primary">Add Flight</button>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-xl-8 col-md-6">
                    <table class="table table-bordered table-striped">
                        <thead class="table-dark">
                            <tr>
                                <th>ID</th>
                                <th>Airline</th>
                                <th>Flight Number</th>
                                <th>Departure Airport</th>
                                <th>Arrival Airport</th>
                                <th>Departure Time</th>
                                <th>Arrival Time</th>
                                <th>Price</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql = "SELECT * FROM flights";
                            $result = $db->query($sql);
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo "<tr>
                                <td>{$row['id']}</td>
                                <td>{$row['airline']}</td>
                                <td>{$row['flight_number']}</td>
                                <td>{$row['departure_airport']}</td>
                                <td>{$row['arrival_airport']}</td>
                                <td>{$row['departure_time']}</td>
                                <td>{$row['arrival_time']}</td>
                                <td>{$row['price']}</td>
                                <td>
                                    <form method='POST' action='delete_flight.php' onsubmit='return confirm(\"Are you sure you want to delete this flight?\");'>
                                        <input type='hidden' name='id' value='{$row['id']}'>
                                        <button type='submit' class='btn btn-danger btn-sm'>Delete</button>
                                    </form>
                                </td>
                              </tr>";
                                }
                            } else {
                                echo "<tr><td colspan='9' class='text-center'>No flights found</td></tr>";
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