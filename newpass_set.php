<?php 
 include_once "classes/database.php";
if(isset($_POST['submit'])){
    $user_id=$_GET['id'];
   
    if(isset($_POST['password']) && isset($_POST['confirm_password'])){
        $password=$_POST['password'];
        $confirm_password=$_POST['confirm_password'];
        if($password==$confirm_password)
        {
                $db_connect=new Database();
                $conn=$db_connect->conn;
                $sql="UPDATE login_table SET password='{$password}' WHERE id={$user_id}";
                                
                $result=mysqli_query($conn,$sql) or die("query unsuccessful");

                if($result){
                    header("Location:{$host}");
                 }
                 else{
                    echo "Password change failed,try again!";
                    }

        }else{
            echo "password does not matched";
        }
  
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--boostrap css file-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">

     <!--styling file-->
     <link rel="stylesheet" href="style/css/main.css">

    <title>Change password</title>
</head>
<body class="h-100">
    <div class="container-fluid  h-100">
        <div class="row  d-flex justify-content-center align-items-center h-100">
            <div class="col-4 h-50 shadow bg-info-subtle d-flex align-items-center justify-content-center">
                <form class="form-control p-3" action="" method="post">
                <div class="mb-4 text-center">
                  <label for="exampleInputPassword1" class="form-label">Password</label>
                  <input type="password" name="password" class="form-control border border-secondary"/>
                </div>
                <div class="mb-4 text-center">
                  <label for="exampleInputPassword1" class="form-label">Confirm password</label>
                  <input type="password" name="confirm_password" class="form-control border border-secondary"/>
                </div>
                <button class="btn btn-primary form-control" type="submit" name="submit">Change password</button>

                </form>

            </div>
        </div>

    </div>
    
</body>
</html>