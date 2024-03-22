<?php
// Include database connection file
include("connection.php");

// Check if 'Id' parameter is set and is a non-empty numeric value in the URL
if(isset($_GET['Id']) && is_numeric($_GET['Id']) && $_GET['Id'] > 0) {
    // Get Id from URL to delete the equipment
    $Id = $_GET['Id'];

    // Delete the equipment row from the table based on the given Id
    $sql = "DELETE FROM equipment WHERE ID = $Id";

    // Perform the deletion query
    if(mysqli_query($conn, $sql)) {
        // If deletion is successful, redirect to viewequipment.php
        header("Location: viewequipment.php");
        exit(); // Ensure script execution stops after redirection
    } else {
        // Display error message if there's an issue with the query
        echo "Error deleting record: " . mysqli_error($conn);
    }
} else {
    // If 'Id' parameter is not set, display an error message
    echo "Error: Invalid or missing 'Id' parameter in URL.";
}
?>
