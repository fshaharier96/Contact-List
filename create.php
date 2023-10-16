<?php
//error_reporting(0);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="style/main.css">
    <title>Create Contact</title>
</head>
<body>
<?php
 include_once "header.php";
?>


    <!--container section-->
    <div class="create-container">
    <form action="create_data.php" method="post" enctype="multipart/form-data">
        <div class="create-upper-container">
            <div class="create-img-box">
                <label for="create-file-id" class="create-img-upload">
                    <div class="create-img-icon"><i class="fa-regular fa-image"></i></div>
                    <img src="uploads/pic.jpg" width="90" id="create-image-id">
                </label>
                <input type='file' name='uploadfile'  id='create-file-id'>

            </div>
            <div class="create-btn-box">
                  <div class="create-btn">
                    <input type="submit" name="submit" value="save">
                 </div>
            </div>
          
        </div>
        
        <div class="create-lower-container">

            <div>
                <label><i class="fa-regular fa-user"></i></label>
                <input  type="text"  class="icon-input" name="fname" placeholder="First name">
            </div>
               
            <div>
                <input type="text" name="lname" placeholder="Last name">
            </div>
            <div> 
                 <label><i class="fa-solid fa-building"></i></label>
                 <input type="text"  class="icon-input" name="company" placeholder="Company">
            </div>
            
            <div>
                 <input type="text" name="job_title" placeholder="Job title">
            </div>
            
            <div>
                 <input type="text" name="department" placeholder="Department">
            </div>

            <div>
                <label><i class="fa-regular fa-envelope"></i></label>
                <input type="email"  class="icon-input" name="email" placeholder="Email">
            </div>
            <div>
                <label><i class="fa-solid fa-phone"></i></label>
                <input type="text"  class="icon-input" name="phone" placeholder="Phone">
            </div>
            <div>
                <label><i class="fa-solid fa-location-dot"></i></label>
                <input type="text"  class="icon-input" name="country" placeholder="Country">
            </div>
            <div>
                <input type="text" name="street_address" placeholder="Street address">
            </div>

            <div>
                <input type="text" name="city" placeholder="City">
            </div>
            <div>
                <input type="text" name="postal_code" placeholder="Postal code">
            </div>
            <div>
                <label><i class="fa-solid fa-cake-candles"></i></label>
                <input type="date"  class="icon-input" name="birth_date" placeholder="Birthday">
            </div>

            </div>
            </form>
       </div>

    
   <script>
      if(window.history.replaceState){
         window.history.replaceState(null,null,window.location.href);
      }
     </script>


    <script src='app/jquery.js'></script>
    <script src='app/header.js'></script>
    <script src='app/create.js'></script>
</body>
</html>