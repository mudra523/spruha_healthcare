<?php
require("usermaster.php");
include("connection.php");
$uId = $_SESSION["UserID"];
//$delID = $_GET['DeleteId'];
if(isset($_POST['update']))
{	
	$Id = $_POST['uId'];
	$pass1 = $_POST['resetpassword'];
	$pass2 = $_POST['reenterpassword'];
	if ($pass1 == $pass2)
	{
		$sql = "UPDATE user SET password='$pass1' WHERE ID='$uId'";
		$result = mysqli_query($conn, $sql);
	}
}
//$Id = $_GET['Id'];
$sql = "SELECT * FROM user WHERE ID='$uId'";
$result1 = mysqli_query($conn, $sql);

while($data = mysqli_fetch_array($result1))
{
	$Id = $data['ID'];
}
?>

        <!-- Breadcrumb Start -->
        <div class="breadcrumb-wrap">
            <div class="container-fluid">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">More Pages</a></li>
                   
                    <li class="breadcrumb-item active">Change password</li>
                </ul>
            </div>
        </div>
        <!-- Breadcrumb End -->
        
        <!-- Login Start -->
		<form action ="changepassword_test.php" method ="POST">
        <div class="login">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="login-form">
                            <div class="row">
							<input type="hidden" value="<?php echo htmlentities($Id); ?>" name="ID" >
                                <div class="col-md-6">
                                    
									<p>Enter New Password</p>
                                    <input class="form-control" name="resetpassword" type="password" placeholder="Enter New Password" required>
                                </div>
								<div class="col-md-6">
                                    <p>Re-Enter Password</p>
									<input class="form-control" name="reenterpassword" type="password" placeholder="Re-Enter Password" required>
                                </div>
                                <div class="col-md-12">
                                    <input type="submit"  name="update" value="Update" class="btn"></button>
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
    </body>
</html>
