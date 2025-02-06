<?php

class Home
{

    private $conn;

    public function __construct($connection)
    {
        $this->conn = $connection;
    }

    // ********----------------Home Page------------------**********
    // get logo
    function getLogo()
    {
        $sql = $this->conn->query("SELECT id, dest FROM logo LIMIT 1");

        $data = null;

        if($sql->num_rows > 0){
            $result = $sql->fetch_assoc();
            $data = $result;
        }

        return $data;
    }


    // to get homepage details
    function getHomePageDetails($conn)
    {
        $sql = "SELECT id, banner_text, btn_name, btn_url, enable_btn FROM home_page_details LIMIT 1";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            return mysqli_fetch_assoc($result);
        } else {
            return null;
        }
    }

    // Function to get the banner image
    function getBannerImage($conn)
    {
        $sql_banner = mysqli_query($conn, "SELECT id, dest FROM home_page_banner_slider WHERE status = 1");
        $data = [];
        if (mysqli_num_rows($sql_banner) > 0) {
            while ($res_banner = mysqli_fetch_array($sql_banner)) {
                $data[] = $res_banner;
            }
        } else {
            $data[] = ["dest" => "./admin/dashboard/uploads/home/slider/default_banner.jpg"];
        }

        return $data;
    }
}

/* 
Home Page
*/

// Banner Upload
if (isset($_POST['upload_home_page_banner']) && isset($_FILES['banner'])) {
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

            $uploadDir = 'uploads/home/slider/';
            $uploadPath = $uploadDir . $uniqueFileName;

            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }

            $query = "SELECT * FROM home_page_banner_slider LIMIT 1";
            $result = mysqli_query($conn, $query);

            if (mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
                $oldBannerPath = $row['dest'];

                if (file_exists($oldBannerPath)) {
                    unlink($oldBannerPath);
                }

                $deleteQuery = "DELETE FROM home_page_banner_slider WHERE id = " . $row['id'];
                mysqli_query($conn, $deleteQuery);
            }

            if (move_uploaded_file($fileTmpName, $uploadPath)) {
                $insertQuery = "INSERT INTO home_page_banner_slider (name, dest) VALUES ('$fileName','$uploadPath')";
                if (mysqli_query($conn, $insertQuery)) {
                    echo "<script>alert('Banner uploaded successfully!');</script>";
                    echo "<script>window.location.href = 'home-page.php';</script>";
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

// Upload Logo
if (isset($_POST['upload_logo']) && isset($_FILES['logo'])) {
    $banner = $_FILES['logo'];
    $fileName = $banner['name'];
    $fileTmpName = $banner['tmp_name'];
    $fileSize = $banner['size'];
    $fileError = $banner['error'];
    $fileType = $banner['type'];

    $allowedTypes = ['image/jpeg', 'image/png', 'image/jpg', 'image/webp'];

    if (in_array($fileType, $allowedTypes)) {
        if ($fileError === 0) {
            $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
            $uniqueFileName = uniqid('', true) . '.' . $fileExtension;

            $uploadDir = 'uploads/logo/';
            $uploadPath = $uploadDir . $uniqueFileName;

            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }

            $query = "SELECT * FROM logo LIMIT 1";
            $result = mysqli_query($conn, $query);

            if (mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
                $oldBannerPath = $row['dest'];

                if (file_exists($oldBannerPath)) {
                    unlink($oldBannerPath);
                }

                $deleteQuery = "DELETE FROM logo WHERE id = " . $row['id'];
                mysqli_query($conn, $deleteQuery);
            }

            if (move_uploaded_file($fileTmpName, $uploadPath)) {
                $insertQuery = "INSERT INTO logo (name, dest) VALUES ('$fileName','$uploadPath')";
                if (mysqli_query($conn, $insertQuery)) {
                    echo "<script>alert('Logo uploaded successfully!');</script>";
                    echo "<script>window.location.href = 'home-page.php';</script>";
                } else {
                    echo "<script>alert('Error inserting logo path into database.');</script>";
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

// Homepage details 
if (isset($_POST["add_hompage_details"])) {
    $banner_text = trim($_POST["banner_text"] ?? '');
    $btn_name = trim($_POST["btn_name"] ?? '');
    $btn_url = trim($_POST["btn_url"] ?? '');
    $enable_btn = isset($_POST["enable_btn"]) ? 1 : 0;

    // if (empty($banner_text)) {
    //     echo "<script>alert('Banner text cannot be empty.');</script>";
    //     return;
    // }

    // Check if any record exists in the table
    $check_sql = "SELECT id FROM home_page_details LIMIT 1";
    $result = $conn->query($check_sql);

    if ($result->num_rows > 0) {
        // A record exists, so we update it
        $sql = "UPDATE home_page_details 
                SET banner_text = ?, btn_name = ?, btn_url = ?, enable_btn = ? 
                LIMIT 1";  // Ensure only one record is updated (although `LIMIT 1` is typically redundant here)

        if ($stmt = $conn->prepare($sql)) {
            $stmt->bind_param("sssi", $banner_text, $btn_name, $btn_url, $enable_btn);

            if ($stmt->execute()) {
                echo "<script>alert('Homepage details updated successfully');</script>";
                echo "<script>window.location.href = 'home-page.php';</script>";
            } else {
                echo "<script>alert('Error updating homepage details: " . $stmt->error . "');</script>";
            }

            $stmt->close();
        }
    } else {
        // No record exists, so we insert a new one
        $sql = "INSERT INTO home_page_details (banner_text, btn_name, btn_url, enable_btn) 
                VALUES (?, ?, ?, ?)";

        if ($stmt = $conn->prepare($sql)) {
            $stmt->bind_param("sssi", $banner_text, $btn_name, $btn_url, $enable_btn);

            if ($stmt->execute()) {
                echo "<script>alert('Homepage details added successfully');</script>";
                echo "<script>window.location.href = 'home-page.php';</script>";
            } else {
                echo "<script>alert('Error adding homepage details: " . $stmt->error . "');</script>";
            }

            $stmt->close();
        }
    }
}
