<?php

session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--fav icon -->
    <link rel="icon" href="../../assets/images/fav_icon.png" type="image/x-icon">

    <!--fontawsome cdn link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <!--boostrap css file-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">


    <!--styling file-->
    <link rel="stylesheet" href="../../assets/style/css/main.css">

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
        <div class="col-4 custom-col-height px-4 py-3 mb-5 shadow background">
            <div id="error-success-messages">
				<?php
				if ( isset($_SESSION['success'] ) ) {
					echo "<div class='alert alert-success text-center'>" .  $_SESSION['success'] . "<a class='text-dark ms-1 text-decoration-none' href='/login'><strong>Log in</strong></a></div>";
                    unset($_SESSION['success']);
				}
                if ( isset($_SESSION['error'] ) ) {
                    echo "<div class='alert alert-danger text-center'>" . $_SESSION['error'] . "</div>";
                    unset($_SESSION['error']);
                }
				?>
            </div>

            <form id="signupForm" action="/signup-data" method="post">
                <div class="form-group mb-3">
                    <label for="email_field" class="form-label">Email</label>
                    <input id="email_field" type="email" name="email" class="form-control border border-secondary"
                           placeholder="Enter valid email"/>

					<?php
					if ( isset( $_SESSION['field_errors'] ) ) {
						echo '<div class="invalid-feedback">' .  $_SESSION['field_errors']['email'] . '</div>';
                        unset($_SESSION['field_errors']['email']);
					}
					?>
                    <span></span>
                </div>
                <div class="form-group mb-3">
                    <label for="username_field" class="form-label">Username</label>
                    <input id="username_field" type="text" name="username"
                           class="form-control border border-secondary" placeholder="Enter username"/>
					<?php
					if ( isset( $_SESSION['field_errors']) ) {
						echo '<div class="invalid-feedback">' . $_SESSION['field_errors']['username'] . '</div>';
                        unset($_SESSION['field_errors']['username']);

					}
					?>
                    <span></span>
                </div>

                <div class="form-group mb-3">
                    <label for="password_field" class="form-label">Password</label>
                    <input id="password_field" type="password" name="password"
                           class="form-control border border-secondary" placeholder="Enter password"/>
					<?php
					if ( isset( $_SESSION['field_errors']) ) {
						echo '<div class="invalid-feedback">' . $_SESSION['field_errors']['password']. '</div>';
                        unset($_SESSION['field_errors']['password']);
					}
					?>
                    <span></span>
                </div>

                <div class="form-group mb-3">
                    <label for="c_password_field" class="form-label">Password</label>
                    <input id="c_password_field" type="password" name="confirm_password"
                           class="form-control border border-secondary" placeholder="Retype password"/>
					<?php
					if ( isset( $_SESSION['field_errors']) ) {
						echo '<div class="invalid-feedback">' .  $_SESSION['field_errors']['confirm_password'] . '</div>';
                        unset($_SESSION['field_errors']['confirm_password']);

                    }
					?>
                    <span></span>
                </div>
                <div class="form-group mb-3">
                    <input type="checkbox" class="form-check-input border border-black" name="agree_terms"
                           id="agree_terms"/>
                    <label id="check-label-id" class="form-check-label" for="agree_terms">Agree to our terms & conditions</label>
					<?php
					if ( isset($_SESSION['field_errors'] ) ) {
						echo '<div class="invalid-feedback">' . $_SESSION['field_errors']['agree_terms'] . '</div>';
                        unset($_SESSION['field_errors']);
					}
					?>
                    <span></span>
                </div>
                <button type="submit" name="submit" value="register" class="btn btn-primary form-control">Register
                </button>
            </form>
        </div>
        <div class="col-4 mt-2 border border-secondary rounded-2  p-2 background1">
            <h6 class="text-center fw-semibold text-primary">
                Sign in with key pass
            </h6>
            <p class="text-center"><span>Have already registered?</span><a href="/login">Log into account</a></p>
        </div>
    </div>
</div>


<!--bootstrap code ends-->


<!-- Javacript files-->
<script src="../../assets/js/jquery.js"></script>
<script src="../../assets/vendors/jquery-form-validation/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="../../assets/js/signup.js"></script>
<script>
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
</script>
</body>
</html>