<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Pages</title>
    <?php
    include("link.php");
    include("../config.php");
    include("global-function.php");
    include_once("form-submit.php");
    ?>
</head>

<body>
    <?php
    include("header.php");
    include("sidebar.php");
    ?>
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Pages</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="./">Dashboard</a></li>
                    <li class="breadcrumb-item">Pages</li>
                </ol>
            </nav>
        </div>
        <!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card p-1">
                                <div class="card-body">
                                    <h5 class="card-title">Pages</h5>

                                    <!-- Table with stripped rows -->
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Name</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th scope="row">1</th>
                                                <td>Home Page</td>
                                                <td>
                                                    <a href="home-page.php" class="font-size-15 badge bg-primary">view</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="row">2</th>
                                                <td>About Page</td>
                                                <td>
                                                    <a href="about-us-page.php" class="font-size-15 badge bg-primary">view</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="row">3</th>
                                                <td>Rooms Page</td>
                                                <td>
                                                    <a href="our-room-page.php" class="font-size-15 badge bg-primary">view</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="row">4</th>
                                                <td>Gallery Page</td>
                                                <td>
                                                    <a href="gallery-page.php" class="font-size-15 badge bg-primary">view</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="row">5</th>
                                                <td>Activities</td>
                                                <td>
                                                    <a href="activity-page.php" class="font-size-15 badge bg-primary">view</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="row">6</th>
                                                <td>Contact Us</td>
                                                <td>
                                                    <a href="contact-page.php" class="font-size-15 badge bg-primary">view</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="row">7</th>
                                                <td>Blog</td>
                                                <td>
                                                    <a href="blog-page.php" class="font-size-15 badge bg-primary">view</a>
                                                </td>
                                            </tr>
                                            <!-- <tr>
                                                <th scope="row">6</th>
                                                <td>Blogs</td>
                                                <td>
                                                    <a href="charts-echarts.html" class="font-size-25"><i class="bx bx-edit"></i></a>
                                                </td>
                                            </tr> -->
                                        </tbody>
                                    </table>
                                    <!-- End Table with stripped rows -->
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

</body>

</html>