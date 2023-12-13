<?php


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
use Rakit\Validation\Validator;

require 'vendor/autoload.php';
include_once "classes/Database.php";
include_once "classes/SessionManager.php";


class User
{

    public function login($post)
    {
        // database instance
        $db_connect = new Database();
        $conn = $db_connect->conn;

        //session instance
        $session = new SessionManager();


            $validator = new Validator();
            $validation = $validator->validate($post, [
                'email' => 'required|email',
                'password' => 'required|min:6'
            ]);


            if ($validation->fails()) {
                $validation_errors = $validation->errors();
                $errors = $validation_errors->firstOfAll();

                /* echo '<pre>';
                 print_r($errors);
                 echo '</pre>';*/

                $session->set("login_error", "Invalid username or password");
                $session->set("login_field_errors", $errors);
                header('Location:/');
                exit;

            } else {

                $email = $post['email'];
                $password = $post['password'];
                $hashedPassword = hash('sha256', $password);
                $sql = "SELECT * FROM login_table WHERE email='{$email}' AND password='{$hashedPassword}'";
                $result = mysqli_query($conn, $sql) or die("query unsuccessful : " . mysqli_error($conn));
                if (mysqli_num_rows($result) > 0) {
                    $row = mysqli_fetch_assoc($result);
                    $_SESSION['id'] = $row['id'];
                    $_SESSION['user'] = $row['username'];

                    header("Location:/home");
                    exit;


                } else {
                    $session->set("login_error", "Incorrect username or password");
                    header('Location:/');
                    exit;

                }


            }


    }

    public function logout()
    {
        session_start();
        if(isset($_SESSION['user'])){
            session_unset();
            session_destroy();
            header("Location:/login");
        }else{
            echo "you are already  logged out";
        }

    }

    public function signup($post)
    {

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


        if (isset($_SESSION['field_errors'])) {
            header("Location:/signup");


//                echo '<pre>';
//                print_r( $field_errors );
//                echo '</pre>';
        }

    }

    public function reset_email_verification($post)
    {


//session instance
        $session = new SessionManager();

        $validator = new Validator();
        $validation = $validator->validate($post, [
            'email' => 'required|email',
        ]);

        if ($validation->fails()) {
            $validation_errors = $validation->errors();
            $errors = $validation_errors->firstOfAll();

            $session->set("field_errors", $errors);

        } else {
            $email = $post['email'];
            $reset_code = random_int(100000, 999999);


            //Create an instance; passing `true` enables exceptions
            $mail = new PHPMailer(true);

            try {
                $mail->isSMTP();
                $m_host = MAIL_HOST;
                $m_port = MAIL_PORT;
                $mail->Host = $m_host;
                $mail->Port = $m_port;


                $mail->setFrom('sender@example.com', 'Contact-list Mailer');
                $mail->addAddress($email);

                $mail->isHTML(true);
                $mail->Subject = "Account Verification";
                $templateFile = './email/email_template.html';
                $htmlContent = file_get_contents($templateFile);
                $htmlContent = str_replace("{{CODE}}", $reset_code, $htmlContent);
                $mail->Body = $htmlContent;


                $db_connect = new Database();
                $conn = $db_connect->conn;
                $sql = "SELECT * FROM login_table WHERE email='{$email}'";
                $result = mysqli_query($conn, $sql) or die("query unsuccessful");
                if (mysqli_num_rows($result) > 0) {
                    $mail->send();
                    $row = mysqli_fetch_assoc($result);
                    $user_id = $row['id'];
                    $sql2 = "UPDATE login_table SET reset_code={$reset_code} WHERE id={$user_id}";
                    $result2 = mysqli_query($conn, $sql2) or die("query unsuccessful");
                    header("Location:/reset/{$user_id}");
                    exit();

                } else {
                    $error_msg = "this email address is not registered";
                }


            } catch (Exception $e) {
                $error_msg = "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }

        }


        if (isset($error_msg)) {
            $session->set('verification_msg', $error_msg);
            header("Location:/forget-pass");


        }

        if (isset($_SESSION['field_errors'])) {
            $field_errors = $_SESSION['field_errors'];
            header("Location:/forget-pass");

//                echo '<pre>';
//                print_r( $field_errors );
//                echo '</pre>';
        }

    }


    public function reset_code_verification($post, $id)
    {


        $session = new SessionManager();

        $user_id = $id;


        $validator = new Validator();
        $validation = $validator->validate($post, [
            'reset_code' => 'required|numeric',
        ]);

        if ($validation->fails()) {
            $validation_errors = $validation->errors();
            $errors = $validation_errors->firstOfAll();

            $session->set("reset_field_errors", $errors);

        } else {
            $reset_code = $post['reset_code'];
            $db_connect = new Database();
            $conn = $db_connect->conn;
            $sql = "SELECT * FROM login_table WHERE id={$user_id} AND reset_code={$reset_code}";
            $result = mysqli_query($conn, $sql) or die("query unsuccessful");
            if (mysqli_num_rows($result) > 0) {

                header("Location:/newpass-set/{$user_id}");
            } else {
                $reset_error = "verification code is wrong";


            }
        }


        if (isset($reset_error)) {
            $session->set("reset_error", $reset_error);

            header("Location:/reset/{$user_id}");
        }


        if (isset($_SESSION['reset_field_errors'])) {

            header("Location:/reset/{$user_id}");
//                echo '<pre>';
//                print_r( $field_errors );
//                echo '</pre>';
        }


    }

    public function newpass_set($post, $id4)
    {


        //session instance
        $session = new SessionManager();

        $user_id = $id4;


        $validator = new Validator();
        $validation = $validator->validate($post, [
            'password' => 'required|between:6,12',
            'confirm_password' => 'required|same:password'
        ]);

        if ($validation->fails()) {
            $validation_errors = $validation->errors();
            $errors = $validation_errors->firstOfAll();

            $session->set("newpass_field_errors", $errors);

        } else {
            $password = $post['password'];
            $hashedPass = hash('sha256', $password);
            $db_connect = new Database();
            $conn = $db_connect->conn;
            $sql = "UPDATE login_table SET password='{$hashedPass}' WHERE id={$user_id}";

            $result = mysqli_query($conn, $sql) or die("query unsuccessful");

            if ($result) {
                header("Location:/login");
            } else {
                $reset_pass_error = "Password change failed,try again!";

            }

        }


        if (isset($reset_pass_error)) {
            $session->set("reset_pass_error", $reset_pass_error);
            header("Location:/newpass-set/{$user_id}");
        }


        if (isset($_SESSION['newpass_field_errors'])) {
            header("Location:/newpass-set/{$user_id}");

        }


    }


}
