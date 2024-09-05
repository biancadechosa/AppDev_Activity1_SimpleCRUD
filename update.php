<?php include ('conn.php'); ?>
<?php
    $successMessage = "";

    if(count($_POST) > 0) {
        $sql = "UPDATE products SET 
            Name = '" . mysqli_real_escape_string($conn, $_POST['name']) . "', 
            Description = '" . mysqli_real_escape_string($conn, $_POST['description']) . "', 
            Price = '" . mysqli_real_escape_string($conn, $_POST['price']) . "', 
            Quantity = '" . mysqli_real_escape_string($conn, $_POST['quantity']) . "', 
            Created_at = '" . mysqli_real_escape_string($conn, $_POST['created_at']) . "', 
            Updated_at = '" . mysqli_real_escape_string($conn, $_POST['updated_at']) . "' 
            WHERE ID = '" . mysqli_real_escape_string($conn, $_GET['id']) . "'";
        mysqli_query($conn, $sql);
        $successMessage = "Product updated successfully.";
        header("Location:/Crud/index.php");
    }

    $result = mysqli_query($conn, "SELECT * FROM products WHERE ID = '" . mysqli_real_escape_string($conn, $_GET['id']) . "'");
    $row = mysqli_fetch_array($result);

    $Id = $row['ID'] ?? "";
    $Name = $row['Name'] ?? "";
    $Description = $row['Description'] ?? "";
    $Price = $row['Price'] ?? "";
    $Quantity = $row['Quantity'] ?? "";
    $Created_at = $row['Created_at'] ?? date('Y-m-d H:i:s');
    $Updated_at = $row['Updated_at'] ?? date('Y-m-d H:i:s');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Product</title>
</head>
<body>
<div>
    <h2>Update Product</h2>

    <form method="POST">
        <div>
            <?php if(isset($successMessage)) { echo $successMessage; } ?>
        </div>
        <div>
            <label>Name:</label>
            <input type="text" name="name" value="<?php echo htmlspecialchars($Name); ?>">
        </div>
        <div>
            <label>Description:</label>
            <input type="text" name="description" value="<?php echo htmlspecialchars($Description); ?>">
        </div>
        <div>
            <label>Price:</label>
            <input type="text" name="price" value="<?php echo htmlspecialchars($Price); ?>">
        </div>
        <div>
            <label>Quantity:</label>
            <input type="text" name="quantity" value="<?php echo htmlspecialchars($Quantity); ?>">
        </div>
        <div>
            <label>Created at:</label>
            <input type="datetime-local" name="created_at" value="<?php echo htmlspecialchars(date('Y-m-d\TH:i', strtotime($Created_at))); ?>">
        </div>
        <div>
            <label>Updated at:</label>
            <input type="datetime-local" name="updated_at" value="<?php echo htmlspecialchars(date('Y-m-d\TH:i', strtotime($Updated_at))); ?>">
        </div>
        <div>
            <button type="submit">Update</button>
            <a href="/Crud/index.php">Cancel</a>
        </div>
    </form>
</div>
</body>
</html>
