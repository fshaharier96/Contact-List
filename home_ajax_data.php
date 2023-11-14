<?php
include_once "classes/database.php";
$db_connect=new Database();
$conn=$db_connect->conn;

// $conn=mysqli_connect('localhost','root','','contact-list') or die("connection failed");
session_start();
$user_id=$_SESSION['id'];
$limit_per_page=3;
$page='';
if(isset($_POST['page_no'])){
   $page=$_POST['page_no'];
}else{
   $page=1;
} 
$offset=($page-1)*$limit_per_page;



$sql="SELECT id,first_name,last_name,email,phone,job_title,company,city FROM contact_info_table
WHERE user_id={$user_id} LIMIT {$offset},{$limit_per_page}";
$result=mysqli_query($conn,$sql) or die('query unsuccessful');
$output="";
if(mysqli_num_rows($result)>0){
    $output.="
         <table class='table table-info-subtle table-striped table-hover' id='home-table'>
         <thead class='table-primary'>
         <tr>
         <th>id</th>
         <th>Name</th>
         <th>Email</th>
         <th>Phone</th>
         <th>Jobtitle & Company</th>
         <th>City</th>
         <th></th>
         </tr>
         </thead>";

    $output.="<tbody>";

    while($row=mysqli_fetch_assoc($result)){
        $output.="<tr>
        <td>{$row['id']}</td>
        <td class='id_name' data-tdid={$row['id']}>{$row['first_name']} {$row['last_name']}</td>
        <td>{$row['email']}</td>
        <td>{$row['phone']}</td>
        <td>{$row['job_title']}-{$row['company']}</td>
        <td>{$row['city']}</td>
        <td><i id='edit' class='fa-solid fa-pen-to-square home-dis' data-role={$row['id']}></i><i id='delete' class='fa-solid fa-trash-can home-dis2' data-role={$row['id']}></i></td>
        </tr>";
    }
    $output.="</tbody>";
    $output.="</table>";

    $sql1="SELECT * FROM contact_info_table WHERE user_id={$user_id}";
    $result1=mysqli_query($conn,$sql1) or die("query unsuccessful");
    $total_records=mysqli_num_rows($result1);
    $pages=ceil($total_records/$limit_per_page);

    $output.="<div id='home-pagination'>";
    if($page>1){
        $pageprev=$page-1;
        $output.="<a class='prev-next' id='{$pageprev}' href=''>Prev</a>";
    }
    
    for($i=1;$i<=$pages;$i++)
    {  
        if($i==$page)
        {
            $change='active';
        }else{
            $change='';
        }
       $output.="<a class='{$change}' id='{$i}' href='home.php?page={$page}'>{$i}</a>";
    }
    if($page<$pages){
        $pagenext=$page+1;
        $output.="<a class='prev-next' id='{$pagenext}' href=''>Next</a>";
    }

    $output.="</div>";

    echo $output;
}
else{
    echo "<h1>no records found</h1>";
}
?>