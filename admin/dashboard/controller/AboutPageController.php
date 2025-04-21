<?php
// echo $bannerUploadLimit;

class About
{
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    // Get banner images
    public function getAboutUsDetails($limit = null)
    {
        $sql = "SELECT id, title, image_url, description FROM about WHERE status = 1";

        $result = mysqli_query($this->conn, $sql);

        if ($result->num_rows > 0) {
            return $result->fetch_assoc();
        } else {
            return null;
        }
    }

    // Function to get the banner image
    function getBannerImage($conn)
    {
        $sql_banner = mysqli_query($conn, "SELECT id, dest FROM about_page_banner WHERE status = 1");
        $data = [];
        if (mysqli_num_rows($sql_banner) > 0) {
            while ($res_banner = mysqli_fetch_assoc($sql_banner)) {
                $data[] = $res_banner;
            }
        }

        return $data;
    }
}




// From Submission Here

// *---------------About Us

if (isset($_POST['addAboutDetails'])) {

    $title = $_POST['title'];
    $description = $_POST['description'];
    $image_url = $_FILES["image_url"]; // Changed from 'banner' to 'image_url'
    $target_dir = "uploads/about/banner/";

    // Validate and sanitize inputs
    $title = mysqli_real_escape_string($conn, $title);
    $description = mysqli_real_escape_string($conn, $description);

    // If an image is uploaded
    if ($image_url['error'] === UPLOAD_ERR_OK) {
        $uploaded_file = $image_url;
        $unique_file_name = time() . '_' . basename($uploaded_file['name']);
        $target_file = $target_dir . $unique_file_name;

        // Check if the record exists
        $sql_check = "SELECT image_url FROM about LIMIT 1";
        $result_check = mysqli_query($conn, $sql_check);
        $data_exists = mysqli_num_rows($result_check) > 0;

        // Handle existing record or insert a new one
        if ($data_exists) {
            $row = mysqli_fetch_assoc($result_check);
            $old_image_path = $row['image_url'];
            if (file_exists($old_image_path)) {
                unlink($old_image_path);
            }

            $sql = "UPDATE about SET title = '$title', description = '$description', image_url = '$target_file' WHERE id = 1";
        } else {
            $sql = "INSERT INTO about (title, description, image_url) VALUES ('$title', '$description', '$target_file')";
        }

        if (mysqli_query($conn, $sql)) {
            move_uploaded_file($uploaded_file['tmp_name'], $target_file);
            echo "<script>alert('Data successfully " . ($data_exists ? "updated" : "inserted") . " with new image!'); window.location.href='about-us-page.php';</script>";
        } else {
            echo "<script>alert('Error processing the data!');</script>";
        }
    } else {
        // If no image is uploaded, just update or insert the description
        $sql_check = "SELECT id FROM about LIMIT 1";
        $result_check = mysqli_query($conn, $sql_check);

        // If record exists, update the description; otherwise, insert it
        if ($result_check) {
            $sql = "UPDATE about SET title = '$title', description = '$description' WHERE id = 2";
        } else {
            $sql = "INSERT INTO about (title, description) VALUES ('$title', '$description')";
        }

        if (mysqli_query($conn, $sql)) {
            echo "<script>alert('Description successfully " . ($result_check ? "updated" : "added") . "!'); window.location.href='about-us-page.php';</script>";
        } else {
            echo "<script>alert('Error processing the description!');</script>";
        }
    }
}


// Banner Upload
if (isset($_POST['upload_about_banner']) && isset($_FILES['banner'])) {
    $banner = $_FILES['banner'];
    $fileName = $banner['name'];
    $fileTmpName = $banner['tmp_name'];
    $fileSize = $banner['size'];
    $fileError = $banner['error'];
    $fileType = $banner['type'];

    $allowedTypes = ['image/jpeg', 'image/png', 'image/jpg'];

    if (in_array($fileType, $allowedTypes)) {
        if ($fileError === 0) {
            $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
            $uniqueFileName = uniqid('', true) . '.' . $fileExtension;

            $uploadDir = 'uploads/about/bannerImage/';
            $uploadPath = $uploadDir . $uniqueFileName;

            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }

            $query = "SELECT * FROM  about_page_banner LIMIT 1";
            $result = mysqli_query($conn, $query);

            if (mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
                $oldBannerPath = $row['dest'];

                if (file_exists($oldBannerPath)) {
                    unlink($oldBannerPath);
                }

                $deleteQuery = "DELETE FROM about_page_banner WHERE id = " . $row['id'];
                mysqli_query($conn, $deleteQuery);
            }

            if (move_uploaded_file($fileTmpName, $uploadPath)) {
                $insertQuery = "INSERT INTO about_page_banner (name, dest) VALUES ('$fileName','$uploadPath')";
                if (mysqli_query($conn, $insertQuery)) {
                    echo "<script>alert('Banner uploaded successfully!');</script>";
                    echo "<script>window.location.href = 'about-us-page.php';</script>";
                } else {
                    echo "<script>alert('Error inserting banner path into database.');</script>";
                }
            } else {
                echo "<script>alert('There was an error uploading the file.');</script>";
            }
        } else {
            echo "<script>alert('There was an error with the file upload.');</script>";
        }
    } else {
        echo "<script>alert('Invalid file type. Please upload a JPG, JPEG, or PNG image.');</script>";
    }
}



// *----------------About Us
