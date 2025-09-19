<?php include 'db.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>My Docker Blog</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 40px; }
        h1 { color: #444; }
        .post { margin-bottom: 20px; }
        .title { font-weight: bold; font-size: 18px; }
        .content { margin-top: 5px; }
    </style>
</head>
<body>
    <h1>My Blog</h1>

    <?php
    $result = $conn->query("SELECT * FROM posts ORDER BY id DESC");

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<div class='post'>";
            echo "<div class='title'>" . htmlspecialchars($row['title']) . "</div>";
            echo "<div class='content'>" . htmlspecialchars($row['content']) . "</div>";
            echo "</div>";
        }
    } else {
        echo "No posts yet!"
    }
    ?>
</body>
</html>

