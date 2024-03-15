<?php
require("adminmaster.php");
include("connection.php");

if(isset($_POST['submit'])) {
    $cid = $_POST['ID'];
    $state = $_POST['statename'];
    
    $sql = "INSERT INTO state (CountryID, Statename) VALUES ('$cid', '$state')";
    $result = mysqli_query($conn, $sql);

    if($result) {
        echo '<script>window.location.href = "viewstate.php";</script>';
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<!-- Breadcrumb Start -->
<div class="breadcrumb-wrap">
    <div class="container-fluid">
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">More Pages</a></li>
            <li class="breadcrumb-item active">State</li>
        </ul>
    </div>
</div>
<!-- Breadcrumb End -->

<!-- Login Start -->
<form action="addstate.php" method="POST">
    <div class="login">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="login-form">
                        <table class="table">
                            <tr>
                                <td><label>Select Country</label></td>
                                <td>
                                    <select name="ID" class="form-control">
                                        <?php
                                        $query = "SELECT * FROM country";
                                        $result = mysqli_query($conn, $query);
                                        if(mysqli_num_rows($result) > 0) {
                                            echo "<option value='-1'>Select Country</option>";
                                            while($row = mysqli_fetch_assoc($result)) {
                                                echo "<option value='" . $row['ID'] . "'>" . $row['Countryname'] . "</option>";
                                            }
                                        } else {
                                            echo "<option value='-1'>No countries found</option>";
                                        }
                                        ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td><label>State</label></td>
                                <td><input class="form-control" name="statename" type="text" placeholder="State" required></td>
                            </tr>
                            <tr>
                                <td colspan="2" align="center"><input type="submit" name="submit" class="btn"></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- Login End -->

<!-- Back to Top -->
<a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

<?php
require("userfooter.php");
?> 
</body>
</html>
