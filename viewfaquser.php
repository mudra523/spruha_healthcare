<?php
require("usermaster.php");
include("connection.php");

$delID = $_GET['Id'];
$uId = $_SESSION["UserID"];
$delID = $_GET['DeleteId'];

if($delID > 0 )
{
	$sql = "DELETE FROM faq WHERE ID=$delID";
	$result1 = mysqli_query($conn, $sql);
	//echo '<script>window.location.href = "viewcountry.php";</script>';
}

//$sql = "SELECT country FROM country ORDER BY Id DESC";
$sql = "SELECT * FROM faq ORDER BY ID DESC";
$result = mysqli_query($conn, $sql);

?>

        <!-- Breadcrumb Start -->
        <div class="breadcrumb-wrap">
            <div class="container-fluid">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">More Pages</a></li>
                   
                    <li class="breadcrumb-item active">FAQ</li>
                </ul>
            </div>
        </div>
        <!-- Breadcrumb End -->
        
        <!-- Login Start -->
		<form action ="viewfaq.php" method ="POST">
        <div class="login">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="login-form">
                            <div class="row">
                        
							<div class="col-md-12">
								<table width='100%' class="table">						
								<tr>
									 <th>Question</th> <th>Answer</th>
									 
								</tr>
								<?php  
									while($data = mysqli_fetch_array($result))
									{         
										echo "<tr>";
									
										echo "<td>".$data['Question']."</td>";
										echo "<td>".$data['Answer']."</td>";
										
										
        								//echo "<td><a href='updatefaq.php?Id=$data[ID]'>Update</a> | <a href='deletefaq.php?Id=$data[ID]'>Delete</a></td></tr>";        
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
    </body>
</html>


