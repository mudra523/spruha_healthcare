<?php
require_once ("dbcontroller.php");
$db_handle = new DBController();
if (! empty($_POST["country_id"])) {
    $query = "SELECT * FROM state WHERE CountryID = '" . $_POST["country_id"] . "'";
	$results = $db_handle->runQuery($query);
	
    ?>
<option value disabled selected>Select State</option>
<?php
    foreach ($results as $state) {
        ?>
<option value="<?php echo $state["ID"]; ?>"><?php echo $state["Statename"]; ?></option>
<?php
    }
}
?>