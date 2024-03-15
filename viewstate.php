<?php
require("adminmaster.php");
include("connection.php");

$delID = $_GET['DeleteId'];

if($delID > 0 )
{
	$sql = "DELETE FROM state WHERE ID = $delID";
	$result1 = mysqli_query($conn, $sql);
	echo '<script>window.location.href = "viewstate.php";</script>';
}

// Fetch all users data from database
$sql = "SELECT s.ID,s.Statename,c.Countryname from state s LEFT JOIN country c on s.CountryID = c.ID";
$result = mysqli_query($conn, $sql);


?>

        <!-- Breadcrumb Start -->
        <div class="breadcrumb-wrap">
            <div class="container-fluid">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">More Pages</a></li>
                   
                    <li class="breadcrumb-item active">State</li>
                </ul>
            </div>
        </div>
        <!-- Breadcrumb End -->
        
        <!-- Login Start -->
		<form action ="viewstate.php" method ="POST">
        <div class="login">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="login-form">
                            <div class="row">
                        
							<div class="col-md-12">
								<table width='100%' class="table">						
								<tr>
									 <th>State</th> <th>Country</th> <th>Action</th>
								</tr>
								<?php  
									while($data = mysqli_fetch_array($result))
									{         
										echo "<tr>";
										
										echo "<td>".$data['Statename']."</td>";
										echo "<td>".$data['Countryname']."</td>";
        								echo "<td><a href='updatestate.php?Id=$data[ID]'>Update</a> | <a href='deletestate.php?Id=$data[ID]'>Delete</a></td></tr>";        
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
