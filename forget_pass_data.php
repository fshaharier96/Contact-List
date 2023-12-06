<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
use Rakit\Validation\Validator;

require 'vendor/autoload.php';
include_once "classes/database.php";
include_once "classes/SessionManager.php";

//session instance
$session = new SessionManager();

if (isset($_POST['submit'])) {

    $validator = new Validator();
    $validation = $validator->validate($_POST, [
        'email' => 'required|email',
    ]);

    if ($validation->fails()) {
        $validation_errors = $validation->errors();
        $errors = $validation_errors->firstOfAll();

        $session->set("field_errors", $errors);

    } else {
        $email = $_POST['email'];
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


}

if (isset($error_msg)) {
    $session->set('verification_msg', $error_msg);


}

if (isset($_SESSION['field_errors'])) {
    $field_errors = $_SESSION['field_errors'];
    header("Location:/forget-password");

//                echo '<pre>';
//                print_r( $field_errors );
//                echo '</pre>';
}

?>