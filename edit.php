<?php
$conn=mysqli_connect("localhost",'root','','contact-list') or die('connection failed');
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
    <link rel="stylesheet" href="style/main.css">
    <title>Edit Contact</title>
</head>
<body>
    <?php
    include_once 'header.php';
    ?>
     <!--container section-->
     <div class="edit-container">

     <?php
          while($row=mysqli_fetch_assoc($result))
          {

             
        ?>
     <form action="edit_data.php" method="post" enctype="multipart/form-data">

    <!-- Upper container starts -->

        <div class="edit-upper-container">
            <div class="edit-img-box">
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
            <div class="edit-btn-box">
                  <div class="edit-btn">
                    <input type="submit" name="submit" value="save">
                 </div>
            </div>
          
        </div>

        <!-- Upper container ends -->

        <!--lower container starts-->

        <div class="edit-lower-container">
             <input hidden type='number' name="id" value="<?php echo $row['id'] ?>">
             <input hidden type='text' name="contact_image" value="<?php echo $row['contact_image'] ?>">

            <div>
                <label><i class="fa-regular fa-user"></i></label>
                <input  type="text"  class="icon-input" name="fname" placeholder="First name" value="<?php echo $row['first_name'] ?>">
            </div>
               
            <div>
                <input type="text" name="lname" placeholder="Last name" value="<?php echo $row['last_name'] ?>">
            </div>
            <div> 
                 <label><i class="fa-solid fa-building"></i></label>
                 <input type="text"  class="icon-input" name="company" placeholder="Company" value="<?php echo $row['company'] ?>">
            </div>
            
            <div>
                 <input type="text" name="job_title" placeholder="Job title" value="<?php echo $row['job_title'] ?>">
            </div>
            
            <div>
                 <input type="text" name="department" placeholder="Department" value="<?php echo $row['department'] ?>">
            </div>

            <div>
                <label><i class="fa-regular fa-envelope"></i></label>
                <input type="email"  class="icon-input" name="email" placeholder="Email" value="<?php echo $row['email'] ?>">
            </div>
            <div>
                <label><i class="fa-solid fa-phone"></i></label>
                <input type="text"  class="icon-input" name="phone" placeholder="Phone" value="<?php echo $row['phone'] ?>">
            </div>
            <div>
                <label><i class="fa-solid fa-location-dot"></i></label>
                <input type="text"  class="icon-input" name="country" placeholder="Country" value="<?php echo $row['country'] ?>">
            </div>
            <div>
                <input type="text" name="street_address" placeholder="Street address" value="<?php echo $row['street_address'] ?>">
            </div>

            <div>
                <input type="text" name="city" placeholder="City" value="<?php echo $row['city'] ?>">
            </div>
            <div>
                <input type="text" name="postal_code" placeholder="Postal code" value="<?php echo $row['postal_code'] ?>">
            </div>
            <div>
                <label><i class="fa-solid fa-cake-candles"></i></label>
                <input type="date"  class="icon-input" name="birth_date" placeholder="Birthday" value="<?php echo $row['birth_date'] ?>">
            </div>

            </div>

         <!--Lower container ends-->

            </form>
     <?php
        }
      }
    ?>
       </div>
    
    <script src='app/jquery.js'></script>
    <script src='app/header.js'></script>
    <script src='app/edit.js'></script>
</body>
</html>