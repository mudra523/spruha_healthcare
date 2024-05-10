<?php
session_start();
include_once("connection.php");
	$UserId = $_SESSION["UserID"];
	$eqId = $_POST["equipmentID"];
	$query = "INSERT INTO wishlist (EquipmentID,UserId) values (" .$eqId. "," .$UserId. ")";
	$result = mysqli_query($conn, $query);	
?>
