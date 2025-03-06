<?php
session_start();

include "./../config.php";

if (!isset($_SESSION['login_admin'])) {
    header('location: Dashboard.php');
}


if (isset($_POST['add_hotel'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $contact = $_POST['contact'];
    $manager = $_POST['manager'];
    $address = $_POST['address'];
    $state = $_POST['state'];
    $city = $_POST['city'];
    $pincode = $_POST['pincode'];
    $rating = $_POST['rating'];
    $rooms_type = $_POST['rooms_type'];
    $check_in_time = $_POST['check_in_time'];
    $check_out_time = $_POST['check_out_time'];
    $rooms = $_POST['rooms'];
    $min_price = $_POST['min_price'];

    $sql = "INSERT INTO hotels (name, email, password, contact, manager, address, state, city, pincode, rating, rooms_type, check_in_time, check_out_time, rooms, min_price)
            VALUES ('$name', '$email', '$password', '$contact', '$manager', '$address', '$state', '$city', '$pincode', '$rating', '$rooms_type', '$check_in_time', '$check_out_time', '$rooms', '$min_price')";
    // echo $sql;
    $result = mysqli_query($db, $sql);
    if ($result) {
        echo "<script>alert('Hotel added successfully!'); window.location.href='Hotels.php';</script>";
    } else {
        echo "Error: ";
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
    $id = $_POST['id'];

    $sql = "DELETE FROM hotels WHERE id = ?";
    $stmt = $db->prepare($sql);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo "<script>alert('Hotel deleted successfully'); window.location.href='Hotels.php';</script>";
    } else {
        echo "<script>alert('Error deleting hotel'); window.location.href='Hotels.php';</script>";
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
                            <h2 class="mb-4">Add Hotel</h2>
                            <form action="" method="POST">
                                <div class="mb-3">
                                    <label class="form-label">Hotel Name</label>
                                    <input type="text" class="form-control" name="name" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Email</label>
                                    <input type="email" class="form-control" name="email" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Password</label>
                                    <input type="password" class="form-control" name="password" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Contact</label>
                                    <input type="text" class="form-control" name="contact" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Manager Name</label>
                                    <input type="text" class="form-control" name="manager" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Address</label>
                                    <textarea class="form-control" name="address" required></textarea>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">State</label>
                                    <input type="text" class="form-control" name="state" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">City</label>
                                    <input type="text" class="form-control" name="city" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Pincode</label>
                                    <input type="text" class="form-control" name="pincode" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Rating (1-5)</label>
                                    <input type="number" class="form-control" name="rating" min="1" max="5" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Rooms Type</label>
                                    <input type="text" class="form-control" name="rooms_type" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Check-in Time</label>
                                    <input type="time" class="form-control" name="check_in_time" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Check-out Time</label>
                                    <input type="time" class="form-control" name="check_out_time" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Total Rooms</label>
                                    <input type="number" class="form-control" name="rooms" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Minimum Price</label>
                                    <input type="number" step="0.01" class="form-control" name="min_price" required>
                                </div>
                                <button type="submit" name="add_hotel" class="btn btn-primary">Add Hotel</button>
                            </form>

                        </div>
                    </div>
                </div>

                <div class="col-xl-8 col-md-6">
                    <table class="table table-bordered table-striped">
                        <thead class="table-dark">
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Contact</th>
                                <th>Manager</th>
                                <th>Address</th>
                                <th>Total Rooms</th>
                                <th>Min Price</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $ct = 1;
                            $sql = "SELECT * FROM `hotels`";
                            $result = mysqli_query($db, $sql);

                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo "<tr>
                                <td>{$ct}</td>
                                <td>{$row['name']}</td>
                                <td>{$row['email']}</td>
                                <td>{$row['contact']}</td>
                                <td>{$row['manager']}</td>
                                <td>{$row['address']}</td>
                                <td>{$row['rooms']}</td>
                                <td>{$row['min_price']}</td>
                                <td>
                                    <form method='POST' action='' onsubmit='return confirm(\"Are you sure you want to delete this hotel?\");'>
                                        <input type='hidden' name='id' value='{$row['id']}'>
                                        <button type='submit' class='btn btn-danger btn-sm'>Delete</button>
                                    </form>
                                </td>
                              </tr>";
                                    $ct++;
                                }
                            } else {
                                echo "<tr><td colspan='16' class='text-center'>No hotels found</td></tr>";
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