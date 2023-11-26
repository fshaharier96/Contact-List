<h5>Contacts</h5>
<?php
include_once "classes/database.php";
$db_connect=new Database();
$conn=$db_connect->conn;

// $conn=mysqli_connect('localhost','root','','contact-list') or die("connection failed");
session_start();
$user_id = $_SESSION['id'];
$user_name = $_SESSION['user'];
$limit_per_page=3;
$page='';
if(isset($_POST['page_no'])){
   $page=$_POST['page_no'];
}else{
   $page=1;
} 
$offset=($page-1)*$limit_per_page;


if($user_name=="admin")
{
    $sql="SELECT id,first_name,last_name,email,phone,job_title,company,city,favourite,trash_id FROM contact_info_table WHERE trash_id=0 LIMIT {$offset},{$limit_per_page}";

}else{
    $sql="SELECT id,first_name,last_name,email,phone,job_title,company,city,favourite,trash_id FROM contact_info_table
WHERE user_id={$user_id} AND trash_id=0 LIMIT {$offset},{$limit_per_page}";
}


$result=mysqli_query($conn,$sql) or die('query unsuccessful');
$output="";
if(mysqli_num_rows($result)>0){

    $output.="
         <table class='table table-striped table-hover  border border-table' id='home-table'>
         <thead class=' table-primary text-center'>
         <tr>
         <th>id</th>
         <th>Name</th>
         <th>Email</th>
         <th>Phone</th>
         <th>Jobtitle</th>
         <th>Company</th>
         <th>City</th>
         <th>Action</th>
         </tr>
         </thead>";

    $output.="<tbody>";

    while($row=mysqli_fetch_assoc($result)){
        $favourite=$row['favourite'];
        if($favourite==1){
            $class="btn-primary";
        }else{
            $class="btn-warning";
        }
        $output.="<tr class='text-center'>
        <td>{$row['id']}</td>
        <td class='id_name' data-tdid={$row['id']}>{$row['first_name']} {$row['last_name']}</td>
        <td>{$row['email']}</td>
        <td>{$row['phone']}</td>
        <td>{$row['job_title']}</td>
        <td>{$row['company']}</td>
        <td>{$row['city']}</td>
        <td class='col-3'><button class='btn btn-sm btn-primary me-2' id='edit' class='home-dis' data-role={$row['id']}>
        Edit</button>
        <button class=' btn btn-sm btn-danger' id='delete' class='home-dis2' data-role={$row['id']}>
        Delete</button>
        <button id='star-id' class='btn btn-sm {$class}' data-favour={$favourite} data-star={$row['id']}>
        Star</button>
        </td>
        </tr>";
    }
    $output.="</tbody>";
    $output.="</table>";

    if($user_name=="admin"){

     $sql1="SELECT * FROM contact_info_table";

    }else{

      $sql1="SELECT * FROM contact_info_table WHERE user_id={$user_id}";
    }


    
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
