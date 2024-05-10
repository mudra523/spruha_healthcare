<?php
session_start();
include_once("connection.php");
	$UserId = $_SESSION["UserID"];
	$eqId = $_POST["equipmentID"];
	
	
	$insertQuery = "INSERT INTO cart (EquipmentID,UserId) values (" .$eqId. "," .$UserId. ")";
	
	
	$result = mysqli_query($conn, $insertQuery);	
?>
