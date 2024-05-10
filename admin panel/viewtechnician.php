<?php
require("adminmaster.php");
include("connection.php");

$delID = $_GET['Id'];

if($delID > 0 )
{
	$sql = "DELETE FROM technician WHERE ID=$delID";
	$result1 = mysqli_query($conn, $sql);
	//echo '<script>window.location.href = "viewcountry.php";</script>';
}

//$sql = "SELECT country FROM country ORDER BY Id DESC";
$sql = "SELECT * FROM technician ORDER BY ID DESC";
$result = mysqli_query($conn, $sql);

?>

        <!-- Breadcrumb Start -->
        <div class="breadcrumb-wrap">
            <div class="container-fluid">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">More Pages</a></li>
                   
                    <li class="breadcrumb-item active">Technician</li>
                </ul>
            </div>
        </div>
        <!-- Breadcrumb End -->
        
        <!-- Login Start -->
		<form action ="viewtechnician.php" method ="POST">
        <div class="login">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="login-form">
                            <div class="row">
                        
							<div class="col-md-12">
								<table width='100%' class="table">						
								<tr>
									 <th>Firstname</th> <th>Lastname</th><th>Mobile</th><th>Action</th>
								</tr>
								<?php  
									while($data = mysqli_fetch_array($result))
									{         
										echo "<tr>";
									
										echo "<td>".$data['Firstname']."</td>";
										echo "<td>".$data['Lastname']."</td>";
										echo "<td>".$data['Mobile']."</td>";
										
        								echo "<td><a href='update_technician.php?Id=$data[ID]'>Update</a> | <a href='deletetechnician.php?Id=$data[ID]'>Delete</a></td></tr>";        
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


