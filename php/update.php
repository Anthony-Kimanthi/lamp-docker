<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $id      = intval($_POST['id']);
    $title   = trim($_POST['title']);
    $content = trim($_POST['content']);

    if (!empty($title) && !empty($content)) {
        $stmt = $conn->prepare("UPDATE posts SET title = ?, content = ? WHERE id = ?");
        $stmt->bind_param("ssi", $title, $content, $id);

        if ($stmt->execute()) {
            header("Location: index.php");
            exit;
        } else {
            echo "Error updating post: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Title and content cannot be empty!";
    }
} else {
    echo "Invalid request.";
}
?>
