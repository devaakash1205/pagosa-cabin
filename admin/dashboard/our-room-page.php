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
    ?>
</head>

<body>
    <?php
    include("header.php");
    include("sidebar.php");
    ?>
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Our Rooms Page</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="./">Dashboard</a></li>
                    <li class="breadcrumb-item">Pages</li>
                    <li class="breadcrumb-item active">Our Rooms</li>
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
                                        <label for="villa" class="form-label">Title of Room</label>
                                        <input type="text" placeholder="Enter room title" class="form-control" name="title" id="villa">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-2">
                                        <label for="villa" class="form-label">Image</label>
                                        <!-- Allow multiple image selection -->
                                        <input type="file" class="form-control" name="image_url" id="villa" multiple>
                                    </div>
                                </div>
                            </div>
                            <input type="submit" value="Add Room" name="add_room" class="btn btn-primary btn-sm">
                        </form>
                    </div>

                    <div class="card">
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <h5 class="card-title">Our Rooms Details</h5>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Title</th>
                                        <th scope="col">Image</th>
                                        <th scope="col">Date</th>
                                        <th scope="col" colspan="3">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $roomsPerPage = 4;
                                    $rooms = getRooms();
                                    $totalRooms = count($rooms);
                                    $totalPages = ceil($totalRooms / $roomsPerPage);
                                    $currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1;
                                    $currentPage = max(1, min($totalPages, $currentPage));
                                    $offset = ($currentPage - 1) * $roomsPerPage;
                                    $roomsForCurrentPage = array_slice($rooms, $offset, $roomsPerPage);
                                    ?>
                                        <tbody>
                                            <?php
                                            if (!empty($roomsForCurrentPage)) {
                                                $count = $offset + 1;
                                                foreach ($roomsForCurrentPage as $room) {
                                            ?>
                                                    <tr>
                                                        <th scope="row"><?php echo $count++; ?></th>
                                                        <td><?php echo htmlspecialchars($room['title']); ?></td>
                                                        <td>
                                                            <img src="<?php echo $room['image_url']; ?>" alt="Room Image" style="width: 100px;">
                                                        </td>
                                                        <td><?php echo $room['created_at']; ?></td>
                                                        <td>
                                                            <div class="dropdown">
                                                                <button class="btn btn-secondary btn-sm" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                                                    <i class="fas fa-ellipsis-v"></i>
                                                                </button>
                                                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                                    <li><a class="dropdown-item" href="room-detail-page.php?id=<?php echo $room['id']; ?>"><i class="fas fa-eye"></i>&nbsp; View</a></li>
                                                                    <li><a class="dropdown-item" href="edit-room-page.php?id=<?php echo $room['id']; ?>"><i class="fas fa-edit"></i>&nbsp; Edit</a></li>
                                                                    <li><a class="dropdown-item" href="delete-room-page.php?id=<?php echo $room['id']; ?>"><i class="fas fa-trash"></i>&nbsp; Delete</a></li>
                                                                </ul>
                                                            </div>
                                                        </td>
                                                    </tr>
                                            <?php
                                                }
                                            } else {
                                                echo "<tr><td colspan='5' class='text-center'>No rooms found!</td></tr>";
                                            }
                                            ?>
                                        </tbody>
                                    </table>

                                    <div class="pagination">
                                        <?php if ($currentPage > 1): ?>
                                            <a href="?page=<?php echo $currentPage - 1; ?>" class="btn btn-success">Previous</a>
                                        <?php endif; ?>

                                        <?php for ($page = 1; $page <= $totalPages; $page++): ?>
                                            <a href="?page=<?php echo $page; ?>" class="btn btn-success <?php echo ($page == $currentPage) ? 'active' : ''; ?>">
                                                <?php echo $page; ?>
                                            </a>
                                        <?php endfor; ?>

                                        <?php if ($currentPage < $totalPages): ?>
                                            <a href="?page=<?php echo $currentPage + 1; ?>" class="btn btn-success">Next</a>
                                        <?php endif; ?>
                                    </div>
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