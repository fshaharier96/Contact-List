<?php
require( 'vendor/autoload.php' );

use Rakit\Validation\Validator;

include_once "classes/database.php";
include_once "classes/SessionManager.php";

//database connection
$db_connect=new Database();
$conn=$db_connect->conn;

//session instance
$session = new SessionManager();

if(isset($_POST['submit'])){
    $validator  = new Validator();
    $validation = $validator->validate( $_POST+$_FILES, [
            'uploadfile'=>'uploaded_file:0,500K,png,jpeg',
            'fname'=>'required|min:3',
            'lname'=>'required|min:3',
            'company'=>'alpha_spaces',
            'job_title'=>'alpha_spaces',
            'department'=>'alpha_spaces',
            'email'=>'required|email',
            'phone'=>'required',
            'city'=>'alpha_spaces',
            'postal_code'=>'numeric'

    ] );

    if ( $validation->fails() ) {
        $validation_errors = $validation->errors();
        $errors            = $validation_errors->firstOfAll();

        /* echo '<pre>';
         print_r($errors);
         echo '</pre>';*/

//        $session->set( "error", "Invalid username or password" );
        $session->set( "field_errors", $errors );
    }else{

    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $company=$_POST['company'];
    $job_title=$_POST['job_title'];
    $department=$_POST['department'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $country_code=$_POST['countryCode'];
    $country=$_POST['country'];
    $street_address=$_POST['street_address'];
    $city=$_POST['city'];
    $postal_code=$_POST['postal_code'];
    $birthday=$_POST['birth_date'];
    session_start();
    $user_id=$_SESSION['id'];
    $phoneWithCode=$country_code."".$phone;




    if(isset($_FILES['uploadfile'])){
        $file=$_FILES["uploadfile"];
        $fileName=$_FILES["uploadfile"]["name"];
        $fileTempName=$_FILES["uploadfile"]["tmp_name"];
        //   $fileNameWithId=$user_id."-".$fileName;
        //   $folder="uploads/".$fileNameWithId;
        //   move_uploaded_file($fileTempName,$folder);
    }
    /* INSERT INTO `contact_info_table` (`id`, `contact_image`, `first_name`, `last_name`, `company`, `job_title`, `department`, `email`, `phone`, `country`, `street_address`, `city`, `postal_code`, `birth_date`) VALUES (NULL, 'uploads/pic.jpg', 'Jamil', 'Hassan', 'Alpha tech', 'Marketing manager', 'Sales and Marketing', 'jamil@gmail.com', '01922191588', 'Bangladesh', '243/5,free school street,kalabagan', 'Dhaka', '1205', '2023-10-19'); */


    //   $conn=mysqli_connect('localhost',"root",'','contact-list') or die("connection failed");

    $sql="INSERT INTO contact_info_table(user_id,contact_image, first_name, last_name, company, job_title, department, email, phone, country, street_address, city, postal_code, birth_date) VALUES('{$user_id}','{$folder}', '{$fname}', '{$lname}', '{$company}', '{$job_title}', '{$department}', '{$email}', '{$phoneWithCode}', '{$country}', '{$street_address}', '{$city}', '{$postal_code}', '{$birthday}')";

    if(mysqli_query($conn,$sql))
    {    $last_id=mysqli_insert_id($conn);
        $fileNameWithId=$last_id."-".$fileName;
        $folder="uploads/".$fileNameWithId;
        move_uploaded_file($fileTempName,$folder);
        $sql2="UPDATE contact_info_table SET contact_image='{$folder}' WHERE id={$last_id}";
        $result=mysqli_query($conn,$sql2) or die("query unsuccessful");

        header("Location:{$host}home.php");

    }else{
        $_SESSION['failed_msg']="data submission failed";

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
if(isset($_SESSION['failed_msg'])){
$msg= "<div class='alert alert-success text-center'>".$_SESSION['failed_msg']."</div>";
unset( $_SESSION['failed_msg'] );
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--fav icon -->
    <link rel="icon" href="assets/images/fav_icon.png" type="image/x-icon">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <!-- flatpickr css link-->
    <link rel="stylesheet" href="assets/vendors/jquery-flatpickr/flatpickr.min.css"/>

    <!--IntlTelInput plugin css link-->

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/intl-tel-input@18.2.1/build/css/intlTelInput.css">

     <!--boostrap css file-->
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">

     <link rel="stylesheet" href="assets/style/css/main.css">

    <title>Create Contact</title>
</head>

<body>

    <?php
        include_once "header.php";
    ?>


    <!--container section-->

    <div class="container pb-2 shadow">

    <!-- ** form starts ** -->

     <div>
         <?php
         if(isset($msg)){
             echo $msg;
         }
         ?>
     </div>
    <form id="addForm" action="" method="post" enctype="multipart/form-data">

          <!--upper container starts-->

        <div class="create-upper-container  col-12 d-flex pt-4 pb-2 pb-4 border-bottom border-secondary">
            <div class="create-img-box   col-7">
                <label for="create-file-id" class="create-img-upload col-5">
                    <div class="create-img-icon"><i class="fa-regular fa-image"></i></div>
                    <img src="uploads/pic.jpg" width="90" id="create-image-id">
                </label>
                <input hidden type='file' name='uploadfile'  id='create-file-id'/>
                <?php
                if(isset($field_errors['uploadfile'])){
                    echo '<div class="invalid-feedback col-6">'.$field_errors['uploadfile'].'</div>';
                }
                ?>

            </div>
            <div class="create-btn-box d-flex align-items-end col-5">
                  <div class="create-btn">
                    <input class="custom-btn" type="submit" name="submit" value="save"/>
                 </div>
            </div>

        </div>

        <!--upper container ends-->

        <!--lower container starts-->

        <div class="create-lower-container">

            <div class="form-group d-flex flex-column mb-3">
                <div class="d-flex">
                <label>
                    <i class="fa-regular fa-user"></i>
                </label>
                <input class="form-control border border-secondary ms-1" type="text"  name="fname" placeholder="First name"/>
                </div>
                    <?php
                if(isset($field_errors['fname'])){
                    echo '<div class="invalid-feedback">'.$field_errors['fname'].'</div>';
                }
                ?>
            </div>
            <span id="error-fname"></span>

            <div class="form-group d-flex flex-column mb-3">
                <input class="form-control border border-secondary ms-3 create-input-width" type="text" name="lname" placeholder="Last name"/>
                <?php
                if(isset($field_errors['lname'])){
                    echo '<div class="invalid-feedback">'.$field_errors['lname'].'</div>';
                }
                ?>
            </div>
            <span id="error-lname"></span>

            <div class="form-group d-flex mb-3">
                <div class="d-flex w-100">
                 <label>
                    <i class="fa-solid fa-building"></i>
                </label>
                 <input class="form-control border border-secondary  ms-1" type="text"  class="icon-input" name="company" placeholder="Company"/>
                </div>
                    <?php
                if(isset($field_errors['company'])){
                    echo '<div class="invalid-feedback">'.$field_errors['company'].'</div>';
                }
                ?>
            </div>

            <div class="form-group d-flex mb-3">
                 <input class="form-control border border-secondary create-input-width ms-3" type="text" name="job_title" placeholder="Job title"/>
                <?php
                if(isset($field_errors['job_title'])){
                    echo '<div class="invalid-feedback">'.$field_errors['job_title'].'</div>';
                }
                ?>
            </div>

            <div class="form-group d-flex mb-3">
                 <input class="form-control border border-secondary ms-3" type="text" name="department" placeholder="Department"/>
                <?php
                if(isset($field_errors['deparment'])){
                    echo '<div class="invalid-feedback">'.$field_errors['deparment'].'</div>';
                }
                ?>
            </div>

            <div class="form-group d-flex flex-column mb-3">
                <div class="d-flex w-100">
                <label>
                    <i class="fa-regular fa-envelope"></i>
                </label>
                <input  class="form-control  border border-secondary ms-1" type="email"  class="icon-input" name="email" placeholder="Email"/>
                </div>
                    <?php
                if(isset($field_errors['email'])){
                    echo '<div class="invalid-feedback w-100">'.$field_errors['email'].'</div>';
                }
                ?>
            </div>
<!--            <div class="mb-3">-->
<!--                 <button class="form-control ms-3 rounded-pill text-primary fw-medium d-flex justify-content-center align-items-center add-email">-->
<!--                 <span class="fs-3 me-1">+</span>-->
<!--                 <span class="ms-1">Add email</span>-->
<!--                </button>-->
<!--            </div>-->

            <span id="error-email"></span>

            <div class="form-group d-flex flex-column mb-3 create-tel">
                <div class="d-flex">
                <label>
                    <i class="fa-solid fa-phone"></i>
                </label>
                <input id="phone" type="tel" class="form-control border border-secondary pe-0 ms-1" name="phone"/>
                <input hidden id="countryCode" name="countryCode"/>
                </div>
                <?php
                if(isset($field_errors['phone'])){
                    echo '<div class="invalid-feedback">'.$field_errors['phone'].'</div>';
                }
                ?>
            </div>
<!--            <div class="mb-3">-->
<!--                 <button class="form-control ms-3 rounded-pill text-primary fw-medium d-flex justify-content-center align-items-center add-phone">-->
<!--                 <span class="fs-3 me-1">+</span>-->
<!--                 <span class="ms-1">Add phone</span>-->
<!--                </button>-->
<!--            </div>-->
            <span id="error-phone"></span>
<!--            <div class="mb-3">-->
<!--                 <button class="form-control ms-3 rounded-pill text-primary fw-medium d-flex justify-content-center align-items-center add-country">-->
<!--                 <span class="fs-3 me-1">+</span>-->
<!--                 <span class="ms-1">Add address</span>-->
<!--                </button>-->
<!--            </div>-->
            <div class="form-group d-flex mb-3">
                <label>
                    <i class="fa-solid fa-location-dot"></i>
                </label>
                <select id="countryList" class="form-select border border-secondary ms-1" name="country"/>

                </select>
                <!-- <input class="form-control border border-secondary ms-1" type="text"  class="icon-input" name="country" placeholder="Country"> -->
            </div>
            <span id="error-country"></span>

            <div class="form-group d-flex mb-3">
                 <input  class="form-control border border-secondary ms-3" type="text" name="street_address" placeholder="Street address"/>
            </div>

            <div class="form-group d-flex mb-3">
                 <input class="form-control border border-secondary ms-3" type="text" name="city" placeholder="City"/>
                <?php
                if(isset($field_errors['city'])){
                    echo '<div class="invalid-feedback">'.$field_errors['city'].'</div>';
                }
                ?>
            </div>
            <div class="form-group d-flex mb-3">
                 <input class="form-control border border-secondary ms-3" type="text" name="postal_code" placeholder="Postal code"/>
                <?php
                if(isset($field_errors['postal_code'])){
                    echo '<div class="invalid-feedback">'.$field_errors['postal_code'].'</div>';
                }
                ?>
            </div>
            <div class="form-group d-flex mb-3">
                <label>
                    <i class="fa-solid fa-cake-candles"></i>
                </label>
                <input id="datepicker" class="form-control border border-secondary ms-1" type="date"  class="icon-input" name="birth_date" placeholder="Birthday"/>
            </div>
<!--            <div class="mb-3">-->
<!--                 <button class="form-control ms-3 rounded-pill text-primary fw-medium d-flex justify-content-center align-items-center add-website">-->
<!--                 <span class="fs-3 me-1">+</span>-->
<!--                 <span class="ms-1">Add website</span>-->
<!--                </button>-->
<!--            </div>-->
            <div class="text-center">
                <button class="btn btn-sm btn-primary rounded-pill px-3 ms-3">Show more</button>
            </div>

        </div>
  </form>

  <!-- form ends-->

</div>


   <script>
      if(window.history.replaceState){
         window.history.replaceState(null,null,window.location.href);
      }
     </script>

    <!--Javascript Dependencies starts-->

    <script src='assets/js/jquery.js'></script>
    <script src="assets/vendors/jquery-form-validation/jquery.validate.min.js"></script>
    <script src='assets/js/header.js'></script>
    <script src='assets/vendors/jquery-flatpickr/flatpickr.js'></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/intl-tel-input@18.2.1/build/js/intlTelInput.min.js"></script>

    <script src='assets/js/create.js'></script>

    <!--Javascript Dependencies ends-->


</body>
</html>