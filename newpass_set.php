<?php
use Rakit\Validation\Validator;

require 'vendor/autoload.php';
include_once "classes/database.php";
include_once "classes/SessionManager.php";

//session instance
$session = new SessionManager();
if(isset($_GET['id'])){
    $user_id=$_GET['id'];
}

if(isset($_POST['submit'])){

    $validator = new Validator();
    $validation = $validator->validate($_POST, [
        'password' => 'required|between:6,12',
        'confirm_password'=>'required|same:password'
    ]);

    if ($validation->fails()) {
        $validation_errors = $validation->errors();
        $errors = $validation_errors->firstOfAll();

        $session->set("field_errors", $errors);

    }else{
        $password=$_POST['password'];
//        $confirm_password=$_POST['confirm_password'];
        $hashedPass=hash('sha256',$password);
//        $hashedConfirmPass=hash('sha256',$confirm_password);
//        if($hashedPass==$hashedConfirmPass)

                $db_connect=new Database();
                $conn=$db_connect->conn;
                $sql="UPDATE login_table SET password='{$hashedPass}' WHERE id={$user_id}";
                                
                $result=mysqli_query($conn,$sql) or die("query unsuccessful");

                if($result){
                    header("Location:{$host}login.php");
                 }
                 else{
                    echo "Password change failed,try again!";
                 }

    }
  
}
if (isset($_SESSION['field_errors'])) {
    $field_errors = $_SESSION['field_errors'];
    unset($_SESSION['field_errors']);

//                echo '<pre>';
//                print_r( $field_errors );
//                echo '</pre>';
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
     <link rel="stylesheet" href="assets/style/css/main.css">

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
                    <?php
                    if (isset($field_errors['password'])) {
                        echo '<div class="invalid-feedback text-start">' . $field_errors['password'] . '</div>';
                    }
                    ?>
                </div>
                <div class="mb-4 text-center">
                  <label for="exampleInputPassword1" class="form-label">Confirm password</label>
                  <input type="password" name="confirm_password" class="form-control border border-secondary"/>
                    <?php
                    if (isset($field_errors['confirm_password'])) {
                        echo '<div class="invalid-feedback text-start">' . $field_errors['confirm_password'] . '</div>';
                    }
                    ?>
                </div>
                <button class="btn btn-primary form-control" type="submit" name="submit">Change password</button>

                </form>

            </div>
        </div>

    </div>
    <script>
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
    </script>
</body>
</html>