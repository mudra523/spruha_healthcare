<?php
require("adminmaster.php");
include("connection.php");
		$sql="SELECT o.ID, u.Username, concat(t.Firstname , ' ' , t.Lastname) as technicianname, o.Orderdate FROM `order` o
			  INNER JOIN user u ON o.UserID = u.ID
			  INNER JOIN Technician t ON o.TechnicianID = t.ID";
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
        <!-- Login Start -->
		<form action ="vieworder.php" name="vieworder"  method ="POST">
        <div class="login">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="login-form">
                            <div class="row">
                                <div class="col-md-6">
                                   <table width='100%' class="table"> 
									<tr>
										<th>ID</th><th>Username</th><th width= 55%>Technician Name</th><th width= 55%>Order Date</th><th width=200%>Action</th>
									</tr>
									<?php 
									while($data = mysqli_fetch_array($result))
									{         
										echo "<tr>";
										
										echo "<td>".$data['ID']."</td>";
										echo "<td>".$data['Username']."</td>";
										echo "<td>".$data['technicianname']."</td>";
										echo "<td>".$data['Orderdate']."</td>";
										
        								echo "<td>
												<a href='vieworderdetails.php?Id=$data[ID]'>Order Details</a> </td>
												</td>
												
											</tr>";        
									}
	
								?>
								<!--<tr>
									<td><input type="submit" value="ViewOrderDetails"></td>
								</tr>
								<a href='vieworderdetails.php?Id=$data[ID]'>ViewOrderDetails</a> </td>-->
								</table>
                                </div>
					<div class="col-md-6">
                                    
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
