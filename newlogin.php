<?php
ob_start(); // Start output buffering
session_start();

// Include necessary files
include("connection.php");
require("adminmaster.php");


if(isset($_POST['Submit'])) {
    // Grab User submitted information
    $email = $_POST["username"];
    $password = $_POST["password"];

    // Check if username and password are "admin"
    if($email === 'admin' && $password === 'admin') {
        // Redirect to admin page
        $_SESSION["UserID"] = -1;
        header("Location: newadminhome.php");
        exit();
    } else {
        $errors = "Invalid Username or Password!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Your head content -->
</head>
<body>
    <!-- Your body content -->

    <!-- Login Form -->
    <form action="newlogin.php" method="POST">
        <div class="login">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="login-form">
                            <?php if(isset($errors)) {
                                echo "<div class='row'><div class='col-md-12 alert alert-danger alert-dismissible'><label>
                                        <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                                        $errors
                                    </label></div></div>";
                            }?>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>E-mail / Username</label>
                                    <input class="form-control" name="username" type="text" placeholder="E-mail / Username" required>
                                </div>
                                <div class="col-md-6">
                                    <!-- Add any additional fields if needed -->
                                </div>
                                <div class="col-md-6">
                                    <label>Password</label>
                                    <input class="form-control" name="password" type="password" placeholder="Password" required>
                                </div>
                                <div class="col-md-12">
                                    <input type="submit"  name="Submit" class="btn">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <!-- End Login Form -->

</body>
</html>
<?php
ob_end_flush(); // Flush the output buffer
?>
