<?php
$host = "mysql_db";       // same as in docker-compose service name
$user = "blogsuser";      // your non-root user
$pass = "blogspassword";  // the password you set in docker-compose
$db   = "blogdb";         // your database name

$conn = new mysqli($host, $user, $pass, $db);

// Check connection
if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}
?>
