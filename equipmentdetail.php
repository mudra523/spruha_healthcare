<?php
session_start();

require("usermaster.php");
include("connection.php");
//$categoryId = $_GET['Id'];

$sqlCategory = "SELECT * from category";
$categoryList = mysqli_query($conn, $sqlCategory);


$equipmentId = $_GET['Id'];


$sqlEquipmentDetail="SELECT * from equipment where ID=" .$equipmentId. ";";
$equipmentDetail= mysqli_query($conn, $sqlEquipmentDetail);

$sqlCategoryList = "SELECT * from category";
$CategoryList = mysqli_query($conn, $sqlCategoryList);

$sqlCompanyList="SELECT Company, Count(1) As Total from equipment Group By Company order by Count(1) DESC";
$companyList = mysqli_query($conn, $sqlCompanyList);

$sqlCompanyList1="SELECT Company, Count(1) As Total from equipment Group By Company order by Count(1) DESC";
$companyList1 = mysqli_query($conn, $sqlCompanyList1);


$sqlRelatedProducts="SELECT * FROM equipment e where e.Qty > 0 AND e.categoryID in (Select eq.categoryID from equipment eq where eq.ID = " .$equipmentId. ") ORDER BY ID DESC LIMIT 0 , 3";
$relatedProducts = mysqli_query($conn, $sqlRelatedProducts);


?>

        <!-- Breadcrumb Start -->
        <div class="breadcrumb-wrap">
            <div class="container-fluid">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Products</a></li>
                    <li class="breadcrumb-item active">Product Detail</li>
                </ul>
            </div>
        </div>
        <!-- Breadcrumb End -->
        
        <!-- Product Detail Start -->
        <div class="product-detail">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="product-detail-top">
                            <div class="row">
                                <div class="col-md-5">
								<?php 
							while($data = mysqli_fetch_assoc($equipmentDetail)) {
							?>
                                    <div class="product-slider-single normal-slider">
                                       <img src="Images/<?php echo $data[Image1]?>" alt="Product Image">
									    <img src="Images/<?php echo $data[Image2]?>" alt="Product Image">
										 <img src="Images/<?php echo $data[Image3]?>" alt="Product Image">
							 
                                    </div>
                                    <div class="product-slider-single-nav normal-slider">
										<div class="slider-nav-img"> <img src="Images/<?php echo $data[Image1]?>" alt="Product Image"></div>
                                       
										<div class="slider-nav-img"> <img src="Images/<?php echo $data[Image2]?>" alt="Product Image"></div>
                                                                              
									   <div class="slider-nav-img"> <img src="Images/<?php echo $data[Image3]?>" alt="Product Image"></div>
                                       
                                    </div>
									
                                </div>
                                <div class="col-md-7">
                                    <div class="product-content">
                                        <div class="title"><h2><?php echo $data[Name]?></h2></div>
										
                                       
										<div class="product-title">
                                            <h4><span style="color:black !important"><?php echo $data[Company]?></span></h4>
                                        </div>
 
                                        <div class="price">
                                           <h4>Price:</h4> <p><?php echo $data[Price]?>$</p>
                                        </div>
										
                                       

                                        <div class="p-color">
                                            <h4>Color:</h4>
                                     			<?php echo $data[Color]?>
                                        </div>
                                        <div class="action">
                                            
											<a class="btn" href="" onclick='addtoCart(<?php echo $data[ID]?>)'><i class="fa fa-shopping-cart"></i>Add To Cart</a>
                                        </div>
										
										
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row product-detail-bottom">
                            <div class="col-lg-12">
                                <ul class="nav nav-pills nav-justified">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-toggle="pill" href="#description">Description</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="pill" href="#specification">Specification</a>
                                    </li>
                                    
                                </ul>

                                <div class="tab-content">
                                    <div id="description" class="container tab-pane active">
                                        <h4>Product description</h4>
                                        <p>
                                            <?php echo $data[Description]?>
                                        </p>
										
                                    </div>
                                    <div id="specification" class="container tab-pane fade">
                                        <h4>Product specification</h4>
                                        <ul>
                                             <?php echo $data[Specification]?>
                                        </ul>
                                    </div>
									
									<?php }?> 
                                   
                                </div>
                            </div>
                        </div>
            
                        <div class="product">

                            <div class="row align-items-center product-slider product-slider-3">
                                <div class="col-lg-3">
								
                                    
                                </div>
                            </div>
                        </div>
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
								echo "<a href='categorylist.php?Id=$data[ID]'>$data[Categoryname]</a>";
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
        <!-- Product Detail End -->
        
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
        <?php
		require("userfooter.php");
		?>
        <!-- Footer End -->
        
        <!-- Footer Bottom Start -->
        
        <!-- Footer Bottom End -->       
        
        <!-- Back to Top -->
        <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
        
        <!-- JavaScript Libraries -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
        <script src="lib/easing/easing.min.js"></script>
        <script src="lib/slick/slick.min.js"></script>
        
        <!-- Template Javascript -->
        <script src="js/main.js"></script>
    </body>
</html>
