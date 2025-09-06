<?php
// Database connection
$host = "localhost";
$user = "root";        // change if needed
$pass = "";            // change if needed
$dbname = "canvex_db";

$conn = new mysqli($host, $user, $pass, $dbname);

// Check connection
if ($conn->connect_error) {
    die("DB Connection failed: " . $conn->connect_error);
}

// Get form data
$name = $_POST['name'];
$mobile = $_POST['mobile'];
$email = $_POST['email'];
$service = $_POST['service'];
$message = $_POST['message'];

// Insert into database
$sql = "INSERT INTO contact_form (name, mobile, email, service, message) 
        VALUES ('$name', '$mobile', '$email', '$service', '$message')";
$conn->query($sql);

// Send email to company Gmail
$to = "canvexdesign@gmail.com";   // company Gmail
$subject = "New Contact Form Submission - CanveX";
$body = "Name: $name\nMobile: $mobile\nEmail: $email\nService: $service\nMessage:\n$message";
$headers = "From: $email";

if (mail($to, $subject, $body, $headers)) {
    echo "success";
} else {
    echo "error";
}

$conn->close();
?>
