<?php
include("../config.php");
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

/* 
Services
*/

// add service

if (isset($_POST["add_service"])) {
    $service_name = $_POST["service_name"];
    $description = $_POST["description"];
    $price = $_POST["price"];
    $status = $_POST["status"];

    if (isset($_FILES["image_url"]) && $_FILES["image_url"]["error"] === UPLOAD_ERR_OK) {
        $imageTmpName = $_FILES["image_url"]["tmp_name"];
        $imageExtension = pathinfo($_FILES["image_url"]["name"], PATHINFO_EXTENSION);
        $uniqueImageName = uniqid("service_", true) . '.' . $imageExtension;
        $uploadDirectory = 'uploads/services/';
        $imagePath = $uploadDirectory . $uniqueImageName;

        if (!file_exists($uploadDirectory)) {
            mkdir($uploadDirectory, 0777, true);
        }

        if (move_uploaded_file($imageTmpName, $imagePath)) {
            $stmt = $conn->prepare("INSERT INTO services (service_name, description, price, image_url, status, created_at) VALUES (?, ?, ?, ?, ?, NOW())");
            $stmt->bind_param("ssdsi", $service_name, $description, $price, $imagePath, $status);

            if ($stmt->execute()) {
                echo "<script>alert('Service added successfully!'); window.location.href = 'services.php';</script>";
            } else {
                echo "<script>alert('Error: Could not add the service. Please try again.');</script>";
            }

            $stmt->close();
        } else {
            echo "<script>alert('Failed to upload image.');</script>";
        }
    } else {
        echo "<script>alert('Please upload a valid image.');</script>";
    }
}

// *---------------About Us

if (isset($_POST['add_about_us_details'])) {
    $description = $_POST['description'];
    $banner = $_FILES["banner"];
    $target_dir = "uploads/about/banner/";

    // If an image is uploaded
    if ($banner['error'] === UPLOAD_ERR_OK) {
        $uploaded_file = $banner;
        $unique_file_name = time() . '_' . basename($uploaded_file['name']);
        $target_file = $target_dir . $unique_file_name;

        // Check if the record exists
        $sql_check = "SELECT dest FROM about_page_details LIMIT 1";
        $result_check = mysqli_query($conn, $sql_check);
        $data_exists = mysqli_num_rows($result_check) > 0;

        // Handle existing record or insert a new one
        if ($data_exists) {
            $row = mysqli_fetch_assoc($result_check);
            $old_image_path = $row['dest'];
            if (file_exists($old_image_path))
                unlink($old_image_path);

            $sql = "UPDATE about_page_details SET description = ?, dest = ? WHERE id = 1";
        } else {
            $sql = "INSERT INTO about_page_details (description, dest) VALUES (?, ?)";
        }

        // Prepare and execute the query
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $description, $target_file);
        if ($stmt->execute()) {
            move_uploaded_file($uploaded_file['tmp_name'], $target_file);
            echo "<script>alert('Data successfully " . ($data_exists ? "updated" : "inserted") . " with new image!'); window.location.href='about-us-page.php';</script>";
        } else {
            echo "<script>alert('Error processing the data!');</script>";
        }
    } else {
        // If no image is uploaded, just update or insert the description
        $sql_check = "SELECT id FROM about_page_details LIMIT 1";
        $result_check = mysqli_query($conn, $sql_check);
        $sql = $result_check ? "UPDATE about_page_details SET description = ? WHERE id = 1" : "INSERT INTO about_page_details (description) VALUES (?)";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $description);
        if ($stmt->execute()) {
            echo "<script>alert('Description successfully " . ($result_check ? "updated" : "added") . "!'); window.location.href='about-us-page.php';</script>";
        } else {
            echo "<script>alert('Error processing the description!');</script>";
        }
    }
}

// *----------------About Us


// *****------------Weekly Rates------------**************
if (isset($_POST["add_weekly_rates"])) {
    // Fetch form data
    $title = $_POST["title"];
    $description = $_POST["description"];
    $status = $_POST["status"];

    // Handle the uploaded image
    if (isset($_FILES["image_url"]) && $_FILES["image_url"]["error"] === UPLOAD_ERR_OK) {
        $imageTmpName = $_FILES["image_url"]["tmp_name"];
        $imageExtension = strtolower(pathinfo($_FILES["image_url"]["name"], PATHINFO_EXTENSION));
        $allowedExtensions = ["jpg", "jpeg", "png", "gif", "webp"];
        $uploadDirectory = 'uploads/services/weekly-rates/';

        // Validate image extension
        if (!in_array($imageExtension, $allowedExtensions)) {
            echo "<script>alert('Invalid file type. Only JPG, JPEG, PNG, and GIF files are allowed.');</script>";
            exit;
        }

        // Create a unique name for the image
        $uniqueImageName = uniqid("service_", true) . '.' . $imageExtension;
        $imagePath = $uploadDirectory . $uniqueImageName;

        // Ensure upload directory exists
        if (!file_exists($uploadDirectory)) {
            mkdir($uploadDirectory, 0777, true);
        }

        // Move the uploaded file to the target directory
        if (move_uploaded_file($imageTmpName, $imagePath)) {
            // Insert data into the database
            $stmt = $conn->prepare("INSERT INTO weekly_rates (title, description, image_url, status, created_at) VALUES (?, ?, ?, ?, NOW())");
            $stmt->bind_param("sssi", $title, $description, $imagePath, $status);

            if ($stmt->execute()) {
                echo "<script>alert('Data added successfully!'); window.location.href = 'weekly-rates.php';</script>";
            } else {
                echo "<script>alert('Database error: " . $stmt->error . "');</script>";
            }

            $stmt->close();
        } else {
            echo "<script>alert('Failed to upload image.');</script>";
        }
    } else {
        echo "<script>alert('Please upload a valid image.');</script>";
    }
}


// ***********-----------Contact Us -----------***********8

if (isset($_POST["update_address"])) {
    $office_address = trim($_POST["office_address"] ?? '');
    $contact_number1 = trim($_POST["contact_number1"] ?? '');
    $contact_number2 = trim($_POST["contact_number2"] ?? '');
    $email = trim($_POST["email"] ?? '');
    $twitter_link = trim($_POST["twitter_link"] ?? '');
    $facebook_link = trim($_POST["facebook_link"] ?? '');
    $instagram_link = trim($_POST["instagram_link"] ?? '');
    $youtube_link = trim($_POST["youtube_link"] ?? '');
    $linkedin_link = trim($_POST["linkedin_link"] ?? '');
    $enable_twitter = isset($_POST["enable_twitter"]) ? 1 : 0;
    $enable_facebook = isset($_POST["enable_facebook"]) ? 1 : 0;
    $enable_instagram = isset($_POST["enable_instagram"]) ? 1 : 0;
    $enable_youtube = isset($_POST["enable_youtube"]) ? 1 : 0;
    $enable_linkedin = isset($_POST["enable_linkedin"]) ? 1 : 0;

    // Validate required fields
    if (empty($office_address) || empty($contact_number1) || empty($email)) {
        echo "<script>alert('Address, Contact Number, and Email are required.');</script>";
        return;
    }

    // Check if any record exists in the table
    $check_sql = "SELECT id FROM contact_details LIMIT 1";
    $result = $conn->query($check_sql);

    if ($result->num_rows > 0) {
        // Update the existing record
        $sql = "UPDATE contact_details 
                SET office_address = ?, contact_number1 = ?, contact_number2 = ?, email = ?, 
                    twitter_link = ?, facebook_link = ?, instagram_link = ?, youtube_link = ?, linkedin_link = ?, 
                    enable_twitter = ?, enable_facebook = ?, enable_instagram = ?, enable_youtube = ?, enable_linkedin = ? 
                LIMIT 1";

        if ($stmt = $conn->prepare($sql)) {
            $stmt->bind_param(
                "ssssssssssiiii",
                $office_address,
                $contact_number1,
                $contact_number2,
                $email,
                $twitter_link,
                $facebook_link,
                $instagram_link,
                $youtube_link,
                $linkedin_link,
                $enable_twitter,
                $enable_facebook,
                $enable_instagram,
                $enable_youtube,
                $enable_linkedin
            );

            if ($stmt->execute()) {
                echo "<script>alert('Contact details updated successfully');</script>";
                echo "<script>window.location.href = 'contact-page.php';</script>";
            } else {
                echo "<script>alert('Error updating contact details: " . $stmt->error . "');</script>";
            }

            $stmt->close();
        }
    } else {
        // Insert a new record
        $sql = "INSERT INTO contact_details (office_address, contact_number1, contact_number2, email, 
                twitter_link, facebook_link, instagram_link, youtube_link, linkedin_link, 
                enable_twitter, enable_facebook, enable_instagram, enable_youtube, enable_linkedin) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        if ($stmt = $conn->prepare($sql)) {
            $stmt->bind_param(
                "ssssssssssiiii",
                $office_address,
                $contact_number1,
                $contact_number2,
                $email,
                $twitter_link,
                $facebook_link,
                $instagram_link,
                $youtube_link,
                $linkedin_link,
                $enable_twitter,
                $enable_facebook,
                $enable_instagram,
                $enable_youtube,
                $enable_linkedin
            );

            if ($stmt->execute()) {
                echo "<script>alert('Contact details added successfully');</script>";
                echo "<script>window.location.href = 'contact-page.php';</script>";
            } else {
                echo "<script>alert('Error adding contact details: " . $stmt->error . "');</script>";
            }

            $stmt->close();
        }
    }
}

// -----------***********Gallery Image Uplaod**************---------------
if (isset($_POST['upload_gallery_image']) && isset($_FILES['image_url'])) {
    $image_url = $_FILES['image_url'];
    $fileName = $image_url['name'];
    $fileTmpName = $image_url['tmp_name'];
    $fileSize = $image_url['size'];
    $fileError = $image_url['error'];
    $fileType = $image_url['type'];
    $description = $_POST["description"];
    $flag = 1;

    $allowedTypes = ['image/jpeg', 'image/png', 'image/jpg'];

    if (in_array($fileType, $allowedTypes)) {
        if ($fileError === 0) {
            $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
            $uniqueFileName = uniqid('', true) . '.' . $fileExtension;

            $uploadDir = 'uploads/gallery';
            $uploadPath = $uploadDir . $uniqueFileName;

            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }

            if (move_uploaded_file($fileTmpName, $uploadPath)) {
                $insertQuery = "INSERT INTO gallery (description, image_url, flags) VALUES ('$description','$uploadPath', $flag)";
                if (mysqli_query($conn, $insertQuery)) {
                    echo "<script>alert('Image uploaded successfully!');</script>";
                    echo "<script>window.location.href = 'gallery-page.php';</script>";
                } else {
                    echo "<script>alert('Error inserting Image path into database.');</script>";
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

// Change Password

if (isset($_POST['change_password'])) {
    $currentPassword = $_POST["current_password"];
    $sqlAdmin = mysqli_query($conn, "SELECT * FROM admin WHERE username = '" . mysqli_real_escape_string($conn, $_SESSION['username']) . "'");
    $adminData = mysqli_fetch_assoc($sqlAdmin);
    $username = $_SESSION["username"];

    if (password_verify($currentPassword, $adminData["password"])) {
        $newPassword = $_POST["new_password"];
        $confirmPassword = $_POST["confirm_password"];
        if ($newPassword === $confirmPassword) {
            $hashed_password = password_hash($newPassword, PASSWORD_DEFAULT);

            // SQL query to insert user credentials
            $query = "UPDATE admin SET password = '$hashed_password' WHERE username = '$username'";

            // Execute query and check if insertion is successful
            if (mysqli_query($conn, $query)) {
                echo "<script>alert('Password successfully changed!');</script>";
            } else {
                echo "<script>alert('Something went wrong!');</script>";
            }
        } else {
?>
            <script>
                alert("Password not marching!");
            </script>
        <?php
        }
    } else {
        ?>
        <script>
            alert("Current password does not match!");
        </script>
<?php
    }
}

// user page
if (isset($_POST['update_profile'])) {
    $name = $_POST['name'];
    $company_name = $_POST['company_name'];
    $country = $_POST['country'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $twitter_link = $_POST['twitter_link'];
    $instagram_link = $_POST['instagram_link'];
    $facebook_link = $_POST['facebook_link'];

    //insert code here
    $sql = "INSERT INTO user_details(name, company_name, country, address, phone, email, twitter_link, instagram_link, facebook_link) 
      VALUES ('$name', '$company_name', '$country', '$address', '$phone', '$email', '$twitter_link', '$instagram_link', '$facebook_link')";
    $query = mysqli_query($conn, $sql);
    if ($query) {
        echo "<script>alert('data inserted successfully..')</script>";
    } else {
        echo "<script>alert('something went wrong!!..')</script>";
    }
}

// *****---------------rooms--------**********

// add rooms

if (isset($_POST['add_room']) && isset($_FILES['image_url'])) {
    $image = $_FILES['image_url'];
    $title = $_POST["title"];

    $allowedTypes = ['image/jpeg', 'image/png', 'image/jpg', 'image/webp', 'image/jfif'];
    $uploadDir = 'uploads/rooms/';

    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    $fileName = $image['name'];
    $fileTmpName = $image['tmp_name'];
    $fileSize = $image['size'];
    $fileError = $image['error'];
    $fileType = $image['type'];

    if (in_array($fileType, $allowedTypes)) {
        if ($fileError === 0) {
            $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
            $uniqueFileName = uniqid('', true) . '.' . $fileExtension;
            $uploadPath = $uploadDir . $uniqueFileName;

            // File ko upload karenge
            if (move_uploaded_file($fileTmpName, $uploadPath)) {
                // File path ko database me insert karenge
                $insertQuery = "INSERT INTO rooms (title, image_url) VALUES ('$title', '$uploadPath')";

                if (mysqli_query($conn, $insertQuery)) {
                    echo "<script>alert('Room successfully added with an image!');</script>";
                    echo "<script>window.location.href = 'our-room-page.php';</script>";
                } else {
                    // Database insert fail hone par image ko delete karenge
                    if (file_exists($uploadPath)) {
                        unlink($uploadPath);
                    }
                    echo "<script>alert('Error inserting image path into database.');</script>";
                }
            } else {
                echo "<script>alert('Error uploading the image.');</script>";
            }
        } else {
            echo "<script>alert('Error with the uploaded file.');</script>";
        }
    } else {
        echo "<script>alert('Invalid file type. Only JPEG, PNG, JPG,JFIF, and WEBP are allowed.');</script>";
    }
}
// *****---------------Rooms--------**********

//***********Rooms details ***********/
if (isset($_GET['id'])) {
    $roomId = (int) $_GET['id'];
    $query = "SELECT * FROM rooms WHERE id = $roomId";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $roomData = mysqli_fetch_assoc($result);
    } else {
        $roomData = null;
    }
}

//********Room Edit *********/
if (isset($_POST['update'])) {
    $title = $_POST['title'];
    $roomId = $_POST['room_id'];
    $upload_dir = 'uploads/rooms/';
    
    // Check if the directory exists and is writable
    if (!is_dir($upload_dir)) {
        mkdir($upload_dir, 0777, true);
    }

    if (!is_writable($upload_dir)) {
        die("Upload directory is not writable!");
    }
    $image_url = $roomData['image_url'];

    // Check if a new image is uploaded
    if ($_FILES['image_url']['error'] == 0) {
        // New image uploaded, handle the upload
        $image_url = uniqid() . '-' . $_FILES['image_url']['name'];  // Creating unique filename
        $tmp_name = $_FILES['image_url']['tmp_name'];
        $target_path = $upload_dir . basename($image_url);

        // Delete the old image if it exists
        if (isset($roomData['image_url']) && file_exists($upload_dir . $roomData['image_url'])) {
            unlink($upload_dir . $roomData['image_url']);  // Delete the old image
        }

        // Ensure file is an image (optional, but recommended)
        $allowed_types = ['image/jpeg', 'image/png', 'image/gif', 'image/jfif'];
        $file_type = mime_content_type($tmp_name);
        if (!in_array($file_type, $allowed_types)) {
            echo "<script>alert('Invalid image type!');</script>";
            exit;
        }

        // Move the uploaded file to the target directory
        if (move_uploaded_file($tmp_name, $target_path)) {
            echo "Image uploaded successfully!";
        } else {
            echo "Error uploading image.";
            exit;
        }
    }

    // Update query to update title and image URL
    $update_query = "UPDATE rooms SET title='$title', image_url='$image_url' WHERE id=$roomId";
    
    if (mysqli_query($conn, $update_query)) {
        echo "<script>alert('Room details updated successfully!'); window.location.href='our-room-page.php';</script>";
    } else {
        echo "<script>alert('Error updating room.');</script>";
    }
}

?>
