<?php include ('conn.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
</head>
<body>
    <div>
        <h2>List of Products</h2>
        <a href="/Crud/insert.php">Add New Product</a>
        <br>
        <?php
            $sql = "SELECT * FROM products";
            $result = $conn->query($sql);
            
            if ($result->num_rows > 0) {
                echo "<table border='1' cellpadding='10'>";

                echo "<tr>";
                echo "<th>Id</th>";
                echo "<th>Name</th>";
                echo "<th>Description</th>";
                echo "<th>Price</th>";
                echo "<th>Quantity</th>";
                echo "<th>Created at</th>";
                echo "<th>Updated at</th>";
                echo "<th>Action</th>";
                
                echo "</tr>";

                while($row = $result->fetch_assoc()) {
                    echo "
                    <tr>
                    <td>{$row['ID']}</td>
                    <td>{$row['Name']}</td>
                    <td>{$row['Description']}</td>
                    <td>{$row['Price']}</td>
                    <td>{$row['Quantity']}</td>
                    <td>{$row['Created_at']}</td>
                    <td>{$row['Updated_at']}</td>
                    <td>
                    <a href='/Crud/update.php?id={$row['ID']}'>Update</a>
                    <a href='/Crud/delete.php?id={$row['ID']}'>Delete</a>
                    </td>
                    </tr>
                    ";
                }

                echo "</table>";

            } 
            else {
                echo "No record found.";
            }

            if (!$result) {
                die("Invalid query: " . $conn->error);
            }
            $conn->close();
        ?>
    </div>
</body>
</html>
