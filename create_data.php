<?php


if(isset($_POST['submit'])){
    
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

    
     
     if(isset($_FILES['uploadfile'])){
        $file=$_FILES["uploadfile"];
        $fileName=$_FILES["uploadfile"]["name"];
        $fileTempName=$_FILES["uploadfile"]["tmp_name"];
        $folder="uploads/".$fileName;
        move_uploaded_file($fileTempName,$folder);  
     }
    /* INSERT INTO `contact_info_table` (`id`, `contact_image`, `first_name`, `last_name`, `company`, `job_title`, `department`, `email`, `phone`, `country`, `street_address`, `city`, `postal_code`, `birth_date`) VALUES (NULL, 'uploads/pic.jpg', 'Jamil', 'Hassan', 'Alpha tech', 'Marketing manager', 'Sales and Marketing', 'jamil@gmail.com', '01922191588', 'Bangladesh', '243/5,free school street,kalabagan', 'Dhaka', '1205', '2023-10-19'); */


     $conn=mysqli_connect('localhost',"root",'','contact-list') or die("connection failed");
     $sql="INSERT INTO contact_info_table(contact_image, first_name, last_name, company, job_title, department, email, phone, country, street_address, city, postal_code, birth_date) VALUES('{$folder}', '{$fname}', '{$lname}', '{$company}', '{$job_title}', '{$department}', '{$email}', '{$phone}', '{$country}', '{$street_address}', '{$city}', '{$postal_code}', '{$birthday}')";
    
     
     if(mysqli_query($conn,$sql))
     {
         header("Location:http://localhost/php_practice/PHP_PRACTICE_10/home.php");
         
     }else{
        echo "<h4>data submission failed</h4>";

     }
    
     


}

?>