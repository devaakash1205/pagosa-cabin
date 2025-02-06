<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Dashboard</title>
    <?php
    include("link.php");
    include("../config.php");
    include("upload-files.php");
    include("global-function.php");
    ?>
</head>

<body>
    <?php
    include("header.php");
    include("sidebar.php");
    ?>
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Dashboard</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </nav>
        </div>
        <!-- End Page Title -->

        <section class="section dashboard">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <a href="booking-request.php">
                        <div class="card info-card revenue-card">
                            <div class="card-body text-center p-0">
                                <img src="image/booking.png" class="img-fluid mt-3" width="50" alt="">
                                <h5 class="card-title text-center">View Bookings</h5>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-md-6">
                    <a href="contact-message.php">
                        <div class="card info-card revenue-card">
                            <div class="card-body text-center p-0 ">
                                <img src="image/messages.png" class="img-fluid mt-3" width="50" alt="">
                                <h5 class="card-title text-center">Contact Messages</h5>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-md-6">
                    <a href="our-room-page.php">
                        <div class="card info-card revenue-card">
                            <div class="card-body text-center p-0 ">
                                <img src="image/room.png" class="img-fluid mt-3" width="50" alt="">
                                <h5 class="card-title text-center">My Rooms</h5>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-md-6">
                    <a href="pages.php">
                        <div class="card info-card revenue-card">
                            <div class="card-body text-center p-0 ">
                                <img src="image/page.png" class="img-fluid mt-3" width="50" alt="">
                                <h5 class="card-title text-center">All Pages</h5>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </section>

    </main>
    <!-- End #main -->
    <?php include("footer.php") ?>

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <?php include("script.php") ?>

</body>

</html>