<?php
include 'db.php';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']); // ensure it's an integer

    $stmt = $conn->prepare("DELETE FROM posts WHERE id = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        header("Location: index.php");
        exit;
    } else {
        echo "Error deleting post: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "No post ID provided.";
}
?>
