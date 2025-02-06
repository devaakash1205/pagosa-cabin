<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
    include("link.php");
    require_once("./admin/config.php");
    //home page details
    require_once("./admin/dashboard/controller/HomePageController.php");
    $homeData = new Home($conn);
    $home_banner = $homeData->getBannerImage($conn);
    $homepage_details = $homeData->getHomePageDetails($conn);
    // about us details  
    require_once("./admin/dashboard/controller/AboutPageController.php");
    $aboutData = new About($conn);
    $aboutDetails = $aboutData->getAboutUsDetails();
    // activity page details
    require_once("./admin/dashboard/controller/ActivityPageController.php");
    $activityData = new Activities($conn);
    $activityDetails = $activityData->getSixActivity();
    ?>
    <title>Pagosa Cabin | Home</title>
</head>
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

<div class="banner-area banner-area-bg" style="background-image: url('admin/dashboard/<?php echo $home_banner[0]['dest']; ?>');">
    <div class="container">
        <div class="banner-content">
            <h1>
                <?php
                echo isset($homepage_details) && $homepage_details["banner_text"] != null
                    ? $homepage_details["banner_text"]
                    : "Serendipity Vacation Home & Studio Apartment Vacation Rental";
                ?>
            </h1>
        </div>
    </div>
</div>
<!--About Us-->
<div class="about-area pt-70 pb-70">
    <div class="container-fluid">
        <div class="section-title text-center">
            <span>About Us</span>
            <h2>Our About Us</h2>
        </div>
        <div class="row align-items-center justify-content-center">
            <div class="col-lg-6">
                <?php
                if (!empty($aboutDetails) && is_array($aboutDetails)) {
                ?>
                    <div class="about-img">
                        <img src="admin/dashboard/<?php echo $aboutDetails['image_url']; ?>" alt="Images" class="img-height" />
                    </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-10">
                <div class="about-content">
                    <?php
                    $title = $aboutDetails['title'];
                    $greenLength = ceil(strlen($title) * 0.1);
                    $firstPart = substr($title, 0, $greenLength);
                    $secondPart = substr($title, $greenLength);
                    ?>
                    <h2>
                        <b>
                            <span><?php echo htmlspecialchars($firstPart); ?></span>
                            <span class="text-success"><?php echo htmlspecialchars($secondPart); ?></span>
                        </b>
                    </h2>
                    <p>
                        <?php
                        $words = explode(' ', $aboutDetails['description']);
                        $shortText = implode(' ', array_slice($words, 0, 188));
                        echo $shortText . '.';
                        ?>
                    </p>
                    <div class="text-left">
                        <a href="about-us.php" class="default-btn btn-bg-one text-decoration">Read
                            More</a>
                    </div>
                </div>
            </div>
        <?php
                }
        ?>
        </div>
    </div>
</div>

<div class="pt-20 pb-70">
    <div class="container-fluid">
        <div class="section-title text-center">
            <span>Room</span>
            <h2>Our Room</h2>
        </div>
        <div class="container-fluid">
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="about-img">
                        <img src="assets/img/room-new/room1.jpg" alt="Images" class="img-height" />
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="about-content">
                        <h2>Adventures at Serendipity Vacation Home</h2>
                        <p>
                            Nestled on the mountainside of the San Juan River Resort, this lovely 3 bedroom 2 bath
                            mountain
                            home w/studio apartment for a 4th bedroom and 3rd bath has high speed, reliable Starlnks
                            internet, and a magnificent panoramic view of the San Juan Mountains from inside and outside
                            the
                            home. It is located 7 miles east of Pagosa Springs and 20 minutes from Wolf Creek Ski Area.
                        <ul>
                            <li>
                                <i class="fas fa-check text-success font-size-25 mt-3 p-0"></i>Pagosa Springs, Co is a
                                "Little Piece of Heaven" in Colorado!
                            </li>
                            <li>
                                <i class="fas fa-check text-success font-size-25 mt-3 p-0"></i>Military discounts
                                offered.
                                No smoking.Pets allowed upon approval.
                            </li>
                            <li>
                                <i class="fas fa-check text-success font-size-25 mt-3 p-0"></i> Couples, family,
                                weddings
                                and groups.
                            </li>
                        </ul>
                        </p>
                        <div>
                            <a href="rooms.php" class="default-btn btn-bg-one text-decoration">
                                Book Room
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Activity-->
<div class="services-area-two pt-70 pb-70">
    <div class="container">
        <div class="section-title text-center">
            <span class="sp-color">Activity</span>
            <h2>Our Activities</h2>
        </div>
        <div class="row ">
            <?php
            foreach ($activityDetails as $key => $value) {
            ?>
                <div class="col-lg-4 col-sm-6">
                    <div class="services-card">
                        <img src="admin/dashboard/<?php echo $value['image_url']; ?>" class="activity-icon">
                        <h3><a href="service.php"><?php echo $value['title']; ?></a></h3>
                        <p><?php echo $value['description']; ?></p>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
        <div class="text-center">
            <a href="service.php" class="default-btn btn-bg-one text-decoration">
                Explore More
            </a>
        </div>
    </div>
</div>

<!-- Gallery Section -->
<div class="container pt-50 pb-70">
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
            <a href="gallery.php" class="default-btn btn-bg-one text-decoration">
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