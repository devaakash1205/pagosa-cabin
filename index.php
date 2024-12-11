<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
    include("link.php");
    ?>
    <title>Pagosa Cabin | Home</title>
</head>

<div class="preloader">
    <div class="d-table">
        <div class="d-table-cell">
            <div class="sk-cube-area">
                <div class="sk-cube1 sk-cube"></div>
                <div class="sk-cube2 sk-cube"></div>
                <div class="sk-cube4 sk-cube"></div>
                <div class="sk-cube3 sk-cube"></div>
            </div>
        </div>
    </div>
</div>

<?php
include("header.php");
?>
<!-- Responsive Top Div -->
<!-- dessktop view -->
<div class="container-fluid d-none d-sm-block">
    <div class="row justify-content-left">
        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
            <h2 class="text-dark"><b>Adventures at Serendipity Mountain Home</b></h2>
        </div>
    </div>
</div>
<!-- mobile view -->
<div class="container-fluid d-block d-md-none">
    <div class="row justify-content-left mt-1">
        <div class="col-lg-12 col-md-12 col-sm-12 col-12 mt-5">
            <h6 class="text-dark"><b>Adventures at Serendipity Mountain Home</b></h6>
        </div>
    </div>
</div>
<div class="banner-area">
    <div class="container">
        <div class="banner-content">
            <h1>
                <?php
                echo isset($homepage_details) && $homepage_details["banner_text"] != null
                    ? $homepage_details["banner_text"]
                    : "Serendipity Vacation Home & Studio Apartment Vacation Rental";
                ?>
            </h1>
            <div class="nav-btn">
                <?php
                if (isset($homepage_details) && $homepage_details["btn_name"] != null && $homepage_details["btn_url"] != null && $homepage_details["enable_btn"] == 1) {
                    echo "<div style='text-align: center;'>
                            <a class='default-btn btn-bg-one border-radius-5' href='" . $homepage_details["btn_url"] . "'>
                                " . $homepage_details["btn_name"] . "
                            </a>
                        </div>";
                }
                ?>
            </div>
        </div>
    </div>
</div>
<!--About Us-->
<div class="about-area pt-70 pb-70">
    <div class="container-fluid">
        <div class="section-title text-center">
            <span>About Us</span>
            <h2>About Us</h2>
        </div>
        <div class="row align-items-center justify-content-center">
            <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                <div class="about-img">
                    <img src="assets/img/about/about-img.jpeg" alt="Images" class="img-height" />
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-10">
                <div class="about-content">
                    <h2><b>A Pagosa Springs, </b><span class="text-success"><b>Colorado Vacation Home in the Heart of the San Juan Mtns.</b></span></h2>

                    <p>
                        Nestled on the mountain side of The San Juan River Village, this lovely mountain home with
                        reliable high-speed Starlinks wifi has a secluded setting and a magnificent panoramic view
                        of the San Juan Mountains.
                    </p>
                    <div class="text-left">
                        <a href="about-us.php" class="default-btn btn-bg-one border-radius-5 text-decoration">Read More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Activity Item with Increased Icon Size -->
<div class="services-area-two pt-70 pb-70">
    <div class="container">
        <div class="section-title text-center">
            <span class="sp-color">Activity</span>
            <h2>Our Activities</h2>
        </div>
        <div class="row pt-45">
            <div class="col-lg-4 col-sm-6">
                <div class="services-card">
                    <i class="fas fa-sleigh text-color"></i>
                    <h3><a href="service-details.html">Sleigh Rides</a></h3>
                    <p>Whimsical sleigh rides and sledding opportunities.</p>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6">
                <div class="services-card">
                    <i class="fas fa-skiing text-color"></i>
                    <h3><a href="service-details.html">Downhill Skiing</a></h3>
                    <p>Downhill skiing and snowmobiling at nearby trails.</p>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6">
                <div class="services-card">
                    <i class="fas fa-hot-tub text-color"></i>
                    <h3><a href="service-details.html">Pagosa Hot Springs</a></h3>
                    <p>Soak in the Pagosa Hot Springs year-round, a rejuvenating experience surrounded by nature.</p>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6">
                <div class="services-card">
                    <i class="fas fa-hiking text-color"></i>
                    <h3><a href="service-details.html">Hiking</a></h3>
                    <p>Explore 3 million acres of the surrounding San Juan National Forest.</p>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6">
                <div class="services-card">
                    <i class="fas fa-fish text-color"></i>
                    <h3><a href="service-details.html">Fishing</a></h3>
                    <p>Enjoy private access to the San Juan River and nearby trout ponds.</p>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6">
                <div class="services-card">
                    <i class="fas fa-water text-color"></i>
                    <h3><a href="service-details.html">Water Activities</a></h3>
                    <p>Try river rafting or relax by the shimmering waters of the San Juan River.</p>
                </div>
            </div>
        </div>
        <div class="text-center">
            <a href="service.php" class="default-btn btn-bg-one border-radius-5 text-decoration">
                Explore More
            </a>
        </div>
    </div>

    <div class="room-area pt-100 pb-70 section-bg">
        <div class="container">
            <div class="section-title text-center">
                <span class="sp-color">Rooms</span>
                <h2>Our Rooms</h2>
            </div>
            <div class="row pt-45">
                <div class="col-lg-6">
                    <div class="room-card-two">
                        <div class="row align-items-center justify-content-center">
                            <div class="col-lg-5 col-md-4 p-0">
                                <div class="room-card-img">
                                    <a href="room-details.html">
                                        <img src="assets/img/gallery/house-2.jpg" alt="Images">
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-7 col-md-8 p-0">
                                <div class="room-card-content">
                                    <h3>
                                        <a href="room-details.html" class="text-decoration">Dining Area</a>
                                    </h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="room-card-two">
                        <div class="row align-items-center justify-content-center">
                            <div class="col-lg-5 col-md-4 p-0">
                                <div class="room-card-img">
                                    <a href="room-details.html">
                                        <img src="assets/img/gallery/house-3.jpg" alt="Images">
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-7 col-md-8 p-0">
                                <div class="room-card-content">
                                    <h3>
                                        <a href="room-details.html" class="text-decoration">Gas Log Fireplace</a>
                                    </h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="text-center">
                    <a href="rooms.php" class="default-btn btn-bg-one border-radius-5 text-decoration">
                        Browse More
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Gallery Section -->
    <div class="container pt-100 pb-70">
        <div class="section-title text-center">
            <span>Gallery</span>
            <h2>Our Gallery</h2>
        </div>

        <div class="row p-4">
            <!-- First Gallery Item -->
            <div class="col-lg-4 col-sm-6 col-md-6 mb-4">
                <div class="gallery-item position-relative">
                    <!-- Image with Hover Effect -->
                    <a href="assets/img/gallery/gallery-image-1.jpg" data-lightbox="gallery" data-title="Image 1">
                        <img src="assets/img/gallery/gallery-image-1.jpg" alt="Gallery Image 1" class="img-fluid rounded"
                            style="height: 300px; object-fit: cover;">
                        <div class="zoom-icon">
                            <i class="fas fa-search-plus"></i>
                        </div>
                    </a>
                    <h5 class="text-center mt-3 p-3">The Alpine Glow from Serendipity</h5>
                </div>
            </div>

            <!-- Second Gallery Item -->
            <div class="col-lg-4 col-sm-6 col-md-6 mb-4">
                <div class="gallery-item position-relative">
                    <!-- Image with Hover Effect -->
                    <a href="assets/img/gallery/gallery-image-2.jpg" data-lightbox="gallery" data-title="Image 2">
                        <img src="assets/img/gallery/gallery-image-2.jpg" alt="Gallery Image 2" class="img-fluid rounded"
                            style="height: 300px; object-fit: cover;">
                        <div class="zoom-icon">
                            <i class="fas fa-search-plus"></i>
                        </div>
                    </a>
                    <h5 class="text-center mt-3 p-3">River Rafting is fun!</h5>
                </div>
            </div>

            <!-- Third Gallery Item -->
            <div class="col-lg-4 col-sm-6 col-md-6 mb-4">
                <div class="gallery-item position-relative">
                    <!-- Image with Hover Effect -->
                    <a href="assets/img/gallery/gallery-image-3.jpg" data-lightbox="gallery" data-title="Image 3">
                        <img src="assets/img/gallery/gallery-image-3.jpg" alt="Gallery Image 3" class="img-fluid rounded"
                            style="height: 300px; object-fit: cover;">
                        <div class="zoom-icon">
                            <i class="fas fa-search-plus"></i>
                        </div>
                    </a>
                    <h5 class="text-center mt-3 p-3">Our Family at Wolf Creek</h5>
                </div>
            </div>
            <div class="text-center">
                <a href="gallery.php" class="default-btn btn-bg-one border-radius-5 text-decoration">
                    Browse More
                </a>
            </div>
        </div>
    </div>
    <!-- Testimonial Start here -->
    <?php
    include("testimonials.php");
    include("footer.php");
    include("script.php");
    ?>
    </body>

</html>