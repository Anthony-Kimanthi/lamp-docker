<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    die("Access denied: Admins only.");
}
?>

<?php
include 'db.php';

if (!isset($_GET['id'])) {
    die("No post ID provided.");
}

$id = intval($_GET['id']);
$stmt = $conn->prepare("SELECT * FROM posts WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    die("Post not found!");
}

$post = $result->fetch_assoc();
$stmt->close();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Post</title>
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
    <h1>Edit Post</h1>
    <form method="POST" action="update.php">
        <input type="hidden" name="id" value="<?php echo $post['id']; ?>">

        <label for="title">Title</label>
        <input type="text" name="title" value="<?php echo htmlspecialchars($post['title']); ?>" required>

        <label for="content">Content</label>
        <textarea name="content" rows="5" required><?php echo htmlspecialchars($post['content']); ?></textarea>

        <button type="submit">Update</button>
    </form>
    <p><a href="index.php">Back to blog</a></p>
</body>
</html>
