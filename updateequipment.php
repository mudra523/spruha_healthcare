<?php
require("adminmaster.php");
include("connection.php");
if(isset($_POST['update'])) 
{	//echo "Done";
	$Id = $_POST['ID'];
	$ucategoryID = $_POST['CategoryID'];
	$uname =$_POST['Name'];
	$uquantity =$_POST['Qty'];
	$uprice =$_POST['Price']; 
	$udesc =$_POST['Description'];
	$uspec = $_POST['Specification'];
	$ucolour =$_POST['Color'];
	$ucompany =$_POST['Company']; 
	$uimg1 =$_POST['Image1'];
	$uimg2 =$_POST['Image2'];
	$uimg3 =$_POST['Image3'];
	
	
		
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
		
	$sql = "UPDATE equipment SET CategoryID = '$ucategoryID', Name = '$uname', Qty = '$uquantity', Price =$uprice' , Description = '$udesc',Specification = '$uspec', Color = '$ucolour', Company = '$ucompany', Image1 = '$uimg1', Image2 = '$uimg2', Image3 = '$uimg3' WHERE ID = '$Id'";
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
$Id= $_GET['ID'];
$sql = "SELECT * FROM equipment WHERE ID='$Id'";
$result1 = mysqli_query($conn, $sql);
while($data = mysqli_fetch_array($result1))
{	//echo" done";
	
	$Id = $data['ID'];
	$CategoryID =$data['CategoryID'];
	$Name =$data['Name'];
	$Qty =$data['Qty'];
	$Price =$data['Price']; 
	$Description =$data['Description'];
	$Specification= $data['Specification'];
	$Color =$data['Color'];
	$Company =$data['Company']; 
	$Image1 =$data['Image1'];
	$Image2 =$data['Image2'];
	$Image3 =$data['Image3'];
	
	
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
		<form action ="updateequipment.php" method ="POST">
        <div class="login">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="login-form">
                            <div class="row">
                             <div class="col-md-6">   
					
                                    <label>Category</label>
                                    
                                    
										<select name="CategoryID" class="form-control">
									
											<?php
										mysql_connect("localhost", "root", "") or die(mysql_error()); 
										mysql_select_db("spruhahealthcare") or die(mysql_error()); 
										
										$query="SELECT * FROM category";
										$result = mysql_query($query);
											echo "<option value='-1'>Select Category</option>";
											while($nt=mysql_fetch_array($result)){
											$name = $nt['Categoryname'];
											$id=$nt['ID'];
											echo "<option value='$id'>" . $name . "</option>";
											}
											echo '</select>';
			
											?>
                                </div>
								<div class="col-md-6">
                                    
                                </div>
								<div class="col-md-6">
                                    <label>Name</label>
                                    <input class="form-control" name="Name" type="text" placeholder="Name" required value="<?php echo htmlentities($Name); ?>">
                                </div>
								<div class="col-md-6">
                                    
                                </div>
								<div class="col-md-6">
                                    <label>Quantity</label>
                                    <input class="form-control" name="Qty" type="text" placeholder="Quantity" required value="<?php echo htmlentities($Qty); ?>">
                                </div>
								<div class="col-md-6">
                                    
                                </div>
								<div class="col-md-6">
                                    <label>Price</label>
                                    <input class="form-control" name="Price" type="text" placeholder="Price" required value="<?php echo htmlentities($Price); ?>">
                                </div>
								<div class="col-md-6">
                                    
                                </div>
								<div class="col-md-6">
                                    <label>Description</label>
                                    <input class="form-control" name="Description" type="text" placeholder="Description" required value="<?php echo htmlentities($Description); ?>">
                                </div>
								<div class="col-md-6">
                                    
                                </div>
								<div class="col-md-6">
                                    <label>Specification</label>
                                    <input class="form-control" name="Specification" type="text" placeholder="Specification" required value="<?php echo htmlentities($Specification); ?>">
                                </div>
								<div class="col-md-6">
                                    
                                </div>
								<div class="col-md-6">
                                    <label>Colour</label>
                                    <input class="form-control" name="Color" type="text" placeholder="Colour" required value="<?php echo htmlentities($Color); ?>">
                                </div>
								<div class="col-md-6">
                                    
                                </div>
								<div class="col-md-6">
                                    <label>Company</label>
                                    <input class="form-control" name="Company" type="text" placeholder="Company" required value="<?php echo htmlentities($Company); ?>">
                                </div>
								<div class="col-md-6">
                                    
                                </div>
								<div class="col-md-6">
                                    <label>Image 1</label>
                                    <input type="file" class="form-control"  name="uploaded_file1" id="FileName_1" / required value="<?php echo htmlentities($Image1); ?>">
                                </div>
								<div class="col-md-6">
                                    
                                </div>
								<div class="col-md-6">
                                    <label>Image 2</label>
                                    <input type="file" class="form-control"  name="uploaded_file2" id="FileName_2" / required value="<?php echo htmlentities($Image2); ?>">
                                </div>
								<div class="col-md-6">
                                    
                                </div>
								<div class="col-md-6">
                                    <label>Image 3</label>
                                    <input type="file" class="form-control"  name="uploaded_file3" id="FileName_3" / required value="<?php echo htmlentities($Image3); ?>">
                                </div>
                                <input type="hidden" value="<?php echo htmlentities($Id); ?>" name="ID" >
                                <div class="col-md-12">
                                    <input type="submit" name="update" value="update" class="btn"></button>
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
