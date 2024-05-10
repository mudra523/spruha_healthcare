<?php
require("adminmaster.php");
include("connection.php");

if(isset($_POST['submit'])) {
    $CityID = $_POST['city']; // Assuming city ID is passed from the dropdown
    $Username = $_POST['Username'];
    $Password = $_POST['Password'];
    $Firstname = $_POST['Firstname'];
    $Lastname = $_POST['Lastname'];
    $Mobile = $_POST['Mobile'];
    $Altmobile = $_POST['Altmobile'];
    $Address = $_POST['Address'];
    $Pincode = $_POST['Pincode'];
    $Countrycode = $_POST['Countrycode'];

    $sql = "INSERT INTO user (CityID, Username, Password, Firstname, Lastname, Mobile, Altmobile, Address, Pincode, Countrycode)
            VALUES ('$CityID', '$Username', '$Password', '$Firstname', '$Lastname', '$Mobile', '$Altmobile', '$Address', '$Pincode', '$Countrycode')";

    $result = mysqli_query($conn, $sql);

    if($result) {
        echo "Data inserted successfully";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
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
		<form action ="Register_Run.php" method="POST">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6">    
                        <div class="register-form">
						<div class="row" width='100%'>
								<label>Registration</label>
								<table  class="table"> 
									<tr>
										<td>First Name</td>
										<td><input class="form-control" type="text" name="Firstname" placeholder="Firstname" required></td>
									</tr>
									<tr>
										<td>Last Name</td>
										<td><input class="form-control" type="text" name="Lastname" placeholder="lastname"required></td>
									</tr>
									<tr>
										<td>Username</td>
										<td><input class="form-control" type="text" name="Username" placeholder="Username-Email" required></td>
									</tr>
									<tr>
										<td>Password</td>
										<td><input class="form-control" type="password" name="Password" placeholder="Password" required></td>
									</tr>
									
									<tr>
										<td>Mobile</td>
										<td><input class="form-control" type="text" name="Mobile" placeholder="Mobile number (i.e.989XXXXXXX)" required></td>
									</tr>
									<tr>
										<td>Alt. Mobile</td>
										<td><input class="form-control" type="text" name="Altmobile" placeholder="Mobile number (i.e.989XXXXXXX)"></td>
									</tr>
									
									<tr>
										<td>Address</td>
										<td><input class="form-control" type="textarea" name="Address" placeholder="Address" required></td>
									</tr>
									<tr>
										<td>City</td>
										<td><select name="ID" class="form-control" required>
									<?php
										
										$query="SELECT * FROM city";
										$result = mysqli_query($conn,$query);
											echo "<option value='-1'>Select City</option>";
											while($nt=mysqli_fetch_array($result)){
											$name = $nt['Cityname'];
											$id=$nt['ID'];
											echo "<option value='$id'>" . $name . "</option>";
											}
											echo '</select>';
									?> 
									</tr></td>
									</tr>
									<tr>
										<td>Pincode</td>
										<td><input class="form-control" type="text" name="Pincode" placeholder="Pincode" required></td>
									</tr>
									<tr>
										<td>Country Code</td>
										<td><input class="form-control" type="text" name="Countrycode" placeholder="Countrycode i.e.(+91)" required></td>
									</tr>
								</table>
							</div>
							<div class="col-md-6">
                                    
                                </div>
                                
                                <div class="col-md-12">
                                    <input type="submit"  name="Submit" class="btn"></button>
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
