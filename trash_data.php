<?php
    include_once "classes/database.php";
    $db_connect=new Database();
    $conn=$db_connect->conn;
    $sql="SELECT * FROM contact_info_table WHERE trash_id=1";
    $result=mysqli_query($conn,$sql) or die("query unsuccessful");
   
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <!--boostrap css file-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">


    <link rel="stylesheet" href="style/css/main.css">
    <title>Trash</title>
</head>
<body>
<?php
 include_once "header.php";
?>
  
<div class="container shadow p-4 ">
    <div class="row">
        <div class="col-12">
            <table class="table table-hover table-striped">
                <thead>
                    <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                     if(mysqli_num_rows($result)>0){
                        while($row=mysqli_fetch_assoc($result)){

                    ?>
                    <tr>
                   <td><?php echo $row['id']?></td>
                   <td><?php echo $row['first_name']." ".$row['last_name'];?></td>
                   <td><?php echo $row['email']?></td>
                   <td><?php echo $row['phone']?></td>

                   </tr>
                   <?php
                        }
                    }
                    else{
                        echo "<h3>No Deleted items found</h3>";
                    }
                   ?>

                </tbody>

            </table>
          
          
        </div>
    </div>
</div>
    

<script src="assets/js/jquery.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
   <script src="assets/js/header.js"></script>
</body>
</html>