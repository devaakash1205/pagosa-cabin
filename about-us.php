<!DOCTYPE html>
<html lang="zxx">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
    include("link.php");
    require_once("./admin/config.php");
    require_once("./admin/dashboard/controller/AboutPageController.php");
    $aboutData = new About($conn);
    // about banner
    $about_banner = $aboutData->getBannerImage($conn);
    // about page details
    $aboutDetails = $aboutData->getAboutUsDetails();
    ?>
    <title>Pagosa Cabin | About Us</title>
</head>

<body>
    <?php
    include("header.php");
    ?>
    <div class="inner-banner inner-bg1 banner-area-bg" style="background-image: url('admin/dashboard/<?php echo $about_banner[0]['dest']; ?>');">
        <div class="container">
            <div class="inner-title">
                <ul>
                    <li>
                        <a href="./">Home</a>
                    </li>
                    <li><i class="bx bx-chevron-right"></i></li>
                    <li>About Us</li>
                </ul>
                <h3>About Us</h3>
            </div>
        </div>
    </div>
    <!--About Us-->
    <div class="about-area pt-100 pb-70">
        <div class="container-fluid">
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
                            <?php echo $aboutDetails['description'];?>
                       
                        </p>
                    </div>
                </div>

            <?php
                    }
            ?>
            </div>
        </div>
    </div>

    <?php
    include("testimonials.php");
    ?>
    <?php
    include("footer.php");
    include("script.php");
    ?>
</body>

</html>