<?php
  include_once "classes/Database.php";
  $db_connect=new Database();
  $conn=$db_connect->conn;

  $user_id=$_GET['id'];
  $sql="DELETE FROM  contact_info_table WHERE id={$user_id}";
  $result=mysqli_query($conn,$sql) or die("query failed");
  if($result){
    header("Location:{$host}");
  }else{
    echo "this record can not be deleted";
  }
