<?php
session_start();
require("usermaster.php");
include("connection.php");
$uId = $_SESSION["UserID"];


	$sql="SELECT o.ID, u.Username,CONCAT( u.Firstname, ' ', u.Lastname )AS uname, o.Needtechnician,o.Isshipping,o.Shipment,o.Address,CASE WHEN o.Needtechnician =1 
			THEN CONCAT( t.Firstname, ' ', t.Lastname ) ELSE 'Not Required' END AS technicianname, 
			o.Orderdate, o.Totalamt	FROM `order` o	INNER JOIN user u ON o.UserID = u.ID
			LEFT JOIN Technician t ON o.TechnicianID = t.ID	WHERE u.ID = $uId";

		$result = mysqli_query($conn, $sql);

		
		//echo <script> window.location.href = "view_user.php"; </script>

?>
<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8">	
        <title>Spruha Healthcare - Care you can Trust</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="Healthcare" name="keywords">
        <meta content="Spruha Healthcare - Care you can Trust" name="description">
		
		<!-- Validation Start -->
		<script type="text/javascript">
		function validate_form()
		{
			
		}
		</script>
		<!-- Validation Start -->
		</head>

        <!-- Breadcrumb Start -->
        <div class="breadcrumb-wrap">
            <div class="container-fluid">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Order Information</a></li>
                   
                    <li class="breadcrumb-item active">User Order</li>
                </ul>
            </div>
        </div>
        <!-- Breadcrumb End -->
<body>
<form action ="vieworderuser.php" method ="POST">
        <div class="login">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="login-form">
                            <div class="row">
                        
							<div class="col-md-12">
								<table width='100%' class="table">						
								<tr>
								<th>Username</th><th width=15%>Customer Name</th><th>Need Technician</th><th>Shipping</th><th>Shipment</th><th>Address</th><th width=15%>Order Date</th><th>Action</th>
									 
								</tr>
								<?php  
									while($data = mysqli_fetch_array($result))
									{         
										echo "<tr>";
									
										//echo "<td>".$data['ID']."</td>";
										echo "<td>".$data['Username']."</td>";
										echo "<td>".$data['uname']."</td>";
										echo "<td>".$data['Needtechnician']."</td>";
										echo "<td>".$data['Isshipping']."</td>";
										echo "<td>".$data['Shipment']."</td>";
										echo "<td>".$data['Address']."</td>";
										//echo "<td>".$data['Totalamt']."</td>";
										echo "<td>".$data['Orderdate']."</td>";
										
										echo "<td>
												<a href='vieworderdetailsuser.php?Id=$data[ID]'>Order Details</a> </td>
												</td>
												
											</tr>";        
										
										
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
        <!-- Login Start -->
		
        <!-- Country End -->
        </form>
        <!-- Back to Top -->
        <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
       <?php
	   require("userfooter.php");
	   ?> 
    </body>
</html>
