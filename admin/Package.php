<?php
session_start();

include "./../config.php";

if (!isset($_SESSION['login_admin'])) {
    header('location: Package.php');
}

// Fetch Hotels, Cabs, and Flights
$hotels = $db->query("SELECT * FROM hotels");
$cabs = $db->query("SELECT * FROM cabs");
$flights = $db->query("SELECT * FROM flights");

if (isset($_POST['add_package'])) {

    // if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $package_name = $_POST['package_name'];
    $package_type = $_POST['package_type'];
    $hotel_id = $_POST['hotel_id'];
    $cab_id = $_POST['cab_id'];
    $flight_id = $_POST['flight_id'];
    $departure_date = $_POST['departure_date'];
    $return_date = $_POST['return_date'];
    $no_of_days = $_POST['no_of_days'];
    $total_persons = $_POST['total_persons'];
    $breakfast = isset($_POST['breakfast']) ? 1 : 0;
    $dinner = isset($_POST['dinner']) ? 1 : 0;
    $tour_guide = isset($_POST['tour_guide']) ? 1 : 0;
    $activities = $_POST['activities'];
    $transport_type = $_POST['transport_type'];
    $cancellation_policy = $_POST['cancellation_policy'];
    $special_requests = $_POST['special_requests'];
    $insurance = isset($_POST['insurance']) ? 1 : 0;
    $discount = $_POST['discount'];
    $total_amount = $_POST['total_amount'];

    $sql = "INSERT INTO travel_packages (package_name, package_type, hotel_id, cab_id, flight_id, departure_date, return_date, no_of_days, total_persons, breakfast, dinner, tour_guide, activities, transport_type, cancellation_policy, special_requests, insurance, discount, total_amount)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $db->prepare($sql);
    $stmt->bind_param("ssiiissiisisssssidi", $package_name, $package_type, $hotel_id, $cab_id, $flight_id, $departure_date, $return_date, $no_of_days, $total_persons, $breakfast, $dinner, $tour_guide, $activities, $transport_type, $cancellation_policy, $special_requests, $insurance, $discount, $total_amount);

    if ($stmt->execute()) {
        echo "<script>alert('Travel Package added successfully!'); window.location.href='index.php';</script>";
    } else {
        echo "<script>alert('Error adding package');</script>";
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
                            <h2 class="mb-4">Add Travel Package</h2>
                            <form method="POST">
                                <div class="mb-3">
                                    <label class="form-label">Package Name</label>
                                    <input type="text" name="package_name" class="form-control" required>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Package Type</label>
                                    <select name="package_type" class="form-control" required>
                                        <option value="Honeymoon">Honeymoon</option>
                                        <option value="Family Trip">Family Trip</option>
                                        <option value="Adventure">Adventure</option>
                                        <option value="Business Trip">Business Trip</option>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Select Hotel</label>
                                    <select name="hotel_id" class="form-control" required>
                                        <option value="">Choose...</option>
                                        <?php while ($row = $hotels->fetch_assoc()) {
                                            echo "<option value='{$row['id']}'>{$row['name']}</option>";
                                        } ?>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Select Cab</label>
                                    <select name="cab_id" class="form-control" required>
                                        <option value="">Choose...</option>
                                        <?php while ($row = $cabs->fetch_assoc()) {
                                            echo "<option value='{$row['id']}'>{$row['cab_name']}</option>";
                                        } ?>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Select Flight</label>
                                    <select name="flight_id" class="form-control" required>
                                        <option value="">Choose...</option>
                                        <?php while ($row = $flights->fetch_assoc()) {
                                            echo "<option value='{$row['id']}'>{$row['flight_number']}</option>";
                                        } ?>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">No of Days</label>
                                    <input type="number" min="1" name="no_of_days" class="form-control" required>
                                </div>


                                <div class="mb-3">
                                    <label class="form-label">Departure Date</label>
                                    <input type="date" name="departure_date" class="form-control" required>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Return Date</label>
                                    <input type="date" name="return_date" class="form-control" required>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Total Persons</label>
                                    <input type="number" name="total_persons" class="form-control" required>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Include Breakfast</label>
                                    <input type="checkbox" name="breakfast">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Include Dinner</label>
                                    <input type="checkbox" name="dinner">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Include Tour Guide</label>
                                    <input type="checkbox" name="tour_guide">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Activities</label>
                                    <textarea name="activities" class="form-control" required></textarea>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Transportation Type</label>
                                    <select name="transport_type" class="form-control" required>
                                        <option value="Private Car">Private Car</option>
                                        <option value="Shared Bus">Shared Bus</option>
                                        <option value="Rental Vehicle">Rental Vehicle</option>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Cancellation Policy</label>
                                    <textarea name="cancellation_policy" class="form-control" required></textarea>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Special Requests</label>
                                    <textarea name="special_requests" class="form-control"></textarea>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Include Insurance</label>
                                    <input type="checkbox" name="insurance">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Discount (%)</label>
                                    <input type="number" name="discount" class="form-control">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Total Amount</label>
                                    <input type="number" name="total_amount" class="form-control" required>
                                </div>

                                <button type="submit" name="add_package" class="btn btn-primary">Add Package</button>
                            </form>
                        </div>
                    </div>
                </div>

                <?php
                $sql = "SELECT tp.id, tp.package_name, h.name AS hotel, c.cab_name AS cab, f.flight_number, tp.no_of_days, tp.total_persons, tp.breakfast, tp.dinner, tp.total_amount
                FROM travel_packages tp
                JOIN hotels h ON tp.hotel_id = h.id
                JOIN cabs c ON tp.cab_id = c.id
                JOIN flights f ON tp.flight_id = f.id";
                $result = $db->query($sql);
                ?>

                <div class="col-xl-8 col-md-6">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Package Name</th>
                                <th>Hotel</th>
                                <th>Cab</th>
                                <th>Flight</th>
                                <th>Days</th>
                                <th>Persons</th>
                                <th>Breakfast</th>
                                <th>Dinner</th>
                                <th>Total Amount</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($row = $result->fetch_assoc()) { ?>
                                <tr>
                                    <td><?= $row['id'] ?></td>
                                    <td><?= $row['package_name'] ?></td>
                                    <td><?= $row['hotel'] ?></td>
                                    <td><?= $row['cab'] ?></td>
                                    <td><?= $row['flight_number'] ?></td>
                                    <td><?= $row['no_of_days'] ?></td>
                                    <td><?= $row['total_persons'] ?></td>
                                    <td><?= $row['breakfast'] ? 'Yes' : 'No' ?></td>
                                    <td><?= $row['dinner'] ? 'Yes' : 'No' ?></td>
                                    <td><?= $row['total_amount'] ?></td>
                                    <td><button class="btn btn-danger btn-sm">Delete</button></td>
                                </tr>
                            <?php } ?>
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