<?php
session_start();

include "./config.php";


$sql_latest = "SELECT * FROM travel_packages tp
LEFT JOIN package_images pi ON tp.id = pi.package_id AND pi.is_cover = 1 LIMIT 6";
$result_latest = $db->query($sql_latest);
$latest_packages = $result_latest->fetch_all(MYSQLI_ASSOC);


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


    <!-- Carousel Start -->
    <div class="carousel-header">
        <div id="carouselId" class="carousel slide" data-bs-ride="carousel">
            <ol class="carousel-indicators">
                <li data-bs-target="#carouselId" data-bs-slide-to="0" class="active"></li>
                <!-- <li data-bs-target="#carouselId" data-bs-slide-to="1"></li> -->
            </ol>
            <div class="carousel-inner" role="listbox">
                <div class="carousel-item active">
                    <img src="img/carousel-1.jpg" class="img-fluid" alt="Image">
                    <div class="carousel-caption">
                        <div class="text-center p-4" style="max-width: 900px;">
                            <h4 class="text-white text-uppercase fw-bold mb-3 mb-md-4 wow fadeInUp"
                                data-wow-delay="0.1s">Solution For All Type Of Travels</h4>
                            <h1 class="display-3 text-capitalize text-white mb-3 mb-md-4 wow fadeInUp"
                                data-wow-delay="0.3s">Explore. Experience. Enjoy <br /> Your Journey, Our Expertise!
                            </h1>
                        </div>
                    </div>
                </div>
                <!-- <div class="carousel-item">
                        <img src="img/carousel-2.jpg" class="img-fluid" alt="Image">
                        <div class="carousel-caption">
                            <div class="text-center p-4" style="max-width: 900px;">
                                <h5 class="text-white text-uppercase fw-bold mb-3 mb-md-4 wow fadeInUp" data-wow-delay="0.1s">Solution For All Type Of Visas</h5>
                                <h1 class="display-1 text-capitalize text-white mb-3 mb-md-4 wow fadeInUp" data-wow-delay="0.3s">Best Visa Immigrations Services</h1>
                                <p class="text-white mb-4 mb-md-5 fs-5 wow fadeInUp" data-wow-delay="0.5s">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, 
                                </p>
                                <a class="btn btn-primary border-secondary rounded-pill text-white py-3 px-5 wow fadeInUp" data-wow-delay="0.7s" href="#">More Details</a>
                            </div>
                        </div>
                    </div> -->
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselId" data-bs-slide="prev">
                <span class="carousel-control-prev-icon bg-secondary wow fadeInLeft" data-wow-delay="0.2s"
                    aria-hidden="false"></span>
                <span class="visually-hidden-focusable">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselId" data-bs-slide="next">
                <span class="carousel-control-next-icon bg-secondary wow fadeInRight" data-wow-delay="0.2s"
                    aria-hidden="false"></span>
                <span class="visually-hidden-focusable">Next</span>
            </button>
        </div>
    </div>
    <!-- Carousel End -->

    <!-- About Start -->
    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-xl-5 wow fadeInLeft" data-wow-delay="0.1s">
                    <div class="bg-light rounded">
                        <img src="img/about-2.png" class="img-fluid w-100" style="margin-bottom: -7px;" alt="Image">
                        <img src="https://t4.ftcdn.net/jpg/00/65/48/25/360_F_65482539_C0ZozE5gUjCafz7Xq98WB4dW6LAhqKfs.jpg"
                            class="img-fluid w-100 border-bottom border-5 border-primary"
                            style="border-top-right-radius: 300px; border-top-left-radius: 300px;" alt="Image">
                    </div>
                </div>
                <div class="col-xl-7 wow fadeInRight" data-wow-delay="0.3s">
                    <h5 class="sub-title pe-3">About the company</h5>
                    <h1 class="display-5 mb-4">We’re Trusted Immigration Consultant Agency.</h1>
                    <p class="mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt architecto consectetur
                        iusto perferendis blanditiis assumenda dignissimos, commodi fuga culpa earum explicabo libero
                        sint est mollitia saepe! Sequi asperiores rerum nemo!</p>
                    <div class="row gy-4 align-items-center">
                        <div class="col-12 col-sm-6 d-flex align-items-center">
                            <i class="fas fa-map-marked-alt fa-3x text-secondary"></i>
                            <h5 class="ms-4">Best Immigration Resources</h5>
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
                                <h1 class="display-5 fw-bold mb-2">34</h1>
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


    <!-- Services Start -->
    <div class="container-fluid service overflow-hidden pt-5">
        <div class="container py-5">
            <div class="section-title text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">
                <div class="sub-style">
                    <h5 class="sub-title text-primary px-3">Packages Categories</h5>
                </div>
                <!-- <h1 class="display-5 mb-4">Enabling Your Immigration Successfully</h1> -->
                <!-- <p class="mb-0">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat deleniti amet at atque sequi quibusdam cumque itaque repudiandae temporibus, eius nam mollitia voluptas maxime veniam necessitatibus saepe in ab? Repellat!</p> -->
            </div>
            <div class="row g-4">
                <?php
                $package_types = [["Honeymoon", "Celebrate love with our romantic honeymoon packages! Escape to breathtaking destinations and create unforgettable memories with your special someone.", "https://w0.peakpx.com/wallpaper/495/525/HD-wallpaper-%E2%9D%A4%EF%B8%8F-sea-beach-couple-honeymoon-romance.jpg"], ["Family Trip", "Enjoy quality time with your loved ones! Our family-friendly travel packages ensure fun, comfort, and excitement for all ages.", "https://hldak.mmtcdn.com/prod-s3-hld-hpcmsadmin/holidays/images/cities/1328/Relaxing%20family%20holiday.jpg"], ["Adventure", "Thrill-seekers, get ready! From trekking and water sports to wildlife safaris, our adventure packages promise adrenaline-pumping experiences.", "https://images.pexels.com/photos/307008/pexels-photo-307008.jpeg?cs=srgb&dl=pexels-riciardus-307008.jpg&fm=jpg"], ["Business Trip", "Travel hassle-free for work! Our business travel solutions offer convenient flights, hotels, and transport for a smooth and productive journey.", "https://media.istockphoto.com/id/1489123986/photo/travel-for-business-team-at-airport-and-men-catch-flight-for-work-trip-with-conference-or.jpg?s=612x612&w=0&k=20&c=TtfyyN-mkRKAHiOcmNV5IHOWSuL2THEmPgCWXlj7EBM="]];
                foreach ($package_types as $type) {
                    ?>
                    <div class="col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="service-item">
                            <div class="service-inner">
                                <div class="service-img">
                                    <img src="<?php echo $type[2]; ?>" class="img-fluid w-100 rounded" alt="Image">
                                </div>
                                <div class="service-title">
                                    <div class="service-title-name">
                                        <div class="bg-primary text-center rounded p-3 mx-5 mb-4">
                                            <a href="#" class="h4 text-white mb-0"><?php echo $type[0]; ?></a>
                                        </div>
                                        <div class="py-5 "></div>
                                        <!-- <a class="btn bg-light text-secondary rounded-pill py-3 px-5 mb-4" href="#">Explore
                                            More</a> -->
                                    </div>
                                    <div class="service-content pb-4">
                                        <a href="#">
                                            <h4 class="text-white mb-4 py-3"><?php echo $type[0]; ?></h4>
                                        </a>
                                        <div class="px-4">
                                            <p class="mb-4"><?php echo $type[1]; ?></p>
                                            <a class="btn btn-primary border-secondary rounded-pill py-3 px-3 w-100"
                                                href="#">Explore More</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                }
                ?>

            </div>
        </div>
    </div>
    <!-- Services End -->



    <!-- Features Start -->
    <div class="container-fluid features overflow-hidden py-5">
        <div class="container">
            <div class="section-title text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">
                <div class="sub-style">
                    <h5 class="sub-title text-primary px-3">Why Choose Us</h5>
                </div>
            </div>
            <div class="row g-4 justify-content-center text-center">
                <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="feature-item text-center p-4">
                        <div class="feature-icon p-3 mb-4">
                            <i class="fas fa-dollar-sign fa-4x text-primary"></i>
                        </div>
                        <div class="feature-content d-flex flex-column">
                            <h5 class="mb-3">Cost-Effective</h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="feature-item text-center p-4">
                        <div class="feature-icon p-3 mb-4">
                            <i class="fab fa-cc-visa fa-4x text-primary"></i>
                        </div>
                        <div class="feature-content d-flex flex-column">
                            <h5 class="mb-3">Visa Assistance</h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="feature-item text-center p-4">
                        <div class="feature-icon p-3 mb-4">
                            <i class="fas fa-atlas fa-4x text-primary"></i>
                        </div>
                        <div class="feature-content d-flex flex-column">
                            <h5 class="mb-3">Faster Processing</h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.7s">
                    <div class="feature-item text-center p-4">
                        <div class="feature-icon p-3 mb-4">
                            <i class="fas fa-users fa-4x text-primary"></i>
                        </div>
                        <div class="feature-content d-flex flex-column">
                            <h5 class="mb-3">Direct Interviews</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Features End -->



    <!-- Countries We Offer Start -->
    <div class="container-fluid country overflow-hidden py-5">
        <div class="container">
            <div class="section-title text-center wow fadeInUp" data-wow-delay="0.1s" style="margin-bottom: 70px;">
                <div class="sub-style">
                    <h5 class="sub-title text-primary px-3">COUNTRIES WE OFFER</h5>
                </div>
                <!-- <h1 class="display-5 mb-4">Immigration & visa services following Countries</h1> -->
                <!-- <p class="mb-0">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat deleniti amet at atque
                    sequi quibusdam cumque itaque repudiandae temporibus, eius nam mollitia voluptas maxime veniam
                    necessitatibus saepe in ab? Repellat!</p> -->
            </div>
            <div class="row g-4 text-center">
                <?php

                $result = $db->query("SELECT DISTINCT city FROM hotels UNION SELECT DISTINCT departure_airport FROM flights UNION SELECT DISTINCT city FROM cabs");
                while ($row = $result->fetch_assoc()) {
                    if ($row['city'] != "") {
                        // echo "<option value='" . $row['city'] . "'>" . $row['city'] . "</option>";
                        ?>
                        <div class="col-lg-6 col-xl-3 mb-5 mb-xl-0 wow fadeInUp" data-wow-delay="0.1s">
                            <div class="country-item">
                                <div class="rounded overflow-hidden">
                                    <img src="img/country-1.jpg" class="img-fluid w-100 rounded" alt="Image">
                                </div>
                                <!-- <div class="country-flag">
                            <img src="img/brazil.jpg" class="img-fluid rounded-circle" alt="Image">
                        </div> -->
                                <div class="country-name">
                                    <a href="#" class="text-white fs-4 text-capitalize"><?php echo $row['city']; ?></a>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                }
                ?>
            </div>
        </div>
    </div>
    <!-- Countries We Offer End -->


    <!-- Testimonial Start -->
    <!-- <div class="container-fluid testimonial overflow-hidden pb-5">
        <div class="container py-5">
            <div class="section-title text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">
                <div class="sub-style">
                    <h5 class="sub-title text-primary px-3">OUR CLIENTS RIVIEWS</h5>
                </div>
                <h1 class="display-5 mb-4">What Our Clients Say</h1>
                <p class="mb-0">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat deleniti amet at atque
                    sequi quibusdam cumque itaque repudiandae temporibus, eius nam mollitia voluptas maxime veniam
                    necessitatibus saepe in ab? Repellat!</p>
            </div>
            <div class="owl-carousel testimonial-carousel wow zoomInDown" data-wow-delay="0.2s">
                <div class="testimonial-item">
                    <div class="testimonial-content p-4 mb-5">
                        <p class="fs-5 mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                            exercitati eiusmod tempor incididunt.
                        </p>
                        <div class="d-flex justify-content-end">
                            <i class="fas fa-star text-secondary"></i>
                            <i class="fas fa-star text-secondary"></i>
                            <i class="fas fa-star text-secondary"></i>
                            <i class="fas fa-star text-secondary"></i>
                            <i class="fas fa-star text-secondary"></i>
                        </div>
                    </div>
                    <div class="d-flex">
                        <div class="rounded-circle me-4" style="width: 100px; height: 100px;">
                            <img class="img-fluid rounded-circle" src="img/testimonial-1.jpg" alt="img">
                        </div>
                        <div class="my-auto">
                            <h5>Person Name</h5>
                            <p class="mb-0">Profession</p>
                        </div>
                    </div>
                </div>
                <div class="testimonial-item">
                    <div class="testimonial-content p-4 mb-5">
                        <p class="fs-5 mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                            exercitati eiusmod tempor incididunt.
                        </p>
                        <div class="d-flex justify-content-end">
                            <i class="fas fa-star text-secondary"></i>
                            <i class="fas fa-star text-secondary"></i>
                            <i class="fas fa-star text-secondary"></i>
                            <i class="fas fa-star text-secondary"></i>
                            <i class="fas fa-star text-secondary"></i>
                        </div>
                    </div>
                    <div class="d-flex">
                        <div class="rounded-circle me-4" style="width: 100px; height: 100px;">
                            <img class="img-fluid rounded-circle" src="img/testimonial-2.jpg" alt="img">
                        </div>
                        <div class="my-auto">
                            <h5>Person Name</h5>
                            <p class="mb-0">Profession</p>
                        </div>
                    </div>
                </div>
                <div class="testimonial-item">
                    <div class="testimonial-content p-4 mb-5">
                        <p class="fs-5 mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                            exercitati eiusmod tempor incididunt.
                        </p>
                        <div class="d-flex justify-content-end">
                            <i class="fas fa-star text-secondary"></i>
                            <i class="fas fa-star text-secondary"></i>
                            <i class="fas fa-star text-secondary"></i>
                            <i class="fas fa-star text-secondary"></i>
                            <i class="fas fa-star text-secondary"></i>
                        </div>
                    </div>
                    <div class="d-flex">
                        <div class="rounded-circle me-4" style="width: 100px; height: 100px;">
                            <img class="img-fluid rounded-circle" src="img/testimonial-3.jpg" alt="img">
                        </div>
                        <div class="my-auto">
                            <h5>Person Name</h5>
                            <p class="mb-0">Profession</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <!-- Testimonial End -->

    <!-- Contact Start -->
    <div class="container-fluid contact overflow-hidden pb-5">
        <div class="container py-5">
            <div class="office pt-5">
                <div class="section-title text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="sub-style">
                        <h5 class="sub-title text-primary px-3">Worlwide Offices</h5>
                    </div>
                    <h1 class="display-5 mb-4">Explore Our Office Worldwide</h1>
                    <p class="mb-0">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat deleniti amet at
                        atque sequi quibusdam cumque itaque repudiandae temporibus, eius nam mollitia voluptas maxime
                        veniam necessitatibus saepe in ab? Repellat!</p>
                </div>
                <div class="row g-4 justify-content-center">


                    <?php foreach ($latest_packages as $package): ?>


                        <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.1s">
                            <div class="office-item p-4">
                                <div class="office-img mb-4">
                                    <img src="admin/<?php echo $package['image_path']; ?>" class="img-fluid w-100 rounded"
                                        alt="">
                                </div>
                                <div class="office-content d-flex flex-column">
                                    <h4 class="mb-2 text-capitalize"><?php echo $package['package_name']; ?></h4>
                                    <small class="h6 text-capitalize"><?php echo $package['package_type']; ?></small>
                                    <a href="#" class="text-muted fs-5 mb-2">₹<?php echo $package['total_amount']; ?></a>
                                    <p class="mb-0">Persons : <?php echo $package['total_persons']; ?></p>
                                    <a href="package_details.php?id=<?php echo $package['id']; ?>"
                                        class="btn btn-sm btn-primary">View Details</a>
                                </div>
                            </div>
                        </div>

                    <?php endforeach; ?>

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