<!DOCTYPE html>
<html>
<head>
    <title>Custom Apache2 Image</title>
</head>
<body>
    <?php
    $host = 'contsql-m1-jg'; // This is the MySQL container hostname
    $user = 'root'; // Your MySQL username
    $password = 'abc123!'; // Your MySQL password
    $database = 'mydb'; // Your MySQL database name

    // Create a MySQL connection
    $conn = new mysqli($host, $user, $password, $database);

    // Check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Fetch data from the database
    $sql = "SELECT fullname FROM users"; // Replace with your actual table name
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo "Container Name: " . gethostname() . "<br>"; // Display the container name
        echo $row["fullname"] . "<p> has reached milestone 1!!! </p>";
    } else {
        echo "No records found in the database.";
    }

    $conn->close();
    ?>
</body>
</html>
