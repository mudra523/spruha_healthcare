<?php
require("adminmaster.php");
include("connection.php");
if(isset($_POST['update']))
{	
	$Id = $_POST['userid'];
	$pass1 = $_POST['resetpassword'];
	$pass2 = $_POST['reenterpassword'];
	if ($pass1 == $pass2)
	{
		$sql = "UPDATE user SET password='$pass1' WHERE uId='$Id'";
		$result = mysqli_query($conn, $sql);
	}
}
$Id = $_GET['Id'];
$sql = "SELECT * FROM user WHERE uId='$Id'";
$result1 = mysqli_query($conn, $sql);

while($data = mysqli_fetch_array($result1))
{
	$Id = $data['uId'];
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
		<form action ="changepassword.php" method ="POST">
        <div class="login">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="login-form">
                            <div class="row">
							<input type="hidden" value="<?php echo htmlentities($Id); ?>" name="userid" >
                                <div class="col-md-6">
                                    <label>Change Password</label>
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
