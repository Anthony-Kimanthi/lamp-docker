<?php
$servername = "db"; // matches service name in docker-compose
$username = "root";
$password = "rootpass";
$dbname = "testdb";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// If form submitted, insert into DB
if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST["name"])) {
    $name = $conn->real_escape_string($_POST["name"]);
    $sql = "INSERT INTO users (name) VALUES ('$name')";
    if ($conn->query($sql) === TRUE) {
        echo "New user added successfully.<br>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Fetch all users
$result = $conn->query("SELECT id, name FROM users");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Users in testdb.users</title>
</head>
<body>
    <h1>Users in testdb.users</h1>

    <form method="post">
        <input type="text" name="name" placeholder="Enter name">
        <button type="submit">Add User</button>
    </form>

    <h2>Current Users:</h2>
    <ul>
        <?php while ($row = $result->fetch_assoc()): ?>
            <li><?php echo $row["id"] . " - " . $row["name"]; ?></li>
        <?php endwhile; ?>
    </ul>
</body>
</html>

<?php $conn->close(); ?>
