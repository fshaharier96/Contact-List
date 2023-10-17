<?php

$search=$_POST['text'];
$conn=mysqli_connect('localhost','root','','contact-list') or die('connection failed');
if($search !=="")
{
 $sql="SELECT * FROM contact_info_table WHERE first_name LIKE '%{$search}%' OR last_name LIKE '%{$search}%'";
 $result=mysqli_query($conn,$sql) or die("query unsuccessful");
 $output='';
 if(mysqli_num_rows($result)>0)
 {
      $output.= "";
    while($row=mysqli_fetch_assoc($result)){
        $output.="
                  <tr class='header-search-item' data-trid={$row['id']}>
                  <td style='width:40px;padding-left:10px'>{$row['id']}</td>
                  <td>{$row['first_name']} {$row['last_name']}</td>
                  </tr>
                  ";
    }
    echo $output;
 }
 else{
    echo "<h4>no records is  found </h4>";
 }
}
else{
   echo "<table></table>";
}


?>