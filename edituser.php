<?php
require("usermaster.php");
include("connection.php");

session_start();
$uId = $_SESSION["UserID"];
/*if($uId <= 0)
{
	header("Location: Login.php");
}
*/
if(isset($_POST['update']))
{	


	$Id = $_POST['ID'];
	$uCityID = $_POST['CityID'];
	$uUsername=$_POST['Username'];
	$uPassword=$_POST['Password'];
	$uCountrycode= $_POST['Countrycode'];
	$uFirstname=$_POST['Firstname'];
	
	$uLastname=$_POST['Lastname'];
	$uMobile=$_POST['Mobile'];
	$uAltmobile=$_POST['Altmobile'];
	$uEmail=$_POST['Email'];
	$uAddress=$_POST['Address'];
	$uPincode=$_POST['Pincode'];
	
	// update user data
	
$sql = "UPDATE user SET CityID= '$uCityID', Username= '$uUsername', Password= '$uPassword', Firstname='$uFirstname',Lastname='$uLastname', Countrycode='$uCountrycode',Mobile='$uMobile',AltMobile='$uAltmobile',Address='$uAddress',Pincode='$uPincode' WHERE ID=$Id";
	$result = mysqli_query($conn, $sql);
	//header("Location: viewcountry.php");
}

// Display selected user data based on id
// Getting id from url
$Id = $_GET['Id'];
//echo "ID is :" . $Id;
// Fetch user data based on id

$sql = "SELECT * FROM user WHERE ID='$Id'";
$result1 = mysqli_query($conn, $sql);

while($data = mysqli_fetch_array($result1))
{echo" done";
	$Id = $data['ID'];
	$CityID	= $data['CityID'];
	$Username= $data['Username'];
	$Password= $data['Password'];
	$Firstname = $data['Firstname'];
	$Lastname = $data['Lastname'];
	$Countrycode= $data['Countrycode'];
	$Mobile = $data['Mobile'];
	$Altmobile = $data['Altmobile'];
	$Email = $data['Email'];
	$Address = $data['Address'];
	$Pincode = $data['Pincode'];
	
}

?>
        <!-- Breadcrumb Start -->
        <div class="breadcrumb-wrap">
            <div class="container-fluid">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">More Pages</a></li>
                   
                    <li class="breadcrumb-item active">User</li>
                </ul>
            </div>
        </div>
        <!-- Breadcrumb End -->
        
        <!-- Login Start -->
		<form action ="editprofile_test.php" method ="POST">
        <div class="login">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="login-form">
                            <div class="row">
							<div class="col-md-6">
                                    <label>CityID</label>
                                    <input class="form-control" name="CityID" type="text" placeholder="CityID" required value="<?php echo htmlentities($CityID); ?>">
                                </div>
								<div class="col-md-6">
                                    
                                </div>
								<div class="col-md-6">
                                    <label>Username</label>
                                    <input class="form-control" name="Username" type="text" placeholder="Username" required value="<?php echo htmlentities($Username); ?>">
                                </div>
								<div class="col-md-6">
                                    
                                </div>
								<div class="col-md-6">
                                    <label>Password</label>
                                    <input class="form-control" name="Password" type="text" placeholder="Password" required value="<?php echo htmlentities($Password); ?>">
                                </div>
								<div class="col-md-6">
                                    
                                </div>
                                
								<div class="col-md-6">
                                    <label>Firstname</label>
                                    <input class="form-control" name="Firstname" type="text" placeholder="Firstname" required value="<?php echo htmlentities($Firstname); ?>">
                                </div>
								<div class="col-md-6">
                                    
                                </div>
								<div class="col-md-6">
                                    <label>Lastname</label>
                                    <input class="form-control" name="Lastname" type="text" placeholder="Lastname" required value="<?php echo htmlentities($Lastname); ?>">
                                </div>
								<div class="col-md-6">
                                    
                                </div>
								<div class="col-md-6">
                                    <label>Countrycode</label>
                                    <input class="form-control" name="Countrycode" type="text" placeholder="Countrycode" required value="<?php echo htmlentities($Countrycode); ?>">
                                </div>
								<div class="col-md-6">
                                    
                                </div>
								<div class="col-md-6">
                                    <label>Mobile</label>
                                    <input class="form-control" name="Mobile" type="text" placeholder="Mobile" required value="<?php echo htmlentities($Mobile); ?>">
                                </div>
								<div class="col-md-6">
                                    
                                </div>
								<div class="col-md-6">
                                    <label>AltMobile</label>
                                    <input class="form-control" name="Altmobile" type="text" placeholder="Altmobile" required value="<?php echo htmlentities($Altmobile); ?>">
                                </div>
								<div class="col-md-6">
                                    
                                </div>
								
                                    
                                </div>
								<div class="col-md-6">
                                    <label>Address</label>
                                    <input class="form-control" name="Address" type="text" placeholder="Address" required value="<?php echo htmlentities($Address); ?>">
                                </div>
								<div class="col-md-6">
                                    
                                </div>
								<div class="col-md-6">
                                    <label>Pincode</label>
                                    <input class="form-control" name="Pincode" type="text" placeholder="Pincode" required value="<?php echo htmlentities($Pincode); ?>">
                                </div>
								<div class="col-md-6">
                                    
                                </div>
                                <input type="hidden" value="<?php echo htmlentities($Id); ?>" name="ID" >
                                <div class="col-md-12">
                                    <input type="submit" name="update" value="update" class="btn"></button>
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
    </body>
</html>
