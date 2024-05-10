<?php
	require("usermaster.php");
	include("connection.php");
	session_start();
	$uId = $_SESSION["UserID"];
	$sqlequipment = "SELECT * FROM cart";
	$equipmentlist = mysqli_query($conn, $sqlequipment);
	
	
if(isset($_POST['submit'])) 
{	
	$payment= $_POST['pay'];
	
	$isshipping = $_POST['Isshipping'];
	$shipment = $_POST['shipment'];
	$needtechnician =$_POST['needtechnician'];
	$address =$_POST['address'];
	
	$eqid = $_GET['EquipmentID'];
	
	$qty= $_POST['Qty'];
	$price=$_POST['Price'];
	$ordertype =$_POST['ordertype'];
	
	if ($payment == "Cash")
	{
		$paymentId = 1;
	}
	else if ($payment == "Cheque")
	{
		$paymentId = 2;
	}
	else if ($payment == "RTGS")
	{
		$paymentId = 3;
	}
	else if ($payment == "NEFT")
	{
		$paymentId = 4;
	}
	else if ($payment == "DD")
	{
		$paymentId = 5;
	}
    
	// -------------------------------------
	if($shipment == "Urgent")
	{
		$shipmentId = 1;
	}
	else if($shipment = "Normal")
	{
		$shipmentId = 2;
	}
	
	// -------------------------------------
	if($ordertype == "Buy")
	{
		$ordertypeId = 1;
	}
	else if($ordertype = "Rent")
	{
		$ordertypeId = 2;
	}
	
	
	
		$sql = "INSERT INTO `order`(UserID,PaymentID,Isshipping,Shipment,Needtechnician,Address)VALUES($uId,$paymentId,1,$shipmentId,$needtechnician,'$address')";
		
		$result = mysqli_query($conn, $sql);
		$iorderid = mysqli_insert_id($conn);

		// echo $sql;
		// echo $iorderid;
		// echo "<br/>";

		// Cart mathi record lavana e j user na session mathi 
		// echo $uId;
	
		$sqlcart = "SELECT e.ID,e.Price FROM cart c INNER JOIN user u ON c.UserID= u.ID
		INNER JOIN equipment e ON c.EquipmentID = e.ID WHERE c.UserID = $uId";
		$resultcart = mysqli_query($conn, $sqlcart);
		// for loop /while 
		while($data=mysqli_fetch_array($resultcart))
		{
			$eqid = $data["ID"];
			$price=$data["Price"];
			$sql2 = "INSERT INTO orderdetails(EquipmentID,OrderID,Ordertype,Qty,Price)VALUES('$eqid',$iorderid,$ordertypeId,'$qty','$price')";
			
			// echo $sql2;
			$result2 = mysqli_query($conn, $sql2);
		}
	
		$deleteSql = "DELETE FROM cart WHERE UserID = $uId";
		$result3 = mysqli_query($conn, $deleteSql);
		
		
		//echo '<script>window.location.href = "viewstate.php";</script>';
		
		
}

	?>
        
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
		<form action ="checkout_test.php" method ="POST">
        <div class="checkout">
            <div class="container-fluid"> 
                <div class="row">
                    <div class="col-md-12">
                        <div class="checkout-inner">
                            <div class="billing-address">
                                <h2>Billing Address</h2>
									<div class="col-md-6">
                                        <label>Address</label>
                                        <input class="form-control" type="text" placeholder="Address" name="address">
                                    </div>
									
                                    <div class="col-md-6">
                                        <label>Country</label>
										<select name="CID" id="country_id" class="form-control" onChange="getState(this.value);">
									<?php
										mysql_connect("localhost", "root", "") or die(mysql_error()); 
										mysql_select_db("spruhahealthcare") or die(mysql_error()); 
										
										$query="SELECT * FROM country";
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
										<select name="stateId" class="form-control" id="state_id" class="form-control" onChange="getCity(this.value);">
									
										<?php
											mysql_connect("localhost", "root", "") or die(mysql_error()); 
											mysql_select_db("spruhahealthcare") or die(mysql_error()); 
										
											$query="SELECT * FROM state order by ID desc";
											$result = mysql_query($query);
												echo "<option value='-1'>Select State</option>";
												while($nt=mysql_fetch_array($result))
												{
													$name = $nt['Statename'];
													$id=$nt['ID'];
													echo "<option value='$id'>" . $name . "</option>";
												}	
												echo '</select>';
										?>
										</select>
									</div>
									<div class="col-md-6">
										<label>City</label>
										<select name="CityID" class="form-control" id="city-list" class="form-control">
											<option value="">Select City</option>
										</select>
									</div>
									<div class="col-md-12">
										<label>Order type</label>
                                        <div class="custom-control custom-radio">
                                            <input type="radio" name="ordertype" value="Buy">Buy
											<input type="radio" name="ordertype" value= "Rent">Rent
                                        </div>
                                    </div>
									
									<div class="col-md-12">
										<label>Need Technician</label>
                                        <div class="custom-control custom-radio">
                                            <input type="radio" name="needtechnician" value="1">Yes
											<input type="radio" name="needtechnician" value= "0">No
                                        </div>
                                    </div>
    
									<div class="col-md-12">
										<div class="custom-control custom-checkbox">
                                            <input type="checkbox" name="order" class="custom-control-input" id="shipto">
                                            <label class="custom-control-label" for="shipto">Mode of Shipping(If opting for delivery option)</label>
                                        </div>
										
										<div class="shipping-address">
											<div class="row">
											<label>Shipping Type</label>
									
												<div class="custom-control custom-radio">
													<input type="radio" name="ship" value="Urgent">Urgent
													<input type="radio" name="ship" value= "Normal">Normal
												</div>
											</div>
										</div>
                                    </div>
                            </div>
                        </div>
                    </div>
                    </div>
                    <div class="col-md-12">
                        <div class="checkout-inner">					   
                            <div class="checkout-payment">
							<label>Payment Type</label>
								 <div class="custom-control custom-radio">
                                            <input type="radio" name="pay" value="1">Cash
											<input type="radio" name="pay" value="2">Cheque
											<input type="radio" name="pay" value="3">RTGS
											<input type="radio" name="pay" value="4">NEFT
											<input type="radio" name="pay" value="5">DD
                                  </div>
                            </div>    
                           
                                <div class="checkout-btn">
								<!--<button type="submit" name="submit">Place Order</button>-->
                                 <input type="submit" name="submit" value="Place Order">
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
		//alert('Get City -->' + val);
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
