<?php


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

     <!--boostrap css file-->
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">

     <!--awsome notification files-->
     <link rel="stylesheet" href="assets/vendors/awsome-notification/style.css"></link>
     <script src="assets/vendors/awsome-notification/index.var.js"></script>


    <link rel="stylesheet" href="style/css/main.css">
    <title>Document</title>
</head>
<body>
<?php
 include_once "header.php";
?>
  
    <div class="container shadow p-4 pe-0">

        <div class="row">

            <!-- body left-container starts-->

            <div id="home-left-container" class="col-2">
                <div class="row  d-flex justify-content-start align-items-center  p-3 mb-2 header-add">
                    <button class="btn btn-primary custom-create-btn">
                        <span><i class="fa-solid fa-plus"></i></span>
                        <span>Create Contact</span>
                    </button>
                </div>

                <div class="row p-3 mb-2">
                    <div class="py-2">
                        <span class="me-3"><i class="fa-regular fa-user"></i></span>
                        <span class="me-5">contacts</span>
                        <span class="ms-1">19</span>
                    </div>
                    <div class="py-2">
                     <span class="me-3"><i class="fa-solid fa-clock-rotate-left"></i></span>
                     <span>frequent</span>
                    </div>
                    <div class="py-2">
                     <span class="me-3"><i class="fa-regular fa-address-card"></i></span>
                     <span class="me-5">others</span>
                     <span class="ms-1"><i class="fa-solid fa-circle-exclamation"></i></span>
                    </div>
                
                </div>
                <h6 class="ps-3">Fix & Manage</h6>
                <div class="p-3 pt-2">
                <div class="py-2">
                    <span class="me-3"><i class="fa-solid fa-wand-magic-sparkles"></i></span>
                     <span>Merge & Fix</span>
                </div>
                <div class="py-2">
                    <span class="me-3"><i class="fa-solid fa-download"></i></span>
                     <span>Import</span>
                </div>

                <div class="py-2">
                    <span class="me-3"><i class="fa-solid fa-trash-can"></i></span>
                     <span>Trash</span>
               </div>

                </div>

            </div>


            <!-- body left-container starts-->

            <!-- body table containter starts-->

            
            <div class="col-9 p-3 item-container">
                
            </div>
           

            <!-- body table containter ends-->

        </div>

   </div>

   
   <script src="assets/js/jquery.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
   <script src="assets/js/header.js"></script>
   <script src="assets/js/home.js"></script>
    
</body>
</html>