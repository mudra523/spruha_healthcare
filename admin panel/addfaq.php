<?php
require("adminmaster.php");
include("connection.php");
if(isset($_POST['submit'])) 
{
	echo "done";
	$Question = $_POST['Question'];
	$Answer = $_POST['Answer'];
	
	$sql = "INSERT INTO faq (Question,Answer) VALUES('$Question', '$Answer')";
	//echo "radhika";
		$result = mysqli_query($conn, $sql);

		//echo '<script>window.location.href = "viewfaq.php";</script>';
		
		
}
?>

        <!-- Breadcrumb Start -->
        <div class="breadcrumb-wrap">
            <div class="container-fluid">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">More Pages</a></li>
                   
                    <li class="breadcrumb-item active">FAQ</li>
                </ul>
            </div>
        </div>
        <!-- Breadcrumb End -->
        
        <!-- Login Start -->
		<form action ="addfaq.php" method ="POST">
        <div class="login">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="login-form">
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Question</label>
                                    <input class="form-control" name="Question" type="text" placeholder="Question" required>
                                </div>
								<div class="col-md-6">
                                    <label>Answer</label>
                                    <input class="form-control" name="Answer" type="text" placeholder="Answer" required>
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
