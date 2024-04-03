<?php

$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$phone = $_POST['phone'];

// Database connection
$conn = new mysqli('localhost','root','','login_database');
if($conn->connect_error){
    echo "$conn->connect_error";
    die("Connection Failed : ". $conn->connect_error);
} else {
    $stmt = $conn->prepare("insert into login_table(username, email, password, phone) values(?, ?, ?, ?)");
    $stmt->bind_param("sssi", $username, $email, $password, $phone);
    $execval = $stmt->execute();
    echo $execval;
    echo "Registration successfully...";
    $stmt->close();
    $conn->close();
}
?>

