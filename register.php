<?php
require("adminmaster.php");
include("connection.php");

if(isset($_POST['submit'])) {
    $CityID = $_POST['city']; // Assuming city ID is passed from the dropdown
    $Username = $_POST['Username'];
    $Password = $_POST['Password'];
    $Firstname = $_POST['Firstname'];
    $Lastname = $_POST['Lastname'];
    $Mobile = $_POST['Mobile'];
    $Altmobile = $_POST['Altmobile'];
    $Address = $_POST['Address'];
    $Pincode = $_POST['Pincode'];
    $Countrycode = $_POST['Countrycode'];

    $sql = "INSERT INTO user (CityID, Username, Password, Firstname, Lastname, Mobile, Altmobile, Address, Pincode, Countrycode)
            VALUES ('$CityID', '$Username', '$Password', '$Firstname', '$Lastname', '$Mobile', '$Altmobile', '$Address', '$Pincode', '$Countrycode')";

    $result = mysqli_query($conn, $sql);

    if($result) {
        //echo "Data inserted successfully";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Spruha Healthcare - Care you can Trust</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
    <!-- Breadcrumb Start -->
    <div class="breadcrumb-wrap">
        <div class="container-fluid">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">More Page</a></li>
                <li class="breadcrumb-item active">User</li>
            </ul>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Login Start -->
    <div class="login">
        <form action="register.php" method="POST">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 mx-auto"> <!-- Centering the form horizontally -->
                        <div class="register-form">
                            <h3 class="text-center mb-4">Registration</h3>
                            <div class="form-group">
                                <label for="city">City:</label>
                                <select id="city" name="city" class="form-control" required>
                                    <option value="">Select City</option>
                                    <?php
                                    require("connection.php"); // Assuming this file contains database connection
                                    $query = "SELECT * FROM city";
                                    $result = mysqli_query($conn, $query);
                                    if(mysqli_num_rows($result) > 0) {
                                        while($row = mysqli_fetch_assoc($result)) {
                                            echo "<option value='" . $row['ID'] . "'>" . $row['Cityname'] . "</option>";
                                        }
                                    } else {
                                        echo "<option value='-1'>No cities found</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="Username">Username:</label>
                                <input type="text" id="Username" name="Username" class="form-control" placeholder="Enter Username" required>
                            </div>
                            <div class="form-group">
                                <label for="Password">Password:</label>
                                <input type="password" id="Password" name="Password" class="form-control" placeholder="Enter Password" pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*()-_=+{};:,<.>]).{8,}$" title="Password must contain at least 8 characters, including at least one uppercase letter, one lowercase letter, one number, and one special character." required>
                            </div>
                            <div class="form-group">
                                <label for="Firstname">Firstname:</label>
                                <input type="text" id="Firstname" name="Firstname" class="form-control" placeholder="Enter Firstname" required>
                            </div>
                            <div class="form-group">
                                <label for="Lastname">Lastname:</label>
                                <input type="text" id="Lastname" name="Lastname" class="form-control" placeholder="Enter Lastname" required>
                            </div>
                            <div class="form-group">
                                <label for="Mobile">Mobile:</label>
                                <input type="text" id="Mobile" name="Mobile" class="form-control" placeholder="Enter Mobile Number" pattern="[0-9]{10}" title="Mobile number must be 10 digits" required>
                            </div>
                            <div class="form-group">
                                <label for="Altmobile">Alt. Mobile:</label>
                                <input type="text" id="Altmobile" name="Altmobile" class="form-control" placeholder="Enter Alternate Mobile Number">
                            </div>
                            <div class="form-group">
                                <label for="Address">Address:</label>
                                <textarea id="Address" name="Address" class="form-control" placeholder="Enter Address" required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="Pincode">Pincode:</label>
                                <input type="text" id="Pincode" name="Pincode" class="form-control" placeholder="Enter Pincode" required>
                            </div>
                            <div class="form-group">
                                <label for="Countrycode">Countrycode:</label>
                                <input type="text" id="Countrycode" name="Countrycode" class="form-control" placeholder="Enter Countrycode (e.g., +91)" pattern="^\+[0-9]{1,3}$" title="Country code must start with '+' followed by 1 to 3 digits" required>
                            </div>
                            <div class="form-group">
                                <input type="submit" name="submit" value="Register" class="btn btn-primary btn-block">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <!-- Login End -->

    <!-- Back to Top -->
    <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/slick/slick.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>
</html>

