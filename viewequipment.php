<?php
require("adminmaster.php");
include("connection.php");

$sql = "SELECT * FROM equipment";
$result = mysqli_query($conn, $sql);
?>

<!-- Breadcrumb Start -->
<div class="breadcrumb-wrap">
    <div class="container-fluid">
        <ul class="breadcrumb">
            <li class="breadcrumb-item active">Equipment</li>
        </ul>
    </div>
</div>
<!-- Breadcrumb End -->

<!-- Login Start -->
<form action="viewequipment.php" method="POST">
    <div class="login">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="login-form">
                        <div class="row">
                            <div class="col-md-12">
                                <table width='100%' class="table">						
                                    <tr>
                                        <th>Equipment</th> <th>Qty</th><th>Price</th><th>Description</th><th>Specification</th><th>Color</th><th>Company</th><th>Image</th><th>Action</th>
                                    </tr>
                                    <?php  
                                    while($data = mysqli_fetch_array($result)) {         
                                        echo "<tr>";
                                        echo "<td>".$data['Name']."</td>";
                                        echo "<td>".$data['Qty']."</td>";
                                        echo "<td>".$data['Price']."</td>";
                                        echo "<td>".$data['Description']."</td>";
                                        echo "<td>".$data['Specification']."</td>";
                                        echo "<td>".$data['Color']."</td>";
                                        echo "<td>".$data['Company']."</td>";
                                        echo "<td>".$data['Image1']."</td>";
                                        echo "<td><a href='updateequipment.php?Id=$data[ID]'>Update</a> | <a href='deleteequipment.php?Id=$data[ID]'>Delete</a></td></tr>";        
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
    <!-- Equipment End -->
</form>
<!-- Back to Top -->
<a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
<?php
require("userfooter.php");
?> 
</body>
</html>
