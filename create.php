<?php
//error_reporting(0);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

     <!--boostrap css file-->
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"> 

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
        <div class="create-upper-container col-12 d-flex pt-4 pb-2 pb-4 border-bottom border-secondary">
            <div class="create-img-box  col-6">
                <label for="create-file-id" class="create-img-upload">
                    <div class="create-img-icon"><i class="fa-regular fa-image"></i></div>
                    <img src="uploads/pic.jpg" width="90" id="create-image-id">
                </label>
                <input hidden type='file' name='uploadfile'  id='create-file-id'>

            </div>
            <div class="create-btn-box d-flex align-items-end col-6">
                  <div class="create-btn">
                    <input class="custom-btn" type="submit" name="submit" value="save">
                 </div>
            </div>
          
        </div>
        
        <div class="create-lower-container">

            <div>
                <label><i class="fa-regular fa-user"></i></label>
                <input class="form-control border border-secondary ms-1" type="text"  class="icon-input" name="fname" placeholder="First name">
            </div>
               
            <div>
                <input class="form-control border border-secondary ms-3" type="text" name="lname" placeholder="Last name">
            </div>
            <div> 
                 <label><i class="fa-solid fa-building"></i></label>
                 <input class="form-control border border-secondary ms-1" type="text"  class="icon-input" name="company" placeholder="Company">
            </div>
            
            <div>
                 <input class="form-control border border-secondary ms-3" type="text" name="job_title" placeholder="Job title">
            </div>
            
            <div>
                 <input class="form-control border border-secondary ms-3" type="text" name="department" placeholder="Department">
            </div>

            <div>
                <label><i class="fa-regular fa-envelope"></i></label>
                <input  class="form-control border border-secondary ms-1" type="email"  class="icon-input" name="email" placeholder="Email">
            </div>
            <div>
                <label><i class="fa-solid fa-phone"></i></label>
                <input type="text"  class="icon-input form-control border border-secondary ms-1 " name="phone" placeholder="Phone">
            </div>
            <div>
                <label><i class="fa-solid fa-location-dot"></i></label>
                <input class="form-control border border-secondary ms-1" type="text"  class="icon-input" name="country" placeholder="Country">
            </div>
            <div>
                <input  class="form-control border border-secondary ms-3" type="text" name="street_address" placeholder="Street address">
            </div>

            <div>
                <input class="form-control border border-secondary ms-3" type="text" name="city" placeholder="City">
            </div>
            <div>
                <input class="form-control border border-secondary ms-3" type="text" name="postal_code" placeholder="Postal code">
            </div>
            <div>
                <label><i class="fa-solid fa-cake-candles"></i></label>
                <input class="form-control border border-secondary ms-1" type="date"  class="icon-input" name="birth_date" placeholder="Birthday">
            </div>

            </div>
            </form>
       </div>

    
   <script>
      if(window.history.replaceState){
         window.history.replaceState(null,null,window.location.href);
      }
     </script>


    <script src='assets/js/jquery.js'></script>
    <script src='assets/js/header.js'></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <script src='assets/js/create.js'></script>
</body>
</html>