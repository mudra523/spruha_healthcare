<?php
require("usermaster.php");
include("connection.php");
$sqlCategory = "SELECT * from category";
$categoryList = mysqli_query($conn, $sqlCategory);

	$categoryId = $_GET['ID'];
if($categoryId == "" || $categoryId < 0)
{
	$categoryId = -1;
	$selectedCategoryName = "All";
}
else 
{
	$sqlCategoryName = "SELECT * from category where ID = $categoryId";
	$categoryInfo = mysqli_query($conn, $sqlCategoryName);
	
	if($categoryInfo)
	{
		$norow = mysqli_num_rows($categoryInfo); 	
		if ($norow) 
        { 
			// echo $norow;
			
			$myData = mysqli_query($conn, $sqlCategoryName);
			while($sdata = mysqli_fetch_array($myData))
			{         
				$selectedCategoryName = $sdata['Categoryname'];
			}

			
		} 
		else 
		{
			echo "";
		}
        // close the result. 
        mysqli_free_result($categoryInfo); 
		
	}
}

$searchByText = $_GET['searchByText'];
/*if($searchByText === "")
{
	echo 'Nothing';
}	
else 
{
	echo "something";
}*/

if ($categoryId > 0)
{
	$sqlEquipment="SELECT * from equipment where CategoryID=$categoryId";
}
else 
{
	$sqlEquipment="SELECT * from equipment";
}


$equipmentList = mysqli_query($conn, $sqlEquipment);

$sqlCompanyList="SELECT Company, Count(1) As Total from equipment Group By Company order by Count(1) DESC";
$companyList = mysqli_query($conn, $sqlCompanyList);

$sqlCompanyList1="SELECT Company, Count(1) As Total from equipment Group By Company order by Count(1) DESC";
$companyList1 = mysqli_query($conn, $sqlCompanyList1);

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Spruha Healthcare - Care you can Trust</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="eCommerce HTML Template Free Download" name="keywords">
        <meta content="eCommerce HTML Template Free Download" name="description">

        <!-- Favicon -->
        <link href="img/Logo.jpg" rel="icon">

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400|Source+Code+Pro:700,900&display=swap" rel="stylesheet">

        <!-- CSS Libraries -->
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
        <link href="lib/slick/slick.css" rel="stylesheet">
        <link href="lib/slick/slick-theme.css" rel="stylesheet">

        <!-- Template Stylesheet -->
        <link href="css/style.css" rel="stylesheet">
    </head>

    <body>
        
        <!-- Breadcrumb Start -->
        <div class="breadcrumb-wrap">
            <div class="container-fluid">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Products</a></li>
                    <li class="breadcrumb-item active">Product List</li>
                </ul>
            </div>
        </div>
        <!-- Breadcrumb End -->
        
        <!-- Product List Start -->
        <div class="product-view">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="row">
						    <div class="col-md-12"> 
								    <div class="product-view-top">
										
							<?php 
							
								$iRecords = mysqli_num_rows($equipmentList);						
								if($iRecords > 0)
								{
									
							?>
								<h4> Category: <?php echo $selectedCategoryName ?>  </h4>	
										
									</div>
							</div>
							
                            <div class="col-md-12">
                                <div class="product-view-top">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="product-search">
                                                <input type="email" value="Search">
                                                <button><i class="fa fa-search"></i></button>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="product-short">
                                                <div class="dropdown">
                                                    <div class="dropdown-toggle" data-toggle="dropdown">Product short by</div>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a href="#" class="dropdown-item">Newest</a>
                                                        <a href="#" class="dropdown-item">Price</a>
                                                        <a href="#" class="dropdown-item">Company</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="product-price-range">
                                                <div class="dropdown">
                                                    <div class="dropdown-toggle" data-toggle="dropdown">Product price range</div>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a href="#" class="dropdown-item">$ 0 to $ 50</a>
                                                        <a href="#" class="dropdown-item">$51 to $100</a>
                                                        <a href="#" class="dropdown-item">$101 to $150</a>
                                                        <a href="#" class="dropdown-item">$151 to $200</a>
                                                        <a href="#" class="dropdown-item">$201 to $250</a>
                                                        <a href="#" class="dropdown-item">$251 to $300</a>
                                                        <a href="#" class="dropdown-item">$301 to $350</a>
                                                        <a href="#" class="dropdown-item">$351 to $400</a>
                                                        <a href="#" class="dropdown-item">$401 to $450</a>
                                                        <a href="#" class="dropdown-item">$451 to $500</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
							
							<?php 
								}
								else 
								{
								?>	
									<br/>
									<div class="col-md-12 alert alert-warning alert-dismissible"> 
										
											No Records found!
										
									</div>
									</div>
									</div>
							<?php	}
							?>
							
							
                            <?php
							
							while($data = mysqli_fetch_array($equipmentList))
									{  
										
									?>
                            <div class="col-md-4">
                                <div class="product-item">
                                    <div class="product-title">
									 <?php
								echo "<a href='equipmentdetail.php?Id=$data[ID]'>$data[Name]</a>";
								?>
                                        <!--<a href=""><?php echo "$data[Name]"?></a>-->
                                        <div class="product-title">
                                            <span style="color:white !important"><?php echo $data[Company]?></span>
                                        </div>
                                    </div>
                                    <div class="product-image">
                                        <a href="product-detail.html">
                                            <img style="width:200px; height:300px;" src="Images/<?php echo $data[Image1]?>" alt="Product Image">
                                        </a>
                                        <div class="product-action">
                                            <a href="#"><i class="fa fa-cart-plus"></i></a>
                                            <a href="#"><i class="fa fa-heart"></i></a>
                                            <a href="#"><i class="fa fa-search"></i></a>
                                        </div>
                                    </div>
                                    <div class="product-price">
                                        <h3><?php echo $data[Price]?> <span> $ </span></h3>
                                        <a class="btn" href="" title="Buy Now"><i class="fa fa-shopping-cart"></i></a>
                                    </div>
                                </div>
                            </div>
							<?php
								}?>
                        </div>
                        
                        <!-- Pagination Start -->
                        <div class="col-md-12" style="visibility:hidden">
                            <nav aria-label="Page navigation example">
                                <ul class="pagination justify-content-center">
                                    <li class="page-item disabled">
                                        <a class="page-link" href="#" tabindex="-1">Previous</a>
                                    </li>
                                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item">
                                        <a class="page-link" href="#">Next</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                        <!-- Pagination Start -->
                    </div>           
                    
                    <!-- Side Bar Start -->
                    <div class="col-lg-4 sidebar">
                        <div class="sidebar-widget brands">
                            <h2 class="title">Category</h2>
                            <nav class="navbar">
                                <ul class="navbar-nav">
                                  <?php
						
						while($data = mysqli_fetch_array($categoryList))
									{         
					
									?>
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <!--<a class="nav-link" href="#"><?php echo "$data[Categoryname]"?></a>-->
									     <?php
								echo "<a href='categorylist.php?ID=$data[ID]'>$data[Categoryname]</a>";
								?>
                            
                                </li>
								<?php
								}?>
                                
                                
                                </ul>
                            </nav>
                        </div>
                        
                        <div class="sidebar-widget brands">
                            <h2 class="title">Associated Company</h2>
                            <ul>
								<?php
									while($data = mysqli_fetch_array($companyList))
									{         
								?>
								<li>
									<a href="#"><?php echo "$data[Company]"?> 
									</a>
									<span>(<?php echo "$data[Total]"?>)</span>
								</li>
                                	
								<?php
								}
								?>
                            </ul>
                        </div>
                        
                    </div>
                    <!-- Side Bar End -->
                </div>
            </div>
        </div>
        <!-- Product List End -->  
        
        <!-- Brand Start -->
        <div class="brand">
            <div class="container-fluid">
                <div class="brand-slider">
                    <?php
						while($data = mysqli_fetch_array($companyList1))
						{  
					?>									
						<div class="brand-item"><label>
							<?php echo "$data[Company]"?></label>
						</div>
					<?php 
						} 
					?>
                </div>
            </div>
        </div>
        <!-- Brand End -->
        
        <!-- Footer Start -->
        
		<!-- Footer End -->
        
        <!-- Footer Bottom Start -->
		
             <!-- Footer Bottom End -->       
        
        <!-- Back to Top -->
        <?php
		require("userfooter.php");
			?>
		<!-- Template Javascript -->
        <script src="js/main.js"></script>
       
    </body>
</html>
	