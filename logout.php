<?php

session_start();
if(isset($_SESSION['user'])){
  session_unset();
  session_destroy();
  header("Location:http://localhost/Contact_List_Project/Contact-List/index.php");
}else{
  echo "session variable is not set";
}


?>