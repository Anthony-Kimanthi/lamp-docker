<?php
$mysqli = new mysqli("mysql_db", "root", "rootpassword", "blogdb");

if ($mysqli->connect_errno) {
    die("Failed to connect to MySQL: " . $mysqli->connect_error);
}

$result = $mysqli->query("SELECT * FROM posts ORDER BY created_at DESC");
?>
<!DOCTYPE html>
<html>
<head>
    <title>My Blog</title>
</head>
<body>
    <h1>My Blog</h1>
    <a href="add.php">Add New Post</a>
    <hr>
    <?php while ($row = $result->fetch_assoc()): ?>
        <h2><a href="view.php?id=<?= $row['id'] ?>"><?= htmlspecialchars($row['title']) ?></a></h2>
        <p><?= substr(htmlspecialchars($row['content']), 0, 200) ?>...</p>
        <small>Posted on <?= $row['created_at'] ?></small>
        <hr>
    <?php endwhile; ?>
</body>
</html>
