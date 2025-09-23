<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $title = $mysqli->real_escape_string($_POST['title']);
    $content = $mysqli->real_escape_string($_POST['content']);

    $mysqli->query("INSERT INTO posts (title, content) VALUES ('$title', '$content')");

    header("Location: index.php");
    exit;
} else {
    // If accessed directly (not via form), redirect
    header("Location: add.php");
    exit;
}
?>
