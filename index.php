<?php
require("usermaster.php");
session_start();
include("connection.php");
$sqlCategoryList = "SELECT c.ID,c.Categoryname,Count(1) As 'Total' from category c 
LEFT JOIN equipment e ON c.ID = e.`CategoryID`
GROUP BY c.Id,c.Categoryname";
$CategoryList = mysqli_query($conn, $sqlCategoryList);

$sqlCompanyList1="SELECT Company, Count(1) As Total from equipment Group By Company order by Count(1) DESC";
$companyList1 = mysqli_query($conn, $sqlCompanyList1);

$sqlRecentProduct="SELECT * FROM equipment e where e.Qty > 0 ORDER BY ID DESC LIMIT 0 , 15";
$recentProduct = mysqli_query($conn, $sqlRecentProduct);

$sqlBanner="SELECT * FROM equipment where Qty > 0 ORDER BY ID DESC LIMIT 0 , 5";
$Banner = mysqli_query($conn, $sqlBanner);

$sqlMinimumPriceList="SELECT * FROM equipment where Qty > 0 ORDER BY price LIMIT 0 , 3";
$MinimumPriceList = mysqli_query($conn, $sqlMinimumPriceList);

$sqlFeedback="SELECT * FROM feedback f inner join user u on f.userID = u.ID";
$feedback = mysqli_query($conn, $sqlFeedback);


$sqlFeatureProduct="SELECT * FROM equipment e where e.Qty > 0 ORDER BY IDs LIMIT 0 , 15";
$featureProduct = mysqli_query($conn, $sqlRecentProduct);



?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Spruha Healthcare - Care You can Trust</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="eCommerce HTML Template Free Download" name="keywords">
        <meta content="eCommerce HTML Template Free Download" name="description">

        <!-- Favicon -->
        <link href="img/favicon.ico" rel="icon">

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
        
        <!-- Main Slider Start -->
        <div class="header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3">
						<div class="sidebar-widget brands">
                            <h2 class="title">Categories</h2>
                            <ul>
								<?php
								while($data = mysqli_fetch_array($CategoryList))
									{         
								?>
									<li><?php
								echo "<a href='categorylist.php?Id=$data[ID]'>$data[Categoryname]</a>";
								?> <span>(<?php echo "$data[Total]"; ?>)</span></li>
								
								<?php
									}
								?>
                            </ul>
                        </div>
                     </div>
                    <div class="col-md-6">
                        <div class="header-slider normal-slider">
                                <?php
						while($data = mysqli_fetch_array($Banner))
									{         
									?>
                        
							<div class="header-slider-item">
                                <img src="Images/<?php echo $data[Image1]?>" alt="Slider Image" />
                                <div class="header-slider-caption">
							
									<a href="equipmentdetail.php?Id=<?php echo $data['ID']  ?>">
										<p><?php echo $data[Name]?></p>
									</a>
									
									<?php if($_SESSION["UserID"] != "") 
										{
									?>
										<a class="btn" href="" onclick='addtoCart(<?php echo $data[ID]?>)'><i class="fa fa-shopping-cart"></i>Shop Now</a>
									<?php }?>
                                </div>
                            </div>
							<?php
								}
							?>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="header-img">
						  <?php
						while($data = mysqli_fetch_array($MinimumPriceList))
									{         
									?>
                            <div class="img-item">
                                 <img src="Images/<?php echo $data[Image1]?>" alt="Product Image">
								 
                                <a class="img-text" href="equipmentdetail.php?Id=<?php echo $data['ID']  ?>">
										
                                    <p><?php echo $data[Name]?> (<?php echo $data[Price]?> $)</p>
                                </a>
                            </div>
									<?php } ?>
                        </div>
                </div>
            </div>
        </div>
        <!-- Main Slider End -->      
        
		
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
<!-- Feature Start-->
        <div class="feature">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-6 feature-col">
                        <div class="feature-content">
                            <i class="fab fa-cc-mastercard"></i>
                            <h2>Payment Facility</h2>
                            <p>
                                User is required to pay token amount in advance while purchasing/ renting an equipment.
							<p>
								Mode of payment is offline.
							</p>
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 feature-col">
                        <div class="feature-content">
                            <i class="fa fa-truck"></i>
                            <h2>Delivery</h2>
                            <p>
                                Company provides flexible and timely delivery to its customers.
							<p>
								The delivery and business is regulated in 3 major cities only New York, New Jersey and Boston.
							</p>
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 feature-col">
                        <div class="feature-content">
                            <i class="fa fa-sync-alt"></i>
                            <h2>Shipping Policy</h2>
                            <p>
                                The charges for shipping of product is decided on basis of mode of shipping and time.
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 feature-col">
                        <div class="feature-content">
                            <i class="fa fa-comments"></i>
                            <h2>Customer Support</h2>
                            <p>
                                For any query you can contact us on our registered contact number.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Feature End-->  		
        
           
        
        <!-- Call to Action Start -->
        <div class="call-to-action" style="padding:3px;">
            <div class="container-fluid">
                <div class="row align-items-center">
                </div>
            </div>
        </div>
        <!-- Call to Action End -->       
        
         
        <!-- Featured Product Start -->
        <div class="featured-product product">
            <div class="container-fluid">
                <div class="section-header">
                    <h1>Instock Equipment</h1>
                </div>
                <div class="row align-items-center product-slider product-slider-4">
                    <?php 
					while($data = mysqli_fetch_array($featureProduct))
									{         
						
					?>
					<div class="col-lg-3">
                        <div class="product-item">
                            <div class="product-title">
                                <a href="#"><?php echo "$data[Name]"?></a>
                               <div class="product-title">
                                            <span style="color:white !important"><?php echo $data[Company]?></span>
                                        </div>
                            </div>
                            <div class="product-image">
                                <a href="product-detail.html">
                                      <img style="width:300px; height:300px;" src="Images/<?php echo $data[Image1]?>" alt="Product Image">
                                     
                                </a>
                                <div class="product-action">
                                
								<?php
									if($_SESSION["ID"] != "") {
								?>
									<a href='addToCart.php' class='nav-item nav-link' onclick='addtoCart(<?php echo $data[ID]?>)'> 
										<i class="fa fa-cart-plus"></i> 
									</a>
								<?php }else {?>
									<a href='' class='nav-item nav-link' title="AddToCart" onclick='gotoLogin(1)'> 
										<i class="fa fa-cart-plus"></i> 
									</a>								
								<?php }?>
								
								
								
								
                                  
								<?php
									if($_SESSION["ID"] != "") {
								?>
									<a href='wishlist.php' class='nav-item nav-link' onclick='addtoWishList(<?php echo $data[ID]?>)'> 
										<i class="fa fa-heart"></i> 
									</a>
								<?php }else {?>
									<a href='#' class='nav-item nav-link' title="WishList" onclick='gotoLogin(2)'> 
										<i class="fa fa-heart"></i> 
									</a>								
								<?php }?>
								
									<a href="equipmentdetail.php?Id=<?php echo $data['ID']  ?>"><i class="fa fa-search"></i></a>	
                                </div>
                            </div>
                            <div class="product-price">
                                <h3><?php echo $data[Price]?> <span> $ </span></h3>
                                <?php if ("$data[Qty]" > 0 && $_SESSION["ID"] != "")   
								{
								?>
									<a class="btn" href="" onclick='addtoCart(<?php echo $data[ID]?>)'><i class="fa fa-shopping-cart"></i>Buy Now</a>
								<?php } ?>
						   </div>
                        </div>
                    </div>
                    <?php 
					}
					?>
					
                </div>
            </div>
        </div>
        <!-- Featured Product End -->             
        
        <!-- Newsletter Start -->
        <div class="newsletter" style="padding:3px;">
            <div class="container-fluid">
                <div class="row">
                    
                </div>
            </div>
        </div>
        <!-- Newsletter End -->        
        
        <!-- Recent Product Start -->
        <div class="recent-product product">
            <div class="container-fluid">
                <div class="section-header">
                    <h1>New Equipment</h1>
                </div>
                <div class="row align-items-center product-slider product-slider-4">
                    <?php 
					while($data = mysqli_fetch_array($recentProduct))
									{         
						
					?>
					<div class="col-lg-3">
                        <div class="product-item">
                            <div class="product-title">
                                <a href="#"><?php echo "$data[Name]"?></a>
                               <div class="product-title">
                                            <span style="color:white !important"><?php echo $data[Company]?></span>
                                        </div>
                            </div>
                            <div class="product-image">
                                <a href="product-detail.html">
                                      <img style="width:300px; height:300px;" src="Images/<?php echo $data[Image1]?>" alt="Product Image">
                                     
                                </a>
                                <div class="product-action">
									<?php
									if($_SESSION["UserID"] != "") {
								?>
									<a href='' class='nav-item nav-link' onclick='addtoCart(<?php echo $data[ID]?>)'> 
										<i class="fa fa-cart-plus"></i> 
									</a>
								<?php }else {?>
									<a href='' class='nav-item nav-link' title="AddToCart" onclick='gotoLogin(1)'> 
										<i class="fa fa-cart-plus"></i> 
									</a>								
								<?php }?>
                                    
									<?php
									if($_SESSION["UserID"] != "") {
								?>
									<a href='' class='nav-item nav-link' onclick='addtoWishList(<?php echo $data[ID]?>)'> 
										<i class="fa fa-heart"></i> 
									</a>
								<?php }else {?>
									<a href='' class='nav-item nav-link' title="WishList" onclick='gotoLogin(2)'> 
										<i class="fa fa-heart"></i> 
									</a>								
								<?php }?>
								

                                    <a href="#"><i class="fa fa-search"></i></a>
                                </div>
                            </div>
                            <div class="product-price">
                                <h3><?php echo $data[Price]?> <span> $ </span></h3>
                                <?php if ("$data[Qty]" > 0 && $_SESSION["ID"] != "")   
								{
								?>
									<a class="btn" href="" onclick='addtoCart(<?php echo $data[ID]?>)'><i class="fa fa-shopping-cart"></i>Buy Now</a>
								<?php } ?>
						   </div>
                        </div>
                    </div>
                    <?php 
					}
					?>
					
                </div>
            </div>
        </div>
        <!-- Recent Product End -->
        
        <!-- Review Start -->
        <div class="review">
            <div class="container-fluid">
                <div class="row align-items-center review-slider normal-slider">
                   
					    <?php
						while($data = mysqli_fetch_array($feedback))
									{         
									?>
                         <div class="col-md-6">
                        <div class="review-slider-item">
                            <div class="review-img" style="">
                                <img src="images/Feedback.jpg" alt="Image">
                            </div>
                            <div class="review-text">
                                <h2><?php echo "$data[Firstname] $data[Lastname]"?></h2>
                                <p>
                                   <?php echo "$data[Feedback]"?>
                                </p>
                            </div>
                        </div>		
					</div>
					<?php }?>
                    
                </div>
            </div>
        </div>
        <!-- Review End -->        
        <?php
		require("userfooter.php");
		?>
        <!-- Footer Start -->
        
        <!-- Footer End -->
        
        <!-- Footer Bottom Start -->
        
        <!-- Footer Bottom End -->       
        
        <!-- Back to Top -->

        
        <!-- Template Javascript -->
        <script src="js/main.js"></script>
       
    </body>
</html>
