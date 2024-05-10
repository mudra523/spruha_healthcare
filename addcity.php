<?php
require("adminmaster.php");
include("connection.php");
if(isset($_POST['submit'])) 
{
	//echo "done";
	
	$sid=$_POST['StateID'];
	$city =$_POST['Cityname'];
	
		$sql = "INSERT INTO city(StateID,Cityname)VALUES('$sid','$city')";
	
		$result = mysqli_query($conn, $sql);

		echo '<script>window.location.href = "viewcity.php";</script>';
		
		
}
?>

        <!-- Breadcrumb Start -->
        <div class="breadcrumb-wrap">
            <div class="container-fluid">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">More Pages</a></li>
                   
                    <li class="breadcrumb-item active">City</li>
                </ul>
            </div>
        </div>
        <!-- Breadcrumb End -->
        
        <!-- Login Start -->
		<form action ="addcity.php" method ="POST">
        <div class="login">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="login-form">
                            <div class="row">
							 <div class="col-md-6">
								<label>Select Country </label>
								</div>
								
								<div class="col-md-6">
								</div>
								<div class="col-md-6">
                                   <select name="CountryID" class="form-control">
									<?php
										mysql_connect("localhost", "root", "") or die(mysql_error()); 
										mysql_select_db("spruhahealthcare") or die(mysql_error()); 
										
										$query="SELECT * FROM country";
										$result = mysql_query($query);
											echo "<option value='-1'>Select Country</option>";
											while($nt=mysql_fetch_array($result)){
											$name = $nt['Countryname'];
											$id=$nt['ID'];
											echo "<option value='$id'>" . $name . "</option>";
											}
											echo '</select>';
			
										?> 
                                </div>
								
								<div class="col-md-12">
									<label>Select State </label>
								</div>
								
								<div class="col-md-6">
                                   <select name="StateID" class="form-control">
									<?php
										mysql_connect("localhost", "root", "") or die(mysql_error()); 
										mysql_select_db("spruhahealthcare") or die(mysql_error()); 
										
										$query="SELECT * FROM state";
										$result = mysql_query($query);
											echo "<option value='-1'>Select State</option>";
											while($nt=mysql_fetch_array($result)){
											$name = $nt['Statename'];
											$id=$nt['ID'];
											echo "<option value='$id'>" . $name . "</option>";
											}
											echo '</select>';
			
										?> 
                                </div>
								<div class="col-md-6">
                                    
                                </div>
                                <div class="col-md-6">
                                    <label>City</label>
                                    <input class="form-control" name="Cityname" type="text" placeholder="city" required>
                                </div>
								
                               <div class="col-md-6">
                                    
                                </div>
                                <div class="col-md-12">
                                    <input type="submit"  name="submit" class="btn"></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Login End -->
        </form>
        <!-- Back to Top -->
        <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
        <?php
		require("userfooter.php");
		?>
    </body>
</html>
