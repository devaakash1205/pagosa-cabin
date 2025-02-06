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
    include("controller/HomePageController.php");
    $homeData = new Home($conn);
    $homepage_details = $homeData->getHomePageDetails($conn);
    ?>
</head>

<body>
    <?php
    include("header.php");
    include("sidebar.php");
    ?>
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Home Page</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="./">Dashboard</a></li>
                    <li class="breadcrumb-item">Pages</li>
                    <li class="breadcrumb-item active">Home</li>
                </ol>
            </nav>
        </div>
        <!-- End Page Title -->
        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-body d-flex justify-content-between align-items-center">
                                    <h5 class="card-title">Home Page Banner</h5>
                                    <a href="" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#addBannerModal">
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
                                            $homepage_banner = $homeData->getBannerImage($conn);
                                            if (empty($homepage_banner)) {
                                                echo "<tr><td>Banner Not Found</td></tr>";
                                            } else {
                                                foreach ($homepage_banner as $res_banner) {
                                            ?>
                                                    <tr>
                                                        <td>
                                                            <img src="<?php echo $res_banner['dest']; ?>" width="150" height="auto">
                                                        </td>
                                                        <td>
                                                            <a href="javascript:void(0);" onclick="deleteBanner(<?php echo $res_banner['id']; ?>)">
                                                                <i class="fas fa-trash text-danger"></i>
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
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-body d-flex justify-content-between align-items-center">
                                    <h5 class="card-title">Logo</h5>
                                    <a href="" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#addLogoModal">
                                        <i class="bi bi-upload"></i> Upload Logo
                                    </a>
                                </div>
                                <div class="mt-1 mb-1 p-3">
                                    <?php
                                    $homepage_logo = $homeData->getLogo();

                                    if (!empty($homepage_logo)) {
                                    ?>
                                        <center>
                                            <img src="<?php echo $homepage_logo['dest']; ?>" alt="Logo <?php echo $homepage_logo['id']; ?>" width="150" height="auto">
                                        </center>
                                    <?php
                                    } else {
                                        echo "<center><p>No logo found</p></center>";
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Form to update or add homepage details -->
                    <div class="card p-4">
                        <form action="" method="post">
                            <!-- Banner Text -->
                            <div class="row mb-2">
                                <label for="banner_text" class="col-sm-2 col-form-label">Banner Text</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="banner_text" id="bannerText" value="<?php echo $homepage_details ? $homepage_details['banner_text'] : ''; ?>" placeholder="Enter Banner Text">
                                </div>
                            </div>

                            <!-- Banner Button -->
                            <div class="row mb-2">
                                <label class="col-sm-2 col-form-label">Banner Button</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" placeholder="Enter name" name="btn_name"
                                        value="<?php echo $homepage_details ? $homepage_details['btn_name'] : ''; ?>">
                                </div>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" placeholder="Enter URL" name="btn_url"
                                        value="<?php echo $homepage_details ? $homepage_details['btn_url'] : ''; ?>">
                                </div>
                                <div class="col-sm-2">
                                    <input type="checkbox" name="enable_btn" id="enable_btn"
                                        <?php echo $homepage_details && $homepage_details['enable_btn'] ? 'checked' : ''; ?>> Enable
                                </div>
                            </div>

                            <!-- Submit Button -->
                            <input type="submit" value="Submit" name="add_hompage_details" class="btn btn-primary btn-sm">
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
    <script>
            function deleteBanner(bannerId) {
                if (confirm("Are you sure you want to delete this banner?")) {
                    $.ajax({
                        url: "delete/delete_banner.php",
                        type: "POST",
                        data: {
                            deleteBanner: bannerId
                        },
                        dataType: "json",
                        success: function(response) {
                            alert(response.message);
                            if (response.status === "success") {
                                location.reload(); // Reload page after deletion
                            }
                        },
                        error: function() {
                            alert("An error occurred while deleting the banner.");
                        }
                    });
                }
            }
    </script>

</body>

</html>