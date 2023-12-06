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
$user_id=$id4;

if(isset($_POST['submit'])){

    $validator = new Validator();
    $validation = $validator->validate($_POST, [
        'password' => 'required|between:6,12',
        'confirm_password'=>'required|same:password'
    ]);

    if ($validation->fails()) {
        $validation_errors = $validation->errors();
        $errors = $validation_errors->firstOfAll();

        $session->set("newpass_field_errors", $errors);

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
            $reset_pass_error="Password change failed,try again!";

        }

    }

}
if(isset($reset_pass_error)){
    $session->set("reset_pass_error", $reset_pass_error);
    header("Location:/newpass-set/{$user_id}");
}


if (isset($_SESSION['newpass_field_errors'])) {
    header("Location:/newpass-set/{$user_id}");


//                echo '<pre>';
//                print_r( $field_errors );
//                echo '</pre>';
}




