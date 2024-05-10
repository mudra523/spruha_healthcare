<?php
require("usermaster.php");
include ("connection.php");
if (isset($_POST['submit']))
{
	$CityID = $_POST['CityID'];
	$Username = $_POST['Username'];
	$Password = $_POST['Password'];
	$Firstname = $_POST['Firstname'];
	$Lastname = $_POST['Lastname'];
	$Countrycode = $_POST['Countrycode'];
	$Mobile = $_POST['Mobile'];
	$Altmobile = $_POST['Altmobile'];
	$Address = $_POST['Address'];
	$Pincode = $_POST['Pincode'];
	
	$sql1="select * from user where Username='$Username'";
	$res=mysqli_query($conn,$sql1);

	if (mysqli_num_rows($res) > 0) {
		// output data of each row
        $row = mysqli_fetch_assoc($res);
        if ($Username==$row['Username'])
        {
            // echo "Username is already Exsist";
			//$errors['Username'] = "Username is already Exsist!";
			$errors = "Username is already Exsist!";
		}    
    }
	else 
	{ 		
		
		$sql = "INSERT INTO user(CityID,Username,Password,Firstname,Lastname,Countrycode,Mobile,Altmobile,Address,Pincode) Values('$CityID','$Username','$Password','$Firstname','$Lastname','$Countrycode','$Mobile','$Altmobile','$Address',$Pincode)";
		// $result =  mysqli_query($conn,$sql);
		
			if (mysqli_query($conn, $sql))
			{
				$success = "Congratulation! Thank you for the registration. Please Login to access portal";
			} 
			else 
			{
				//echo "Error: " . $sql . "<br>" . mysqli_error($conn);
				//echo error('Please fill in all fields.');
				$errors = "Something went wrong!";
			}
	}
	//echo <script> window.location.href = "view_user.php"; </script>
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8">	
        <title>Spruha Healthcare - Care you can Trust</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="eCommerce HTML Template Free Download" name="keywords">
        <meta content="eCommerce HTML Template Free Download" name="description">
	<!-- Validation Start -->
		<script type="text/javascript">
		function validate_form()
{
	var m=feedback.mobile.value
	var e=feedback.username.value;
	var pswd=feedback.password.value;
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
                 
                    <li class="breadcrumb-item active">Registration</li>
                </ul>
            </div>
        </div>
        <!-- Breadcrumb End -->
        
        <!-- Login Start -->
        <div class="login">
		<form action ="Registration.php" method="POST" name="feedback" onsubmit="validate_form()" method="POST">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">    
                        <div class="register-form">
							
							<?php if(isset($errors))
							{
								echo "<div class='row'>	<div class='col-md-12 alert alert-danger alert-dismissible'> <label> 
										<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
								$errors
								</label></div></div>";}        
							?>
							
							<?php if(isset($success))
							{
								echo "<div class='row'>	<div class='col-md-12 alert alert-success alert-dismissible'> <label> 
										<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
								$success
								</label></div></div>";}        
							?>
								
							<div class="row">
							
							<div class="col-md-6">
									<label>Username</label>
                                    <input class="form-control" type="text" id="Username" name="Username" placeholder="Username (E-mail)">
							</div>
                                <div class="col-md-6">
                                    <label>Password</label>
                                    <input class="form-control" type="password" name="Password" placeholder="Password(must be 8 characters)">
                                </div>
								<div class="col-md-6">
								<label>Firstname</label>
                                    <input class="form-control" type="text" name="Firstname" placeholder="Firstname">
								</div>
								<div class="col-md-6">
									<label>Lastname</label>
                                    <input class="form-control" type="text" name="Lastname" placeholder="lastname">
								</div>
									<div class="col-md-6">
									<label>Countrycode</label>
                                    <input class="form-control" type="text" name="Countrycode" placeholder="Countrycode i.e.(+91)">
							</div>
								<div class="col-md-6">
									<label>Mobile</label>
                                    <input class="form-control" type="text" name="Mobile" placeholder="Mobile number (i.e.989XXXX)">
							</div>
							<div class="col-md-6">
									<label>Alternate Mobile</label>
                                    <input class="form-control" type="text" name="Altmobile" placeholder="Mobile number (i.e.989XXXX)">
							</div>
							<div class="col-md-6">
									<label>Address</label>
                                    <input class="form-control" type="text" name="Address" placeholder="Address">
							</div>
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
							<div class="col-md-6">
									<label>Pincode</label>
                                    <input class="form-control" type="text" name="Pincode" placeholder="Pincode">
							</div>
                                <div class="col-md-12">
									<input type ="submit" name="submit" class="btn btn-primary py-2 px-5" onclick="return checkEmailExists();">
									<input type ="reset" name="Reset" class="btn btn-primary py-2 px-5">
                                </div>
                            </div>
                        </div>
                    </div>
                   
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Login End -->
                
                <!-- Back to Top -->
        <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
        
        <!-- JavaScript Libraries -->
        <script src="js/jquery-3.4.1.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
        <script src="lib/easing/easing.min.js"></script>
        <script src="lib/slick/slick.min.js"></script>
        
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
	
	function checkEmailExists()
	{
		debugger;
		var emailId = $("#Username").val();
		// alert(emailId);
		
		$.ajax({
		type: "POST",
		url: "Register.php",
		data:'EmailId=' + emailId,
		success: function(data){
			debugger;
			if(data === "1")
			{
				// alert('Email Id already exists!');
				event.preventDefault()
				return false;		
			}else 
			{
				return true;
			}
		}
		
		});
	}
	
	</script>
    </body>
</html>
