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
    include("modal.php");
    require_once('controller/AboutPageController.php');
    $aboutData =  new About($conn);
    $aboutDetails = $aboutData->getAboutUsDetails();
    //delete about banner
    if (isset($_POST['action']) && $_POST['action'] == 'delete_about_banner') {
        $aboutbannerId = $_POST['id'];
        echo deleteAboutBanner($conn, $aboutbannerId);
    }
    ?>
</head>
<style>
    .quillEditor {
        padding: 0 !important;
        margin: 0 !important;
    }
</style>

<body>
    <?php
    include("header.php");
    include("sidebar.php");
    ?>
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>About Us Page</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="./">Dashboard</a></li>
                    <li class="breadcrumb-item">Pages</li>
                    <li class="breadcrumb-item active">About Us</li>
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
                                    <h5 class="card-title">About Page Banner</h5>
                                    <a href="" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#addAboutBannerModal">
                                        <i class="bi bi-upload"></i> Add New Banner
                                    </a>
                                </div>
                                <div class="card-body">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th scope="col">Image</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $aboutpage_banner = $aboutData->getBannerImage($conn); 
                                            if (empty($aboutpage_banner)) {
                                                echo "<tr><td>Banner Not Found</td></tr>";
                                            } else {
                                                foreach ($aboutpage_banner as $res_banner) {
                                            ?>
                                                    <tr>
                                                        <td>
                                                            <img src="<?php echo $res_banner['dest']; ?>" width="150" height="auto">
                                                        </td>
                                                        <td>
                                                            <a href="javascript:void(0);" class="text-danger" onclick="deleteActivity(<?php echo $res_banner['id']; ?>)">
                                                                <i class="ri-delete-bin-5-fill"></i> Delete
                                                            </a>
                                                        </td>
                                                    </tr>
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
                </div>
            </div>
        </section>
        <!--About Us section-->
        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card p-1">
                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">About Page</button>
                                    </li>
                                </ul>
                                <div class="tab-content pt-2" id="myTabContent">
                                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="card-body">
                                                    <form action="" method="post" enctype="multipart/form-data">
                                                        <div class="row g-3">
                                                            <div class="col-lg-6">
                                                                <label for="title" class="form-label">Title <span class="text-danger">*</span></label>
                                                                <input type="text" placeholder="Enter the Room Title" id="title"
                                                                    class="form-control" name="title" required value="<?php echo $aboutDetails ? $aboutDetails['title'] : '' ?>">
                                                            </div>

                                                            <div class="col-lg-6">
                                                                <label for="image_url" class="form-label">Feature Image <input type="file" class="form-control" id="image_url" name="image_url" <?php echo $aboutDetails ? "" : "required" ?>>

                                                                    <img src="<?php echo $aboutDetails ? $aboutDetails['image_url'] : '' ?>" class="img-fluid mt-2" alt="" style="width: 30%;">
                                                            </div>

                                                            <div class="col-md-12">
                                                                <div class="form-group mb-2">
                                                                    <label for="sectionDescription">Description</label>
                                                                    <div class="quill-container">
                                                                        <div class="quillEditor form-control" placeholder="Enter description"></div>
                                                                        <textarea class="editorContent" name="description" style="display:none;">
                                                                            <?php echo $aboutDetails ? trim(strip_tags(htmlspecialchars($aboutDetails['description']))) : '' ?>
                                                                        </textarea>
                                                                    </div>

                                                                    <div class="col-lg-12">
                                                                        <button type="submit" class="btn btn-primary mt-3" name="addAboutDetails">Update About</button>
                                                                    </div>
                                                                </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <?php include("script.php") ?>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            document.querySelectorAll('.quill-container').forEach(function(container) {
                let quillEditor = container.querySelector('.quillEditor');
                let hiddenTextarea = container.querySelector('.editorContent');

                // Initialize Quill for each editor with color options in toolbar
                let quill = new Quill(quillEditor, {
                    theme: 'snow',
                    modules: {
                        toolbar: [
                            [{
                                'font': []
                            }, {
                                'size': []
                            }],
                            [{
                                'header': '1'
                            }, {
                                'header': '2'
                            }, {
                                'font': []
                            }],
                            [{
                                'align': []
                            }],
                            ['bold', 'italic', 'underline'],
                            [{
                                'list': 'ordered'
                            }, {
                                'list': 'bullet'
                            }],
                            [{
                                'color': []
                            }, {
                                'background': []
                            }], // Adding color options
                            ['link'],
                            ['blockquote', 'code-block']
                        ]
                    }
                });

                // Set pre-filled content
                quill.root.innerHTML = hiddenTextarea.value;

                // Sync Quill content before form submission
                container.closest("form").addEventListener("submit", function() {
                    hiddenTextarea.value = quill.root.innerHTML;
                });
            });
        });
    </script>
    <script>
        // AJAX function to delete message
        function deleteActivity(id) {
            if (confirm('Are you sure you want to delete this about banner?')) {
                $.ajax({
                    url: 'about-us-page.php',
                    method: 'POST',
                    data: {
                        action: 'delete_about_banner',
                        id: id
                    },
                    success: function(response) {
                        var data = JSON.parse(response);
                        if (data.success) {
                            alert('banner deleted successfully');
                            location.reload();
                        } else {
                            alert('Error deleting banner');
                        }
                    }
                });
            }
        }
    </script>
</body>

</html>