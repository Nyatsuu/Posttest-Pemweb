<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CART</title>
    <link rel="stylesheet" href="../css/cart.css">
</head>
<body>
    <?php
    // Establish a database connection (assuming MySQL)
    include 'koneksi.php';

    // SQL query to fetch data
    $sql = "SELECT name, SUM(quantity) AS total_quantity FROM cart GROUP BY name";
    $result = $conn->query($sql);

    // Check if there are rows in the result set
    if ($result->num_rows > 0) {
        // Start the HTML table
        echo "<table border='1'>";
        echo "<tr><th>Name</th><th>Hasil Terbaru</th></tr>";

        // Loop through each row using fetch_assoc()
        while ($row = $result->fetch_assoc()) {
            // Get the name and total quantity
            $name = $row['name'];
            $totalQuantity = $row['total_quantity'];

            // Increment quantity by 1
            $totalQuantity;

            // Display the updated quantity for each name in a table row
            echo "<tr><td>$name</td><td>$totalQuantity</td></tr>";

            // You can perform any additional actions here, such as updating the database with the new quantity
            // For instance:
            // $updateQuery = "UPDATE your_table SET quantity = $totalQuantity WHERE name = '$name'";
            // $conn->query($updateQuery);
        }

        // End the HTML table
        echo "</table>";
    } else {
        echo "No results found";
    }
    // Close the database connection
    $conn->close();
    ?>
    <a href="../index.php">Kembali ke Menu</a>

</body>
</html>
