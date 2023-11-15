<?php

?>
<div class="container-fluid custom-header-height">
    <div class="row h-100 d-flex justify-content-evenly align-items-center px-4">
       <div class="col-3  d-flex justify-content-start align-items-center w-25 h-75">
        <div class="me-4"><i class="fa-solid fa-bars fs-4"></i></div>
        <span class="me-3">
            <a class="custom-header-link-decoration" href="home.php"><i class="fa-solid fa-address-book fs-3 text-primary"></i>
           </a>
        </span>
        <span class="fs-4 text-secondary">
            <a href="home.php">Contacts Manage</a>
        </span>
     </div>

     <div class="col-5 w-50 h-100  d-flex align-items-center">
       <div class="w-100 h-50 custom-search-inner">

         <button id="header-btn1">
            <i class="fa-solid fa-magnifying-glass"></i>
          </button>
            
          <input class="w-75 h-100 custom-header-input" id="header-search"  type="text" placeholder="search contacts"/>
          <button id="header-btn2">
                    <i class="fa-solid fa-xmark text-secondary"></i>
            </button>
         
       </div>
     </div>

     <div class="custom-width  header-list-container header-absolute-position">
                <table id="tbl1">

                </table>
        </div>

        <div class="col-3 w-25 header-setting-container d-flex justify-content-end">
                <div title="settings menu" class="header-setting-btn">
                    <i class="fa-solid fa-gear fs-4 custom-header-icon"></i>
                </div>
                <div title="help menu" class="header-help-btn">
                    <i class="fa-solid fa-question custom-header-icon"></i>
                </div>
                <div class="header-logout-btn ">
                <a href="logout.php"><i title="Log out" class="fa-solid fa-right-from-bracket fs-4 custom-header-icon"></i></a>
                </div>
        </div>

    </div>
     
</div>



<!-- <div class="container-fluid">
    <div class="row d-flex justify-content-evenly align-items-center custom-header-height ">
        <div class="col-2 pt-3 ">
                <a class="d-flex fs-2 text-decoration-none" href="home.php" class="header-logo">
                 <p class="me-2"><i class="fa-solid fa-address-book"></i></p>
                 <p>Contacts</p>
                </a>
         </div>

    
        <div class="col-2 pt-3 border  rounded-pill d-flex justify-content-center align-items-center shadow custom-header-add header-add">
            <p class="text-primary me-2"><i class="fa-solid fa-plus"></i></p>
            <p>Create contact</p>
        </div>


        <div class="col-4 pt-3  d-flex align-items-center header-relative-position">
            
                <div class="input-group mb-3">
                <input type="text" name="search" autocomplete="off" id="header-search" class="form-control border border-secondary" placeholder="search contacts">
                <span class="input-group-text  border border-secondary" id="basic-addon2">
                    <button id="header-btn1">
                    <i class="fa-solid fa-xmark"></i>
                    </button>
                    <button id="header-btn2">
                    <i class="fa-solid fa-magnifying-glass"></i>
                     </button>
                </span>
                </div>
          </div>

        <div class="custom-width  header-list-container header-absolute-position">
                <table id="tbl1">

                </table>
        </div>

        <div class="col-2 header-setting-container d-flex justify-content-end">
                <div title="settings menu" class="header-setting-btn">
                    <i class="fa-solid fa-gear fs-4 custom-header-icon"></i>
                </div>
                <div title="help menu" class="header-help-btn">
                    <i class="fa-solid fa-question custom-header-icon"></i>
                </div>
                <div class="header-logout-btn ">
                <a href="logout.php"><i title="Log out" class="fa-solid fa-right-from-bracket fs-4 custom-header-icon"></i></a>
                </div>
        </div>
    </div>
</div> -->


