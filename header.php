<?php

?>
<div class="container-fluid">
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
                <div class="header-setting-btn">
                    <i class="fa-solid fa-gear fs-4"></i>
                </div>
                <div class="header-help-btn">
                    <i class="fa-solid fa-question"></i>
                </div>
                <div class="header-logout-btn">
                <a href="logout.php"><i title="Log out" class="fa-solid fa-right-from-bracket fs-4"></i></a>
                </div>
        </div>
    </div>
</div>


