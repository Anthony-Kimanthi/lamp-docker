<?php
$mysqli = new mysqli("mysql_db", "root", "rootpassword", "blogdb");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $title = $mysqli->real_escape_string($_POST['title']);
    $content = $mysqli->real_escape_string($_POST['content']);
    $mysqli->query("INSERT INTO posts (title, content) VALUES ('$title', '$content')");
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Add Post</title>
</head>
<body>
    <h1>Add New Post</h1>
    <form method="POST">
        <p>Title: <input type="text" name="title" required></p>
        <p>Content:<br><textarea name="content" rows="5" cols="40" required></textarea></p>
        <button type="submit">Save</button>
    </form>
    <p><a href="index.php">Back to blog</a></p>
</body>
</html>
