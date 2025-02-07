<?php
// **-------------Contact Page------------******
class Contact
{

    private $conn;

    public function __construct($connection)
    {
        $this->conn = $connection;
    }

    // all rooms accesable for public
    function getContact()
    {
        $data = null;

        $sql = $this->conn->query("SELECT id, address, phone, email, description FROM contact_details LIMIT 1");

        if ($sql->num_rows > 0) {
            $res = $sql->fetch_assoc();
            $data = $res;
        }

        return $data;
    }
}
// add contact info 
if (isset($_POST['submit_contact'])) {
    $address = $_POST['address'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $description = $_POST['description'];

    $sql = mysqli_query($conn, "SELECT * FROM contact_details WHERE id = 1");
    if (mysqli_num_rows($sql) > 0) {
        $query = mysqli_query($conn, "UPDATE `contact_details` SET `address`='$address', `phone`='$phone', `description`='$description', `email`='$email' WHERE id = 1");
    } else {
        $sql = "INSERT INTO contact_details(id, address, email, phone, description) VALUES(1, '$address', '$email', '$phone', '$description')";
        $query = mysqli_query($conn, $sql);
    }

    if ($query) {
        echo "<script>alert('Contact Details Successfully Added'); window.location.href='contact-page.php';</script>";
    } else {
        echo "<script>alert('Something Went Wrong.');</script>";
    }
}
