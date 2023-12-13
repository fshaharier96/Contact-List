<?php
 include_once "classes/Database.php";
 $db_connect=new Database();
 $conn=$db_connect->conn;
 $contact_id=$_POST['contact_id'];

 $sql="UPDATE contact_info_table SET trash_id=1 WHERE id={$contact_id}";
 $result=mysqli_query($conn,$sql) or die("query unsuccessful");
 if($result){
    echo "Contact is deleted";
 }else{
    echo "Contact can not be deleted";
 }

?>