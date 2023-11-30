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
<body style="height:100vh">

<!--bootstrap code starts-->
<div class="container-fluid h-100 p-3">
    <div class="row d-flex justify-content-center align-items-center flex-column h-100 p-3">
      <div class="col-6 h-50 d-flex justify-content-center align-items-center flex-column bg-info-subtle shadow">
           <h1 class="mb-3">Welcome to contact hub</h1>
          <div>
              <button class="btn btn-primary"><a class="text-decoration-none text-white" href="login.php">Log in</a></button>
              <button class="btn btn-primary"><a class="text-decoration-none text-white" href="">Explore</a></button>
          </div>
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
<script src="assets/js/index.js"></script>


</body>
</html>



