<?php
 include_once "classes/database.php";
 $db_connect=new Database();
 $conn=$db_connect->conn;
// $conn=mysqli_connect("localhost",'root','','contact-list') or die('connection failed');
$user_id=$_GET['page'];
$sql="SELECT * FROM contact_info_table WHERE id={$user_id}";
$result=mysqli_query($conn,$sql) or die("query unsuccessful");
if(mysqli_num_rows($result)>0)
{
 

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

     <!-- flatpickr css link-->
     <link rel="stylesheet" href="assets/vendors/jquery-flatpickr/flatpickr.min.css"/>

     <!--IntlTelInput plugin css link-->

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/intl-tel-input@18.2.1/build/css/intlTelInput.css">

     <!--boostrap css file-->
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"> 

     <link rel="stylesheet" href="style/css/main.css">

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
          while($row=mysqli_fetch_assoc($result))
          {

             
        ?>

     <form id="editForm" class="form control" action="edit_data.php" method="post" enctype="multipart/form-data"> 


   <!-- Upper container starts -->

        <div class="edit-upper-container py-3  border-bottom border-dark-subtle d-flex col-12 ">
            <div class="edit-img-box col-6 ms-5">
                <label for="edit-file-id" class="edit-img-upload">
                <?php 
                      if(empty($row['contact_image']))
                      {
                    ?>
                    <div class="edit-img-icon"><i class="fa-regular fa-image"></i></div>
                    <?php 
                        } else{

                     ?>
                   
                    <img src="<?php echo $row['contact_image'] ?>" width="90" id="edit-image-id">

                     <?php 
                        }
                     ?>
                </label>
                <?php
                   $img_file=$row['contact_image'];
                   $pos=strpos($img_file,'/')+1;
                   $str=substr($img_file,$pos);
                
                ?>
            <input  hidden type='file' name='uploadfile'  id='edit-file-id'>

            </div>
            <div class="edit-btn-box col-6 d-flex justify-content-center align-items-end">
                  <div class="edit-btn">
                    <input type="submit" name="submit" class="custom-btn" value="save">
                 </div>
            </div>
          
        </div>

        <!-- Upper container ends -->

        <!--lower container starts-->

        <div class="edit-lower-container">
             <input class="form-control" hidden type='number' name="id" value="<?php echo $row['id'] ?>">
             <input hidden type='text' name="contact_image" value="<?php echo $row['contact_image'] ?>">

            <div class="d-flex mb-3">
                <label><i class="fa-regular fa-user"></i></label>
                <input class="form-control border border-secondary ms-1" type="text"  class="icon-input" name="fname" placeholder="First name" value="<?php echo $row['first_name'] ?>">
            </div>
            <span id="error-fname"></span>
               
            <div class="d-flex mb-3">
                <input class="form-control border border-secondary ms-3" type="text" name="lname" placeholder="Last name" value="<?php echo $row['last_name'] ?>">
            </div>
            <span id="error-lname"></span>
            <div class="d-flex mb-3"> 
                 <label><i class="fa-solid fa-building"></i></label>
                 <input class="form-control border border-secondary ms-1"  type="text"  name="company" placeholder="Company" value="<?php echo $row['company'] ?>">
            </div>
            
            
            <div class="d-flex mb-3">
                 <input class="form-control border border-secondary ms-3" type="text" name="job_title" placeholder="Job title" value="<?php echo $row['job_title'] ?>">
            </div>
            
            <div class="d-flex mb-3">
                 <input class="form-control border border-secondary ms-3"  type="text" name="department" placeholder="Department" value="<?php echo $row['department'] ?>">
            </div>

            <div class="d-flex mb-3">
                <label><i class="fa-regular fa-envelope"></i></label>
                <input  class="form-control border border-secondary ms-1"  type="email"  class="icon-input" name="email" placeholder="Email" value="<?php echo $row['email'] ?>">
            </div>
            <span id="error-email"></span>
            <div class="d-flex mb-3 edit-tel">
                <label><i class="fa-solid fa-phone"></i></label>
                <input id="phone"  class="form-control border border-secondary ms-1"  type="tel" name="phone" value="<?php echo $row['phone'] ?>">
                <input hidden id="countryCode" name="countryCode"/>
            </div>
            <span id="error-phone"></span>
            <div class="d-flex mb-3">
                <label><i class="fa-solid fa-location-dot"></i></label>
                <!-- <select id="countryList" class="form-select border border-secondary ms-1" name="country">
                </select> -->
                <input class="form-control border border-secondary ms-1"  type="text"  class="icon-input" name="country" placeholder="Country" value="<?php echo $row['country']?>">
            </div>
            <span id="error-country"></span>
            <div class="d-flex mb-3">
                <input class="form-control border border-secondary ms-3"  type="text" name="street_address" placeholder="Street address" value="<?php echo $row['street_address'] ?>">
            </div>

            <div class="d-flex mb-3">
                <input class="form-control border border-secondary ms-3"  type="text" name="city" placeholder="City" value="<?php echo $row['city'] ?>">
            </div>
            <div class="d-flex mb-3">
                <input class="form-control border border-secondary ms-3"  type="text" name="postal_code" placeholder="Postal code" value="<?php echo $row['postal_code'] ?>">
            </div>
            <div class="d-flex mb-3">
                <label><i class="fa-solid fa-cake-candles"></i></label>
                <input id="edit-datepicker" class="form-control border border-secondary ms-1"   type="date"  class="icon-input" name="birth_date" placeholder="Birthday" value="<?php echo $row['birth_date'] ?>">
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
</body>
</html>