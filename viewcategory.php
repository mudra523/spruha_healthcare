<?php
require("adminmaster.php");
include("connection.php");


//$sql = "SELECT country FROM country ORDER BY Id DESC";
$sql = "SELECT * FROM category";
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
		<form action ="viewcategory.php" method ="POST">
        <div class="login">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="login-formA
                            <div class="row">
                        
							<div class="col-md-12">
								<table width='100%' class="table">						
								<tr>
									 <th>Category</th><th>Status</th> <th>Action</th>
								</tr>
								<?php  
									while($data = mysqli_fetch_array($result))
									{         
										echo "<tr>";
										//echo "<td>".$data['CategoryID']"."</td>";
										echo "<td>".$data['Categoryname']."</td>";
										if($data['Status']=="1")
											echo "<td>"."Active"."</td>";
										else
											echo "<td>"."Inactive"."</td>";
										
										
        								echo "<td><a href='updatecategory.php?Id=$data[ID]'>Update</a> | <a href='deletecategory.php?Id=$data[ID]'>Delete</a></td></tr>";        
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

