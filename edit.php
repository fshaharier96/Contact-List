<?php
include_once "classes/Database.php";

//database connection
$db_connect = new Database();
$conn = $db_connect->conn;
session_start();

if (isset($_GET['id'])) {
    $user_id = $_GET['id'];
}
$updation_errors = $_SESSION['updation_errors'];


$sql = "SELECT * FROM contact_info_table WHERE id={$user_id}";
$result = mysqli_query($conn, $sql) or die("query unsuccessful");
if (mysqli_num_rows($result) > 0)
{


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

    <title>Edit Contact</title>
</head>
<body>
<?php
include_once 'header.php';
?>

<!-- bootstrap code starts-->

<div class="container shadow">

    <div class="row">

        <?php
        while ($row = mysqli_fetch_assoc($result)) {


            if (!isset($updation_errors['fname'])) {
                $first_name = $row['first_name'];
            }
            if (!isset($updation_errors['lname'])) {
                $last_name = $row['last_name'];
            }
            if (!isset($updation_errors['company'])) {
                $company = $row['company'];
            }
            if (!isset($updation_errors['job_title'])) {
                $job_title = $row['job_title'];
            }
            if (!isset($updation_errors['department'])) {
                $department = $row['department'];
            }
            if (!isset($updation_errors['email'])) {
                $email = $row['email'];
            }
            if (!isset($updation_errors['phone'])) {
                $phone = $row['phone'];
            }
            if (!isset($updation_errors['city'])) {
                $city = $row['city'];
            }
            if (!isset($updation_errors['postal_code'])) {
                $postal_code = $row['postal_code'];
            }

            ?>

            <form id="editForm" class="form control" action="edit_data.php" method="post" enctype="multipart/form-data">


                <!-- Upper container starts -->

                <div class="edit-upper-container py-3  border-bottom border-dark-subtle d-flex col-12 ">
                    <div class="edit-img-box col-6 ms-5">
                        <label for="edit-file-id" class="edit-img-upload">
                            <?php
                            if (empty($row['contact_image'])) {
                                ?>
                                <div class="edit-img-icon"><i class="fa-regular fa-image"></i></div>
                                <?php
                            } else {

                                ?>

                                <img src="<?php echo $row['contact_image'] ?>" width="90" id="edit-image-id"/>

                                <?php
                            }
                            ?>
                        </label>
                        <?php
                        $img_file = $row['contact_image'];
                        $pos = strpos($img_file, '/') + 1;
                        $str = substr($img_file, $pos);

                        ?>

                        <input hidden type='file' name='uploadfile' id='edit-file-id'/>
                        <?php
                        if (isset($_SESSION['updation_errors']['uploadfile'])) {
                            echo '<div class="invalid-feedback w-100">' . $_SESSION['updation_errors']['uploadfile'] . '</div>';
                            unset($_SESSION['updation_errors']['uploadfile']);
                        }
                        ?>

                    </div>
                    <div class="edit-btn-box col-6 d-flex justify-content-center align-items-end">
                        <div class="edit-btn">
                            <input type="submit" name="submit" class="custom-btn" value="save"/>
                        </div>
                    </div>

                </div>

                <!-- Upper container ends -->

                <!--lower container starts-->

                <div class="edit-lower-container">
                    <input class="form-control" hidden type='number' name="id" value="<?php echo $row['id'] ?>"/>
                    <input hidden type='text' name="contact_image" value="<?php echo $row['contact_image'] ?>"/>

                    <div class="d-flex flex-column">

                        <div class="d-flex flex-column mb-3">
                            <div class="d-flex ">
                                <label><i class="fa-regular fa-user"></i></label>

                                <?php
                                if (!isset($first_name)){
                                ?>
                                <input class="form-control border border-secondary ms-1" type="text" class="icon-input"
                                       name="fname"
                                       placeholder="First name" value=""/>
                            </div>
                            <?php
                            echo '<div class="invalid-feedback w-100">' . $_SESSION['updation_errors']['fname'] . '</div>';
                            unset($_SESSION['updation_errors']['fname']);
                            } else {

                                ?>

                                <input class="form-control border border-secondary ms-1" type="text" class="icon-input"
                                       name="fname"
                                       placeholder="First name" value="<?php echo $first_name ?>"/>
                                <?php

                            }
                            ?>
                        </div>
                    </div>

                    <span id="error-fname"></span>

                    <div class="d-flex flex-column mb-3">
                        <div class="mb-3">
                            <?php
                            if (!isset($last_name)){

                            ?>
                            <input class="form-control border border-secondary edit-input-width ms-3" type="text"
                                   name="lname"
                                   placeholder="Last name" value=""/>
                        </div>
                        <?php
                        echo '<div class="invalid-feedback w-100">' . $_SESSION['updation_errors']['lname'] . '</div>';
                        unset($_SESSION['updation_errors']['lname']);
                        } else {

                            ?>

                            <input class="form-control border border-secondary edit-input-width ms-3" type="text"
                                   name="lname"
                                   placeholder="Last name" value="<?php echo $last_name ?>"/>
                            <?php

                        }
                        ?>
                    </div>
                    <span id="error-lname"></span>

                    <div class="d-flex flex-column mb-3">
                        <div class="d-flex mb-3">
                            <label><i class="fa-solid fa-building"></i></label>

                            <?php
                            if (!isset($company)){
                            ?>
                            <input class="form-control border border-secondary edit-input-width ms-1" type="text"
                                   name="company"
                                   placeholder="Company" value=""/>
                        </div>
                        <?php
                        echo '<div class="invalid-feedback w-100">' . $_SESSION['updation_errors']['company'] . '</div>';
                        unset($_SESSION['updation_errors']['company']);
                        } else {

                            ?>

                            <input class="form-control border border-secondary edit-input-width ms-1" type="text"
                                   name="company"
                                   placeholder="Company" value="<?php echo $company ?>"/>
                            <?php

                        }
                        ?>
                    </div>

                    <div class="d-flex flex-column mb-3">
                        <div class="mb-3">
                            <?php
                            if (!isset($job_title)){

                            ?>
                            <input class="form-control border border-secondary edit-input-width ms-3" type="text"
                                   name="job_title"
                                   placeholder="Job title" value=""/>
                        </div>
                        <?php
                        echo '<div class="invalid-feedback w-100">' . $_SESSION['updation_errors']['job_title'] . '</div>';
                        unset($_SESSION['updation_errors']['job_title']);
                        } else {

                            ?>

                            <input class="form-control border border-secondary edit-input-width ms-3" type="text"
                                   name="job_title"
                                   placeholder="Job title" value="<?php echo $job_title ?>"/>
                            <?php

                        }
                        ?>
                    </div>

                    <div class="d-flex flex-column mb-3">
                        <div class="mb-3">
                            <?php
                            if (!isset($department)){

                            ?>
                            <input class="form-control border border-secondary edit-input-width ms-3" type="text"
                                   name="department"
                                   placeholder="Department" value=""/>
                        </div>
                        <?php
                        echo '<div class="invalid-feedback w-100">' . $_SESSION['updation_errors']['department'] . '</div>';
                        unset($_SESSION['updation_errors']['department']);
                        } else {

                            ?>

                            <input class="form-control border border-secondary edit-input-width ms-3" type="text"
                                   name="department"
                                   placeholder="Department" value="<?php echo $department ?>"/>
                            <?php

                        }
                        ?>
                    </div>


                    <div class="d-flex flex-column mb-3">
                        <div class="d-flex mb-3">
                            <label><i class="fa-regular fa-envelope"></i></label>

                            <?php
                            if (!isset($email)){
                            ?>
                            <input class="form-control border border-secondary ms-1" type="email" class="icon-input"
                                   name="email" placeholder="Email" value=""/>
                        </div>
                        <?php
                        echo '<div class="invalid-feedback w-100">' . $_SESSION['updation_errors']['email'] . '</div>';
                        unset($_SESSION['updation_errors']['email']);
                        } else {

                            ?>

                            <input class="form-control border border-secondary ms-1" type="email" class="icon-input"
                                   name="email" placeholder="Email" value="<?php echo $email ?>"/>
                            <?php

                        }
                        ?>
                    </div>
                    <span id="error-email"></span>


                    <div class="d-flex flex-column mb-3 w-100">
                        <div class="d-flex mb-3 edit-tel">
                            <label><i class="fa-solid fa-phone"></i></label>

                            <?php
                            if (!isset($phone)){
                            ?>
                            <input id="phone" class="form-control w-100 border border-secondary ms-1" type="tel"
                                   name="phone[full]" value=""/>
                        </div>
                        <?php
                        echo '<div class="invalid-feedback w-100">' . $_SESSION['updation_errors']['phone'] . '</div>';
                        unset($_SESSION['updation_errors']['phone']);
                        } else {

                            ?>

                            <input id="phone" class="form-control w-100 border border-secondary ms-1" type="tel"
                                   name="phone[full]" value="<?php echo $phone ?>"/>
                            <?php

                        }
                        ?>
                    </div>
                    <span id="error-phone"></span>

                    <div class="d-flex mb-3">
                        <label><i class="fa-solid fa-location-dot"></i></label>
                        <select id="countryList" class="form-select border border-secondary ms-1" name="country">
                            <option value="<?php echo $row['country'] ?>"><?php echo $row['country'] ?>
                            </option>
                        </select>
                    </div>
                    <span id="error-country"></span>

                    <div class="d-flex mb-3">
                        <input class="form-control border border-secondary ms-3" type="text" name="street_address"
                               placeholder="Street address" value="<?php echo $row['street_address'] ?>"/>
                    </div>

                    <div class="d-flex flex-column mb-3">
                        <div class="mb-3">
                            <?php
                            if (!isset($city)){

                            ?>
                            <input class="form-control border border-secondary edit-input-width ms-3" type="text"
                                   name="city"
                                   placeholder="City" value=""/>
                        </div>
                        <?php
                        echo '<div class="invalid-feedback w-100">' . $_SESSION['updation_errors']['city'] . '</div>';
                        unset($_SESSION['updation_errors']['city']);
                        } else {

                            ?>

                            <input class="form-control border border-secondary edit-input-width ms-3" type="text"
                                   name="city"
                                   placeholder="City" value="<?php echo $city ?>"/>
                            <?php

                        }
                        ?>
                    </div>


                    <div class="d-flex flex-column mb-3">
                        <div class="mb-3">
                            <?php
                            if (!isset($postal_code)){

                            ?>
                            <input class="form-control border border-secondary edit-input-width ms-3" type="text"
                                   name="postal_code"
                                   placeholder="Postal code" value=""/>
                        </div>
                        <?php
                        echo '<div class="invalid-feedback w-100">' . $_SESSION['updation_errors']['postal_code'] . '</div>';
                        unset($_SESSION['updation_errors']['postal_code']);
                        } else {

                            ?>

                            <input class="form-control border border-secondary edit-input-width ms-3" type="text"
                                   name="postal_code"
                                   placeholder="Postal code" value="<?php echo $postal_code ?>"/>
                            <?php

                        }
                        ?>
                    </div>


                    <div class="d-flex">
                        <label><i class="fa-solid fa-cake-candles"></i></label>
                        <input id="edit-datepicker" class="form-control border border-secondary ms-1" type="date"
                               class="icon-input" name="birth_date" placeholder="Birthday"
                               value="<?php echo $row['birth_date'] ?>"/>
                    </div>

                </div>

                <!--Lower container ends-->
            </form>

            <?php
        }
        }
        ?>


    </div>


</div>


<!--bootstrap code ends-->


<script src='assets/js/jquery.js'></script>
<script src='assets/vendors/jquery-form-validation/jquery.validate.min.js'></script>
<script src='assets/js/header.js'></script>
<script src='assets/vendors/jquery-flatpickr/flatpickr.js'></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/intl-tel-input@18.2.1/build/js/intlTelInput.min.js"></script>
<script src='assets/js/edit.js'></script>


<!-- <script>
   const phoneInputField = document.querySelector("#phone");
   const phoneInput = window.intlTelInput(phoneInputField, {
     utilsScript:
       "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
   });
 </script>

<script type="text/javascript">
    jQuery( document ).ready( function ($) {
        $("#editForm").submit(function(event){
            const phoneNumber = phoneInput.getNumber();
            $("#phone").val(phoneNumber);
            console.log(phoneNumber);
        });

    });
</script> -->
</body>
</html>