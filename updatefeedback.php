<?php
require("adminmaster.php");
include("connection.php");

//session_start();
//$uId = $_SESSION["Id"];
/*if($uId <= 0)
{
	header("Location: Login.php");
}
*/
if(isset($_POST['update']))
{	
	$Id = $_POST['ID'];
	$ufeedback=$_POST['Feedback'];
	
	
	// update user data
	
	$sql = "UPDATE feedback SET Feedback='$ufeedback' WHERE ID='$Id'";
	$result = mysqli_query($conn, $sql);
	//header("Location: viewcategory.php");
}

// Display selected user data based on id
// Getting id from url
$Id = $_GET['Id'];
//echo "ID is :" . $Id;
// Fetech user data based on id

$sql = "SELECT * FROM feedback WHERE ID='$Id'";
$result1 = mysqli_query($conn, $sql);

while($data = mysqli_fetch_array($result1))
{
	$Id = $data['ID'];
	$Feedback = $data['Feedback'];
	
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
		<form action ="updatefeedback.php" method ="POST">
        <div class="login">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="login-form">
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Feedback</label>
                                    <input class="form-control" name="Feedback" type="text" placeholder="Feedback" required value="<?php echo htmlentities($Feedback); ?>">
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
       <?php
	   require("userfooter.php");
	   ?> 
    </body>
</html>
