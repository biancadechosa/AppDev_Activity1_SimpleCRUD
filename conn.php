
    <?php
    $dbserver = "localhost";
    $username = "root";
    $password = "";
    $dbname = "laragon";

    $conn = new mysqli($dbserver, $username, $password, $dbname);

    if (!$conn) {
        die("connection failed: " . mysqli_connect_error());
    }
    echo " ";

    $sql = "SELECT * FROM products"
    ?>
 