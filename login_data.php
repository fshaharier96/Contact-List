

<?php

//  if(isset($_POST['submit'])){
//     $username=$_POST['username'];
//     $password=$_POST['password'];
//     $sql="SELECT * FROM login_table WHERE username='{$username}' AND password='{$password}'";
//     $result=mysqli_query($conn,$sql) or die("query unsuccessful : ".mysqli_error($conn));
//     if(mysqli_num_rows($result)>0)
//       {     $row=mysqli_fetch_assoc($result);
//           $_SESSION['id']=$row['id'];
//           $_SESSION['user']=$row['username'];
//           // echo "data is correct";
//          header("Location:{$host}home.php");
//        }
//     else{
//         echo "<p>incorrect username or password !</p>";
//     }
//  }




require('vendor/autoload.php');

use Rakit\Validation\Validator;

include_once "classes/database.php";
$db_connect = new Database();
$conn = $db_connect->conn;
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST'){

    $validator = new Validator();
    $validation = $validator->validate($_POST, [
        'email' => 'required|email',
        'password' => 'required|min:6'
    ]);


    if ($validation->fails()) {
        echo "Invalid username or password entered";

    } else {

        $email = $_POST['email'];
        $password = $_POST['password'];
        $hashedPassword = hash('sha256', $password);
        $sql = "SELECT * FROM login_table WHERE email='{$email}' AND password='{$hashedPassword}'";
        $result = mysqli_query($conn, $sql) or die("query unsuccessful : " . mysqli_error($conn));
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $_SESSION['id'] = $row['id'];
            $_SESSION['user'] = $row['username'];
            echo true;

            // echo "data is correct";
//            header("Location:{$host}home.php");
        } else {
            echo "Incorrect username or  password";

        }


    }
}