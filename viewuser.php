<?php
require("adminmaster.php");
include("connection.php");

$delID = 0;// $_GET['UserID'];

if($delID > 0 )
{
	$sql = "DELETE FROM user WHERE ID=$delID";
	$result1 = mysqli_query($conn, $sql);
	//echo '<script>window.location.href = "viewcountry.php";</script>';
}

//$sql = "SELECT country FROM country ORDER BY Id DESC";
$sql = "SELECT u.ID,u.Username,u.Password,u.Firstname,u.Lastname,u.Countrycode,u.Mobile,u.Altmobile,u.Address,u.Pincode,c.Cityname FROM user u LEFT JOIN city c ON u.CityID = c.ID ORDER BY u.ID DESC";
$result = mysqli_query($conn, $sql);

?>

        <!-- Breadcrumb Start -->
        <div class="breadcrumb-wrap">
            <div class="container-fluid">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">More Pages</a></li>
                   
                    <li class="breadcrumb-item active">User Profile</li>
                </ul>
            </div>
        </div>
        <!-- Breadcrumb End -->
        
        <!-- Login Start -->
		<form action ="viewuser.php" method ="POST">
        <div class="login">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="login-form">
                            <div class="row">
                        
							<div class="col-md-12">
								<table width='100%' class="table">						
								<tr>
									<th>ID</th><th>Cityname</th><th>Username</th><th>Firstname</th> <th>Lastname</th><th>Countrycode</th><th>Mobile</th><th>AltMobile</th><th>Address</th><th>Pincode</th>
									
								</tr>
								<?php  
									while($data = mysqli_fetch_array($result))
									{         
										echo "<tr>";
										echo "<td>".$data['ID']."</td>";
										echo "<td>".$data['Cityname']."</td>";
										echo "<td>".$data['Username']."</td>";
										//echo "<td>".$data['']."</td>";
										echo "<td>".$data['Firstname']."</td>";
										echo "<td>".$data['Lastname']."</td>";
										echo "<td>".$data['Countrycode']."</td>";
										echo "<td>".$data['Mobile']."</td>";
										echo "<td>".$data['Altmobile']."</td>";
										echo "<td>".$data['Address']."</td>";
										echo "<td>".$data['Pincode']."</td>";
										
        								
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


