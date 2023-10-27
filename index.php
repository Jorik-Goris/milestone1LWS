<!DOCTYPE html>
<html>
<head>
    <title>Custom Apache2 Image</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            text-align: center;
            margin: 0;
            padding: 0;
        }
        .container {
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 20px;
            margin: 20px auto;
            max-width: 600px;
        }
        h1 {
            color: #333;
            font-size: 24px; /* Increase the font size of h1 */
        }
        p {
            font-size: 18px;
        }
        .container-name {
            font-size: 14px; /* Decrease the font size of the container name */
            text-align: left;
            color: #888;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php
        $host = 'contsql-m1-jg';
        $user = 'root';
        $password = 'abc123!';
        $database = 'mydb';

        $conn = new mysqli($host, $user, $password, $database);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT fullname FROM users";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            echo "<h1>" . $row["fullname"] . " has reached milestone 1!!!</h1>";
            echo "<p class='container-name'>Container Name: " . gethostname() . "</p>";
        } else {
            echo "<p>No records found in the database.</p>";
        }

        $conn->close();
        ?>
    </div>
</body>
</html>
