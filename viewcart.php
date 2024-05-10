<?php
session_start();

require("usermaster.php");
include("connection.php");

$uId = $_SESSION["UserID"];
$delID = $_GET['DeleteId'];

if($delID > 0 )
{
	$sql = "DELETE FROM cart WHERE ID=$delID";
	$result1 = mysqli_query($conn, $sql);
	echo '<script>window.location.href = "viewcart.php";</script>';
}

//$sql = "SELECT country FROM country ORDER BY Id DESC";
// $sql = "SELECT c.ID,c.Createdon,u.Firstname,u.Lastname,e.Name,e.Image1 FROM ((cart c INNER JOIN user u ON c.UserID= u.ID)
// INNER JOIN equipment e ON c.EquipmentID = e.ID) WHERE c.UserID = $uId";

/*$sql = "SELECT c.ID,u.Firstname,u.Lastname,e.Name,e.Image1 FROM cart c INNER JOIN user u ON c.UserID= u.ID
INNER JOIN equipment e ON c.EquipmentID = e.ID WHERE c.UserID = $uId";*/

$sql="Select c.Id as 'CartId', e.* from cart c INNER JOIN equipment e on e.ID = c.equipmentID WHERE c.userID = $uId";

$result = mysqli_query($conn, $sql);

?>

        <!-- Breadcrumb Start -->
        <div class="breadcrumb-wrap">
            <div class="container-fluid">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item active">Cart</li>
                </ul>
            </div>
        </div>
        <!-- Breadcrumb End -->
        
        <!-- Login Start -->
		<form action ="viewcart.php" method ="POST">
        <div class="login">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="login-form">
                            <div class="row">
                        
							<div class="col-md-12">
								<table width='100%' class="table">						
								<tr>
									 <th>Picture</th><th>Equipment Name</th><th>Price</th><th>Quantity</th> <th>Action</th>
								</tr>
								<?php  
									while($data = mysqli_fetch_array($result))
									{         
										echo "<tr>";
										
										echo "<td><img style='width:80px;' src='Images/$data[Image1]' alt='Product Image'></td>";
										
										
										echo "<td>".$data['Name']."</td>";
										
										echo "<td>".$data['Price']."</td>";
										
										echo "<td>1</td>";
										//echo "<td><a href='updatecountry.php?Id=$data[ID]'>Update</a> | <a href='deletecountry.php?Id=$data[ID]'>Delete</a></td></tr>";        
        								echo "<td>  <a href='deletecart.php?Id=$data[CartId]'>Delete</a> | <a href='checkout_test.php?Id=$data[CartId]'>Checkout</a></td></tr>";        
										
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
       <?php
	   require("userfooter.php");
	   ?> 
    </body>
</html>

