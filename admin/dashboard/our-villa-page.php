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
    $aboutpage_details = getAboutPageDetails($conn);
    ?>
</head>

<body>
    <?php
    include("header.php");
    include("sidebar.php");
    ?>
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Our Villa Page</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="./">Dashboard</a></li>
                    <li class="breadcrumb-item">Pages</li>
                    <li class="breadcrumb-item active">Our Villa</li>
                </ol>
            </nav>
        </div>
        <!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <!-- Form to update or add homepage details -->
                    <div class="card p-4">
                        <form action="" method="post" enctype="multipart/form-data" onsubmit="syncCKEditorContent('#editor')">
                            <!-- Banner Image Upload -->
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-2">
                                        <label for="villa" class="form-label">Name Of Villa</label>
                                        <input type="text" placeholder="Enter name of villa" class="form-control" name="name" id="villa">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-2">
                                        <label for="villa" class="form-label">Images</label>
                                        <!-- Allow multiple image selection -->
                                        <input type="file" class="form-control" name="image_url[]" id="villa" multiple>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="row mb-2">
                                        <div class="col-sm-12">
                                            <label for="villa" class="form-label">Description</label>
                                            <textarea name="description" placeholder="Description" id="editor" class="form-control"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <input type="submit" value="Add Villa" name="add_villa" class="btn btn-primary btn-sm">
                        </form>
                    </div>

                    <div class="card">
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <h5 class="card-title">Our Villa Details</h5>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Images</th>
                                        <th scope="col">Description</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $data = getVillas();
                                    $count = 1;
                                    if (!empty($data) && is_array($data)) {
                                        foreach ($data as $key) {
                                            // Decode the JSON string into an array
                                            $image_urls = json_decode($key['image_url'], true); // Convert JSON to array
                                    ?>
                                            <tr>
                                                <td><?php echo $count++ ?></td>
                                                <td><?php echo $key["name"]; ?></td>
                                                <td>
                                                    <!-- Display the first image -->
                                                    <div>
                                                        <img src="<?php echo $image_urls[0]; ?>" alt="Villa<?php echo $key['id']; ?>" width="150" height="auto" data-bs-toggle="modal" data-bs-target="#imageModal<?php echo $key['id']; ?>">
                                                        <span>(<?php echo count($image_urls); ?>) Images</span> <!-- Show the count of images -->
                                                    </div>
                                                </td>
                                                <td><?php echo $key["description"]; ?></td>
                                                <td><?php echo date('Y-m-d', strtotime($key['created_at'])); ?></td>
                                                <td>Not Active</td>
                                            </tr>
                                            <div class="modal fade" id="imageModal<?php echo $key['id']; ?>" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="imageModalLabel">Images of <?php echo $key["name"]; ?></h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <?php foreach ($image_urls as $image) { ?>
                                                                <img src="<?php echo $image; ?>" alt="Villa Image" class="img-fluid mb-3" width="150" height="auto">
                                                            <?php } ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                    <?php
                                        }
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>

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