<?php
session_start();

include("connection.php");

$sessionId = $_SESSION["UserID"];

if ($sessionId != "")
{
	$sqlOrderCount="SELECT Count(1) as Total FROM wishlist w where w.UserID = $sessionId";
	$userWishListCount = mysqli_query($conn, $sqlOrderCount);
	
	$sqlOrderCounts="SELECT Count(0) as Total FROM cart c where c.UserID = $sessionId";
	$userCartCount = mysqli_query($conn, $sqlOrderCounts);
}
else 
{
	$userWishListCount = 0; 
	$userCartCount = 0; 
}


?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Spruha Heathcare-  Care You can Trust</title>	
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
        <!-- Top bar Start -->
        <div class="top-bar">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <i class="fa fa-envelope"></i>
						<a href="mailto:spruhahealthcare@gmail.com">spruhahealthcare@gmail.com</a>
                    </div>
                    <div class="col-sm-6">
                        <i class="fa fa-phone-alt"></i>
                        +1(996)-335-20785
                    </div>
                </div>
            </div>
        </div>
        <!-- Top bar End -->
        
        <!-- Nav Bar Start -->
        <div class="nav">
            <div class="container-fluid">
                <nav class="navbar navbar-expand-md bg-dark navbar-dark">
                    <a href="#" class="navbar-brand">MENU</a>
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav mr-auto">
					
                            <a href="index.php" class="nav-item nav-link ">Home</a>
                            <a href="categorylist.php" class="nav-item nav-link">Category</a>
                            <a href="viewfaquser.php" class="nav-item nav-link">FAQ</a>
							<?php
									if($_SESSION["UserID"] != "") {
							?>
							<a href="addfeedback.php" class="nav-item nav-link">Feedback</a>
                           <!-- <a href="cart.html" class="nav-item nav-link">Cart</a>-->
							
							<a href="vieworderuser.php" class="nav-item nav-link">My Order</a>	
							<a href="checkout_test.php" class="nav-item nav-link">Checkout</a>	
							<a href="editprofile_test.php" class="nav-item nav-link">Edit Profile</a>
							
                            <a href="my-account.php" class="nav-item nav-link">My Account</a>
                            <?php } ?>
										
							<!-- <a href='#' class='nav-item nav-link' onclick='addtoWishList(40)'> Wishlist </a>
							-->
							
							<div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">More Pages</a>
                                <div class="dropdown-menu">
								<?php
									if($_SESSION["UserID"] != "") {
								?>

                                    <a href="wishlist.php" class="dropdown-item">Wishlist
									</a>
										<?php	
										}
										?>
  
	                                <a href="contactus.php" class="dropdown-item">Contact Us</a>
                                </div>
                            </div>
                        </div>
						<div>
							</div>
                        <div class="navbar-nav ml-auto">
                            <div class="nav-item dropdown">
								<?php
								if($_SESSION["UserID"] != "") 
								{
								?>
									<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">My Account, 
									<?php echo $_SESSION["Username"];
								}
								?> 
								</a>
                                <?php
								if($_SESSION["UserID"] == "") 
								{
								?>
									<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Go to Account, </a>
								<?php
								}
								?>
								
								
								<div class="dropdown-menu">
                                    								<?php
										if($_SESSION["UserID"] == "") {
									?>
                                    <a href="login.php" class="dropdown-item">Login </a>
									<a href="Registration.php" class="dropdown-item">Register</a>
										<?php } 
										else
										{
											
										?>
										<a href="logout.php" class="dropdown-item">Logout</a>
										<a href="changepassword_test.php" class="dropdown-item">Change Password</a>
										<?php	
										}
										?>
  
                                </div>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
        <!-- Nav Bar End -->      
        
			<!-- Bottom Bar Start -->
        <div class="bottom-bar">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-md-3">
                        <div class="logo">
                            <a href="index.php">
                                <img src="image/Logo.jpg" alt="Logo">
                            </a>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="search">
                            <input type="text" placeholder="Search Equipment">
                            <button><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="user">
                            <a href="wishlist.php" class="btn wishlist">
                                <i class="fa fa-heart"></i>
								
								<?php
								if($_SESSION["UserID"] != "")
								{
									while($data = mysqli_fetch_array($userWishListCount))
									{         
								?>
									<span>(<?php echo "$data[Total]"; ?>)</span>
								<?php
									}
								}else 
								{	
									echo '<span>(0)</span>';
								}
								?>
								
								
                                
                            </a>
                            <a href="viewcart.php" class="btn cart">
                                <i class="fa fa-shopping-cart"></i>
                                <?php
								if($_SESSION["UserID"] != "")
								{
									while($data = mysqli_fetch_array($userCartCount))
									{										
								?>
									<span>(<?php echo "$data[Total]"; ?>)</span>
								<?php
									}
								} else 
								{
									echo '<span>(0)</span>';
								}
								?>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Bottom Bar End -->       
        
        
        <!-- Back to Top -->
        <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
        
        <!-- JavaScript Libraries -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
        <script src="lib/easing/easing.min.js"></script>
        <script src="lib/slick/slick.min.js"></script>
        
    </body>
	<script> 
	function addtoWishList(equipmentId)
	{
		// alert(equipmentId);
		$.ajax({
			type: "POST",
			url: "addWishList.php",
			data:'equipmentID='+equipmentId,
			success: function(data){
				debugger;
				alert('Wishlist saved successfully');
			}
		});
	}
	
	function addtoCart(equipmentId)
	{
		// alert(equipmentId);
		$.ajax({
			type: "POST",
			url: "addToCart.php",
			data:'equipmentID='+equipmentId,
			success: function(data){
				debugger;
				alert('Added to cart successfully');
			}
		});
	}
	
	function gotoLogin(number1)
	{
		if(number1 === 1)
			alert('Please login or register to place order!');
		else 
			alert('Please login or register to  create wishlist!');
	}
	
	function movetoCart(equipmentID,wishListId)
	{
		debugger;
		alert(1);
		$.ajax({
			type: "POST",
			url: "movetoCart.php",
			data:'wishListId='+wishListId,
			success: function(data){
				debugger;
				alert('Added to cart successfully');
			}
		});
	}
	

	</script>

</html>
