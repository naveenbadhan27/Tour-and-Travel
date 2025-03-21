<?php
session_start();

include "./config.php";


$sql_latest = "SELECT * FROM travel_packages tp
LEFT JOIN package_images pi ON tp.id = pi.package_id AND pi.is_cover = 1 LIMIT 6";
$result_latest = $db->query($sql_latest);
$latest_packages = $result_latest->fetch_all(MYSQLI_ASSOC);


if (isset($_POST['register'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $address = $_POST['address'];
    $city = $_POST['city'];

    // Check if email or contact already exists
    $check_query = "SELECT * FROM users WHERE email = '$email' OR contact = '$contact'";
    $check_result = mysqli_query($db, $check_query);

    if (mysqli_num_rows($check_result) > 0) {
        echo "Email or Contact already exists!";
    } else {
        $query = "INSERT INTO users (name, email, contact, password, address, city) 
                  VALUES ('$name', '$email', '$contact', '$password', '$address', '$city')";

        if (mysqli_query($db, $query)) {
            echo "<script>alert('Registration successful!'); window.location.href='index.php';</script>";
        } else {
            echo "Error: " . mysqli_error($db);
        }
    }
}

if (isset($_POST['login'])) {
    $identifier = $_POST['identifier']; // Email or Contact
    $password = $_POST['password'];

    $query = "SELECT * FROM users WHERE email = '$identifier' OR contact = '$identifier'";
    $result = mysqli_query($db, $query);
    $user = mysqli_fetch_assoc($result);

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['user_id'];
        $_SESSION['name'] = $user['name'];
        echo "Login successful! Redirecting...";
        header("refresh:2; url=index.php"); // Redirect to dashboard
    } else {
        echo "Invalid Email/Contact or Password!";
    }
}


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
    <style>
        .cur {
            cursor: pointer !important;
        }
    </style>
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

    <!-- Header Start -->
    <div class="container-fluid bg-breadcrumb">
        <div class="container text-center py-5" style="max-width: 900px;">
            <h3 class="text-white display-3 mb-4 wow fadeInDown" data-wow-delay="0.1s">Login/Register</h1>
                <ol class="breadcrumb justify-content-center text-white mb-0 wow fadeInDown" data-wow-delay="0.3s">
                    <li class="breadcrumb-item"><a href="index.html" class="text-white">Home</a></li>
                    <li class="breadcrumb-item"><a href="#" class="text-white">Pages</a></li>
                    <li class="breadcrumb-item active text-secondary">Contact</li>
                </ol>
        </div>
    </div>
    <!-- Header End -->

    <!-- Contact Start -->
    <div class="container-fluid contact overflow-hidden py-5">
        <div class="container py-5">
            <div class="row g-5 mb-5">
                <div class="col-lg-6 wow fadeInLeft" data-wow-delay="0.1s">
                    <div class="sub-style">
                        <h5 class="sub-title text-primary pe-3">Quick Contact</h5>
                    </div>
                    <h1 class="display-5 mb-4">Have Questions? Don't Hesitate to Contact Us</h1>
                    <div class="d-flex border-bottom mb-4 pb-4">
                        <i class="fas fa-map-marked-alt fa-4x text-primary bg-light p-3 rounded"></i>
                        <div class="ps-3">
                            <h5>Location</h5>
                            <p>123, First Floor, 123 St Roots Terrace, Los Angeles 90010 Unitd States of America.</p>
                        </div>
                    </div>
                    <div class="row g-3">
                        <div class="col-xl-6">
                            <div class="d-flex">
                                <i class="fas fa-tty fa-3x text-primary"></i>
                                <div class="ps-3">
                                    <h5 class="mb-3">Quick Contact</h5>
                                    <div class="mb-3">
                                        <h6 class="mb-0">Phone:</h6>
                                        <a href="#" class="fs-5 text-primary">+012 3456 7890</a>
                                    </div>
                                    <div class="mb-3">
                                        <h6 class="mb-0">Email:</h6>
                                        <a href="#" class="fs-5 text-primary">travisa@example.com</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="d-flex">
                                <i class="fas fa-clone fa-3x text-primary"></i>
                                <div class="ps-3">
                                    <h5 class="mb-3">Opening Hrs</h5>
                                    <div class="mb-3">
                                        <h6 class="mb-0">Mon - Friday:</h6>
                                        <a href="#" class="fs-5 text-primary">09.00 am to 07.00 pm</a>
                                    </div>
                                    <div class="mb-3">
                                        <h6 class="mb-0">Satday:</h6>
                                        <a href="#" class="fs-5 text-primary">10.00 am to 05.00 pm</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex align-items-center pt-3">
                        <div class="me-4">
                            <div class="bg-light d-flex align-items-center justify-content-center"
                                style="width: 90px; height: 90px; border-radius: 10px;"><i
                                    class="fas fa-share fa-3x text-primary"></i></div>
                        </div>
                        <div class="d-flex">
                            <a class="btn btn-secondary border-secondary me-2 p-0" href="">facebook <i
                                    class="fas fa-chevron-circle-right"></i></a>
                            <a class="btn btn-secondary border-secondary mx-2 p-0" href="">twitter <i
                                    class="fas fa-chevron-circle-right"></i></a>
                            <a class="btn btn-secondary border-secondary mx-2 p-0" href="">instagram <i
                                    class="fas fa-chevron-circle-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 wow fadeInRight" data-wow-delay="0.3">
                    <div class="sub-style">
                        <h5 class="sub-title text-primary pe-3">Let’s Connect</h5>
                    </div>
                    <h1 class="display-5 mb-4">Register Here</h1>
                    <form action="" method="POST" id="register">
                        <div class="row g-4">
                            <div class="col-lg-12 col-xl-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="name" placeholder="Your Name"
                                        required>
                                    <label for="name">Your Name</label>
                                </div>
                            </div>
                            <div class="col-lg-12 col-xl-6">
                                <div class="form-floating">
                                    <input type="email" class="form-control" name="email" placeholder="Your Email"
                                        required>
                                    <label for="email">Your Email</label>
                                </div>
                            </div>
                            <div class="col-lg-12 col-xl-6">
                                <div class="form-floating">
                                    <input type="phone" class="form-control" name="contact" placeholder="Phone"
                                        required>
                                    <label for="phone">Your Phone</label>
                                </div>
                            </div>
                            <div class="col-lg-12 col-xl-6">
                                <div class="form-floating">
                                    <input type="password" class="form-control" name="password" placeholder="Password"
                                        required>
                                    <label for="Password">Your Password</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="city" placeholder="City" required>
                                    <label for="City">City</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <textarea class="form-control" placeholder="Leave a message here" name="address"
                                        required style="height: 160px"></textarea>
                                    <label for="address">Address</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <button type="submit" name="register"
                                    class="btn btn-primary w-100 py-3">Register</button>
                            </div>
                        </div>
                        <p class="pt-3 text-center">Already have an Account Click <a class="cur"
                                onclick="showform(false)">Here</a>
                        </p>
                    </form>
                    <form action="" method="POST" id="login">
                        <div class="row g-4">
                            <div class="col-lg-12 col-xl-12">
                                <div class="form-floating">
                                    <input type="email" class="form-control" name="identifier"
                                        placeholder="Your Email / Contact" required>
                                    <label for="email">Your Email</label>
                                </div>
                            </div>
                            <div class="col-lg-12 col-xl-12">
                                <div class="form-floating">
                                    <input type="password" class="form-control" name="password" placeholder="Password"
                                        required>
                                    <label for="Password">Your Password</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <button type="submit" name="login" class="btn btn-primary w-100 py-3">Login</button>
                            </div>
                        </div>
                        <p class="pt-3 text-center">Don't have an Account Click <a class="cur"
                                onclick="showform(true)">Here</a></p>
                    </form>
                    <script>
                        function showform(log) {
                            if (log) {
                                document.getElementById('login').style.display = 'none';
                                document.getElementById('register').style.display = 'block';
                            } else {
                                document.getElementById('login').style.display = 'block';
                                document.getElementById('register').style.display = 'none';
                            }
                        }
                        showform(true);
                    </script>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->


    <?php
    include "Footer.php";
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