<?php
require_once ("dbcontroller.php");
$db_handle = new DBController();
if (! empty($_POST["state_id"])) {
    $query = "SELECT * FROM city WHERE StateID = '" . $_POST["state_id"] . "'";
    $results = $db_handle->runQuery($query);
    echo $query;
	?>
	
<option value disabled selected>Select City</option>
<?php
    foreach ($results as $city) {
        ?>
<option value="<?php echo $city["ID"]; ?>"><?php echo $city["Cityname"]; ?></option>
<?php
    }
}
?>