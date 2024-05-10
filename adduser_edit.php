<?php
require("adminmaster.php");
include ("connection.php");
if (isset($_POST['submit']))
{
		$ID = $_POST['ID'];
		$CityID = $_POST['CityID'];
		$Username = $_POST['Username'];
		$Password = $_POST['Password'];
		$Firstname = $_POST['Firstname'];
		$Lastname = $_POST['Lastname'];
		$Countrycode = $_POST['Mobile'];
		$Altmobile = $_POST['Altmobile'];
		$Address = $_POST['Address'];
		$Pincode = $_POST['Pincode'];
		
		
		$result =  mysqli_query($conn,$sql);
		//echo <script> window.location.href = "view_user.php"; </script>
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8">	
        <title>Spruha Healthcare - Care you can Trust</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="Healthcare" name="keywords">
        <meta content="Spruha Healthcare - Care you can Trust" name="description">
		
		<!-- Validation Start -->
		<script type="text/javascript">
		function validate_form()
{
	var m=feedback.mobile.value
	var e=feedback.username.value;
	var pswd=feedback.password.value;
	var cpswd=feedback.confirmpassword.value;
	var mo=feedback.mobile.value;
	var almo=feedback.altmobile.value;
	//var atpos=e.indexOf("@");
	//var dotpos=e.indexOf(".");
	var mob=/^[0-9]+$/;
	var altmob=/^[0-9]+$/;
	var pas=/[0-9]/;
	var pasalp=/[A-Z]/;
	var pasalps=/[a-z]/;
	var spec=/[!"#$%&'()*+,\-./:;<=>?@[\\\]^_`{|}~]/;
	var a=" ";
	if(pswd.length<8)
	{
		a+="Password length must be atleast 8 characters\n"
	}
	if(!spec.test(pswd))
	{
		a+="Password must contain atleast one special character\n"
	}
	if(!pas.test(pswd))
	{
		a+="Password must contain atleast one numeric character\n"
	}
	if(!pasalp.test(pswd))
	{
		a+="Password must contain atleast one capital character\n"
	}
	if(!pasalps.test(pswd))
	{
		a+="Password must contain atleast one small character\n"
	}
	if(pswd.length>15)
	{
		a+="Password length must not exceed 15 characters\n"
	}
	if(cpswd!=pswd)
	{
		a+="Confirm password did not match\n"
	}
	if(mo.length!=10)
	{
		a+="Enter 10 digit number in mobile number\n";	
	}
	if(almo.length!=10)
	{
		a+="Enter 10 digit number in altermobile number";	
	}
	if(feedback.mobile.value.match(mob))
	{
	}
	else
	{
		a+="\nEnter numeric values in mobile";
	}
	if(feedback.altmobile.value.match(altmob))
	{
	}
	else
	{
		a+="\nEnter numeric values in altermobile";
	}
	if(a==" ")
	{
		alert("Done");
		return true;
	}
	else
	{
		alert(a);
	}
}
		</script>
		<!-- Validation End -->

        <!-- Favicon -->
        <link href="img/favicon.ico" rel="icon">

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400|Source+Code+Pro:700,900&display=swap" rel="stylesheet">

        <!-- CSS Libraries -->
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
        <link href="lib/slick/slick.css" rel="stylesheet">
        <link href="lib/slick/slick-theme.css" rel="stylesheet">

        <!-- Template Stylesheet -->
        <link href="css/style.css" rel="stylesheet">
    </head>


    <body>
        
        <!-- Breadcrumb Start -->
        <div class="breadcrumb-wrap">
            <div class="container-fluid">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">More Page</a></li>
                 
                    <li class="breadcrumb-item active">User</li>
                </ul>
            </div>
        </div>
        <!-- Breadcrumb End -->
        
        <!-- Login Start -->
        <div class="login">
		<form name="feedback" action ="adduser_edit.php" onsubmit="validate_form()" method="POST">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6">    
                        <div class="register-form">
                            <div class="row" width='100%'>
								<label>Registration</label>
								<table width='100%' class="table"> 
									<tr>
										<td>First Name</td>
										<td><input class="form-control" type="text" name="Firstname" placeholder="Firstname" required></td>
									</tr>
									<tr>
										<td>Last Name</td>
										<td><input class="form-control" type="text" name="lastname" placeholder="lastname" required></td>
									</tr>
									<tr>
										<td>Username</td>
										<td><input class="form-control" type="text" name="username" placeholder="Username-Email" required></td>
									</tr>
									<tr>
										<td>Password</td>
										<td><input class="form-control" type="password" name="password" placeholder="Password" required></td>
									</tr>
									<tr>
										<td>Confirm Password</td>
										<td><input class="form-control" type="password" name="confirmpassword" placeholder="Confirm Password" required></td>
									</tr>
									<tr>
										<td>Country Code</td>
										<td><input class="form-control" type="text" name="countrycode" placeholder="Countrycode i.e.(+91)" required></td>
									</tr>
									<tr>
										<td>Mobile</td>
										<td><input class="form-control" type="text" name="mobile" placeholder="Mobile number (i.e.989XXXXXXX)" required></td>
									</tr>
									<tr>
										<td>Alt. Mobile</td>
										<td><input class="form-control" type="text" name="altmobile" placeholder="Mobile number (i.e.989XXXXXXX)" required></td>
									</tr>
									<tr>
										<td>Address</td>
										<td><input class="form-control" type="textarea" name="address" placeholder="Address" required></td>
									</tr>
									<tr>
										<td><label>Select City </label></td>

		
										<td><select name="CID" class="form-control">
									<?php
										mysql_connect("localhost", "root", "") or die(mysql_error()); 
										mysql_select_db("spruhahealthcare") or die(mysql_error()); 
										
										$query="SELECT * FROM city";
										$result = mysql_query($query);
											echo "<option value='-1'>Select City</option>";
											while($nt=mysql_fetch_array($result)){
											$name = $nt['Cityname'];
											$id=$nt['CityID'];
											echo "<option value='$id'>" . $name . "</option>";
											}
											echo '</select>';
			
										?> 
										</td>
									</tr>
									<tr>
										<td>Pincode</td>
										<td><input class="form-control" type="text" name="pincode" placeholder="Pincode" required></td>
									</tr>
								</table>
							</div>
							<div class="col-md-6">
                                    
                                </div>
                                
                                <div class="col-md-12">
                                    <input type="submit"  name="Submit" class="btn" ></button>
                                </div>
						</div>   
					</div>
				</div>
            </div>
		</form>
        <!-- Login End -->
                
                <!-- Back to Top -->
        <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
        
        <!-- JavaScript Libraries -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
        <script src="lib/easing/easing.min.js"></script>
        <script src="lib/slick/slick.min.js"></script>
        
        <!-- Template Javascript -->
        <script src="js/main.js"></script>
    </body>
</html>