<?php

$conn = new mysqli('localhost','root','','ridehub_db');

if ($conn->connect_error) {
    die('Connection failed: '. $conn->connect_error);
}

$name = $_POST['name'];
$email = $_POST['email'];
$password = password_hash($_POST['password'],PASSWORD_DEFAULT);

$sql = "SELECT * FROM users WHERE email = '$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo"Email already exist";
    }else{
       $sql = "INSERT INTO users(username, email,pwd) VALUES ('$name', '$email','$password')";
       if ($conn->query($sql) === TRUE) {
        echo "Registered successful!";
        header("Location: index.php");
       }else{
        echo "Error: " . $sql . "<br>" . $conn->error;
       }
    }

$conn->close();
