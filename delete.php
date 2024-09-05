<?php include ('conn.php'); ?>
<?php
if (isset($_GET["id"]) ) {
    $Id = $_GET["id"];

    $sql = "DELETE FROM products WHERE id = $Id";

    $conn->query($sql);
}

header("Location:/Crud/index.php");
exit();
?>