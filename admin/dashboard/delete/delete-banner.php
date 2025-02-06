<?php
// Delete banner
include("../../config.php");
if (isset($_POST['deleteBanner'])) {
    $bannerId = $_POST['deleteBanner'];

    $sql = $conn->query("SELECT * FROM rooms WHERE id = '$bannerId'");

    if ($sql->num_rows > 0) {
        $room = $sql->fetch_assoc();
        // $imagePath = $room['image_url'];
        $imagePath = "../" . $room['image_url'];

        // Proceed to delete the room
        $delete = $conn->query("DELETE FROM rooms WHERE id = '$bannerId'");

        if ($delete) {
            // Check if the image exists and delete it
            if (!empty($imagePath) && file_exists($imagePath)) {
                unlink($imagePath);
            }

            echo json_encode(['status' => 'success', 'message' => 'Room and image deleted successfully!']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Failed to delete room!']);
        }
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Room not found!']);
    }
}
