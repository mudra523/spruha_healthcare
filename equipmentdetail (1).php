<?php
require("usermaster.php");
include("connection.php");
//$categoryId = $_GET['Id'];

$sqlEquipmentDetail="SELECT * from equipment where ID=40";
$equipmentDetail= mysqli_query($conn, $sqlEquipmentDetail);

$sqlCategoryList = "SELECT * from category";
$CategoryList = mysqli_query($conn, $sqlCategoryList);

$sqlCompanyList="SELECT Company, Count(1) As Total from equipment Group By Company order by Count(1) DESC";
$companyList = mysqli_query($conn, $sqlCompanyList);

$sqlCompanyList1="SELECT Company, Count(1) As Total from equipment Group By Company order by Count(1) DESC";
$companyList1 = mysqli_query($conn, $sqlCompanyList1);

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        

        <!-- Favicon -->
        

        <!-- Google Fonts -->
        

        <!-- CSS Libraries -->
        

        <!-- Template Stylesheet -->
       
    </head>

    <body>
        <!-- Top bar Start -->
        
        <!-- Top bar End -->
        
        <!-- Nav Bar Start -->
        
        <!-- Nav Bar End -->      
        
        <!-- Bottom Bar Start -->
        
        <!-- Bottom Bar End --> 
        
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
                            <div class="row align-items-center">
                                <div class="col-md-5">
								<?php 
							while($data = mysqli_fetch_assoc($equipmentDetail)) {
							?>
                                    <div class="product-slider-single normal-slider">
                                        <img src="Images/<?php echo $data[Image1]?>" alt="Product Image">
                                       <!-- <img src="img/product-3.jpg" alt="Product Image">
                                        <img src="img/product-5.jpg" alt="Product Image">
                                        <img src="img/product-7.jpg" alt="Product Image">
                                        <img src="img/product-9.jpg" alt="Product Image">
                                        <img src="img/product-10.jpg" alt="Product Image">-->
                                    </div>
                                    <div class="product-slider-single-nav normal-slider">
                                        <div class="slider-nav-img"><img src="img/product-1.jpg" alt="Product Image"></div>
                                        <div class="slider-nav-img"><img src="img/product-3.jpg" alt="Product Image"></div>
                                        <div class="slider-nav-img"><img src="img/product-5.jpg" alt="Product Image"></div>
                                        <div class="slider-nav-img"><img src="img/product-7.jpg" alt="Product Image"></div>
                                        <div class="slider-nav-img"><img src="img/product-9.jpg" alt="Product Image"></div>
                                        <div class="slider-nav-img"><img src="img/product-10.jpg" alt="Product Image"></div>
                                    </div>
                                </div>
								
                                <div class="col-md-7">
                                    <div class="product-content">
                                        <div class="title"><h2><?php echo "$data[Name]"?></h2></div>
                                         <div class="product-title">
                                            <span style="color:black !important"><?php echo $data[Company]?></span>
                                        </div>
 
                                        <div class="price">
                                            <h4><?php echo $data[Price]?> <span> INR </span></h4>
                                        </div>
                                        <div class="quantity">
                                            <h4>Quantity:</h4>
                                            <div class="qty">
                                                <button class="btn-minus"><i class="fa fa-minus"></i></button>
                                                <input type="text" value="1">
                                                <button class="btn-plus"><i class="fa fa-plus"></i></button>
                                            </div>
                                        </div>
                                        <div class="p-size">
                                            <h4>Size:</h4>
                                            <div class="btn-group btn-group-sm">
                                                <button type="button" class="btn">S</button>
                                                <button type="button" class="btn">M</button>
                                                <button type="button" class="btn">L</button>
                                                <button type="button" class="btn">XL</button>
                                            </div> 
                                        </div>
                                        <div class="p-color">
                                            <h4>Color:</h4>
                                            <div class="btn-group btn-group-sm">
                                                <button type="button" class="btn">White</button>
                                                <button type="button" class="btn">Black</button>
                                                <button type="button" class="btn">Blue</button>
                                            </div> 
                                        </div>
                                        <div class="action">
                                            <a class="btn" href="#"><i class="fa fa-shopping-cart"></i>Add to Cart</a>
                                            <a class="btn" href="#"><i class="fa fa-shopping-bag"></i>Buy Now</a>
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
											<?php echo "$data[Description]"?>
                                        </p>
                                    </div>
                                    <div id="specification" class="container tab-pane fade">
                                        <h4>Product specification</h4>
                                        <ul>
                                            <?php echo "$data[Specification]"?>
                                        </ul>
                                    </div>
                                   
                                    </div>
                                </div>
                            </div>
                        </div>
                                                          
                         <?php 
						 }
						 ?>

                        <div class="product">
                            <div class="section-header">
                                <h1>Related Products</h1>
                            </div>

                            <div class="row align-items-center product-slider product-slider-3">
                                <div class="col-lg-3">
                                    <div class="product-item">
                                        <div class="product-title">
                                            <a href="#">Product Name</a>
                                            <div class="ratting">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                        </div>
                                        <div class="product-image">
                                            <a href="product-detail.html">
                                                <img src="img/product-10.jpg" alt="Product Image">
                                            </a>
                                            <div class="product-action">
                                                <a href="#"><i class="fa fa-cart-plus"></i></a>
                                                <a href="#"><i class="fa fa-heart"></i></a>
                                                <a href="#"><i class="fa fa-search"></i></a>
                                            </div>
                                        </div>
                                        <div class="product-price">
                                            <h3><span>$</span>99</h3>
                                            <a class="btn" href=""><i class="fa fa-shopping-cart"></i>Buy Now</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="product-item">
                                        <div class="product-title">
                                            <a href="#">Product Name</a>
                                            <div class="ratting">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                        </div>
                                        <div class="product-image">
                                            <a href="product-detail.html">
                                                <img src="img/product-8.jpg" alt="Product Image">
                                            </a>
                                            <div class="product-action">
                                                <a href="#"><i class="fa fa-cart-plus"></i></a>
                                                <a href="#"><i class="fa fa-heart"></i></a>
                                                <a href="#"><i class="fa fa-search"></i></a>
                                            </div>
                                        </div>
                                        <div class="product-price">
                                            <h3><span>$</span>99</h3>
                                            <a class="btn" href=""><i class="fa fa-shopping-cart"></i>Buy Now</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="product-item">
                                        <div class="product-title">
                                            <a href="#">Product Name</a>
                                            <div class="ratting">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                        </div>
                                        <div class="product-image">
                                            <a href="product-detail.html">
                                                <img src="img/product-6.jpg" alt="Product Image">
                                            </a>
                                            <div class="product-action">
                                                <a href="#"><i class="fa fa-cart-plus"></i></a>
                                                <a href="#"><i class="fa fa-heart"></i></a>
                                                <a href="#"><i class="fa fa-search"></i></a>
                                            </div>
                                        </div>
                                        <div class="product-price">
                                            <h3><span>$</span>99</h3>
                                            <a class="btn" href=""><i class="fa fa-shopping-cart"></i>Buy Now</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="product-item">
                                        <div class="product-title">
                                            <a href="#">Product Name</a>
                                            <div class="ratting">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                        </div>
                                        <div class="product-image">
                                            <a href="product-detail.html">
                                                <img src="img/product-4.jpg" alt="Product Image">
                                            </a>
                                            <div class="product-action">
                                                <a href="#"><i class="fa fa-cart-plus"></i></a>
                                                <a href="#"><i class="fa fa-heart"></i></a>
                                                <a href="#"><i class="fa fa-search"></i></a>
                                            </div>
                                        </div>
                                        <div class="product-price">
                                            <h3><span>$</span>99</h3>
                                            <a class="btn" href=""><i class="fa fa-shopping-cart"></i>Buy Now</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="product-item">
                                        <div class="product-title">
                                            <a href="#">Product Name</a>
                                            <div class="ratting">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                        </div>
                                        <div class="product-image">
                                            <a href="product-detail.html">
                                                <img src="img/product-2.jpg" alt="Product Image">
                                            </a>
                                            <div class="product-action">
                                                <a href="#"><i class="fa fa-cart-plus"></i></a>
                                                <a href="#"><i class="fa fa-heart"></i></a>
                                                <a href="#"><i class="fa fa-search"></i></a>
                                            </div>
                                        </div>
                                        <div class="product-price">
                                            <h3><span>$</span>99</h3>
                                            <a class="btn" href=""><i class="fa fa-shopping-cart"></i>Buy Now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Side Bar Start -->
                    <div class="col-lg-4 sidebar">
                        <div class="sidebar-widget category">
                            <h2 class="title">Category</h2>
                            <nav class="navbar bg-light">
							<?php
								while($data = mysqli_fetch_array($CategoryList))
									{         
							?>
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                 <?php
								echo "<a href='categorylist.php?Id=$data[ID]'>$data[Categoryname]</a>";
								?>
                                </li>
								<?php
								}?>
                                
                            </ul>
                        </nav>
                        </div>
                        
                        <div class="sidebar-widget widget-slider">
                            <div class="sidebar-slider normal-slider">
                                <div class="product-item">
                                    <div class="product-title">
                                        <a href="#">Product Name</a>
                                        <div class="ratting">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                    </div>
                                    <div class="product-image">
                                        <a href="product-detail.html">
                                            <img src="img/product-7.jpg" alt="Product Image">
                                        </a>
                                        <div class="product-action">
                                            <a href="#"><i class="fa fa-cart-plus"></i></a>
                                            <a href="#"><i class="fa fa-heart"></i></a>
                                            <a href="#"><i class="fa fa-search"></i></a>
                                        </div>
                                    </div>
                                    <div class="product-price">
                                        <h3><span>$</span>99</h3>
                                        <a class="btn" href=""><i class="fa fa-shopping-cart"></i>Buy Now</a>
                                    </div>
                                </div>
                                <div class="product-item">
                                    <div class="product-title">
                                        <a href="#">Product Name</a>
                                        <div class="ratting">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                    </div>
                                    <div class="product-image">
                                        <a href="product-detail.html">
                                            <img src="img/product-8.jpg" alt="Product Image">
                                        </a>
                                        <div class="product-action">
                                            <a href="#"><i class="fa fa-cart-plus"></i></a>
                                            <a href="#"><i class="fa fa-heart"></i></a>
                                            <a href="#"><i class="fa fa-search"></i></a>
                                        </div>
                                    </div>
                                    <div class="product-price">
                                        <h3><span>$</span>99</h3>
                                        <a class="btn" href=""><i class="fa fa-shopping-cart"></i>Buy Now</a>
                                    </div>
                                </div>
                                <div class="product-item">
                                    <div class="product-title">
                                        <a href="#">Product Name</a>
                                        <div class="ratting">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                    </div>
                                    <div class="product-image">
                                        <a href="product-detail.html">
                                            <img src="img/product-9.jpg" alt="Product Image">
                                        </a>
                                        <div class="product-action">
                                            <a href="#"><i class="fa fa-cart-plus"></i></a>
                                            <a href="#"><i class="fa fa-heart"></i></a>
                                            <a href="#"><i class="fa fa-search"></i></a>
                                        </div>
                                    </div>
                                    <div class="product-price">
                                        <h3><span>$</span>99</h3>
                                        <a class="btn" href=""><i class="fa fa-shopping-cart"></i>Buy Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="sidebar-widget brands">
                            <h2 class="title">Our Brands</h2>
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
                        
                        <!--<div class="sidebar-widget tag">
                            <h2 class="title">Tags Cloud</h2>
                            <a href="#">Lorem ipsum</a>
                            <a href="#">Vivamus</a>
                            <a href="#">Phasellus</a>
                            <a href="#">pulvinar</a>
                            <a href="#">Curabitur</a>
                            <a href="#">Fusce</a>
                            <a href="#">Sem quis</a>
                            <a href="#">Mollis metus</a>
                            <a href="#">Sit amet</a>
                            <a href="#">Vel posuere</a>
                            <a href="#">orci luctus</a>
                            <a href="#">Nam lorem</a>
                        </div>-->
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
		<?php
		require("userfooter.php");
		?>
</html>
