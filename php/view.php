<?php
$servername = "db";
$username = "testuser";
$password = "testpass";
$dbname = "testdb";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$sql = "SELECT * FROM posts WHERE id=$id";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html>
<head><title>View Post</title></head>
<body>
<a href="index.php">← Back to Blog</a>
<hr>
<?php
if ($result && $result->num_rows > 0) {
    $post = $result->fetch_assoc();
    echo "<h1>" . htmlspecialchars($post["title"]) . "</h1>";
    echo "<p>" . nl2br(htmlspecialchars($post["content"])) . "</p>";
    echo "<small>Posted on " . $post["created_at"] . "</small>";
} else {
    echo "Post not found!";
}
$conn->close();
?>
</body>
</html>
