<?php
 include_once "classes/database.php";

session_start();
if(isset($_SESSION['user'])){
  session_unset();
  session_destroy();
  header("Location:{$host}login.php");
}else{
  echo "session variable is not set";
}


