<?php

require('vendor/autoload.php');
include_once "classes/database.php";
include_once "classes/SessionManager.php";

use Rakit\Validation\Validator;



class User{

    public function login(){


    }
    public function logout(){


    }

    public function signup($post){

        print_r($post);
        echo "this sign up function";

//database connection
        $db_connect = new Database();
        $conn = $db_connect->conn;

//session instance
        $session = new SessionManager();


            $validator = new Validator();
            $validation = $validator->validate($post, [
                'email' => 'required|email',
                'username' => 'required',
                'password' => 'required|min:6',
                'confirm_password' => 'required|same:password',
                'agree_terms' => 'required'

            ]);

            if ($validation->fails()) {
                $validation_errors = $validation->errors();
                $errors = $validation_errors->firstOfAll();

                /* echo '<pre>';
                 print_r($errors);
                 echo '</pre>';*/

                $session->set("error", "Invalid username or password");
                $session->set("field_errors", $errors);
            } else {

                $email = $post['email'];
                $username = $post['username'];
                $password = $post['password'];
                $hashedPassword = hash('sha256', $password);

                $sql = "SELECT * FROM login_table WHERE email='{$email}'";
                $sql1 = "INSERT INTO login_table(email,username,password) VALUES('{$email}','{$username}','{$hashedPassword}')";
                $result = mysqli_query($conn, $sql) or die("query unsuccesful");

                if ($result) {

                    if (mysqli_num_rows($result) == 0) {
                        if (mysqli_query($conn, $sql1)) {

                            $session->set("success", "Registration successful! ");


                        } else {

                            $session->set("error", "Registration failed");
                        }
                    } else {

                        $session->set("error", "This email has been taken already");
                    }

                }
            }

            if (isset($_SESSION['error'])) {
                $msg = "<div class='alert alert-danger text-center'>" . $session->get('error') . "</div>";
                header("Location:/signup");

            }

            if (isset($_SESSION['success'])) {
                $msg = "<div class='alert alert-success text-center'>" . $session->get('success') . "<a class='text-dark ms-1 text-decoration-none' href='{$host}'><strong>Log in</strong></a></div>";
                header("Location:/signup");
            }


        if ( isset( $_SESSION['field_errors'] ) ) {
           header("Location:/signup");


//                echo '<pre>';
//                print_r( $field_errors );
//                echo '</pre>';
        }

    }

    public function reset(){

    }

    public function reset_verification(){

    }
    public function newpass(){


    }
    public function newpass_set(){

    }







}
