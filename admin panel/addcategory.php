<?php
require("adminmaster.php");

include("connection.php");
if(isset($_POST['Submit'])) 
{
	
	$categoryname =$_POST['categoryname'];
	
		$sql = "INSERT INTO category(Categoryname)VALUES('$categoryname')";
	
		$result = mysqli_query($conn, $sql);

		echo '<script>window.location.href = "viewcategory.php";</script>';
		
		
}

?>

        <!-- Breadcrumb Start -->
        <div class="breadcrumb-wrap">
            <div class="container-fluid">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item active">Category</li>
                </ul>
            </div>
        </div>
        <!-- Breadcrumb End -->
        
        <!-- Login Start -->
		<form action ="addcategory.php" method ="POST">
        <div class="login">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="login-form">
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Categoryname</label>
                                    <input class="form-control" name="categoryname" type="text" placeholder="Categoryname" required>
                                    
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
        <!-- Country End -->
        </form>
        <!-- Back to Top -->
        <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
       <?php
	   require("userfooter.php");
	   ?> 
    </body>
</html>
