<?php
$servername = "mysql_db"; // This is the service name defined in docker-compose
$username = "your_user";
$password = "your_password";
$dbname = "your_database";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Online Store</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1 class="mt-5">Welcome to My Online Store</h1>
        <div class="mt-4">
            <h2>Products</h2>
            <ul class="list-group">
                <?php
                $sql = "SELECT * FROM products";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    // Output data of each row
                    while($row = $result->fetch_assoc()) {
                        echo "<li class='list-group-item'>{$row['name']} - \${$row['price']}</li>";
                    }
                } else {
                    echo "<li class='list-group-item'>No products found</li>";
                }
                ?>
            </ul>
        </div>
    </div>
</body>
</html>

<?php
$conn->close();
?>
