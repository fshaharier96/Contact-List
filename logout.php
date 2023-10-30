<?php

session_start();
if(isset($_SESSION['user'])){
  session_unset();
  session_destroy();
  header("Location:http://localhost/php_practice/PHP_PRACTICE_10/index.php");
}else{
  echo "session variable is not set";
}


?>