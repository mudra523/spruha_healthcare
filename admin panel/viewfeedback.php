<?php
require("adminmaster.php");
include("connection.php");

$delID = $_GET['Id'];

if($delID > 0 )
{
	$sql = "DELETE FROM feedback WHERE ID=$delID";
	$result1 = mysqli_query($conn, $sql);
	//echo '<script>window.location.href = "viewcountry.php";</script>';
}

//$sql = "SELECT country FROM country ORDER BY Id DESC";
$sql = "SELECT f.*,us.Firstname,us.Lastname FROM feedback f INNER JOIN user us ON f.UserID = us.ID";
$result = mysqli_query($conn, $sql);

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
		<form action ="viewfeedback.php" method ="POST">
        <div class="login">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="login-form">
                            <div class="row">
                        
							<div class="col-md-12">
								<table width='100%' class="table">						
								<tr>
									 <th>Feedback</th> <th>Customer</th><th> Name</th></th><th>Action</th>
									 
								</tr>
								<?php  
									while($data = mysqli_fetch_array($result))
									{         
										echo "<tr>";
									
										echo "<td>".$data['Feedback']."</td>";
										echo "<td>".$data['Firstname']."</td>";
										echo "<td>".$data['Lastname']."</td>";
										
										
        								echo "<td><a href='updatefeedback.php?Id=$data[ID]'></a> | <a href='deletefeedback.php?Id=$data[ID]'>Delete</a></td></tr>";        
									}
	
								?>
								</table>
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


