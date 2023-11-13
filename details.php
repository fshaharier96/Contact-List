<?php
$id=$_GET['page'];
$conn=mysqli_connect("localhost","root",'',"contact-list") or die("connection failed");
$sql="SELECT * FROM contact_info_table WHERE id={$id}";
$result=mysqli_query($conn,$sql) or die("query unsuccessful");
if(mysqli_num_rows($result)>0){
   
      $row=mysqli_fetch_assoc($result);

 

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
    <title>Edit Contact</title>
</head>
<body>
    <?php
    include_once 'header.php';
    ?>
    <div class="details-container">
      <!--upper container starts-->
    
       <div class="details-upper-container  d-flex col-12">
             <div class="details-img-box  col-6 ">
                <img class="h-75 img-fluid" src="<?php echo $row['contact_image']  ?>" alt="mahin" class="details-img">
                <p class="details-img-name"><?php echo $row['first_name']." ".$row['last_name'] ?></p>
             </div>
             <div class="details-btn-box  d-flex col-6">
                 
                    <input class="btn btn-primary" type="submit" name="submit" value="Edit">
                  
            </div> 
       </div>

       <!--upper container ends-->


       <!--middle container starts-->

      <div class="details-middle-container">
          <div class="details-inner-middle-container">
            <div><i class="fa-regular fa-envelope"></i></div>
            <div><i class="fa-regular fa-calendar"></i></div>
            <div><i class="fa-regular fa-note-sticky"></i></div>
            <div><i class="fa-solid fa-video"></i></div>

          </div>

      </div>

       <!--middle container ends-->


       <!--lower container starts-->

       <div class="details-lower-container">
              <div class="details-left-container">
               <h4>Contact Details</h4>
                 <div class="details-email-container">
                 <i class="fa-regular fa-envelope"></i><a href="#">Add Email</a>
                  </div>
                 <div class="details-phone-container">
                 <i class="fa-solid fa-phone"></i><span><?php echo $row['phone']?> - Phone</span>
                 </div>
                 <div class="details-birthday-container">
                 <i class="fa-solid fa-cake-candles"></i><a href="#">Add Birthday</a>
                 </div>
              </div>


              <div class="details-right-container">
               <h4>History</h4>
               <div class="details-last-edit">
                  <span>Last edited .</span><span></span>
               </div>
               <div class="details-add-contacts">
                  <span>Add to contacts .</span><span></span>
               </div>

            </div>

       </div>
       <?php
          }

       ?>
       <!--lower container ends-->

    </div>
    
    <script src='app/jquery.js'></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src='app/header.js'></script>
    <script src='app/details.js'></script>
</body>
</html>