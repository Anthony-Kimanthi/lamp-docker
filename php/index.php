<?php
session_start();
include 'db.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>My Docker Blog</title>
    <link rel="stylesheet" href="style.css">
    <style>
        body { font-family: Arial, sans-serif; margin: 40px; }
        h1 { color: #444; }
        .topbar { margin-bottom: 20px; }
        .topbar a {
            background: #28a745;
            color: white;
            padding: 8px 12px;
            text-decoration: none;
            border-radius: 5px;
        }
        .topbar a:hover { background: #218838; }
        .post { margin-bottom: 20px; padding: 10px; border-bottom: 1px solid #ddd; }
        .title { font-weight: bold; font-size: 18px; }
        .content { margin-top: 5px; }
        .date { font-size: 12px; color: gray; margin-top: 3px; }
        .actions { margin-top: 8px; }
        .actions a {
            font-size: 13px;
            color: white;
            background: #dc3545;
            padding: 5px 10px;
            text-decoration: none;
            border-radius: 4px;
        }
        .actions a:hover { background: #c82333; }
    </style>
</head>
<body>
    <h1>My Blog</h1>

    <div class="topbar">
        <?php if (isset($_SESSION['username'])): ?>
            <span>Welcome, <?= htmlspecialchars($_SESSION['username']) ?>!</span>
            <a href="logout.php">Logout</a>
            <?php if ($_SESSION['role'] === 'admin'): ?>
                <a href="add.php">+ Add New Post</a>
            <?php endif; ?>
        <?php else: ?>
            <a href="login.php">Login</a>
        <?php endif; ?>
    </div>

    <?php
    $result = $conn->query("SELECT * FROM posts ORDER BY id DESC");

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<div class='post'>";
            echo "<div class='title'>" . htmlspecialchars($row['title']) . "</div>";
            echo "<div class='content'>" . nl2br(htmlspecialchars($row['content'])) . "</div>";
            echo "<div class='date'>Posted on " . $row['created_at'] . "</div>";

            // Show actions only for admins
            if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin') {
                echo "<div class='actions'>";
                echo "<a href='edit.php?id=" . $row['id'] . "'>Edit</a> ";
                echo "<a href='delete.php?id=" . $row['id'] . "' onclick='return confirm(\"Are you sure you want to delete this post?\");'>Delete</a>";
                echo "</div>";
            }

            echo "</div>"; // close post
        }
    } else {
        echo "No posts yet!";
    }
    ?>

</body>
</html>

