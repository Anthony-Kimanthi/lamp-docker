<?php
$servername = "db";
$username = "root";
$password = "rootpassword";
$dbname = "testdb";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    if (!empty($name)) {
        $stmt = $conn->prepare("INSERT INTO users (name) VALUES (?)");
        $stmt->bind_param("s", $name);
        $stmt->execute();
        echo "User added successfully! <a href='index.php'>Back to list</a>";
        $stmt->close();
        $conn->close();
        exit;
    }
}
?>

<h1>Add New User</h1>
<form method="POST">
    <input type="text" name="name" placeholder="Enter name" required>
    <button type="submit">Add</button>
</form>
