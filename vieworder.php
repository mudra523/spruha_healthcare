<?php
session_start();
require("adminmaster.php");
include("connection.php");

$uId = $_SESSION["UserID"];

	$sql="SELECT o.ID, u.Username, o.Needtechnician,CASE WHEN o.Needtechnician =1 
			THEN CONCAT( t.Firstname, ' ', t.Lastname ) ELSE 'Not Required' END AS technicianname, 
			o.Orderdate, o.Totalamt	FROM `order` o	INNER JOIN user u ON o.UserID = u.ID
			LEFT JOIN Technician t ON o.TechnicianID = t.ID";

		$result = mysqli_query($conn, $sql);
?>
		
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
                                <div class="col-md-12">
									<table width='100%' class="table">
									<tr>
										<th>ID</th>
										<th>Technician Name</th>
										<th>Order Date</th>
										<th>Amount</th>
										<th>Action</th>
									</tr>
									<?php 
									while($data = mysqli_fetch_array($result))
									{  
									?>
									<?php
										echo "<tr>";
										echo "<td>".$data['ID']."</td>";
										echo "<td>".$data['technicianname']."</td>";
										echo "<td>".$data['Orderdate']."</td>";
										echo "<td>".$data['Totalamt']."</td>";
										echo "<td>
												<a href='vieworderdetails.php?Id=$data[ID]'>View Details</a>";
									?>
									<?php
											if($data["Needtechnician"]== '1')
											{
												echo "&nbsp;|&nbsp; 
												<a href='updateordertechnician.php?Id=$data[ID]'>Update technician</a>";
											}
									?>
									<?php 
									
											echo "</td></tr>";
									?>			 
										
									<?php	
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
