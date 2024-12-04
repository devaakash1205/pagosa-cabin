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
    if (isset($_POST['action']) && $_POST['action'] == 'delete_message') {
        $messageId = $_POST['id'];
        echo deleteContactMessage($conn, $messageId);
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
            <h1>Contact Messages</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="./">Dashboard</a></li>
                    <li class="breadcrumb-item">Messages</li>
                    <li class="breadcrumb-item active">Contact Messages</li>
                </ol>
            </nav>
        </div>
        <!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <h5 class="card-title">Contact Messages</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <!-- Search and filter -->
                                <div class="col-md-6">
                                    <input type="text" id="searchInput" class="form-control" placeholder="Search by name, email, or date" onkeyup="searchTable()">
                                </div>
                            </div>
                            <table class="table table-striped mt-3">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Phone</th>
                                        <th scope="col">Check In-Check Out</th>
                                        <th scope="col">Date</th>
                                    </tr>
                                </thead>
                                <tbody id="messageTable">
                                    <?php
                                    $sql = mysqli_query($conn, "SELECT * FROM booking_request ORDER BY created_at DESC");
                                    if (mysqli_num_rows($sql) > 0) {
                                        $count = isset($start) ? 1 + $start : 1;
                                        while ($row = mysqli_fetch_array($sql)) {
                                    ?>
                                            <tr id="message-<?php echo $row['id']; ?>">
                                                <th scope="row"><?php echo $count++; ?></th>
                                                <td><?php echo htmlspecialchars($row['name'], ENT_QUOTES, 'UTF-8'); ?></td>
                                                <td><?php echo htmlspecialchars($row['email'], ENT_QUOTES, 'UTF-8'); ?></td>
                                                <td><?php echo htmlspecialchars(substr($row['phone'], 0, 50), ENT_QUOTES, 'UTF-8'); ?></td>
                                                <td><?php echo htmlspecialchars($row['checkin'], ENT_QUOTES, 'UTF-8') . " - " . htmlspecialchars($row['checkout'], ENT_QUOTES, 'UTF-8'); ?></td>
                                                <td>
                                                    <?php echo date('Y-m-d', strtotime($row['created_at'])); ?>
                                                    </a>
                                                </td>
                                            </tr>
                                    <?php
                                        }
                                    } else {
                                        echo "<tr><td colspan='6'>No messages found</td></tr>";
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