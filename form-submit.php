<?php
include("./admin/config.php");
// Booking 
if (isset($_POST['submit_booking'])) {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']);
    $checkin = $_POST['checkin'];
    $checkout = $_POST['checkout'];
    $no_of_adults = $_POST['no_of_adults'];
    $no_of_children = $_POST['no_of_children'];

    // Check if the same booking request already exists
    $checkQuery = "
        SELECT * 
        FROM booking_request 
        WHERE name = '$name' 
        AND email = '$email' 
        AND phone = '$phone' 
        AND checkin = '$checkin' 
        AND checkout = '$checkout' 
        AND no_of_adults = '$no_of_adults' 
        AND no_of_children = '$no_of_children'
    ";
    $checkResult = mysqli_query($conn, $checkQuery);

    if (mysqli_num_rows($checkResult) > 0) {
        echo "<script>alert('You have already submitted this exact booking request!');</script>";
    } else {
        // Insert the booking request if not already submitted
        $sql = "INSERT INTO booking_request(name, email, phone, checkin, checkout, no_of_adults, no_of_children) 
                VALUES ('$name', '$email', '$phone', '$checkin', '$checkout', '$no_of_adults', '$no_of_children')";
        $query = mysqli_query($conn, $sql);
        if ($query) {
            echo "<script>alert('Booking Successfully..');</script>";
        } else {
            echo "<script>alert('Something went wrong!!..');</script>";
        }
    }
}

//reviews
if (isset($_POST['submit_review'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $description = $_POST['description'];

    //insert code here
    $sql = "INSERT INTO user_reviews(name,email,phone,address,description) 
VALUES ('$name', '$email','$phone','$address','$description')";
    $query = mysqli_query($conn, $sql);
    if ($query) {
        echo "<script>alert('Review Added Successfully..'); window.location.href='reviews.php';</script>";
    } else {
        echo "<script>alert('something went wrong!!..')</script>";
    }
}

// contact send by clients
if (isset($_POST['send_contact'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    // SQL Query
    $sql = "INSERT INTO contact_form(name, email, phone, subject, message) 
            VALUES ('$name', '$email', '$phone','$subject', '$message')";

    // Query Execute karo
    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Thanks for contacting us! We will get in touch with you soon.')</script>";
        echo "<script>location.replace('contact.php')</script>";
    } else {
        echo "SQL Error: " . mysqli_error($conn);
    }
}
?>

