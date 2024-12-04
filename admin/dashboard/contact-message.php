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
                                        <th scope="col">Message</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody id="messageTable">
                                    <?php
                                    $limit = 10;
                                    if (isset($_GET['page']) && is_numeric($_GET['page'])) {
                                        $page = $_GET['page'];
                                    } else {
                                        $page = 1;
                                    }

                                    $start = ($page - 1) * $limit;
                                    $sql = "SELECT * FROM contact_form ORDER BY created_at DESC LIMIT $start, $limit";
                                    $result = mysqli_query($conn, $sql);

                                    if (mysqli_num_rows($result) == 0) {
                                        echo "<tr><td colspan='6'>No messages found</td></tr>";
                                    } else {
                                        $count = 1 + $start;
                                        while ($row = mysqli_fetch_array($result)) {
                                    ?>
                                            <tr id="message-<?php echo $row['id']; ?>">
                                                <th scope="row"><?php echo $count++; ?></th>
                                                <td><?php echo $row['name']; ?></td>
                                                <td><?php echo $row['email']; ?></td>
                                                <td><?php echo substr($row['message'], 0, 50); ?>...</td> <!-- Show a snippet of the message -->
                                                <td><?php echo date('Y-m-d', strtotime($row['created_at'])); ?></td>
                                                <td>
                                                    <a href="javascript:void(0);" class="text-danger" onclick="deleteContactMessage(<?php echo $row['id']; ?>)">
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

                            <!-- Pagination Links -->
                            <div class="d-flex justify-content-end">
                                <nav aria-label="Page navigation">
                                    <ul class="pagination justify-content-center">
                                        <?php
                                        $sql = "SELECT COUNT(*) AS total FROM contact_form";
                                        $result = mysqli_query($conn, $sql);
                                        $row = mysqli_fetch_assoc($result);
                                        $total_records = $row['total'];
                                        $total_pages = ceil($total_records / $limit);
                                        if ($page > 1) {
                                            echo '<li class="page-item"><a class="page-link" href="?page=' . ($page - 1) . '">Previous</a></li>';
                                        }
                                        for ($i = 1; $i <= $total_pages; $i++) {
                                            $active = ($i == $page) ? 'active' : '';
                                            echo '<li class="page-item ' . $active . '"><a class="page-link" href="?page=' . $i . '">' . $i . '</a></li>';
                                        }
                                        if ($page < $total_pages) {
                                            echo '<li class="page-item"><a class="page-link" href="?page=' . ($page + 1) . '">Next</a></li>';
                                        }
                                        ?>
                                    </ul>
                                </nav>
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
        // Function for live search and filtering
        function searchTable() {
            let input = document.getElementById("searchInput");
            let filter = input.value.toLowerCase();
            let table = document.getElementById("messageTable");
            let tr = table.getElementsByTagName("tr");

            for (let i = 0; i < tr.length; i++) {
                let td = tr[i].getElementsByTagName("td");
                let txtValue = "";
                // Combine the name, email, message, and date to search for any match
                for (let j = 0; j < td.length; j++) {
                    txtValue += td[j].textContent || td[j].innerText;
                }
                if (txtValue.toLowerCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }

        // AJAX function to delete message
        function deleteContactMessage(id) {
            if (confirm('Are you sure you want to delete this message?')) {
                $.ajax({
                    url: 'contact-message.php',
                    method: 'POST',
                    data: {
                        action: 'delete_message',
                        id: id
                    },
                    success: function(response) {
                        var data = JSON.parse(response);
                        if (data.success) {
                            alert('Message deleted successfully');
                            location.reload();
                        } else {
                            alert('Error deleting message');
                        }
                    }
                });
            }
        }
    </script>

</body>

</html>