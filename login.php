<?php


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

    <!-- Jquery toastr CSS-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">


    <!--boostrap css file-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">

    <!--styling file-->
    <link rel="stylesheet" href="assets/style/css/main.css">

    <title>Welcome to contact-list</title>
</head>
<body>

<!--bootstrap code starts-->
<div class="container-fluid h-100 p-3">
    <div class="row d-flex justify-content-center align-items-center flex-column h-100 p-3">

        <div class="login-logo col-md-3 my-3">
            <i class="fa-solid fa-address-card"></i>
        </div>
        <div class="mb-2 mt-5 col-md-3">
            <h3 class="text-center">Sign in Contact Hub</h3>
        </div>

        <div class="col-md-3 custom-col-height px-4 py-3 shadow background">

            <form id="loginForm"  method="post">
                <div id="error"></div>
                <div class="mb-3 mt-3">
                    <label for="email_id" class="form-label">Email</label>
                    <input id="email_id" type="email" name="email" class="form-control border border-secondary" placeholder="Enter email"/>
                    <span></span>
                </div>
                <div class="mb-3">
                    <label for="password_id" class="form-label">Password</label>
                    <input id="password_id" type="password" name="password" class="form-control border border-secondary" placeholder="Enter password"/>
                    <span></span>
                    <div class="mt-2">
                        <a class="text-decoration-none fw-semibold" href="forget_pass.php">Forget Password ?</a>
                    </div>

                </div>
                <div class="mb-3 form-check">
                    <input id="checkbox_id" type="checkbox" class="form-check-input border border-black"/>
                    <label for="checkbox_id" class="form-check-label">Remember me</label>
                </div>
                <button type="submit" name="submit" class="btn btn-primary form-control">Login</button>
            </form>
        </div>
        <div class="col-3 mt-3 border border-secondary rounded-2  p-2 background1">
            <h6 class="text-center fw-semibold text-primary">
                Sign in with key pass
            </h6>
            <p class="text-center"><span>New to Contact Hub?</span><a href="signup.php">Create an account</a></p>

        </div>
    </div>
</div>


<!--bootstrap code ends-->

<!--php validation logic starts-->



<script>
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
</script>


<!-- Javacript files-->
<script src="assets/js/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="assets/vendors/jquery-form-validation/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/login.js"></script>


</body>
</html>



