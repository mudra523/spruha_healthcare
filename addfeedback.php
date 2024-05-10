<?php
session_start();

require("usermaster.php");
include("connection.php");
if(isset($_POST['submit'])) 
{
	
	$UserId = $_SESSION["UserID"];
	$Feedback = $_POST['Feedback'];
	
		
	$sql = "INSERT INTO feedback (UserID,Feedback) VALUES('$UserId', '$Feedback')";
			
	$result = mysqli_query($conn, $sql);

		
		
}
?>

        <!-- Breadcrumb Start -->
        <div class="breadcrumb-wrap">
            <div class="container-fluid">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">More Pages</a></li>
                   
                    <li class="breadcrumb-item active">Feedback</li>
                </ul>
            </div>
        </div>
        <!-- Breadcrumb End -->
        
        <!-- Login Start -->
		<form action ="addfeedback.php" method ="POST">
        <div class="login">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="login-form">
                            <div class="row">
                               <div class="col-md-6">
                                    <label>Feedback</label>
									<textarea class="form-control" name="Feedback" rows="4" cols="50" required></textarea>
                                 
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
    </body>
</html>
