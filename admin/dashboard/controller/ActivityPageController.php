<?php

class Activities
{
    private $conn;

    public function __construct($connection)
    {
        $this->conn = $connection;
    }


    function getAllCategories()
    {
        $data = [];

        $sql = $this->conn->query("SELECT id, name FROM activity_category WHERE status = 1");

        if ($sql->num_rows > 0) {
            while ($res = $sql->fetch_assoc()) {
                $data[] = $res;
            }
        }

        return $data;
    }


    function getAllActivity()
    {
        $data = [];

        $sql = $this->conn->query("SELECT * FROM activities WHERE status = 1");

        if ($sql->num_rows > 0) {
            while ($res = $sql->fetch_assoc()) {
                $data[] = $res;
            }
        }

        return $data;
    }

    function getSixActivity()
    {
        $data = [];

        $sql = $this->conn->query("SELECT * FROM activities WHERE status = 1 LIMIT 6");

        if ($sql->num_rows > 0) {
            while ($res = $sql->fetch_assoc()) {
                $data[] = $res;
            }
        }

        return $data;
    }
}

// add activities category
if (isset($_POST['submit_category'])) {
    $name = $_POST['name'];

    $sql = "INSERT INTO activity_category(name)VALUES('$name')";
    $query = mysqli_query($conn, $sql);
    if ($query) {
        echo "<script>alert('Category Successfully Added'); window.location.href='activity-page.php';</script>";
    } else {
        echo "<script>alert('Something Went Wrong.');</script>";
    }
}

// add activities
if (isset($_POST['add_activity']) && isset($_FILES['image_url'])) {
    $image_url = $_FILES['image_url'];
    $fileName = $image_url['name'];
    $fileTmpName = $image_url['tmp_name'];
    $fileSize = $image_url['size'];
    $fileError = $image_url['error'];
    $fileType = $image_url['type'];
    $title = $_POST["title"];
    $category = $_POST["category"];
    $description = $_POST["description"];

    // Allowed file types
    $allowedTypes = ['image/jpeg', 'image/png', 'image/jpg', 'image/svg+xml', 'image/webp'];

    // Check if file type is allowed
    if (in_array($fileType, $allowedTypes)) {
        if ($fileError === 0) {
            // File extension extraction
            $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

            // Generate a unique file name
            $uniqueFileName = uniqid('', true) . '.' . $fileExtension;

            // Directory setup
            $uploadDir = 'uploads/activity/';
            $uploadPath = $uploadDir . $uniqueFileName;

            // Create directory if not exists
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }

            if (move_uploaded_file($fileTmpName, $uploadPath)) {
                $insertQuery = "INSERT INTO activities (title, category, description, image_url) VALUES ('$title','$category','$description','$uploadPath')";
                if (mysqli_query($conn, $insertQuery)) {
                    echo "<script>alert('Activity Added Successfully!');</script>";
                    echo "<script>window.location.href = 'activity-page.php';</script>";
                } else {
                    echo "<script>alert('Database Error: " . mysqli_error($conn) . "');</script>";
                }
            } else {
                echo "<script>alert('There was an error uploading the file.');</script>";
            }
        } else {
            echo "<script>alert('File Upload Error Code: $fileError');</script>";
        }
    } else {
        echo "<script>alert('Invalid file type. Please upload a JPG, JPEG, or PNG image.');</script>";
    }
}
