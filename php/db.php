<?php
$host = "sdb";       // same as in docker-compose service name
$user = "bloguser";      // your non-root user
$pass = "blogpass";  // the password you set in docker-compose
$db   = "blog";         // your database name

$conn = new mysqli($host, $user, $pass, $db);

// Check connection
if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}
?>
