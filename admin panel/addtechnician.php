<?php
require("adminmaster.php");
include("connection.php");
if(isset($_POST['submit'])) 
{	//echo "done";
	$Id = $_POST['ID'];
	$CityID = $_POST['CityID'];
	$Firstname=$_POST['Firstname'];
	
	$Lastname=$_POST['Lastname'];
	$Mobile=$_POST['Mobile'];
	$Altmobile=$_POST['Altmobile'];
	$Email=$_POST['Email'];
	$Address=$_POST['Address'];
	$Pincode=$_POST['Pincode'];
	
	
	$sql = "INSERT INTO technician(CityID,Firstname,Lastname,Mobile,Altmobile,Email,Address,Pincode) VALUES ('$CityID','$Firstname','$Lastname','$Mobile','$Altmobile','$Email','$Address','$Pincode')";
	$result = mysqli_query($conn, $sql);
}
?>

        <!-- Breadcrumb Start -->
        <div class="breadcrumb-wrap">
            <div class="container-fluid">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">More Pages</a></li>
                   
                    <li class="breadcrumb-item active">Technician</li>
                </ul>
            </div>
        </div>
        <!-- Breadcrumb End -->
        
        <!-- Login Start -->
		<form action ="addtechnician.php" method ="POST">
        <div class="login">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="login-form">
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Technician</label>
                                    <table width='100%' class="table"> 
										<tr>
											<td>First Name</td>
											<td><input type="text" name="Firstname" required></td>
										</tr>
										<tr>
											<td>Last Name</td>
											<td><input type="text" name="Lastname"required></td>
										</tr>
										<tr>
											<td>Mobile</td>
											<td><input type="tel" name="Mobile" required></td>
										</tr>
										<tr>
											<td>Alt. Mobile</td>
											<td><input type="tel" name="Altmobile"></td>
										</tr>
										<tr>
											<td>Email</td>
											<td><input type="email" name="Email" required></td>
										</tr>
									<tr>
									<div class="col-md-6">
										<label>Country</label>
										<select name="CID" id="countryId" class="form-control" onChange="getState(this.value);">
									<?php
										mysql_connect("localhost", "root", "") or die(mysql_error()); 
										mysql_select_db("spruhahealthcare") or die(mysql_error()); 
										
										$query="SELECT * FROM country order by ID desc";
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

									<div class="col-md-6">
									<label>State</label>
                                  <select name="stateId" class="form-control" id="state-list" class="form-control" onChange="getCity(this.value);">
									<option value="">Select State</option>
								  </select>
									</div>
									<div class="col-md-6">
									<label>City</label>
                                   
									<select name="CityID" class="form-control" id="city-list" class="form-control">
										<option value="">Select City</option>
									</select>
							
									</div>
									</tr>
										<tr>
											<td>Address</td>
											<td><input type="textarea" name="Address" required></td>
										</tr>
										<tr>
											<td>Pincode</td>
											<td><input type="text" name="Pincode" required></td>
										</tr>
								</table>
                                </div>
								<div class="col-md-6">
                                    
                                </div>
                                
                                <div class="col-md-12">
                                    <input type="submit"  name="submit" value= "submit" class="btn"></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Country End -->
        </form>
        <!-- Back to Top -->
        <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
		<?php
		require("userfooter.php");
	   ?> 
		<!-- JavaScript Libraries -->
        <!--<script src="js/jquery-3.4.1.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
        <script src="lib/easing/easing.min.js"></script>
        <script src="lib/slick/slick.min.js"></script>--!>
        
        <!-- Template Javascript -->
       
		
	   <script src="js/main.js"></script>
		
			<script>
			$(document).ready(function () {
			
			});
		
	function getState(val) {
			
		debugger;
		// alert('Get State -->' + val);
		$.ajax({
		type: "POST",
		url: "getState.php",
		data:'country_id='+val,
		success: function(data){
			debugger;
			//alert('Success');
			$("#state-list").html(data);
			//alert($("#SelectedStateId").val());	
			//$("#state-list").val($("#SelectedStateId").val());
			
			//getCity();
			}
		});
	}
	
	function getCity(val) {
		// alert('Get City -->' + val);
		$.ajax({
		type: "POST",
		url: "getcity.php",
		data:'state_id='+val,
		success: function(data){			
			debugger;
			// alert('Success');
			$("#city-list").html(data);
			//alert($("#SelectedStateId").val());
			$("#city-list").val($("#SelectedCityId").val());
			
			//getCity();
			}
		});
	}
	
	
	
		
	</script>
    </body>
</html>

