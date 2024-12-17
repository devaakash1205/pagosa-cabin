<?php
include("../config.php");
//****************Delete Rooms *****/
if (isset($_GET['id'])) {
    $roomId = (int) $_GET['id'];
} else {
    header("Location: our-room-page.php");
    exit;
}
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id'])) {
    $roomId = (int) $_POST['id'];

    // Delete query
    $query = "DELETE FROM rooms WHERE id = $roomId";
    if (mysqli_query($conn, $query)) {
        header("Location: our-room-page.php?success=1");
        exit;
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Blog</title>
    <script>
        window.onload = function() {
            const isConfirmed = confirm("Are you sure you want to delete this room?");
            
            if (isConfirmed) {
                document.getElementById('deleteForm').submit();
            } else {
                window.location.href = "our-room-page.php";
            }
        };
    </script>
</head>
<body>
    <form id="deleteForm" action="delete-room-page.php?id=<?php echo $roomId; ?>" method="POST" style="display:none;">
        <input type="hidden" name="id" value="<?php echo $roomId; ?>">
    </form>
</body>
</html>
