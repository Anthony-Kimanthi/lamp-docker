<?php
$servername = "db";
$username = "testuser";
$password = "testpass";
$dbname = "testdb";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $conn->real_escape_string($_POST['title']);
    $content = $conn->real_escape_string($_POST['content']);
    $sql = "INSERT INTO posts (title, content) VALUES ('$title', '$content')";
    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
        exit;
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html>
<head><title>Add Post</title></head>
<body>
<a href="index.php">← Back to Blog</a>
<hr>
<h1>Add New Post</h1>
<form method="post" action="">
    Title:<br><input type="text" name="title" required><br><br>
    Content:<br><textarea name="content" rows="5" cols="40" required></textarea><br><br>
    <input type="submit" value="Add Post">
</form>
</body>
</html>
