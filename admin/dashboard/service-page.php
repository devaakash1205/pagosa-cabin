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
    include("modal.php");
    ?>
</head>

<body>
    <?php
    include("header.php");
    include("sidebar.php");
    ?>
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Services</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">Dashboard</li>
                    <li class="breadcrumb-item active">Services</li>
                </ol>
            </nav>
        </div>
        <!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <h5 class="card-title">Add Service</h5>
                        </div>
                        <div class="card-body">
                            <form id="serviceForm" enctype="multipart/form-data" method="post" onsubmit="syncCKEditorContent('#editor')">
                                <div class="row">
                                    <!-- Service Name -->
                                    <div class="col-lg-4 mb-1">
                                        <label for="serviceName" class="form-label">Service Name</label>
                                        <input type="text" required class="form-control" name="service_name" id="serviceName"
                                            placeholder="Enter Service Name">
                                    </div>

                                    <!-- Image -->
                                    <div class="col-lg-4 mb-1">
                                        <label for="imageUrl" class="form-label">Service Image</label>
                                        <input type="file" class="form-control" name="image_url" id="imageUrl">
                                    </div>

                                    <!-- Status -->
                                    <div class="col-lg-4 mb-1">
                                        <label for="status" class="form-label">Status</label>
                                        <select class="form-select" name="status" id="status">
                                            <option value="" selected>Select Status</option>
                                            <option value="1">Active</option>
                                            <option value="0">Inactive</option>
                                        </select>
                                    </div>

                                    <!-- Description -->
                                    <div class="mb-1">
                                        <label for="description" class="form-label">Description</label>
                                        <textarea name="description" id="editor" class="form-control"></textarea>
                                    </div>

                                    <!-- Submit Button -->
                                    <div class="col-lg=4">
                                        <input type="submit" value="Add Service" name="add_service" class="btn btn-primary">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <h5 class="card-title">Services</h5>
                        </div>
                        <div class="card-body">
                            <?php
                            $sql_service = mysqli_query($conn, "SELECT * FROM services");

                            if (mysqli_num_rows($sql_service) == 0) {
                                echo "No Services Found";
                            } else {
                            ?>
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Service Name</th>
                                            <th scope="col">Description</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Date</th>
                                            <th scope="col">Image</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $count = 1;
                                        while ($res_service = mysqli_fetch_array($sql_service)) {
                                        ?>
                                            <tr>
                                                <!-- Serial Number -->
                                                <td><?php echo $count++; ?></td>

                                                <!-- Service Name -->
                                                <td><?php echo $res_service['service_name']; ?></td>

                                                <!-- Description -->
                                                <td><?php echo $res_service['description']; ?></td>

                                                <!-- Status -->
                                                <td>
                                                    <?php echo $res_service['status'] == 1 ? 'Active' : 'Inactive'; ?>
                                                </td>

                                                <!-- Date -->
                                                <td>
                                                    <?php echo date("d-m-Y", strtotime($res_service['created_at'])); ?>
                                                </td>

                                                <!-- Image -->
                                                <td>
                                                    <img src="<?php echo htmlspecialchars($res_service['image_url']); ?>" alt="Service" style="width: 100px; height: 100px; object-fit: cover;">
                                                </td>

                                                <!-- Action -->
                                                <td>
                                                    <!-- <a href="edit_service.php?id=<?php echo $res_service['id']; ?>"><i class="ri-edit-2-fill"></i></a>
                                                    <a href="delete_service.php?id=<?php echo $res_service['id']; ?>" class="text-danger" onclick="return confirm('Are you sure you want to delete this service?');"><i class="ri-delete-bin-5-fill"></i></a> -->
                                                </td>
                                            </tr>
                                        <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            <?php
                            }
                            ?>
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