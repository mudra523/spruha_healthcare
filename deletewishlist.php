<? ob_start(); ?>


<?php
// include database connection file
include("connection.php");

// Get id from URL to delete that user
$Id = $_GET['Id'];

$sql = "DELETE FROM wishlist WHERE ID=$Id";

echo $sql;

$result = mysqli_query($conn, $sql);
// Delete user row from table based on given id
//$result = mysqli_query($mysqli, "DELETE FROM category WHERE Id=$Id");

// After delete redirect to Home, so that latest user list will be displayed.
//header("Location:home.php");
echo '<script>window.location.href = "wishlist.php";</script>';

?>
<? ob_flush(); ?>