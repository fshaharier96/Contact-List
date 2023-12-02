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
                header("Location:{$host}reset_verification.php?id={$user_id}");

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
    unset($_SESSION['field_errors']);

//                echo '<pre>';
//                print_r( $field_errors );
//                echo '</pre>';
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--boostrap css file-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">

    <!--styling file-->
    <link rel="stylesheet" href="assets/style/css/main.css">
    <title>enter email</title>
</head>
<body class="h-100">
<div class="container-fluid  h-100">
    <div class="row  d-flex justify-content-center align-items-center h-100">
        <div class="col-4 h-50 shadow bg-info-subtle d-flex align-items-center justify-content-center">
            <form class="form-control p-3" action="" method="post">
                <div class="mb-4 text-center">
                    <label for="exampleInputPassword1" class="form-label fs-5 text-center">Enter valid email for
                        verification</label>
                    <input type="email" name="email" class="form-control border border-secondary"/>
                    <?php
                    if (isset($field_errors['email'])) {
                        echo '<div class="invalid-feedback text-start">' . $field_errors['email'] . '</div>';
                    }
                    if (isset($_SESSION['verification_msg'])) {
                        echo '<div class="invalid-feedback text-start">' . $_SESSION['verification_msg'] . '</div>';
                        unset($_SESSION['verification_msg']);
                    }
                    ?>
                </div>
                <button class="btn btn-primary form-control" type="submit" name="submit">Get code</button>

            </form>

        </div>
    </div>

</div>


<script>
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
</script>

</body>
</html>