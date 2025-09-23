<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Collect and sanitize inputs
    $title   = trim($_POST['title']);
    $content = trim($_POST['content']);

    if (!empty($title) && !empty($content)) {
        // Use prepared statements for safety
        $stmt = $conn->prepare("INSERT INTO posts (title, content) VALUES (?, ?)");
        $stmt->bind_param("ss", $title, $content);

        if ($stmt->execute()) {
            // Redirect back to blog homepage
            header("Location: index.php");
            exit;
        } else {
            echo "Error saving post: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Title and content cannot be empty!";
    }
} else {
    echo "Invalid request.";
}
?>
