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

                <!-- Revenue Card -->
                <?php
                $sql_page = mysqli_query($conn, "SELECT * FROM pages");
                if (mysqli_num_rows($sql_page) > 0) {
                    while ($result_page = mysqli_fetch_assoc($sql_page)) {
                ?>
                        <div class="col-lg-4 col-md-6">
                            <a href="<?php echo $result_page['url'] ?>">
                                <div class="card info-card revenue-card">
                                    <div class="card-body">
                                        <h5 class="card-title text-center"><?php echo $result_page['name'] ?></h5>
                                    </div>
                                </div>
                            </a>
                        </div>

                <?php
                    }
                }
                ?>
                <div class="col-lg-4 col-md-6">
                    <a href="booking-request.php">
                        <div class="card info-card revenue-card">
                            <div class="card-body">
                                <h5 class="card-title text-center">Hotel Booking Request</h5>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6">
                    <a href="contact-message.php">
                        <div class="card info-card revenue-card">
                            <div class="card-body">
                                <h5 class="card-title text-center">Contact Message</h5>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6">
                    <a href="profile.php">
                        <div class="card info-card revenue-card">
                            <div class="card-body">
                                <h5 class="card-title text-center">Profile</h5>
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