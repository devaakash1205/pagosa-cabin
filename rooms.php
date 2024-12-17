<!DOCTYPE html>
<html lang="zxx">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
    include("link.php");
    ?>
    <title>Pagosa Cabin | Room</title>
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
    <?php
    include("header.php");
    ?>
    <div class="inner-banner inner-bg9">
        <div class="container">
            <div class="inner-title">
                <ul>
                    <li>
                        <a href="./">Home</a>
                    </li>
                    <li><i class="bx bx-chevron-right"></i></li>
                    <li>Rooms</li>
                </ul>
                <h3>Rooms</h3>
            </div>
        </div>
    </div>

    <div class="room-area pt-100 pb-70">
        <div class="container">
            <div class="section-title text-center">
                <span class="sp-color">ROOMS</span>
                <h2>Our Rooms</h2>
            </div>
            <div class="row pt-45 g-4">
                <!-- Room Card -->
                <?php
                $roomData = getRooms();
                $counter = 0;
                if ($roomData == null) {
                    echo "No rooms available.";
                } else {
                    foreach ($roomData as $room) {
                        if ($counter % 3 == 0 && $counter != 0) {
                            echo '</div><div class="row pt-4 g-4">';
                        }
                ?>
                        <div class="col-lg-4 col-sm-6 col-md-6 col-12">
                            <div class="card h-100 shadow border-0">
                                <div class="image-hover-container">
                                    <a href="room-details.php" class="d-block">
                                        <img src="admin/dashboard/<?php echo $room['image_url']; ?>" class="card-img-top" alt="Images">
                                    </a>
                                </div>
                                <div class="card-body text-center">
                                    <h5 class="card-title">
                                        <a href="room-details.php" class="text-dark text-decoration-none"><?php echo $room['title']; ?></a>
                                    </h5>
                                </div>
                            </div>
                        </div>
                <?php
                        $counter++;
                    }
                }
                ?>
            </div>

            <div class="col-lg-12 col-md-12">
                <div class="pagination-area">
                    <a href="room.html#" class="prev page-numbers">
                        <i class="bx bx-chevrons-left"></i>
                    </a>
                    <span class="page-numbers current" aria-current="page" style="background-color:#549154 ;">1</span>
                    <a href="room.html#" class="page-numbers">2</a>
                    <a href="room.html#" class="page-numbers">3</a>
                    <a href="room.html#" class="next page-numbers">
                        <i class="bx bx-chevrons-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
    </div>
    <?php
    include("footer.php");
    include("script.php");
    ?>

</body>

</html>