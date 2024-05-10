<?php
require("adminhome.php");
include ("connection.php");
if (isset($_POST['submit']))
{
	echo "Done";
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
		$sql = "INSERT INTO user(CityID,Username,Password,Firstname,Lastname,Countrycode,Mobile,Altmobile,Address,Pincode) Values('$CityID','$Username','$Password','$Firstname','$Lastname','$Countrycode','$Mobile',$Altmobile','$Address','$Pincode')";
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
        <meta content="eCommerce HTML Template Free Download" name="keywords">
        <meta content="eCommerce HTML Template Free Download" name="description">

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
		<form action ="Adduser.php" method="POST">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6">    
                        <div class="register-form">
                            <div class="row">
							<div class="col-md-6">
									<label>CityID</label>
                                    <input class="form-control" type="number" name="CityID" placeholder="CityID">
							</div>
							<div class="col-md-6">
									<label>Username</label>
                                    <input class="form-control" type="text" name="Username" placeholder="Username (E-mail)">
							</div>
                                <div class="col-md-6">
                                    <label>Password</label>
                                    <input class="form-control" type="text" name="Password" placeholder="Password(must be 8 characters)">
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
									<label>Pincode</label>
                                    <input class="form-control" type="text" name="Pincode" placeholder="Pincode">
							</div>
                                <div class="col-md-12">
                                    <input type ="submit" name="submit" class="btn"></button>
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
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
        <script src="lib/easing/easing.min.js"></script>
        <script src="lib/slick/slick.min.js"></script>
        
        <!-- Template Javascript -->
        <script src="js/main.js"></script>
    </body>
</html>
