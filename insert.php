<?php include ('conn.php'); ?>
<?php
    $Name = "";
    $Description = "";
    $Price = "";
    $Quantity = "";
    $Created_at = date('Y-m-d H:i:s');
    $Updated_at = date('Y-m-d H:i:s');

    $errorMessage = "";

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $Name = $_POST["name"];
        $Description = $_POST["description"];
        $Price = $_POST["price"];
        $Quantity = $_POST["quantity"];
        $Created_at = $_POST["created_at"];
        $Updated_at = $_POST["updated_at"];
    }

    do {
        if ( empty($Name) || empty($Description) || empty($Price) || empty($Quantity) || empty($Created_at || empty($Updated_at))) {
            $errorMessage = "All fields are required";
            break;
        }

        else{
            $query = "INSERT INTO products (Name, Description, Price, Quantity, Created_at, Updated_at) values('$Name', '$Description', '$Price', '$Quantity', '$Created_at', '$Updated_at')";
            $result = mysqli_query( $conn, $query);
    
            if(!$result){
                die("Query Failed". mysqli_error($conn));
            }
            else{
                header('location:index.php?insert_msg="New record added successfully"');
            }
        }
    } while (false);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
</head>
<body>
    <div class="container my-5">
    <h2>Insert Product</h2>

    <form method="POST">
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

       
            <div>
                <div>
                    <button type="submit" class="btn">Insert</button>
                    <a class="btn" href="/Crud/index.php" role="button">Cancel</a>
                </div>
            </div>
</body>
</html>