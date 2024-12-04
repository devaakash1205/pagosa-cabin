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
    include("form-submit.php");
    $contactUsData = getContactUsData();
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

        <section class="section dashboard">
            <div class="card p-3">
                <h5>Social Media Links</h5>
                <hr>
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-12">
                            <form action="" method="post">
                                <!-- Address -->
                                <div class="row mb-2">
                                    <label for="office_address" class="col-sm-2 col-form-label">Address <span class="text-danger">*</span></label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" placeholder="Enter Address" name="office_address" required
                                            value="<?php echo isset($contactUsData) && $contactUsData['office_address'] != null ? $contactUsData['office_address'] : ''; ?>">
                                    </div>
                                </div>

                                <!-- Contact Numbers -->
                                <div class="row mb-2">
                                    <label for="contact_number1" class="col-sm-2 col-form-label">Contact Number <span class="text-danger">*</span></label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" placeholder="Enter Contact Number" name="contact_number1" required
                                            value="<?php echo isset($contactUsData) && $contactUsData['contact_number1'] != null ? $contactUsData['contact_number1'] : ''; ?>">
                                    </div>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" placeholder="Enter Alternate Number" name="contact_number2"
                                            value="<?php echo isset($contactUsData) && $contactUsData['contact_number2'] != null ? $contactUsData['contact_number2'] : ''; ?>">
                                    </div>
                                </div>

                                <!-- Email -->
                                <div class="row mb-2">
                                    <label for="email" class="col-sm-2 col-form-label">Email <span class="text-danger">*</span></label>
                                    <div class="col-sm-10">
                                        <input type="email" class="form-control" placeholder="Enter Email" name="email"
                                            value="<?php echo isset($contactUsData) && $contactUsData['email'] != null ? $contactUsData['email'] : ''; ?>">
                                    </div>
                                </div>

                                <!-- Social Media Links -->
                                <div class="row mb-2">
                                    <label class="col-sm-2 col-form-label">Twitter</label>
                                    <div class="col-sm-8">
                                        <input type="url" class="form-control" placeholder="Enter Twitter Link" name="twitter_link"
                                            value="<?php echo isset($contactUsData) && $contactUsData['twitter_link'] != null ? $contactUsData['twitter_link'] : ''; ?>">
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="checkbox" name="enable_twitter" id="enable_twitter"
                                            <?php echo isset($contactUsData) && $contactUsData['enable_twitter'] == 1 ? 'checked' : ''; ?>> Enable
                                    </div>
                                </div>

                                <div class="row mb-2">
                                    <label class="col-sm-2 col-form-label">Facebook</label>
                                    <div class="col-sm-8">
                                        <input type="url" class="form-control" placeholder="Enter Facebook Link" name="facebook_link"
                                            value="<?php echo isset($contactUsData) && $contactUsData['facebook_link'] != null ? $contactUsData['facebook_link'] : ''; ?>">
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="checkbox" name="enable_facebook" id="enable_facebook"
                                            <?php echo isset($contactUsData) && $contactUsData['enable_facebook'] == 1 ? 'checked' : ''; ?>> Enable
                                    </div>
                                </div>

                                <div class="row mb-2">
                                    <label class="col-sm-2 col-form-label">Instagram</label>
                                    <div class="col-sm-8">
                                        <input type="url" class="form-control" placeholder="Enter Instagram Link" name="instagram_link"
                                            value="<?php echo isset($contactUsData) && $contactUsData['instagram_link'] != null ? $contactUsData['instagram_link'] : ''; ?>">
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="checkbox" name="enable_instagram" id="enable_instagram"
                                            <?php echo isset($contactUsData) && $contactUsData['enable_instagram'] == 1 ? 'checked' : ''; ?>> Enable
                                    </div>
                                </div>

                                <div class="row mb-2">
                                    <label class="col-sm-2 col-form-label">YouTube</label>
                                    <div class="col-sm-8">
                                        <input type="url" class="form-control" placeholder="Enter YouTube Link" name="youtube_link"
                                            value="<?php echo isset($contactUsData) && $contactUsData['youtube_link'] != null ? $contactUsData['youtube_link'] : ''; ?>">
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="checkbox" name="enable_youtube" id="enable_youtube"
                                            <?php echo isset($contactUsData) && $contactUsData['enable_youtube'] == 1 ? 'checked' : ''; ?>> Enable
                                    </div>
                                </div>

                                <div class="row mb-2">
                                    <label class="col-sm-2 col-form-label">LinkedIn</label>
                                    <div class="col-sm-8">
                                        <input type="url" class="form-control" placeholder="Enter LinkedIn Link" name="linkedin_link"
                                            value="<?php echo isset($contactUsData) && $contactUsData['linkedin_link'] != null ? $contactUsData['linkedin_link'] : ''; ?>">
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="checkbox" name="enable_linkedin" id="enable_linkedin"
                                            <?php echo isset($contactUsData) && $contactUsData['enable_linkedin'] == 1 ? 'checked' : ''; ?>> Enable
                                    </div>
                                </div>

                                <!-- Submit Button -->
                                <input type="submit" value="Update Address" class="btn btn-primary btn-sm" name="update_address">
                            </form>
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

</body>


</html>