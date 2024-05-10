<?php
require("usermaster.php");
include("connection.php");

$delID = $_GET['DeleteId'];

if($delID > 0 )
{
	$sql = "DELETE FROM equipment WHERE Id=$delID";
	$result1 = mysqli_query($conn, $sql);
	//echo '<script>window.location.href = "viewcountry.php";</script>';
}

//$sql = "SELECT country FROM country ORDER BY Id DESC";
$sql = "SELECT Name,Qty,Price,Description,Color,Company,Image1 FROM equipment";
$result = mysqli_query($conn, $sql);

?>

        <!-- Breadcrumb Start -->
        <div class="breadcrumb-wrap">
            <div class="container-fluid">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">More Pages</a></li>
                   
                    <li class="breadcrumb-item active">Equipment</li>
                </ul>
            </div>
        </div>
        <!-- Breadcrumb End -->
        
        <!-- Login Start -->
		<form action ="viewequipment.php" method ="POST">
        <div class="login">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="login-form">
                            <div class="row">
                        
							<div class="col-md-12">
								<table width='100%' class="table">						
								<tr>
									 <th>Equipment</th> <th>Qty</th><th>Price</th><th>Description</th><th>Specification</th><th>Color</th><th>Company</th><th>Image</th>
								</tr>
								<?php  
									while($data = mysqli_fetch_array($result))
									{         
										echo "<tr>";
									
										echo "<td>".$data['Name']."</td>";
										echo "<td>".$data['Qty']."</td>";
										echo "<td>".$data['Price']."</td>";
										echo "<td>".$data['Description']."</td>";
                                        echo "<td>".$data['Specification']."</td>";
										echo "<td>".$data['Color']."</td>";
										echo "<td>".$data['Company']."</td>";
										//echo "<td>".$data['Image1']."</td>";
										
										
        								//echo "<td><a href='update_technician.php?Id=$data[Id]'>Update</a> | <a href='deletetechnician.php?Id=$data[Id]'>Delete</a></td></tr>";        
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


