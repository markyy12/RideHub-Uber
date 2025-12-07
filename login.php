<?php

$conn = new mysqli('localhost','root','','ridehub_db');

if ($conn->connect_error) {
    die('Connection failed: '. $conn->connect_error);
}

$email = $_POST['email'];
$password = $_POST['password'];

$sql = "SELECT * FROM users WHERE email = '$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
    if(password_verify($password, $user["pwd"])) {
        session_start();
        $_SESSION["user_id"] = $user["id"];
        $_SESSION["username"] = $user["username"];
        header("Location: Dashboard.php");
    }else{
        echo"Invalid password";
    }
}   else{
        echo "User not found";
    }

$conn->close();