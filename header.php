<?php

?>

<div class="container custom-header-height">
    <div class="row h-100 d-flex justify-content-evenly align-items-center px-4">
       <div class="col-3  d-flex justify-content-start align-items-center w-25 h-75">
        <div id="header-toggle-button" class="me-4"><i class="fa-solid fa-bars fs-4"></i></div>
        <span class="me-3">
            <a  href="/home"><i class="fa-solid fa-address-book fs-3 text-primary"></i>
           </a>
        </span>
        <span class="fs-4 text-secondary">
            <a class="text-decoration-none text-secondary" href="/home">Contacts Manage</a>
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
               <div title="Export Contact" class="header-setting-btn d-flex align-items-center">
                   <form action="/export" method="post">
                    <button type="submit" name="submit" class="border border-0 bg-transparent">
                        <i class="fa-solid fa-file-export text-secondary fs-5"></i>
                    </button>
                   </form>
                </div>

                <div title="settings menu" class="header-setting-btn">
                    <i class="fa-solid fa-gear fs-4 custom-header-icon"></i>
                </div>
                <div title="help menu" class="header-help-btn">
                    <i class="fa-solid fa-question custom-header-icon"></i>
                </div>
                <div class="header-logout-btn">
                <a href="/logout"><i title="Log out" class="fa-solid fa-right-from-bracket fs-4 custom-header-icon"></i></a>
                </div>
        </div>

    </div>
     
</div>


