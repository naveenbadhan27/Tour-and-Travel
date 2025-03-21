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

    <!-- Header Start -->
    <div class="container-fluid bg-breadcrumb">
        <div class="container text-center py-5" style="max-width: 900px;">
            <h3 class="text-white display-3 mb-4 wow fadeInDown" data-wow-delay="0.1s">About Us</h1>
                <ol class="breadcrumb justify-content-center text-white mb-0 wow fadeInDown" data-wow-delay="0.3s">
                    <li class="breadcrumb-item"><a href="index.html" class="text-white">Home</a></li>
                    <li class="breadcrumb-item"><a href="#" class="text-white">Pages</a></li>
                    <li class="breadcrumb-item active text-secondary">About</li>
                </ol>
        </div>
    </div>
    <!-- Header End -->

    <!-- About Start -->
    <div class="container-fluid overflow-hidden py-5">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-xl-5 wow fadeInLeft" data-wow-delay="0.1s">
                    <div class="bg-light rounded">
                        <img src="img/about-2.png" class="img-fluid w-100" style="margin-bottom: -7px;" alt="Image">
                        <img src="img/about-3.jpg" class="img-fluid w-100 border-bottom border-5 border-primary"
                            style="border-top-right-radius: 300px; border-top-left-radius: 300px;" alt="Image">
                    </div>
                </div>
                <div class="col-xl-7 wow fadeInRight" data-wow-delay="0.3s">
                    <h5 class="sub-title pe-3">About the company</h5>
                    <h1 class="display-5 mb-4">We’re Trusted Immigration Consultant Agency.</h1>
                    <p class="mb-4">
                        Welcome to WanderEase Travels, your trusted travel partner dedicated to making your journeys
                        seamless and memorable. We specialize in providing comprehensive travel solutions, including
                        <b>tour package booking, hotels, flights, cabs, and personalized travel services</b> to meet all
                        your travel needs.

                        Whether you're planning a <b>romantic honeymoon, a fun-filled family vacation, an adventurous
                            getaway, or a business trip</b>, we ensure a hassle-free experience with the best deals and
                        exceptional customer support.

                        Our mission is to offer <b>affordable, reliable, and customized travel services</b>, allowing
                        you
                        to explore the world with ease and comfort. With a user-friendly booking process, 24/7
                        assistance, and a wide range of travel options, we bring your dream trips to life.

                        Let us take care of your travel needs while you focus on creating unforgettable memories!
                        🌍✈️🚖🏨
                    </p>
                    <div class="row gy-4 align-items-center">
                        <div class="col-12 col-sm-6 d-flex align-items-center">
                            <i class="fas fa-map-marked-alt fa-3x text-secondary"></i>
                            <h5 class="ms-4">Best Location Resources</h5>
                        </div>
                        <div class="col-12 col-sm-6 d-flex align-items-center">
                            <i class="fas fa-passport fa-3x text-secondary"></i>
                            <h5 class="ms-4">Return Visas Availabile</h5>
                        </div>
                        <div class="col-4 col-md-3">
                            <div class="bg-light text-center rounded p-3">
                                <div class="mb-2">
                                    <i class="fas fa-ticket-alt fa-4x text-primary"></i>
                                </div>
                                <h1 class="display-5 fw-bold mb-2">10</h1>
                                <p class="text-muted mb-0">Years of Experience</p>
                            </div>
                        </div>
                        <div class="col-8 col-md-9">
                            <div class="mb-5">
                                <p class="text-primary h6 mb-3"><i class="fa fa-check-circle text-secondary me-2"></i>
                                    Offer 100 % Genuine Assistance</p>
                                <p class="text-primary h6 mb-3"><i class="fa fa-check-circle text-secondary me-2"></i>
                                    It’s Faster & Reliable Execution</p>
                                <p class="text-primary h6 mb-3"><i class="fa fa-check-circle text-secondary me-2"></i>
                                    Accurate & Expert Advice</p>
                            </div>
                            <div class="d-flex flex-wrap">
                                <div id="phone-tada" class="d-flex align-items-center justify-content-center me-4">
                                    <a href="" class="position-relative wow tada" data-wow-delay=".9s">
                                        <i class="fa fa-phone-alt text-primary fa-3x"></i>
                                        <div class="position-absolute" style="top: 0; left: 25px;">
                                            <span><i class="fa fa-comment-dots text-secondary"></i></span>
                                        </div>
                                    </a>
                                </div>
                                <div class="d-flex flex-column justify-content-center">
                                    <span class="text-primary">Have any questions?</span>
                                    <span class="text-secondary fw-bold fs-5" style="letter-spacing: 2px;">Free: +0123
                                        456 7890</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->


    <!-- Counter Facts Start -->
    <div class="container-fluid counter-facts py-5">
        <div class="container py-5">
            <div class="row g-4">
                <div class="col-12 col-sm-6 col-md-6 col-xl-3 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="counter">
                        <div class="counter-icon">
                            <i class="fas fa-passport"></i>
                        </div>
                        <div class="counter-content">
                            <h3>Visa Categories</h3>
                            <div class="d-flex align-items-center justify-content-center">
                                <span class="counter-value" data-toggle="counter-up">31</span>
                                <h4 class="text-secondary mb-0" style="font-weight: 600; font-size: 25px;">+</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-6 col-xl-3 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="counter">
                        <div class="counter-icon">
                            <i class="fas fa-users"></i>
                        </div>
                        <div class="counter-content">
                            <h3>Team Members</h3>
                            <div class="d-flex align-items-center justify-content-center">
                                <span class="counter-value" data-toggle="counter-up">377</span>
                                <h4 class="text-secondary mb-0" style="font-weight: 600; font-size: 25px;">+</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-6 col-xl-3 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="counter">
                        <div class="counter-icon">
                            <i class="fas fa-user-check"></i>
                        </div>
                        <div class="counter-content">
                            <h3>Visa Process</h3>
                            <div class="d-flex align-items-center justify-content-center">
                                <span class="counter-value" data-toggle="counter-up">4.9</span>
                                <h4 class="text-secondary mb-0" style="font-weight: 600; font-size: 25px;">K</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-6 col-xl-3 wow fadeInUp" data-wow-delay="0.7s">
                    <div class="counter">
                        <div class="counter-icon">
                            <i class="fas fa-handshake"></i>
                        </div>
                        <div class="counter-content">
                            <h3>Success Rates</h3>
                            <div class="d-flex align-items-center justify-content-center">
                                <span class="counter-value" data-toggle="counter-up">98</span>
                                <h4 class="text-secondary mb-0" style="font-weight: 600; font-size: 25px;">%</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Counter Facts End -->

    <!-- Countries We Offer Start -->
    <div class="container-fluid country overflow-hidden py-5">
        <div class="container py-5">
            <div class="section-title text-center wow fadeInUp" data-wow-delay="0.1s" style="margin-bottom: 70px;">
                <div class="sub-style">
                    <h5 class="sub-title text-primary px-3">COUNTRIES WE OFFER</h5>
                </div>
                <h1 class="display-5 mb-4">Immigration & visa services following Countries</h1>
                <p class="mb-0">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat deleniti amet at atque
                    sequi quibusdam cumque itaque repudiandae temporibus, eius nam mollitia voluptas maxime veniam
                    necessitatibus saepe in ab? Repellat!</p>
            </div>
            <div class="row g-4 text-center">
                <div class="col-lg-6 col-xl-3 mb-5 mb-xl-0 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="country-item">
                        <div class="rounded overflow-hidden">
                            <img src="img/country-1.jpg" class="img-fluid w-100 rounded" alt="Image">
                        </div>
                        <div class="country-flag">
                            <img src="img/brazil.jpg" class="img-fluid rounded-circle" alt="Image">
                        </div>
                        <div class="country-name">
                            <a href="#" class="text-white fs-4">Brazil</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-xl-3 mb-5 mb-xl-0 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="country-item">
                        <div class="rounded overflow-hidden">
                            <img src="img/country-2.jpg" class="img-fluid w-100 rounded" alt="Image">
                        </div>
                        <div class="country-flag">
                            <img src="img/india.jpg" class="img-fluid rounded-circle" alt="Image">
                        </div>
                        <div class="country-name">
                            <a href="#" class="text-white fs-4">india</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-xl-3 mb-5 mb-xl-0 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="country-item">
                        <div class="rounded overflow-hidden">
                            <img src="img/country-3.jpg" class="img-fluid w-100 rounded" alt="Image">
                        </div>
                        <div class="country-flag">
                            <img src="img/usa.jpg" class="img-fluid rounded-circle" alt="Image">
                        </div>
                        <div class="country-name">
                            <a href="#" class="text-white fs-4">New York</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-xl-3 mb-5 mb-xl-0 wow fadeInUp" data-wow-delay="0.7s">
                    <div class="country-item">
                        <div class="rounded overflow-hidden">
                            <img src="img/country-4.jpg" class="img-fluid w-100 rounded" alt="Image">
                        </div>
                        <div class="country-flag">
                            <img src="img/italy.jpg" class="img-fluid rounded-circle" alt="Image">
                        </div>
                        <div class="country-name">
                            <a href="#" class="text-white fs-4">Italy</a>
                        </div>
                    </div>
                </div>
                <!-- <div class="col-12">
                    <a class="btn btn-primary border-secondary rounded-pill py-3 px-5 wow fadeInUp"
                        data-wow-delay="0.1s" href="#">More Countries</a>
                </div> -->
            </div>
        </div>
    </div>
    <!-- Countries We Offer End -->


    <!-- Training Start -->
    <!-- <div class="container-fluid training overflow-hidden bg-light py-5">
        <div class="container py-5">
            <div class="section-title text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">
                <div class="sub-style">
                    <h5 class="sub-title text-primary px-3">CHECK OUR TRAINING</h5>
                </div>
                <h1 class="display-5 mb-4">Get the Best Coacing Service Training with Our Travisa</h1>
                <p class="mb-0">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat deleniti amet at atque
                    sequi quibusdam cumque itaque repudiandae temporibus, eius nam mollitia voluptas maxime veniam
                    necessitatibus saepe in ab? Repellat!</p>
            </div>
            <div class="row g-4">
                <div class="col-lg-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="training-item">
                        <div class="training-inner">
                            <img src="img/training-1.jpg" class="img-fluid w-100 rounded" alt="Image">
                            <div class="training-title-name">
                                <a href="#" class="h4 text-white mb-0">IELTS</a>
                                <a href="#" class="h4 text-white mb-0">Coaching</a>
                            </div>
                        </div>
                        <div class="training-content bg-secondary rounded-bottom p-4">
                            <a href="#">
                                <h4 class="text-white">IELTS Coaching</h4>
                            </a>
                            <p class="text-white-50">Lorem ipsum dolor sit amet consectetur adipisicing elit. Autem,
                                veritatis.</p>
                            <a class="btn btn-secondary rounded-pill text-white p-0" href="#">Read More <i
                                    class="fa fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="training-item">
                        <div class="training-inner">
                            <img src="img/training-2.jpg" class="img-fluid w-100 rounded" alt="Image">
                            <div class="training-title-name">
                                <a href="#" class="h4 text-white mb-0">TOEFL</a>
                                <a href="#" class="h4 text-white mb-0">Coaching</a>
                            </div>
                        </div>
                        <div class="training-content bg-secondary rounded-bottom p-4">
                            <a href="#">
                                <h4 class="text-white">TOEFL Coaching</h4>
                            </a>
                            <p class="text-white-50">Lorem ipsum dolor sit amet consectetur adipisicing elit. Autem,
                                veritatis.</p>
                            <a class="btn btn-secondary rounded-pill text-white p-0" href="#">Read More <i
                                    class="fa fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="training-item">
                        <div class="training-inner">
                            <img src="img/training-3.jpg" class="img-fluid w-100 rounded" alt="Image">
                            <div class="training-title-name">
                                <a href="#" class="h4 text-white mb-0">PTE</a>
                                <a href="#" class="h4 text-white mb-0">Coaching</a>
                            </div>
                        </div>
                        <div class="training-content bg-secondary rounded-bottom p-4">
                            <a href="#">
                                <h4 class="text-white">PTE Coaching</h4>
                            </a>
                            <p class="text-white-50">Lorem ipsum dolor sit amet consectetur adipisicing elit. Autem,
                                veritatis.</p>
                            <a class="btn btn-secondary rounded-pill text-white p-0" href="#">Read More <i
                                    class="fa fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.7s">
                    <div class="training-item">
                        <div class="training-inner">
                            <img src="img/training-4.jpg" class="img-fluid w-100 rounded" alt="Image">
                            <div class="training-title-name">
                                <a href="#" class="h4 text-white mb-0">OET</a>
                                <a href="#" class="h4 text-white mb-0">Coaching</a>
                            </div>
                        </div>
                        <div class="training-content bg-secondary rounded-bottom p-4">
                            <a href="#">
                                <h4 class="text-white">OET Coaching</h4>
                            </a>
                            <p class="text-white-50">Lorem ipsum dolor sit amet consectetur adipisicing elit. Autem,
                                veritatis.</p>
                            <a class="btn btn-secondary rounded-pill text-white p-0" href="#">Read More <i
                                    class="fa fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-12 text-center">
                    <a class="btn btn-primary border-secondary rounded-pill py-3 px-5 wow fadeInUp"
                        data-wow-delay="0.1s" href="#">View More</a>
                </div>
            </div>
        </div>
    </div> -->
    <!-- Training End -->

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