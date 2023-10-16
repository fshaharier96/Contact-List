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
       <p>Register in Contact Hub</p>
     </div>
     <div class="login-form-container">
        <form action="" method="post">
            <label>Username</label><br>
            <input type="text" name="username" id="name" required><br>
            <label>Password</label><br>
            <input type="password" name="password" id="password" required><br>
            <input type="submit" name="submit" value="Register" id="register">

        </form>
     </div>
     <div class="login-bottom-container">
        
        <p><span>Have already registered?</span><a href="index.php">Log into account</a></p>
       </div>
       <?php

if(isset($_POST['submit'])){
    $username= $_POST['username'];
    $password= $_POST['password'];
    
   $conn=mysqli_connect("localhost","root","","contact-list") or die("connection fialed");
   $sql="SELECT * FROM login_table WHERE username='{$username}' AND password='{$password}'";
   $sql1="INSERT INTO login_table(username,password) VALUES('{$username}','{$password}')";
   $result=mysqli_query($conn,$sql) or die("query unsuccesful");
   if($result)
   {
    
    if(mysqli_num_rows($result)==0)
    {
         if(mysqli_query($conn,$sql1))
        {
             header("Location:http://localhost/php_practice/PHP_PRACTICE_10/index.php");
         }

        else{
                echo "<p>Register failed! Try again</p>";
            }
     }
     else{
        echo "This account already exist";
     }
 
}
   
     
 }
 
 ?>
 </div>
 

 </div>

<!-- Javacript files-->
<script src="app/jquery.js"></script>
<script src="app/signup.js"></script>
  <script>
      if(window.history.replaceState){
         window.history.replaceState(null,null,window.location.href);
         }
     </script>


    
</body>
</html>