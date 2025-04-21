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
    require_once('controller/ActivityPageController.php');
    $activityData = new Activities($conn);
    // categories Details
    $categoryData = $activityData->getAllCategories();
    // activities Details
    $activities = $activityData->getAllActivity();
    //delete activity
    if (isset($_POST['action']) && $_POST['action'] == 'delete_activity') {
        $activityId = $_POST['id'];
        echo deleteActivity($conn, $activityId);
    }
    //delete category
    if (isset($_POST['action']) && $_POST['action'] == 'delete_category') {
        $categoryId = $_POST['id'];
        echo deleteCategory($conn, $categoryId);
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
            <h1>Activities Page</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="./">Dashboard</a></li>
                    <li class="breadcrumb-item">Pages</li>
                    <li class="breadcrumb-item active">Our Activities</li>
                </ol>
            </nav>
        </div>

        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card p-1">
                        <!-- Tabs Navigation -->
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="activity-tab" data-bs-toggle="tab"
                                    data-bs-target="#activity" type="button" role="tab" aria-controls="activity"
                                    aria-selected="true">Activities</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="category-tab" data-bs-toggle="tab"
                                    data-bs-target="#category" type="button" role="tab" aria-controls="category"
                                    aria-selected="false">Category</button>
                            </li>
                        </ul>

                        <!-- Tabs Content -->
                        <div class="tab-content pt-2" id="myTabContent">
                            <!-- Rooms Tab -->
                            <div class="tab-pane fade show active" id="activity" role="tabpanel" aria-labelledby="activity-tab">
                                <div class="card-body d-flex justify-content-between align-items-center">
                                    <h5 class="card-title mb-0">Activities Details</h5>
                                    <a class="addRooms" href="javascript:void(0)" data-bs-toggle="collapse"
                                        data-bs-target="#roomFormCollapse">
                                        <i class="bx bx-plus"></i> Add Activities
                                    </a>
                                </div>
                                <div id="roomFormCollapse" class="collapse">
                                    <div class="container">
                                        <form action="" method="post" enctype="multipart/form-data">
                                            <div class="row g-3">
                                                <div class="col-lg-4">
                                                    <label for="title" class="form-label">Title <span class="text-danger">*</span></label>
                                                    <input type="text" placeholder="Enter the  Title" id="title"
                                                        class="form-control" name="title" required>
                                                </div>
                                                <div class="col-lg-4">
                                                    <label for="image_url" class="form-label">Feature Image <span class="text-danger">*</span></label>
                                                    <input type="file" name="image_url" id="image_url" class="form-control">
                                                </div>
                                                <div class="col-lg-4">
                                                    <label for="category" class="form-label">Category<span class="text-danger">*</span></label>
                                                    <?php
                                                    if (!empty($categoryData) && is_array($categoryData)) {
                                                    ?>
                                                        <select name="category" id="Category" class="form-control"
                                                            required>
                                                            <option value="0" disabled selected>Select Category</option>
                                                            <?php
                                                            foreach ($categoryData as $key => $value) {
                                                            ?>
                                                                <option value="<?php echo $value['id']; ?>">
                                                                    <?php echo $value['name']; ?>
                                                                </option>
                                                            <?php
                                                            }
                                                            ?>
                                                        </select>
                                                    <?php
                                                    }
                                                    ?>
                                                </div>
                                                <div class="col-lg-12 mb-2">
                                                    <label for="sectionDescription">Description <span class="text-danger">*</span></label>
                                                    <div id="quillEditor" class="form-control" placeholder="Enter description" required>
                                                    </div>
                                                    <textarea id="editorContent" name="description" style="display:none;"></textarea>
                                                </div>
                                                <div class="col-lg-12 mt-5">
                                                    <button type="submit" class="btn btn-primary mt-3" name="add_activity">Add
                                                        Activity</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <table class="table table-striped" id="roomsTable">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Title</th>
                                                <th scope="col">Image</th>
                                                <th scope="col">Category</th>
                                                <th scope="col">Description</th>
                                                <th scope="col">Date</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $count = 1;
                                            if (!empty($activities) && is_array($activities)) {
                                                foreach ($activities as $key) {
                                            ?>
                                                    <tr>
                                                        <td>
                                                            <?php echo $count++ ?>
                                                        </td>
                                                        <td>
                                                            <?php echo htmlspecialchars($key["title"]); ?>
                                                        </td>
                                                        <td>
                                                            <img src="<?php echo $key['image_url']; ?>"
                                                                alt="Image<?php echo $key['id']; ?>" width="80" height="auto">
                                                        </td>
                                                        <td>
                                                            <?php
                                                            $categoryId = $key["category"];
                                                            $query = "SELECT name FROM activity_category WHERE id = $categoryId";
                                                            $result = mysqli_query($conn, $query);
                                                            $category = mysqli_fetch_assoc($result);
                                                            echo $category['name'];
                                                            ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $key["description"]; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo htmlspecialchars($key["created_at"]); ?>
                                                        </td>
                                                        <td>
                                                            <div class="dropdown">
                                                                <button class="btn btn-sm btn-secondary" type="button"
                                                                    id="dropdownMenuButton" data-bs-toggle="dropdown"
                                                                    aria-expanded="false">
                                                                    <i class="bx bx-dots-vertical-rounded"></i>
                                                                </button>
                                                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                                        <a href="javascript:void(0);" class="text-danger" onclick="deleteActivity(<?php echo $key['id']; ?>)">
                                                                            <i class="ri-delete-bin-5-fill"></i> Delete
                                                                        </a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </td>
                                                    </tr>
                                            <?php
                                                }
                                            } else {
                                                echo "<tr><td colspan='5'>No record found!</td></tr>";
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- Category Tab -->
                            <div class="tab-pane fade" id="category" role="tabpanel" aria-labelledby="category-tab">
                                <div class="card-body d-flex justify-content-between align-items-center">
                                    <h5 class="card-title mb-0">Category</h5>
                                    <a class="addAmenities" href="javascript:void(0)" data-bs-toggle="collapse"
                                        data-bs-target="#amenitiesFormCollapse">
                                        <i class="bx bx-plus"></i> Add Category
                                    </a>
                                </div>
                                <div id="amenitiesFormCollapse" class="collapse">
                                    <div class="container">
                                        <form method="post" action="">
                                            <div class="row g-3">
                                                <div class="col-lg-6">
                                                    <label for="category_name" class="form-label">Category Name</label>
                                                    <input type="text" placeholder="Enter the Category Name"
                                                        id="category_name" class="form-control" name="name">
                                                </div>
                                                <div class="col-lg-12">
                                                    <button type="submit" class="btn btn-primary mt-3"
                                                        name="submit_category">Add Category</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <table class="table table-striped mt-3">
                                    <thead id="tableHeader">
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="messageTable">
                                        <?php
                                        $activityDetails = $activityData->getAllCategories();
                                        if (count($activityDetails) > 0) {
                                            $count = isset($start) ? 1 + $start : 1;
                                            foreach ($activityDetails as $row) {
                                        ?>
                                                <tr id="message-<?php echo $row['id']; ?>">
                                                    <th scope="row"><?php echo $count++; ?></th>
                                                    <td><?php echo htmlspecialchars($row['name'], ENT_QUOTES, 'UTF-8'); ?></td>
                                                    <td>
                                                        <a href="javascript:void(0);" class="text-danger" onclick="deleteCategory(<?php echo $row['id']; ?>)">
                                                            <i class="ri-delete-bin-5-fill"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                        <?php
                                            }
                                        } else {
                                            echo "<tr><td colspan='3'>No category found</td></tr>";
                                            echo "<script>document.getElementById('tableHeader').style.display = 'none';</script>";
                                        }
                                        ?>
                                    </tbody>
                                </table>
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
        // AJAX function to delete message
        function deleteActivity(id) {
            if (confirm('Are you sure you want to delete this activity?')) {
                $.ajax({
                    url: 'activity-page.php',
                    method: 'POST',
                    data: {
                        action: 'delete_activity',
                        id: id
                    },
                    success: function(response) {
                        var data = JSON.parse(response);
                        if (data.success) {
                            alert('activity deleted successfully');
                            location.reload();
                        } else {
                            alert('Error deleting activity');
                        }
                    }
                });
            }
        }

        function deleteCategory(id) {
            if (confirm('Are you sure you want to delete this category?')) {
                $.ajax({
                    url: 'activity-page.php',
                    method: 'POST',
                    data: {
                        action: 'delete_category',
                        id: id
                    },
                    success: function(response) {
                        var data = JSON.parse(response);
                        if (data.success) {
                            alert('category deleted successfully');
                            location.reload();
                        } else {
                            alert('Error deleting category');
                        }
                    }
                });
            }
        }
    </script>
</body>

</html>