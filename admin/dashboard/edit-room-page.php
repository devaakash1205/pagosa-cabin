<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Dashboard</title>
    <?php
    include("link.php");
    include("../config.php");
    include("global-function.php");
    include("form-submit.php");
    ?>
</head>

<body>
    <?php
    include("header.php");
    include("sidebar.php");
    ?>
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Our Rooms Page</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="./">Dashboard</a></li>
                    <li class="breadcrumb-item">Pages</li>
                    <li class="breadcrumb-item active">Our Rooms</li>
                </ol>
            </nav>
        </div>
        <!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card p-4">
                        <form action="" method="post" enctype="multipart/form-data">
                            <!-- Title Input -->
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-2">
                                        <label for="villa" class="form-label">Title of Room</label>
                                        <input type="text" placeholder="Enter room title" class="form-control" name="title" id="villa" value="<?php echo $roomData['title']; ?>">
                                    </div>
                                </div>

                                <!-- Image Upload -->
                                <div class="col-lg-6">
                                    <div class="mb-2">
                                        <label for="villa" class="form-label">Image</label>
                                        <input type="file" class="form-control" id="image_url" name="image_url">
                                        <?php if (isset($roomData['image_url']) && $roomData['image_url']): ?>
                                            <img src="<?php echo $roomData['image_url']; ?>" alt="Image" style="width:120px; height:120px; margin-top: 10px;">
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>

                            <input type="hidden" name="room_id" value="<?php echo $roomId; ?>">

                            <button type="submit" name="update" class="btn btn-warning">
                                <i class="fas fa-edit"></i> Edit Room
                            </button>
                        </form>
                    </div>
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