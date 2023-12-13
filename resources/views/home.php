<?php
   $dir=dirname(dirname(__DIR__));
   include_once $dir . "/classes/Database.php";
   $db_connect=new Database();
   $conn=$db_connect->conn;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" href="../../assets/images/fav_icon.png" type="image/x-icon">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

     <!--boostrap css file-->
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">

     <!--awsome notification files-->
     <link rel="stylesheet" href="../../assets/vendors/awsome-notification/style.css"></link>
     <script src="../../assets/vendors/awsome-notification/index.var.js"></script>



    <link rel="stylesheet" href="../../assets/style/css/main.css">
    <title>Document</title>
</head>
<body>
<?php
 include_once $dir."/header.php";
?>
  
    <div class="container shadow p-4">

        <div class="row">

            <!-- body left-container starts-->

            <div id="home-left-container" class="col-3">
                <div class="row  d-flex justify-content-start align-items-center  p-3 mb-2 header-add">
                    <button class="btn btn-primary custom-create-btn">
                        <span><i class="fa-solid fa-plus"></i></span>
                        <span>Create Contact</span>
                    </button>
                </div>

                <div class="row p-3 mb-2">
                    <div class="py-2 px-2 left-side-item-bg">
                        <span class="me-3">
                            <i class="fa-regular fa-user"></i>
                        </span>
                        <span class="me-5">contacts</span>
                        <span class="ms-1">19</span>
                    </div>
                    <div id="favourite_items" class="py-2 px-1 left-side-item-bg">
                        <span class="me-3">
                        <i class="fa-regular fa-star"></i>
                        </span>
                        <span class="me-5">favourites</span>
                        <span class="ms-1">3</span>
                    </div>
                    <div class="py-2 px-2 left-side-item-bg">
                     <span class="me-3"><i class="fa-solid fa-clock-rotate-left"></i></span>
                     <span>frequent</span>
                    </div>
                    <div class="py-2 px-2 left-side-item-bg">
                     <span class="me-3"><i class="fa-regular fa-address-card"></i></span>
                     <span class="me-5">others</span>
                     <span class="ms-1"><i class="fa-solid fa-circle-exclamation"></i></span>
                    </div>
                
                </div>
                <h6 class="ps-3">Fix & Manage</h6>
                <div class="p-3 pt-2">
                <div class="py-2 px-2 left-side-item-bg">
                    <span class="me-3"><i class="fa-solid fa-wand-magic-sparkles"></i></span>
                     <span>Merge & Fix</span>
                </div>
                <div id="import-id" class="py-2 px-2 left-side-item-bg">
                    <span class="me-3"><i class="fa-solid fa-file-import"></i></span>
                     <span>Import</span>
                </div>

                <!--modal starts -->
                <div class="container-fluid w-100 h-100 shadow position-absolute  p-4 bg-dark bg-opacity-25 top-0 start-0  d-flex justify-content-center align-items-center d-none home-modal">

                    <form action="/import" method="post" class=" bg-white bg-opacity-100 p-4 col-2" enctype="multipart/form-data">

                    <h5 class="mb-3">Import contacts</h5>
                    <label id="modalLabelId" for="fileInput" class="btn btn-sm btn-primary">select file</label>
                    <span id="fileNameId"></span>
                    <br/>
                    <input hidden  id="fileInput" type="file" name="file"/>
                    <p class="text-primary  mt-3">Only CSV file is accepted !</p>
                    <button id="closeId" type="button" class="btn btn-sm btn-secondary" >Cancel</button>
                    <button type="submit" name="submit" class="btn btn-sm btn-primary">Upload</button>

                    </form>
                </div>
                 

                <!-- modal ends -->
                

                <div id="trash_items" class="py-2 px-2 left-side-item-bg">
                    <span class="me-3"><i class="fa-solid fa-trash-can"></i></span>
                     <span>Trash</span>
               </div>

                </div>

            </div>


            <!-- body left-container starts-->

            <!-- body table containter starts-->
            <div class="col-9 d-flex flex-column">

            <!-- <div class="col-12 p-3 favourite-container">
                    
            </div> -->
            <div class="col-12 p-3 item-container">
              
                
            </div>
            </div>
           

            <!-- body table containter ends-->

        </div>

   </div>


<script src="../../assets/js/jquery.js"></script>
<!--   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>-->
<!--   <script src="../../assets/js/header.js"></script>-->
<!--   <script src="../../assets/js/home.js"></script>-->
<script src="../../dist/main-output.js"></script>
    
</body>
</html>