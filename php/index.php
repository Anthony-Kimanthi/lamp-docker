<?php
$servername = "db";
$username = "testuser";
$password = "testpass";
$dbname = "testdb";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id, title, created_at FROM posts ORDER BY created_at DESC";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html>
<head><title>My Blog</title></head>
<body>
<h1>My Blog</h1>
<a href="add.php">Add New Post</a>
<hr>
<?php
if ($result && $result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<h2><a href='view.php?id=" . $row["id"] . "'>" . htmlspecialchars($row["title"]) . "</a></h2>";
        echo "<small>Posted on " . $row["created_at"] . "</small><hr>";
    }
} else {
    echo "No posts yet!";
}
$conn->close();
?>
</body>
</html>
