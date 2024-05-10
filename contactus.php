<?php
session_start();
require("usermaster.php");
include("connection.php");
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
        
        <!-- Breadcrumb Start -->
        <div class="breadcrumb-wrap">
            <div class="container-fluid">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Contact</a></li>
                    <li class="breadcrumb-item active">Contact Us</li>
                </ul>
				<img src = "img/girl.jpg"  width = "1300px"; height = "500px"; align = "justified";></img>
            </div>
        </div>
        <!-- Breadcrumb End -->
		
		
		
        
        <!-- Contact Start -->
        <div class="contact">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="contact-info">
                            <h2>Our Office</h2>
							<h3><i class="fa fa-map-marker"></i>29, Spruha Healthcare,Calvert Avenue<br>
							Edison - 08820<br>
							New Jersey, United States</h3>
                            <h3> Office Timings: 8 AM TO 8 PM (Mon to Sat)</h3>
							<h3> Sunday : 8 AM TO 5 PM </h3>
                            <h3><i class="fa fa-phone"></i>Contact No: +1-9160748624 	</h3>
                            
                            
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="contact-info">
                            <h2>Our Store</h2>
                            <h3><i class="fa fa-map-marker"></i>29, Spruha Healthcare,Calvert Avenue<br>
							Edison - 08820<br>
							New Jersey, United States</h3>
							<h3><i class="fa fa-envelope"></i>  Email:<a href="https://mail.google.com/mail/u/0/#inbox?compose=GTvVlcRzCMtQdVPgfTSgcjLlJQHbjqRLltkpGGZsWlvqvCjbwjSxrzZszCfqrhmQhHdbjtktQbVjt"> spruhahealthcare@gmail.com </a></h3>
                            <h3><i class="fa fa-phone"></i>Contact No: +1-9633520785</h3>
                            
                            <div class="social">
							<h3> Find Us : </h3>
                                <a href="https://twitter.com/spruhahealth"><i class="fab fa-twitter"></i></a>
                                <a href="https://www.facebook.com/spruha.healthcare"><i class="fab fa-facebook-f"></i></a>
                                
                                <a href="https://www.instagram.com/spruhahealthcare/?hl=en"><i class="fab fa-instagram"></i></a>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Contact End -->
        
        <?php
		require("userfooter.php");
		?>
        <!-- Back to Top -->
        <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
        
      
    </body>
</html>
