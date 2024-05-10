<?php
session_start();
include("connection.php");
require("usermaster.php");
if(isset($_POST['Submit']))
{

	// Grab User submitted information
	$email = $_POST["username"];
	$pass = $_POST["password"];

// Connect to the database
$con = mysql_connect("localhost","root","");
	
// Select the database to use
mysql_select_db("spruhahealthcare",$con);


// Make sure we connected successfully
if(!$con)
{
    die('Connection Failed'.mysql_error());
}
	
if($email=='admin' && $pass=='admin')
{
	//$_SESSION["Emailid"] = $row['EmailId'];
	//$_SESSION["UserId"] = -1;
    echo '<script>window.location.href = "adminmaster.php";</script>';
}
else
{
	$result = mysql_query("SELECT * FROM user WHERE UserName = '$email' AND Password = '$pass'");
	
	$row = mysql_fetch_array($result);

	if($row["Username"]==$email && $row["Password"]==$pass)
	{
		$_SESSION["UserID"] = $row['ID'];
		$_SESSION["Username"] = $row['Username'];
	 echo '<script>window.location.href = "index.php";</script>';
	}
	else{
		$_SESSION["UserID"] = -1;
		
		$errors = "Invalid Username or Password!";
	}
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
        <link href="img/Logo.jpg" rel="icon">

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
      
        <!-- Nav Bar Start -->
        <div class="nav">
            <div class="container-fluid">
                <nav class="navbar navbar-expand-md bg-dark navbar-dark">
                    <a href="#" class="navbar-brand">MENU</a>
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    
                    </div>
                </nav>
            </div>
        </div>
        <!-- Nav Bar End -->      
        
      
        <!-- Breadcrumb Start -->
        <div class="breadcrumb-wrap">
            <div class="container-fluid">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                   
                    <li class="breadcrumb-item active">Login</li>
                </ul>
            </div>
        </div>
        <!-- Breadcrumb End -->
        
        <!-- Login Start -->
		<form action ="Login.php" method ="POST">
        <div class="login">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="login-form">
							<?php if(isset($errors))
							{
								echo "<div class='row'>	<div class='col-md-12 alert alert-danger alert-dismissible'> <label> 
										<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
								$errors
								</label></div></div>";}        
							?>
							
                            <div class="row">
                                <div class="col-md-6">
                                    <label>E-mail / Username</label>
                                    <input class="form-control" name="username" type="text" placeholder="E-mail / Username" required>
                                </div>
								<div class="col-md-6">
                                    
                                </div>
                                <div class="col-md-6">
                                    <label>Password</label>
                                    <input class="form-control" name="password" type="password" placeholder="Password" required>
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
        <!-- Login End -->
        </form>
        <!-- Footer Start -->
        
        <!-- Footer End -->
        
        <!-- Footer Bottom Start -->
        
        <!-- Footer Bottom End -->       
        
        <!-- Back to Top -->
        <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
        
        <!-- JavaScript Libraries -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
        <script src="lib/easing/easing.min.js"></script>
        <script src="lib/slick/slick.min.js"></script>
        <?php
		require("userfooter.php");
		?>
        <!-- Template Javascript -->
        <script src="js/main.js"></script>
    </body>
</html>
