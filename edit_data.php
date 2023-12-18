<?php
require('vendor/autoload.php');

use Rakit\Validation\Validator;

include_once "classes/Database.php";
include_once "classes/SessionManager.php";

//database connection
$db_connect = new Database();
$conn = $db_connect->conn;

//session instance
$session = new SessionManager();


if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $validator = new Validator();
    $validation = $validator->validate($_POST + $_FILES, [
        'uploadfile' => 'uploaded_file:0,500K,png,jpeg',
        'fname' => 'required|min:3',
        'lname' => 'required|min:3',
        'company' => 'alpha_spaces',
        'job_title' => 'alpha_spaces',
        'department' => 'alpha_spaces',
        'email' => 'required|email',
        'phone' => 'required',
        'city' => 'alpha_spaces',
        'postal_code' => 'numeric'

    ]);

    if ($validation->fails()) {
        $validation_errors = $validation->errors();
        $errors = $validation_errors->firstOfAll();

        /* echo '<pre>';
         print_r($errors);
         echo '</pre>';*/

//        $session->set( "error", "Invalid username or password" );
        $session->set("updation_errors", $errors);
    } else {


        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $company = $_POST['company'];
        $job_title = $_POST['job_title'];
        $department = $_POST['department'];
        $email = $_POST['email'];
        $phone = $_POST['phone']['full'];
        $country = $_POST['country'];
        $street_address = $_POST['street_address'];
        $city = $_POST['city'];
        $postal_code = $_POST['postal_code'];
        $birthday = $_POST['birth_date'];


        //    if(isset($_FILES['uploadfile'])){
        //     $file=$_FILES["uploadfile"];
        //     $fileName=$_FILES["uploadfile"]["name"];
        //     $fileTempName=$_FILES["uploadfile"]["tmp_name"];
        //     $folder="uploads/".$fileName;
        //     move_uploaded_file($fileTempName,$folder);
        //  }

        $folder = "";

        if ($_FILES['uploadfile']['error'] == 4) {
            $contact_image = $_POST['contact_image'];
            $folder = $contact_image;
            $fileTempName = $_FILES['uploadfile']['tmp_name'];
//            echo "this is if block: <br>";
        } else {
            $file = $_FILES['uploadfile'];
            $fileName = $_FILES['uploadfile']['name'];
            $fileTempName = $_FILES['uploadfile']['tmp_name'];
//            echo "this is else block: <br>";
            $folder = "uploads/" . $fileName;
//            echo $folder;

        }
        move_uploaded_file($fileTempName, $folder);


        //   $conn=mysqli_connect('localhost',"root",'','contact-list') or die("connection failed");
        $sql = "UPDATE contact_info_table SET  contact_image='{$folder}', first_name='{$fname}', last_name='{$lname}', company='{$company}', job_title='{$job_title}', department='{$department}', email='{$email}', phone='{$phone}', country='{$country}', street_address='{$street_address}', city='{$city}', postal_code='{$postal_code}', birth_date='{$birthday}' WHERE id={$id}";

        if (mysqli_query($conn, $sql)) {
            header("Location:{$host}home.php");

        } else {
            $_SESSION['updation_msg'] = "data updation failed";

        }
    }
}
if (isset($_SESSION['updation_errors'])) {
    $field_errors = $_SESSION['updation_errors'];
//    print_r($field_errors);
//    unset($_SESSION['updation_errors']);
    header("Location:{$host}edit.php?id={$id}");


}
if (isset($_SESSION['updation_msg'])) {
    $msg = "<div class='alert alert-success text-center'>" . $_SESSION['updation_msg'] . "</div>";
//    print_r($field_errors);
//    header("Location:{$host}edit.php?page={$id}");
//    unset($_SESSION['updation_msg']);
}
