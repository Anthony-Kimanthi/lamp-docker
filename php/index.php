<?php
$servername = "db";       // service name from docker-compose
$username = "root";
$password = "rootpassword";
$dbname = "testdb";       // the DB you already made in phpMyAdmin

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully!";
?>
