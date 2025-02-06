<!DOCTYPE html>
<html lang="zxx">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
    include("link.php");
    require_once("./admin/config.php");
    require_once("./admin/dashboard/controller/ActivityPageController.php");
    $activityData = new Activities($conn);
    $activityDetails =  $activityData->getAllActivity();
    $category = $activityData->getAllCategories();
    ?>
    <title>Pagosa Cabin | Activities</title>
</head>

<body>
    <?php
    include("header.php");

    ?>
    <div class="inner-banner inner-bg2">
        <div class="container">
            <div class="inner-title">
                <ul>
                    <li>
                        <a href="./">Home</a>
                    </li>
                    <li><i class="bx bx-chevron-right"></i></li>
                    <li>Activities</li>
                </ul>
                <h3>Our Activities</h3>
            </div>
        </div>
    </div>

    <!-- Main Activities Section -->
    <div class="container my-5">
        <h1 class="section-heading font-weight-bold text-success">Explore Our Activities</h1>
        <div class="row g-4">
            <?php
            foreach ($category as $cat) {
            ?>
                <h3 class="section-heading font-weight-bold text-dark">
                    <?php echo $cat['name']; ?>
                </h3>
                <div class="row">
                    <?php
                    $found = false;
                    foreach ($activityDetails as $activity) {
                        if ($activity['category'] == $cat['id']) {
                            $found = true;
                    ?>
                            <div class="col-lg-4 col-md-6 col-sm-6 col-12 g-4">
                                <div class="card activity-card shadow-sm">
                                    <div class="card-body">
                                        <img src="admin/dashboard/<?php echo $activity['image_url']; ?>" class="activity-icon">
                                        <h5 class="card-title mt-2"><?php echo $activity['title']; ?></h5>
                                        <p class="card-text">
                                            <?php echo $activity['description']; ?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                    <?php
                        }
                    }
                    if (!$found) {
                        echo "<p class='text-muted'>no activity found!</p>";
                    }
                    ?>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
    <?php
    include("footer.php");
    include("script.php")
    ?>
</body>

</html>