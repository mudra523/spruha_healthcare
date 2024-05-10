<?php
// include database connection file
include("connection.php");

// Get id from URL to delete that user
$Id = $_GET['Id'];

$sql = "DELETE FROM country WHERE ID=$Id";
$result = mysqli_query($conn, $sql);
// Delete user row from table based on given id
//$result = mysqli_query($mysqli, "DELETE FROM country WHERE Id=$Id");

// After delete redirect to Home, so that latest user list will be displayed.
header("Location:viewcountry.php");
?>

