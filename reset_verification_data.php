<?php

use Rakit\Validation\Validator;

require 'vendor/autoload.php';
include_once "classes/database.php";
include_once "classes/SessionManager.php";

//session instance
$session = new SessionManager();
//if(isset($_GET['id'])){
//    $user_id=$_GET['id'];
//}
$user_id=$id2;

if (isset($_POST['submit'])) {

    $validator = new Validator();
    $validation = $validator->validate($_POST, [
        'reset_code' => 'required|numeric',
    ]);

    if ($validation->fails()) {
        $validation_errors = $validation->errors();
        $errors = $validation_errors->firstOfAll();

        $session->set("reset_field_errors", $errors);

    } else {
        $reset_code = $_POST['reset_code'];
        $db_connect=new Database();
        $conn=$db_connect->conn;
        $sql="SELECT * FROM login_table WHERE id={$user_id} AND reset_code={$reset_code}";
        $result=mysqli_query($conn,$sql) or die("query unsuccessful");
        if(mysqli_num_rows($result)>0){

            header("Location:/newpass-set/{$user_id}");
        }
        else{
            $reset_error="verification code is wrong";


        }
    }
}

if(isset($reset_error)){
    $session->set("reset_error", $reset_error);

    header("Location:/reset/$user_id");
}


if (isset($_SESSION['reset_field_errors'])) {

    header("Location:/reset/$user_id");
//                echo '<pre>';
//                print_r( $field_errors );
//                echo '</pre>';
}


?>