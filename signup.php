<?php
require('vendor/autoload.php');
use Rakit\Validation\Validator;
include_once "classes/database.php";
//include_once "classes/SessionManager.php";
$db_connect=new Database();
$conn=$db_connect->conn;
//$session = new SessionManager();
session_start();

if(isset($_POST['submit']))
{


    $validator = new Validator();
    $validation = $validator->validate($_POST, [
        'email'=> 'required',
        'username'=>'required',
        'password' => 'required'
    ]);

    if ($validation->fails()) {
// handling errors
// $errors = $validation->errors();
// echo "<pre>";
// print_r($errors->firstOfAll());
// echo "</pre>";
// echo "<h1>You have input invalid username or password</h1>";

        $_SESSION['error']="invalid username or password";

    } else {
// validation passes

        $email=$_POST['email'];
        $username= $_POST['username'];
        $password= $_POST['password'];
        $hashedPassword=hash('sha256',$password);

        $sql="SELECT * FROM login_table WHERE email='{$email}'";
        $sql1="INSERT INTO login_table(email,username,password) VALUES('{$email}','{$username}','{$hashedPassword}')";
        $result=mysqli_query($conn,$sql) or die("query unsuccesful");
        if($result)
        {

            if(mysqli_num_rows($result)==0)
            {
                if(mysqli_query($conn,$sql1))
                {
                    header("Location:{$host}");
                }

                else{
                    $_SESSION['error']="Registration failed";
                }
            }
            else{
                $_SESSION['error']="this gmail has already been taken";
            }

        }
    }

}




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--fontawsome cdn link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <!--boostrap css file-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">


    <!--styling file-->
    <link rel="stylesheet" href="assets/style/css/main.css">

    <title>CRM - Signup</title>
</head>
<body>

<!--bootstrap code  starts-->

<div class="container-fluid h-auto p-3">
    <div class="row d-flex justify-content-center align-items-center flex-column  p-3">
        <div class="login-logo col-3 my-3">
            <i class="fa-solid fa-address-card"></i>
        </div>
        <div class="mb-2 mt-5 col-3">
            <h3 class="text-center">Registration</h3>
        </div>
        <div class="col-3 custom-col-height px-4 py-3 mb-5 shadow background">
            <?php
            if(isset($_SESSION['error']))
            {
                echo "<div class='alert alert-danger text-center'>".$_SESSION['error']."</div>";
                unset($_SESSION['error']);
            }


            ?>

            <form id="signupForm" action="" method="post">
                <div class="mb-3 mt-3">
                    <label for="email_field" class="form-label">Email</label>
                    <input id="email_field" type="text" name="email" class="form-control border border-secondary"/>
                </div>
                <div class="mb-3 mt-3">
                    <label for="username_field" class="form-label">Username</label>
                    <input id="username_field" type="text" name="username"
                           class="form-control border border-secondary"/>
                </div>
                <div class="mb-4">
                    <label for="password_field" class="form-label">Password</label>
                    <input id="password_field" type="password" name="password"
                           class="form-control border border-secondary"/>
                </div>
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input border border-black" name="agree_terms"
                           id="agree_terms"/>
                    <label class="form-check-label" for="agree_terms">Check me out</label>
                </div>
                <button type="submit" name="submit" value="register" class="btn btn-primary form-control">Register
                </button>
            </form>
        </div>
        <div class="col-3 mt-3 border border-secondary rounded-2  p-2 background1">
            <h6 class="text-center fw-semibold text-primary">
                Sign in with key pass
            </h6>
            <p class="text-center"><span>Have already registered?</span><a href="index.php">Log into account</a></p>
        </div>
    </div>
</div>


<!--bootstrap code ends-->


<!-- Javacript files-->
<script src="assets/js/jquery.js"></script>
<script src="assets/vendors/jquery-form-validation/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/signup.js"></script>
<script>
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
</script>
</body>
</html>