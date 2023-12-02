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

if (isset($_POST['submit'])) {

    $validator = new Validator();
    $validation = $validator->validate($_POST, [
        'reset_code' => 'required|numeric',
    ]);

    if ($validation->fails()) {
        $validation_errors = $validation->errors();
        $errors = $validation_errors->firstOfAll();

        $session->set("field_errors", $errors);

    } else {
        $reset_code = $_POST['reset_code'];
        $db_connect=new Database();
        $conn=$db_connect->conn;
        $sql="SELECT * FROM login_table WHERE id={$user_id} AND reset_code={$reset_code}";
        $result=mysqli_query($conn,$sql) or die("query unsuccessful");
        if(mysqli_num_rows($result)>0){

            header("Location:{$host}/newpass_set.php?id={$user_id}");
        }
        else{
            echo "verification code is wrong";
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
    <title>Enter Reset Code</title>
</head>
<body class="h-100">
    <div class="container-fluid  h-100">
        <div class="row  d-flex justify-content-center align-items-center h-100">
            <div class="col-4 h-50 shadow bg-info-subtle d-flex align-items-center justify-content-center">
                <form class="form-control p-3" action="" method="post">
                <div class="mb-4 text-center">
                  <label for="exampleInputPassword1" class="form-label fs-5 text-center">Enter verification code</label>
                  <input type="number" name="reset_code" class="form-control border border-secondary">
                    <?php
                    if (isset($field_errors['reset_code'])) {
                    echo '<div class="invalid-feedback text-start">' . $field_errors['reset_code'] . '</div>';
                    }
                    ?>
                </div>
                <button class="btn btn-primary form-control" type="submit" name="submit">Continue</button>

                </form>

            </div>
        </div>

    </div>
    
</body>
</html>