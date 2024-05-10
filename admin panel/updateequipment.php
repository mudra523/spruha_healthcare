<?php
require("adminmaster.php");
include("connection.php");
if(isset($_POST['update'])) 
{	echo "Done";
	$Id = $_POST['ID'];
	$categoryID = $_POST['CategoryID'];
	$name =$_POST['Name'];
	$quantity =$_POST['Qty'];
	$price =$_POST['Price']; 
	$desc =$_POST['Description']; 
	$colour =$_POST['Color'];
	$company =$_POST['Company']; 
	$img1 =$_POST['Image1'];
	$img2 =$_POST['Image2'];
	$img3 =$_POST['Image3'];
	
	
		
		if(!empty($_FILES['uploaded_file1']))
		{
	
			$randomNumber = rand(10,100000);
			$path = "Images/";
			$path = $path .$randomNumber . '_'. basename( $_FILES['uploaded_file1']['name']);
			if(move_uploaded_file($_FILES['uploaded_file1']['tmp_name'], $path)) {
			$img1 = $randomNumber . '_' . basename( $_FILES['uploaded_file1']['name']);
			
			echo "The file ".  basename( $_FILES['uploaded_file1']['name']). 
			" has been uploaded";
			} else{
				echo "There was an error uploading the file, please try again!";
			}
		}
		else{
			echo "not done";
		}
		if(!empty($_FILES['uploaded_file2']))
		{
	
			$randomNumber = rand(10,100000);
			$path = "Images/";
			$path = $path .$randomNumber . '_'. basename( $_FILES['uploaded_file2']['name']);
			if(move_uploaded_file($_FILES['uploaded_file2']['tmp_name'], $path)) {
			$img2 = $randomNumber . '_' . basename( $_FILES['uploaded_file2']['name']);
			
			echo "The file ".  basename( $_FILES['uploaded_file2']['name']). 
			" has been uploaded";
			} 
			else
			{
				echo "There was an error uploading the file, please try again!";
			}
		}
		else{
			echo "not done";
		}
		if(!empty($_FILES['uploaded_file3']))
		{
	
			$randomNumber = rand(10,100000);
			$path = "Images/";
			$path = $path .$randomNumber . '_'. basename( $_FILES['uploaded_file3']['name']);
			if(move_uploaded_file($_FILES['uploaded_file3']['tmp_name'], $path)) {
			$img3 = $randomNumber . '_' . basename( $_FILES['uploaded_file3']['name']);
			
			echo "The file ".  basename( $_FILES['uploaded_file3']['name']). 
			" has been uploaded";
			} else{
				echo "There was an error uploading the file, please try again!";
			}
		}
		else{
			echo "not done";
		}
	$sql = "UPDATE equipment SET CategoryID = '$categoryID', Name = '$name', Qty = '$quantity', Price =$price' , Description = '$desc', Color = '$colour', Company = '$company', Image1 = '$img1', Image2 = '$img2', Image3 = '$img3' WHERE ID = $Id";
	$result = mysqli_query($conn, $sql);
	/*if (mysqli_query($conn, $sql))
		{
			echo "<br/>"."New record created successfully";
		} 
		else 
		{
		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}*/
}
?>

        <!-- Breadcrumb Start -->
        <div class="breadcrumb-wrap">
            <div class="container-fluid">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">More Pages</a></li>
                   
                    <li class="breadcrumb-item active">Equipment</li>
                </ul>
            </div>
        </div>
        <!-- Breadcrumb End -->
        
        <!-- Login Start -->
		<form action ="updateequipment.php" method ="POST" enctype="multipart/form-data">
        <div class="login">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="login-form">
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Equipment</label>
                                    <table width='100%' class="table"> 
										<tr>
											<td>Category</td>
											<td><select name="CategoryID" class="form-control">
									
											<?php
										mysql_connect("localhost", "root", "") or die(mysql_error()); 
										mysql_select_db("spruhahealthcare") or die(mysql_error()); 
										
										$query="SELECT * FROM category";
										$result = mysql_query($query);
											echo "<option value='-1'>Select Equipment</option>";
											while($nt=mysql_fetch_array($result)){
											$name = $nt['Categoryname'];
											$id=$nt['ID'];
											echo "<option value='$id'>" . $name . "</option>";
											}
											echo '</select>';
			
											?>
									 </td>
										</tr>
										<tr>
											<td>Name</td>
											<td><input type="text" name="Name" required></td>
										</tr>
										<tr>
											<td>Quantity</td>
											<td><input type="number" name="Qty" required></td>
										</tr>
										<tr>
											<td>Price</td>
											<td><input type="number" name="Price"required></td>
										</tr>
										<tr>
											<td>Description</td>
											<td><input type="text" name="Description" required></td>
										</tr>
										<tr>
											<td>Colour</td>
											<td><input type="text" name="Color" required></td>
										</tr>
										<tr>
											<td>Company</td>
											<td><input type="text" name="Company" required></td>
										</tr>
										<tr>
											<td>Image 1</td>
											<td>	<input type="file" class="form-control"  name="uploaded_file1" id="FileName_1" / required></td>
											
										</tr>
										<tr>
											<td>Image 2</td>
											<td><input type="file" class="form-control"  name="uploaded_file2" id="FileName_1" /></td>
										</tr>
										<tr>
											<td>Image 3</td>
											<td><input type="file" class="form-control"  name="uploaded_file3" id="FileName_1" /></td>
										</tr>
								</table>
                                </div>
								<div class="col-md-6">
                                    
                                </div>
								</div>
                                <input type="hidden" value="<?php echo htmlentities($Id); ?>" name="ID" >
                                <div class="col-md-12">
                                
                                <div class="col-md-12">
                                    <input type="submit"  name="update" value="update" class="btn"></button>
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
       <?php
	   require("userfooter.php");
	   ?> 
    </body>
</html>
