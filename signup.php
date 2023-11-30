<?php
require( 'vendor/autoload.php' );

use Rakit\Validation\Validator;

include_once "classes/database.php";
include_once "classes/SessionManager.php";

//database connection
$db_connect = new Database();
$conn       = $db_connect->conn;

//session instance
$session = new SessionManager();


if ( isset( $_POST['submit'] ) ) {
    $validator  = new Validator();
    $validation = $validator->validate( $_POST, [
        'email'    => 'required|email',
        'username' => 'required',
        'password' => 'required|min:6'
    ] );

    if ( $validation->fails() ) {
        $validation_errors = $validation->errors();
        $errors            = $validation_errors->firstOfAll();

        /* echo '<pre>';
         print_r($errors);
         echo '</pre>';*/

        $session->set( "error", "Invalid username or password" );
        $session->set( "field_errors", $errors );
    } else {
        $email          = $_POST['email'];
        $username       = $_POST['username'];
        $password       = $_POST['password'];
        $hashedPassword = hash( 'sha256', $password );

        $sql  = "SELECT * FROM login_table WHERE email='{$email}'";
        $sql1 = "INSERT INTO login_table(email,username,password) VALUES('{$email}','{$username}','{$hashedPassword}')";
        $result = mysqli_query( $conn, $sql ) or die( "query unsuccesful" );

        if ( $result ) {

            if ( mysqli_num_rows( $result ) == 0 ) {
                if ( mysqli_query( $conn, $sql1 ) ) {
//                    $_SESSION['success'] = "Registration successful !";

                    $session->set( "success", "Registration successful! " );

                } else {
//                    $_SESSION['error'] = "Registration failed";

                    $session->set( "error", "Registration failed" );


                }
            } else {
//                $_SESSION['error'] = "This email has already been taken";
                $session->set( "error", "This email has been taken already" );
            }

        }
    }

}


//            if (isset($_SESSION['error'])) {
//                echo "<div class='alert alert-danger text-center'>" . $_SESSION['error'] . "</div>";
//                unset($_SESSION['error']);
//            }
//            if (isset($_SESSION['success'])) {
//                echo "<div class='alert alert-success text-center'>" . $_SESSION['success'] . "<a class='text-dark ms-1 text-decoration-none' href='{$host}'><strong>Log in</strong></a></div>";
//                unset($_SESSION['success']);
//            }




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--fav icon -->
    <link rel="icon" href="assets/images/fav_icon.png" type="image/x-icon">

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

<div class="container-fluid h-auto p-5">
    <div class="row d-flex justify-content-center align-items-center flex-column  p-5">
        <div class="login-logo col-3 my-3">
            <i class="fa-solid fa-address-card"></i>
        </div>
        <div class="mb-2 mt-5 col-3">
            <h3 class="text-center">Registration</h3>
        </div>
        <div class="col-3 custom-col-height px-4 py-3 mb-5 shadow background">

            <?php
            if ( ! empty( $session->get( 'error' ) ) ) {
                echo "<div class='alert alert-danger text-center'>" . $session->get( 'error' ) . "</div>";
                unset( $_SESSION['error'] );
            }

            if ( isset( $_SESSION['success'] ) ) {
                echo "<div class='alert alert-success text-center'>" . $session->get( 'success' ) . "<a class='text-dark ms-1 text-decoration-none' href='{$host}'><strong>Log in</strong></a></div>";
                unset( $_SESSION['success'] );
            }

            if ( isset( $_SESSION['field_errors'] ) ) {
                $field_errors = $_SESSION['field_errors'];
                unset( $_SESSION['field_errors'] );

                /*echo '<pre>';
                print_r( $field_errors );
                echo '</pre>';*/
            }
            ?>
            <form id="signupForm" action="" method="post">
                <div class="form-group mb-3">
                    <label for="email_field" class="form-label">Email</label>
                    <input required id="email_field" type="email" name="email" class="form-control border border-secondary"
                           placeholder="Enter valid email"/>

                    <?php
                    if(isset($field_errors['email'])){
                        echo '<div class="field-error field-error-email">'.$field_errors['email'].'</div>';
                    }
                    ?>

                </div>
                <div class="form-group mb-3">
                    <label for="username_field" class="form-label">Username</label>
                    <input required  id="username_field" type="text" name="username"
                            class="form-control border border-secondary" placeholder="Enter username" />
                </div>
                <div class="form-group mb-3">
                    <label for="password_field" class="form-label">Password</label>
                    <input required id="password_field" type="password" name="password"
                           class="form-control border border-secondary" placeholder="Enter password"/>
                </div>
                <div class="form-group mb-3">
                    <label for="c_password_field" class="form-label">Password</label>
                    <input required id="c_password_field" type="password" name="confirm_password"
                           class="form-control border border-secondary" placeholder="Retype password"/>
                </div>
                <div class="form-group mb-3">
                    <input required type="checkbox" class="form-check-input border border-black" name="agree_terms"
                           id="agree_terms"/>
                    <label id="check-label-id" class="form-check-label" for="agree_terms">Agree to our terms & conditions</label>
                </div>
                <button type="submit" name="submit" value="register" class="btn btn-primary form-control">Register
                </button>
            </form>
        </div>
        <div class="col-3 mt-3 border border-secondary rounded-2  p-2 background1">
            <h6 class="text-center fw-semibold text-primary">
                Sign in with key pass
            </h6>
            <p class="text-center"><span>Have already registered?</span><a href="login.php">Log into account</a></p>
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