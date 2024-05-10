<?php
require("usermaster.php");
include("connection.php");

$delID = $_GET['DeleteId'];

if($delID > 0 )
{
	$sql = "DELETE FROM category WHERE Id=$delID";
	$result1 = mysqli_query($conn, $sql);
	echo '<script>window.location.href = "viewcategory.php";</script>';
}

//$sql = "SELECT country FROM country ORDER BY Id DESC";
$sql = "SELECT Categoryname FROM category";
$result = mysqli_query($conn, $sql);

?>

        <!-- Breadcrumb Start -->
        <div class="breadcrumb-wrap">
            <div class="container-fluid">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item active">Category</li>
                </ul>
            </div>
        </div>
        <!-- Breadcrumb End -->
        
        <!-- Login Start -->
		<form action ="viewcategoryuser.php" method ="POST">
        <div class="login">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="login-form">
                            <div class="row">
                        
							<div class="col-md-12">
								<table  class="table">						
								<tr>
									 <th>Category</th> 
								</tr>
								<?php  
									while($data = mysqli_fetch_array($result))
									{         
										echo "<tr>";
									
										echo "<td>".$data['Categoryname']."</td>";
										
        								//echo "<td><a href='updatecategory.php?Id=$data[Id]'>Update</a> | <a href='deletecategory.php?Id=$data[Id]'>Delete</a></td></tr>";        
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

