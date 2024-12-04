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
                    <!-- Form to update or add homepage details -->
                    <div class="card p-4">
                        <form action="" method="post" enctype="multipart/form-data" onsubmit="syncCKEditorContent('#editor')">
                            <!-- Banner Text -->
                            <div class="row mb-2">
                                <label for="description" class="col-sm-2 col-form-label">Banner Text</label>
                                <div class="col-sm-10">
                                    <textarea name="description" id="editor" class="form-control">
                                        <?php echo $aboutpage_details ? $aboutpage_details['description'] : ''; ?>
                                    </textarea>
                                </div>
                            </div>
                            <!-- Banner Image Upload -->
                            <div class="mb-1">
                                <label for="Banner" class="form-label">Banner Image</label>
                                <input type="file" class="form-control" name="banner" id="banner">
                            </div>
                            <!-- Submit Button -->
                            <input type="submit" value="Submit" name="add_about_us_details" class="btn btn-primary btn-sm">
                        </form>
                    </div>

                    <div class="card">
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <h5 class="card-title">About Us Banner</h5>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Image</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $sql_banner = mysqli_query($conn, "SELECT * FROM about_page_details WHERE dest != '' LIMIT 1");

                                    if (mysqli_num_rows($sql_banner) == 0) {
                                        echo "<tr><td colspan='4'>No banner found</td></tr>";
                                    } else {
                                        $count = 1;
                                        while ($res_banner = mysqli_fetch_array($sql_banner)) {
                                    ?>
                                            <tr>
                                                <th scope="row"><?php echo $count++; ?></th>
                                                <td>
                                                    <img src="<?php echo $res_banner['dest']; ?>" alt="Banner<?php echo $res_banner['id']; ?>" width="150" height="auto">
                                                </td>
                                                <td>
                                                    <?php echo date('Y-m-d', strtotime($res_banner['created_at'])); ?> <!-- Adjust to your date format -->
                                                </td>
                                                <td>
                                                    <a href="javascript:void(0);" class="text-danger" onclick="confirmDeleteAboutBanner(<?php echo $res_banner['id']; ?>)">
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
        </section>

    </main>
    <!-- End #main -->
    <?php include("footer.php") ?>

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <?php include("script.php") ?>

</body>

</html>