<?php
 include_once "classes/database.php";
 $db_connect=new Database();
 $conn=$db_connect->conn;

if(isset($_POST['submit'])){
      $id=$_POST['id'];
      $fname=$_POST['fname']; 
      $lname=$_POST['lname']; 
      $company=$_POST['company']; 
      $job_title=$_POST['job_title']; 
      $department=$_POST['department']; 
      $email=$_POST['email']; 
      $phone=$_POST['phone']; 
       $country=$_POST['country']; 
       $street_address=$_POST['street_address']; 
       $city=$_POST['city']; 
       $postal_code=$_POST['postal_code']; 
       $birthday=$_POST['birth_date']; 
       

    //    if(isset($_FILES['uploadfile'])){
    //     $file=$_FILES["uploadfile"];
    //     $fileName=$_FILES["uploadfile"]["name"];
    //     $fileTempName=$_FILES["uploadfile"]["tmp_name"];
    //     $folder="uploads/".$fileName;
    //     move_uploaded_file($fileTempName,$folder);  
    //  }

       $folder="";

         if($_FILES['uploadfile']['error']==4){
            $contact_image=$_POST['contact_image'];
            $folder=$contact_image;
            $fileTempName=$_FILES['uploadfile']['tmp_name'];
            echo "this is if block: <br>";
         }else{
         $file=$_FILES['uploadfile'];
         $fileName=$_FILES['uploadfile']['name'];
         $fileTempName=$_FILES['uploadfile']['tmp_name'];
         echo "this is else block: <br>";
         $folder="uploads/".$fileName;
         echo $folder;
        
         }
         move_uploaded_file($fileTempName,$folder);


   //   $conn=mysqli_connect('localhost',"root",'','contact-list') or die("connection failed");
     $sql="UPDATE contact_info_table SET  contact_image='{$folder}', first_name='{$fname}', last_name='{$lname}', company='{$company}', job_title='{$job_title}', department='{$department}', email='{$email}', phone='{$phone}', country='{$country}', street_address='{$street_address}', city='{$city}', postal_code='{$postal_code}', birth_date='{$birthday}' WHERE id={$id}";

     if(mysqli_query($conn,$sql))
     {
         header("Location:{$host}home.php");
         
     }else{
        echo "<h4>data submission failed</h4>";

     }
}
