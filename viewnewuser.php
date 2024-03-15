<?php
require("adminmaster.php");
include("connection.php");

$sql = "SELECT u.*, c.Cityname 
        FROM user u
        INNER JOIN city c ON u.CityID = c.ID";
$result = mysqli_query($conn, $sql);
?>

<!-- Breadcrumb Start -->
<div class="breadcrumb-wrap">
    <div class="container-fluid">
        <ul class="breadcrumb">
            <li class="breadcrumb-item active">User</li>
        </ul>
    </div>
</div>
<!-- Breadcrumb End -->

<!-- User View Start -->
<form action="viewuser.php" method="POST">
    <div class="user-view">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="user-view-form">
                        <div class="row">
                            <div class="col-md-12">
                                <table width='100%' class="table">						
                                    <tr>
                                        <th>City</th>
                                        <th>Username</th>
                                        <th>Name</th>
                                        <th>Mobile</th>
                                    </tr>
                                    <?php  
                                    while($data = mysqli_fetch_array($result))
                                    {         
                                        echo "<tr>";
                                        echo "<td>".$data['Cityname']."</td>";
                                        echo "<td>".$data['Username']."</td>";
                                        echo "<td>".$data['Firstname']." ".$data['Lastname']."</td>";
                                        echo "<td>".$data['Mobile']."</td>";
                                        echo "</tr>";        
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
</form>
<!-- User View End -->

<!-- Back to Top -->
<a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

<?php
require("userfooter.php");
?> 
