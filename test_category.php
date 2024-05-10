<?php
require("adminmaster.php");
include("connection.php");

//GET ALL COURSES
//EXECUTE QUERY
//STORE RESULTS
$sql = "SELECT * FROM category";
$result = mysqli_query($conn, $sql);
$All_Category= mysqli_fetch_array($result,MYSQLI_ASSOC);

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
		<form action ="test_category.php" method ="POST">
        <div class="login">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="login-formA
                            <div class="row">
                        
							<div class="col-md-12">
								<table width='100%' class="table">						
								<tr>
									<th>ID</th> <th>Category</th><th> Status</th>
								</tr>
								
									<?php
										//IF else statement to translate terms
										//Status value in simple terms
										//0-Inactive
										//1-Active
										foreach($All_Category as $category){?>
										<tr>
										<td><?php echo $category['Categoryname'];?></td>
										<td><?php
										
										if($category['status']=="1")
										{
											echo "Active";
										}
										else
										{
											echo "Inactive";
										}
										?>
									</td>
									<td>
									<?php
									if($course['status']=="1")
										echo "<a href=deactivate.php?id=".$category['id'].">Deactivate</a>";
									else
										echo "<a href=activate.php?id=".$category['id'].">Deactivate</a>";
									?>
								</tr>
										<?php
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
