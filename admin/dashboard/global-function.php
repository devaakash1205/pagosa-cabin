<?php
//get all pages
function getAllPages()
{
    global $conn;
    $sql_page = mysqli_query($conn, "SELECT name, url FROM pages WHERE status = 1");
    if (mysqli_num_rows($sql_page) > 0) {
        while ($pages_result = mysqli_fetch_array($sql_page)) {
            ?>
            <li>
                <a href="<?php echo $pages_result['url']; ?>">
                    <i class="bi bi-circle"></i><span><?php echo $pages_result['name']; ?></span>
                </a>
            </li>
            <?php
        }
    }
}

// Deletion action (to be called in an AJAX request)
if (isset($_POST['action']) && $_POST['action'] == 'delete_banner' && isset($_POST['banner_id'])) {
    include("../config.php");
    $bannerId = $_POST['banner_id'];
    $deleteStatus = deleteBanner($bannerId, $conn);

    if ($deleteStatus) {
        echo json_encode(['status' => 'success']);
    } else {
        echo json_encode(['status' => 'error']);
    }
}

// Function to delete the banner
function deleteBanner($bannerId, $conn)
{
    // global $conn;  // Ensure $conn is accessible

    if ($conn === null) {
        die("Connection to the database failed.");
    }

    // Select the banner file path
    $sql = "SELECT dest FROM home_page_banner_slider WHERE id = '$bannerId' LIMIT 1";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $bannerImagePath = $row['dest'];

        // Delete the image file if it exists
        if (file_exists($bannerImagePath)) {
            unlink($bannerImagePath);
        }

        // Delete the banner record from the database
        $delete_sql = "DELETE FROM home_page_banner_slider WHERE id = '$bannerId'";
        $delete_result = mysqli_query($conn, $delete_sql);

        return $delete_result;
    }

    return false;
}

// *************Contact Us---------------***************
function fetchContactUsData($conn)
{
    $sql = "SELECT * FROM contact_details LIMIT 1";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        return $result->fetch_assoc();
    }
    return null;
}
// Contact us message
function fetch_about_page_details($search = '', $filter_date = '')
{
    global $conn;

    $query = "SELECT * FROM about_page_details WHERE dest != ''";

    // Apply filters
    if (!empty($search)) {
        $query .= " AND (name LIKE '%$search%' OR phone LIKE '%$search%')";
    }
    if (!empty($filter_date)) {
        $query .= " AND DATE(created_at) = '$filter_date'";
    }

    // Execute the query and return the results
    $result = mysqli_query($conn, $query);
    $data = [];

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }
    }

    return $data;
}

// Function to delete a contact message
function deleteContactMessage($conn, $messageId)
{
    $sql = "DELETE FROM contact_form WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $messageId);

    if ($stmt->execute()) {
        return json_encode(["success" => true]);
    } else {
        return json_encode(["success" => false]);
    }

    $stmt->close();
}

// Function to delete a  gallery image
function deleteGalleryImage($conn, $galleryId)
{
    $sql = "DELETE FROM gallery WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $galleryId);

    if ($stmt->execute()) {
        return json_encode(["success" => true]);
    } else {
        return json_encode(["success" => false]);
    }

    $stmt->close();
}

// Function to delete activity
function deleteActivity($conn, $activityId)
{
    $sql = "DELETE FROM activities WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $activityId);

    if ($stmt->execute()) {
        return json_encode(["success" => true]);
    } else {
        return json_encode(["success" => false]);
    }

    $stmt->close();
}

// Function to delete category
function deleteCategory($conn, $categoryId)
{
    $sql = "DELETE FROM activity_category WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $categoryId);

    if ($stmt->execute()) {
        return json_encode(["success" => true]);
    } else {
        return json_encode(["success" => false]);
    }

    $stmt->close();
}

// Function to delete category
function deleteHomeBanner($conn, $bannerId)
{
    $sql = "DELETE FROM home_page_banner_slider WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $bannerId);

    if ($stmt->execute()) {
        return json_encode(["success" => true]);
    } else {
        return json_encode(["success" => false]);
    }

    $stmt->close();
}

// Function to delete category
function deleteAboutBanner($conn, $aboutbannerId)
{
    $sql = "DELETE FROM  about_page_banner WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $aboutbannerId);

    if ($stmt->execute()) {
        return json_encode(["success" => true]);
    } else {
        return json_encode(["success" => false]);
    }

    $stmt->close();
}

// *************-------------Gallery--------------***************
function getGalleryImage($conn)
{
    $data = [];

    $query = mysqli_query($conn, "SELECT id,image_url,description FROM gallery");
    if (mysqli_num_rows($query) > 0) {
        // return data
        while ($row = mysqli_fetch_assoc($query)) {
            $data[] = $row;
        }
    }

    return $data;
}

// **-------------Our Rooms------------******
function getRooms()
{
    global $conn;

    $data = [];
    $sql = mysqli_query($conn, "SELECT * FROM rooms");

    if (mysqli_num_rows($sql) > 0) {
        while ($res = mysqli_fetch_assoc($sql)) {
            $data[] = $res;
        }
    }

    return $data;
}

// get rooms by id
function getRoomById($id)
{
    global $conn;

    $sql = mysqli_query($conn, "SELECT * FROM rooms WHERE id = '$id' AND status = 1");

    if (mysqli_num_rows($sql) > 0) {
        $result = mysqli_fetch_assoc($sql);
        return $result;
    } else {
        return null;
    }

}

//get user data
function getUserData($conn)
{
    $sql_user_data = mysqli_query($conn, "SELECT * FROM user_details LIMIT 1");
    if (mysqli_num_rows($sql_user_data) > 0) {
        $result = mysqli_fetch_assoc($sql_user_data);
        return $result;
    } else {
        return null;
    }
}

?>