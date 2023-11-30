<?php
 include_once "classes/database.php";
 $db_connect=new Database();
 $conn=$db_connect->conn;
$id=$_GET['page'];
// $conn=mysqli_connect("localhost","root",'',"contact-list") or die("connection failed");
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
    <!--fav icon -->
    <link rel="icon" href="assets/images/fav_icon.png" type="image/x-icon">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    
     <!--boostrap css file-->
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"> 

     <link rel="stylesheet" href="assets/style/css/main.css">

    <title>Edit Contact</title>
</head>
<body>
    <?php
    include_once 'header.php';
    ?>
    <div class="details-container">
      <!--upper container starts-->
    
       <div class="details-upper-container  d-flex col-12">
             <div class="details-img-box d-flex justify-content-center align-items-center col-6 ">
                <img class="h-75 img-fluid " src="<?php echo $row['contact_image']  ?>" alt="mahin" class="details-img">
                <p class="details-img-name ps-3 fw-light fs-5"><?php echo $row['first_name']." ".$row['last_name'] ?></p>
             </div>
             <div class="details-btn-box  d-flex justify-content-center align-items-end py-4 col-6">
                 
                    <a href="edit.php?page=<?php echo $id ?>" class="custom-btn d-inline-flex justify-content-center align-items-center text-decoration-none">
                      Edit
                    </a>
                  
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

       <div class="details-lower-container mt-4  d-flex justify-content-center align-items-center  col-12">
              <div class="details-left-container me-4 ps-5 bg-info-subtle col-5 rounded-4">
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


              <div class="details-right-container col-6">
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
    
    <script src='assets/js/jquery.js'></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src='assets/js/header.js'></script>
    <script src='assets/js/details.js'></script>
</body>
</html>