<?php
session_start();
require("usermaster.php");
include("connection.php");
$delID = $_GET['DeleteId'];

if($delID > 0 )
{
	$sql = "DELETE FROM wishlist WHERE ID=$delID";
	$result1 = mysqli_query($conn, $sql);
	echo '<script>window.location.href = "wishlist.php";</script>';
}

$userid = $_SESSION["UserID"];
$sql="Select w.ID as 'WishListId', e.* from wishlist w INNER JOIN equipment e on e.ID = w.equipmentID WHERE w.UserID = $userid";
		
		$result = mysqli_query($conn, $sql);
		//echo <script> window.location.href = "view_user.php"; </script>

?>
        <!-- Breadcrumb Start -->
        <div class="breadcrumb-wrap">
            <div class="container-fluid">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">My Profile</a></li>
                   
                    <li class="breadcrumb-item active">WishList</li>
                </ul>
            </div>
        </div>
        <!-- Breadcrumb End -->

<form action ="wishlist.php" method ="POST">

        <!-- Wishlist Start -->
        <div class="wishlist-page">
            <div class="container-fluid">
                <div class="wishlist-page-inner">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>Product</th>
                                            <th>Price</th>
                                            <th>Quantity</th>
                                            <th>Add to Cart</th>
                                            <th>Remove</th>
                                        </tr>
                                    </thead>
                                    <tbody class="align-middle">
                                   
										<?php  
											while($data = mysqli_fetch_array($result))
											{         
										?>
											
										<tr>
                                            <td>
                                                <div class="img">
                                                    <a href="#"><img src="images/<?php echo $data['Image1']  ?>" alt="Image"></a>
                                                    <p><?php echo $data['Name']  ?></p>
                                                </div>
                                            </td>
                                            <td><?php echo $data['Price']  ?> $</td>
                                            <td>
                                                <div class="qty">
                                                    <button class="btn-minus"><i class="fa fa-minus"></i></button>
                                                    <input type="text" value="1">
                                                    <button class="btn-plus"><i class="fa fa-plus"></i></button>
                                                </div>
                                            </td>
												<td><button class="btn-cart">Add to Cart</button></td>
												
											
                                            
											<td>  <a href='deletewishlist.php?Id=<?php echo $data['WishListId']?>'>Delete</a></td>
                                        </tr>
									<?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Wishlist End -->
        


		
 </form>
        <!-- Back to Top -->
        <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
       <?php
	   require("userfooter.php");
	   ?> 
    </body>
</html>
