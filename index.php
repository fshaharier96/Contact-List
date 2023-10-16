<?php


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--fontawsome cdn link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <!--styling file-->
    <link rel="stylesheet" href="style/main.css">

    <title>Document</title>
</head>
<body>
<div class="login-container">
    <div class="login-inner-container">
     <div class="login-logo">
     <i class="fa-solid fa-address-card"></i>
     </div>
     <div class="login-heading">
       <p>Sign in Contact Hub</p>
     </div>
     <div class="login-form-container">
        <form action="" method="post">
            <label>Username</label><br>
            <input type="text" name="username"><br>
            <label>Password</label><br>
            <input type="password" name="password"><br>
            <input type="submit" name="submit" value="Login">

        </form>
     </div>
     <div class="login-bottom-container">
        <h4>
           Sign in with key pass
        </h4>
        <p><span>New to Contact Hub?</span><a href="signup.php">Create an account</a></p>
       </div>

       <?php
         if(isset($_POST['submit'])){
            $username=$_POST['username'];
            $password=$_POST['password'];
            $conn=mysqli_connect("localhost","root","","contact-list") or die("connection fialed");
            $sql="SELECT * FROM login_table WHERE username='{$username}' AND password='{$password}'";
            $result=mysqli_query($conn,$sql) or die("query unsuccessful : ".mysqli_error($conn));
            if(mysqli_num_rows($result)>0)
            {
                  header("Location:http://localhost/php_practice/PHP_PRACTICE_10/home.php");
            }
            else{
                echo "<p>incorrect username or password !</p>";
            }
         }

       ?>
 </div>

 </div>

<!-- Javacript files-->
<script src="app/jquery.js"></script>
<script src="app/index.js"></script>
<script>
      if(window.history.replaceState){
         window.history.replaceState(null,null,window.location.href);
         }
     </script>
    
</body>
</html>