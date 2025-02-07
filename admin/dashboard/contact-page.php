<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Dashboard | Contact Page</title>
    <?php
    include("link.php");
    include("../config.php");
    include("global-function.php");
    include("modal.php");
    require_once('controller/ContactUsPageController.php');
    //contact details
    $contactData = new Contact($conn);
    $contactDetails = $contactData->getContact();
    ?>
</head>
<body>
    <?php
    include("header.php");
    include("sidebar.php");
    ?>
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Contact Page</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="./">Dashboard</a></li>
                    <li class="breadcrumb-item active">Contact Page</li>
                </ol>
            </nav>
        </div>
        <!-- End Page Title -->
        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card p-1">
                        <!-- Tabs Navigation -->
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="home-tab" data-bs-toggle="tab"
                                    data-bs-target="#home" type="button" role="tab" aria-controls="home"
                                    aria-selected="true">Contact Us</button>
                            </li>
                        </ul>

                        <!-- Tabs Content -->
                        <div class="tab-content pt-2" id="myTabContent">
                            <!-- Rooms Tab -->
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <div class="card-body d-flex justify-content-between align-items-center">
                                    <h5 class="card-title mb-0">Contact Us Details</h5>
                                </div>
                                <div class="card-body"></div>
                                <form action="" method="post" enctype="multipart/form-data">
                                    <div class="container">
                                        <div class="row g-3">
                                            <div class="col-lg-4">
                                                <label for="room_name" class="form-label">Office Address</label>
                                                <input type="text" placeholder="Enter the Address" id="room_name"
                                                    class="form-control" name="address" value="<?php echo $contactDetails && $contactDetails['address'] ? $contactDetails['address'] : "" ?>">
                                            </div>
                                            <div class="col-lg-4">
                                                <label for="room_name" class="form-label">Email</label>
                                                <input type="text" placeholder="Enter the Email" id="room_name"
                                                    class="form-control" name="email" value="<?php echo $contactDetails && $contactDetails['address'] ? $contactDetails['email'] : "" ?>">
                                            </div>
                                            <div class="col-lg-4">
                                                <label for="price" class="form-label">Contact Number</label>
                                                <input type="number" placeholder="Enter the Contact Number" id="price"
                                                    class="form-control" name="phone" value="<?php echo $contactDetails && $contactDetails['address'] ? $contactDetails['phone'] : "" ?>">
                                            </div>
                                            <div class="col-lg-12">
                                                <label for="sectionDescription" class="form-label">Description</label>
                                                <textarea id="editorContent" name="description" class="form-control">
                                                <?php echo $contactDetails ? trim(strip_tags(htmlspecialchars_decode($contactDetails['description']))) : '' ?>
                                                </textarea>
                                            </div>
                                            <div class="col-lg-12">
                                                <button type="submit" class="btn btn-primary mt-3" name="submit_contact"> Update Contact Details</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
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
        var quill = new Quill('#quillEditor', {
            theme: 'snow' // or 'bubble'
        });

        // Get content from textarea and set it in Quill
        var description = document.getElementById("editorContent").value.trim();
        quill.root.innerHTML = description;

        // Sync back to textarea when form submits
        document.querySelector("form").onsubmit = function() {
            document.getElementById("editorContent").value = quill.root.innerHTML.trim();
        };
    </script>

</body>


</html>