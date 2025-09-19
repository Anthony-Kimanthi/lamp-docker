<?php
$servername = "db"; // service name from docker-compose
$username = "root";
$password = "rootpassword";
$dbname = "testdb";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch users
$sql = "SELECT id, name FROM users";
$result = $conn->query($sql);

echo "<h1>Users in testdb.users</h1>";

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo $row["id"]." - ".$row["name"]."<br>";
    }
} else {
    echo "0 results";
}

$conn->close();
?>
<br>
<a href="insert.php">Add a new user</a>
