<?php
// Include database configuration file
include("config.php"); // Assuming you have a config.php for DB connection

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get user input
    $username = mysqli_real_escape_string($conn, $_POST["username"]);
    $password = $_POST["password"]; // Password entered by the user

    // Hash the password using PASSWORD_DEFAULT (bcrypt)
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // SQL query to insert user credentials
    $query = "INSERT INTO admin (username, password) VALUES ('$username', '$hashed_password')";

    // Execute query and check if insertion is successful
    if (mysqli_query($conn, $query)) {
        echo "User successfully added!";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

// Close DB connection
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Admin Credentials</title>
</head>
<body>
    <h2>Insert User Credentials</h2>
    <form method="POST" action="">
        <label for="username">Username:</label><br>
        <input type="text" id="username" name="username" required><br><br>

        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password" required><br><br>

        <input type="submit" value="Submit">
    </form>
</body>
</html>
