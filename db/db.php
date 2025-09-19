<?php
$host = "mysql";       // service name from docker-compose.yml
$user = "root";        // or whatever user you configured
$pass = "rootpassword"; // change to your MySQL root password
$db   = "blog";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
