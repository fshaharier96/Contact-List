<?php
   include_once "classes/database.php";
   $db_connect=new Database();
   $conn=$db_connect->conn;
   session_start();
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
    <link rel="stylesheet" href="style/main.css">

    <title>Document</title>
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
          <form action="" method="post">
                <div class="mb-3 mt-3">
                  <label class="form-label">Username</label>
                  <input type="text" name="username" class="form-control border border-secondary">
                </div>
                <div class="mb-4">
                  <label for="exampleInputPassword1" class="form-label">Password</label>
                  <input type="password" name="password" class="form-control border border-secondary">
                </div>
                <div class="mb-3 form-check">
                  <input type="checkbox" class="form-check-input border border-black" id="exampleCheck1">
                  <label class="form-check-label" for="exampleCheck1">Check me out</label>
                </div>
                <button type="submit" name="submit" class="btn btn-primary form-control">Login</button>
            </form>
      </div>
      <div class="col-3 mt-3 border border-secondary rounded-2  p-2 background1">
        <h6  class="text-center fw-semibold text-primary">
           Sign in with key pass
        </h6>
        <p class="text-center"><span>New to Contact Hub?</span><a href="signup.php">Create an account</a></p>

      </div>
    </div>
</div>


<!--bootstrap code ends-->

       <?php
         if(isset($_POST['submit'])){
            $username=$_POST['username'];
            $password=$_POST['password'];
            $sql="SELECT * FROM login_table WHERE username='{$username}' AND password='{$password}'";
            $result=mysqli_query($conn,$sql) or die("query unsuccessful : ".mysqli_error($conn));
            if(mysqli_num_rows($result)>0)
            {     $row=mysqli_fetch_assoc($result);
                  $_SESSION['id']=$row['id'];
                  $_SESSION['user']=$row['username'];
                  // echo "data is correct";
                  header("Location:{$host}home.php");
            }
            else{
                echo "<p>incorrect username or password !</p>";
            }
         }

       ?>

<!-- Javacript files-->
<script src="app/jquery.js"></script>
<script src="	https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="app/index.js"></script>
<script>
      if(window.history.replaceState){
         window.history.replaceState(null,null,window.location.href);
         }
     </script>
    
</body>
</html>