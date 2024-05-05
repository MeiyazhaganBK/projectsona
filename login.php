<?php
$servername = "localhost"; // or your server address
$username = "root"; // your MySQL username
$password = ""; // your MySQL password
$dbname = "donors"; // your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Form data retrieval
$email = $_POST['email'];
$password = $_POST['password'];

// SQL query to check if username and password combination exists
$sql = "SELECT * FROM users WHERE Email = '$email' AND Password = '$password'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Username and password combination exists
    echo "<script>alert('Login successful');</script>";
    // You can redirect the user to the dashboard or another page here
} else {
    // Username and password combination does not exist
    echo "<script>alert('Invalid email or password');</script>";
    // You can redirect the user back to the login page with an error message
}

$conn->close();
?>
