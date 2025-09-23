<?php include 'db.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Add Post</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 40px; }
        h1 { color: #444; }
        form { max-width: 400px; }
        label { display: block; margin-top: 10px; }
        input[type="text"], textarea {
            width: 100%; padding: 8px; margin-top: 5px;
        }
        button { margin-top: 15px; padding: 10px 15px; }
    </style>
</head>
<body>
    <h1>Add New Post</h1>
    <form method="POST" action="save.php">
        <label for="title">Title</label>
        <input type="text" name="title" required>

        <label for="content">Content</label>
        <textarea name="content" rows="5" required></textarea>

        <button type="submit">Save</button>
    </form>
    <p><a href="index.php">Back to blog</a></p>
</body>
</html>
