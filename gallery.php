<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include("link.php"); ?>
    <title>Pagosa Cabin | Gallery</title>
</head>

<body>
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

    <?php include("header.php"); ?>

    <div class="inner-banner inner-bg3">
        <div class="container">
            <div class="inner-title">
                <ul>
                    <li>
                        <a href="./">Home</a>
                    </li>
                    <li><i class="bx bx-chevron-right"></i></li>
                    <li>Gallery</li>
                </ul>
                <h3>Gallery</h3>
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
            <?php
            $galleryImage = getGalleryImage($conn);
            $counter = 0; // Initialize a counter for images

            foreach ($galleryImage as $Image) {
                // Start a new row for every 3 images
                if ($counter % 3 == 0 && $counter != 0) {
                    echo '</div><div class="row p-4">';
                }
            ?>
                <div class="col-lg-4 col-sm-6 col-md-6 mb-4">
                    <div class="gallery-item position-relative">
                        <!-- Image with Hover Effect -->
                        <a href="admin/dashboard/<?php echo $Image['image_url']; ?>" data-lightbox="gallery" data-title="<?php echo $Image['description']; ?>">
                            <img src="admin/dashboard/<?php echo $Image['image_url']; ?>" alt="<?php echo $Image['description']; ?>" class="img-fluid rounded"
                                style="height: 300px; object-fit: cover;">
                            <div class="zoom-icon">
                                <i class="fas fa-search-plus"></i>
                            </div>
                        </a>
                        <h5 class="text-center mt-3 p-3"><?php echo $Image['description']; ?></h5>
                    </div>
                </div>
            <?php
                $counter++;
            }
            ?>
        </div>
    </div>

    <?php
    include("footer.php");
    include("script.php");
    ?>
</body>

</html>
