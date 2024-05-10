<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Spruha Healthcare - Care you can Trust</title>
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
	<?php
	require("usermaster.php");
	include("connection.php");
	?>
    <body>
        
        <!-- Breadcrumb Start -->
        <div class="breadcrumb-wrap">
            <div class="container-fluid">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Equipments</a></li>
                    <li class="breadcrumb-item active">Checkout</li>
                </ul>
            </div>
        </div>
        <!-- Breadcrumb End -->
        
        <!-- Checkout Start -->
        <div class="checkout">
            <div class="container-fluid"> 
                <div class="row">
                    <div class="col-lg-8">
                        <div class="checkout-inner">
                            <div class="billing-address">
                                <h2>Billing Address</h2>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>First Name</label>
                                        <input class="form-control" type="text" placeholder="First Name">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Last Name</label>
                                        <input class="form-control" type="text" placeholder="Last Name">
                                    </div>
                                    <div class="col-md-6">
                                        <label>E-mail</label>
                                        <input class="form-control" type="text" placeholder="E-mail">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Mobile No</label>
                                        <input class="form-control" type="text" placeholder="Mobile No">
                                    </div>
                                    <div class="col-md-12">
                                        <label>Address</label>
                                        <input class="form-control" type="text" placeholder="Address">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Country</label>
										<select name="CID" id="countryId" class="form-control" onChange="getState(this.value);">
									<?php
										mysql_connect("localhost", "root", "") or die(mysql_error()); 
										mysql_select_db("spruhahealthcare") or die(mysql_error()); 
										
										$query="SELECT * FROM country order by ID desc";
										$result = mysql_query($query);
											echo "<option value='-1'>Select Country</option>";
											while($nt=mysql_fetch_array($result)){
											$name = $nt['Countryname'];
											$id=$nt['ID'];
											echo "<option value='$id'>" . $name . "</option>";
											}
											echo '</select>';
			
									?>
                                        
                                    </div>
                                    <div class="col-md-6">
                                        <label>State</label>
                                        <select name="stateId" class="form-control" id="state-list" class="form-control" onChange="getCity(this.value);">
									<option value="">Select State</option>
								  </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label>City</label>
                                        <select name="CityID" class="form-control" id="city-list" class="form-control">
										<option value="">Select City</option>
									</select>
                                    </div>
                                    <div class="col-md-6">
                                        <label> Pincode</label>
                                        <input class="form-control" type="text" placeholder="Pincode">
                                    </div>
                                    <div class="col-md-12">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="newaccount">
                                            <label class="custom-control-label" for="newaccount">Create an account</label>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="shipto">
                                            <label class="custom-control-label" for="shipto">Mode of Shipping</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="shipping-address">
                                <h2>Mode of Shipping</h2>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Urgent</label>
                                        <input type="radio" >
                                    </div>
                                    <div class="col-md-6">
                                        <label>Normal</label>
                                        <input type="radio"  >
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="checkout-inner">
                            <div class="checkout-summary">
                                <h1>Cart Total</h1>
                                <p>Product Name<span>$99</span></p>
                                <p class="sub-total">Sub Total<span>$99</span></p>
                                <p class="ship-cost">Shipping Cost<span>$1</span></p>
                                <h2>Grand Total<span>$100</span></h2>
                            </div>

                            <div class="checkout-payment">
                                <div class="payment-methods">
                                    <h1>Payment Methods</h1>
                                    <div class="payment-method">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" id="payment-1" name="payment">
                                            <label class="custom-control-label" for="payment-1">Paypal</label>
                                        </div>
                                        <div class="payment-content" id="payment-1-show">
                                            <p>
                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras tincidunt orci ac eros volutpat maximus lacinia quis diam.
                                            </p>
                                        </div>
                                    </div>
                                    <div class="payment-method">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" id="payment-2" name="payment">
                                            <label class="custom-control-label" for="payment-2">Payoneer</label>
                                        </div>
                                        <div class="payment-content" id="payment-2-show">
                                            <p>
                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras tincidunt orci ac eros volutpat maximus lacinia quis diam.
                                            </p>
                                        </div>
                                    </div>
                                    <div class="payment-method">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" id="payment-3" name="payment">
                                            <label class="custom-control-label" for="payment-3">Check Payment</label>
                                        </div>
                                        <div class="payment-content" id="payment-3-show">
                                            <p>
                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras tincidunt orci ac eros volutpat maximus lacinia quis diam.
                                            </p>
                                        </div>
                                    </div>
                                    <div class="payment-method">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" id="payment-4" name="payment">
                                            <label class="custom-control-label" for="payment-4">Direct Bank Transfer</label>
                                        </div>
                                        <div class="payment-content" id="payment-4-show">
                                            <p>
                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras tincidunt orci ac eros volutpat maximus lacinia quis diam.
                                            </p>
                                        </div>
                                    </div>
                                    <div class="payment-method">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" id="payment-5" name="payment">
                                            <label class="custom-control-label" for="payment-5">Cash on Delivery</label>
                                        </div>
                                        <div class="payment-content" id="payment-5-show">
                                            <p>
                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras tincidunt orci ac eros volutpat maximus lacinia quis diam.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="checkout-btn">
                                    <button>Place Order</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Checkout End -->
        
        
             
        <?php
		require("userfooter.php");
		?>
        <!-- Back to Top -->
        <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
        
        <!-- JavaScript Libraries -->
        <script src="js/jquery-3.4.1.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
        <script src="lib/easing/easing.min.js"></script>
        <script src="lib/slick/slick.min.js"></script>
        
        <!-- Template Javascript -->
       
		
	   <script src="js/main.js"></script>
		
			<script>
			$(document).ready(function () {
			
			});
		
	function getState(val) {
			
		debugger;
		// alert('Get State -->' + val);
		$.ajax({
		type: "POST",
		url: "getState.php",
		data:'country_id='+val,
		success: function(data){
			debugger;
			//alert('Success');
			$("#state-list").html(data);
			//alert($("#SelectedStateId").val());	
			//$("#state-list").val($("#SelectedStateId").val());
			
			//getCity();
			}
		});
	}
	
	function getCity(val) {
		// alert('Get City -->' + val);
		$.ajax({
		type: "POST",
		url: "getcity.php",
		data:'state_id='+val,
		success: function(data){			
			debugger;
			// alert('Success');
			$("#city-list").html(data);
			//alert($("#SelectedStateId").val());
			$("#city-list").val($("#SelectedCityId").val());
			
			//getCity();
			}
		});
	}
	
	
	
		
	</script>
    </body>
</html>
