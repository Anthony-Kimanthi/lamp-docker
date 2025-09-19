<?php
$mysqli = new mysqli("mysql_db", "root", "rootpassword", "blogdb");

$id = intval($_GET['id']);
$result = $mysqli->query("SELECT * FROM posts WHERE id=$id");
$post = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html>
<head>
    <title><?= htmlspecialchars($post['title']) ?></title>
</head>
<body>
    <h1><?= htmlspecialchars($post['title']) ?></h1>
    <p><?= nl2br(htmlspecialchars($post['content'])) ?></p>
    <small>Posted on <?= $post['created_at'] ?></small>
    <p><a href="index.php">Back to blog</a></p>
</body>
</html>
