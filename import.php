<?php
 if(isset($_POST["submit"])){

    include_once "classes/database.php";
    $db_connect=new Database();
    $conn=$db_connect->conn;
  

  // $conn=mysqli_connect("localhost","root","","importcsv") or die("connection failed");
    
    $filename=$_FILES["file"]["tmp_name"];    
     if($_FILES["file"]["size"] > 0)
     {
        $file = fopen($filename, "r");
          while (($getData = fgetcsv($file, 10000, ",")) !== FALSE)
           {
            // echo $getData[0]."<br/>";
            // echo $getData[1]."<br/>";
            // echo $getData[2]."<br/>";
            
             $sql = "INSERT INTO contact_info_table(user_id,contact_image,first_name,last_name,company,job_title,department,email,phone,country,street_address,city,postal_code,birth_date,favourite,trash_id) 
                   VALUES ('".$getData[0]."','".$getData[1]."','".$getData[2]."','".$getData[3]."','".$getData[4]."','".$getData[5]."','".$getData[6]."','".$getData[7]."','".$getData[8]."','".$getData[9]."','".$getData[10]."','".$getData[11]."','".$getData[12]."','".$getData[13]."','".$getData[14]."','".$getData[15]."')";

                   $result = mysqli_query($conn, $sql) or die("query unsuccessful: ".mysqli_error($conn));
        if(!$result)
        {
          echo "<script type=\"text/javascript\">
              alert(\"Invalid File:Please Upload CSV File.\");
              window.location = \"index.php\"
              </script>";    
        }
        else {
            header("Location:{$host}home.php");
        }
           }
      
           fclose($file);  
     }
  }   

?>