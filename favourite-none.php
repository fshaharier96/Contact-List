<?php
include_once "classes/database.php";
$db_connect=new Database();
$conn=$db_connect->conn;
$row_id=$_POST['row_id'];
$favourite=$_POST['favourite'];
$sql="UPDATE contact_info_table SET favourite={$favourite} WHERE $row_id={$row_id}";
$result=mysqli_query($conn,$sql) or die("query unsuccessful");
if($result){
    echo $result;
}else{
    echo false;
}



?>