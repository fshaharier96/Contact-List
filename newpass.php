<?php 
 include_once "classes/database.php";
if(isset($_GET['id'])){
    $user_id=$_GET['id'];
}
if(isset($_POST["submit"])){
    if(!empty($_POST['reset_code'])){
         $reset_code=$_POST['reset_code'];

         $db_connect=new Database();
         $conn=$db_connect->conn;
         $sql="SELECT * FROM login_table WHERE id={$user_id} AND reset_code={$reset_code}";
         $result=mysqli_query($conn,$sql) or die("query unsuccessful");
         if(mysqli_num_rows($result)>0){
            // $row=mysqli_fetch_assoc($result);
            // $r_code=$row['reset_code'];

            header("Location:{$host}/newpass_set.php?id={$user_id}");
         }
         else{
                echo "verification code is wrong";
         }

    }
}


?>