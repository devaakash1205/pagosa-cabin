<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Dashboard | Gallery</title>
    <?php
    include("link.php");
    include("../config.php");
    include("global-function.php");
    include("modal.php");
    if (isset($_POST['action']) && $_POST['action'] == 'delete_message') {
        $galleryId = $_POST['id'];
        echo deleteGalleryImage($conn, $galleryId);
    }
    ?>
</head>

<body>
    <?php
    include("header.php");
    include("sidebar.php");
    ?>
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Gallery</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="./">Dashboard</a></li>
                    <li class="breadcrumb-item">Pages</li>
                    <li class="breadcrumb-item active">Gallery</li>
                </ol>
            </nav>
        </div>
        <!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body d-flex justify-content-between align-items-center">
                                    <h5 class="card-title">Gallery</h5>
                                    <a href="" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#addGalleryImageModal">
                                        <i class="bi bi-upload"></i> Upload New Image
                                    </a>
                                </div>
                                <div class="card-body">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Image</th>
                                                <th scope="col">Title</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $count = 1;
                                            $data = getGalleryImage($conn);
                                            if (!empty($data) && is_array($data)) {
                                                foreach ($data as $key) {
                                            ?>
                                                    <tr>
                                                        <td>
                                                            <?php echo $count++ ?>
                                                        </td>
                                                        <td>
                                                            <img src="<?php echo $key['image_url']; ?>"
                                                                alt="Image<?php echo $key['id']; ?>" width="150" height="auto">
                                                        </td>
                                                        <td>
                                                            <?php echo $key["description"]; ?>
                                                        </td>
                                                        <td>
                                                            <a href="javascript:void(0);" class="text-danger" onclick="deleteContactMessage(<?php echo $key['id']; ?>)">
                                                                <i class="ri-delete-bin-5-fill"></i> Delete
                                                            </a>
                                                        </td>
                                                    </tr>
                                            <?php
                                                }
                                            } else {
                                                echo "No record found!";
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main>
    <!-- End #main -->
    <?php include("footer.php") ?>

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <?php include("script.php") ?>
    <script>
        // AJAX function to delete message
        function deleteContactMessage(id) {
            if (confirm('Are you sure you want to delete this Image?')) {
                $.ajax({
                    url: 'gallery-page.php',
                    method: 'POST',
                    data: {
                        action: 'delete_message',
                        id: id
                    },
                    success: function(response) {
                        var data = JSON.parse(response);
                        if (data.success) {
                            alert('Image deleted successfully');
                            location.reload();
                        } else {
                            alert('Error deleting Image');
                        }
                    }
                });
            }
        }
    </script>
</body>

</html>