<?php
$conn=mysqli_connect('localhost','root','','contact-list') or die("connection failed");

$limit_per_page=8;
$page='';
if(isset($_POST['page_no'])){
   $page=$_POST['page_no'];
}else{
   $page=1;
} 
$offset=($page-1)*$limit_per_page;



$sql="SELECT id,first_name,last_name,email,phone,job_title,company,city FROM contact_info_table LIMIT {$offset},{$limit_per_page}";
$result=mysqli_query($conn,$sql) or die('query unsuccessful');
$output="";
if(mysqli_num_rows($result)>0){
    $output.="
         <table id='home-table'>
         <tr>
         <th>id</th>
         <th>Name</th>
         <th>Email</th>
         <th>Phone</th>
         <th>Jobtitle & Company</th>
         <th>City</th>
         <th></th>
         </tr>";
    while($row=mysqli_fetch_assoc($result)){
        $output.="<tr>
        <td>{$row['id']}</td>
        <td class='id_name' data-tdid={$row['id']}>{$row['first_name']} {$row['last_name']}</td>
        <td>{$row['email']}</td>
        <td>{$row['phone']}</td>
        <td>{$row['job_title']}-{$row['company']}</td>
        <td>{$row['city']}</td>
        <td><i id='edit' class='fa-solid fa-pen-to-square home-dis' data-role={$row['id']}></i><i id='delete' class='fa-solid fa-trash-can home-dis2' data-role2={$row['id']}></i></td>
        </tr>";
    }
    $output.="</table>";

    $sql1="SELECT * FROM contact_info_table";
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
       $output.=" <a class='{$change}' id='{$i}' href=''>{$i}</a>";
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