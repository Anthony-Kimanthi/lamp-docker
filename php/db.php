<?php
$host = 'db'; // service name in docker-compose
$user = 'bloguser'; // must match MYSQL_USER
$pass = 'blogpass'; // must match MYSQL_PASSWORD
$dbname = 'blog';   // must match MYSQL_DATABASE

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
