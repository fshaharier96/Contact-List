<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';
include_once "classes/database.php";

if ( isset( $_POST['submit'] ) ) {
	if ( ! empty( $_POST['email'] ) ) {
		$email      = $_POST['email'];
		$reset_code = random_int( 100000, 999999 );


		//Create an instance; passing `true` enables exceptions
		$mail = new PHPMailer( true );

		try {
			$mail->isSMTP();
			$m_host     = MAIL_HOST;
			$m_port     = MAIL_PORT;
			$mail->Host = $m_host;
			$mail->Port = $m_port;


			$mail->setFrom( 'sender@example.com', 'Contact-list Mailer' );
			$mail->addAddress( $email );

			$mail->isHTML( true );
			$mail->Subject = "Account Verification";
			$templateFile  = './email/email_template.html';
			$htmlContent   = file_get_contents( $templateFile );
			$htmlContent   = str_replace( "{{CODE}}", $reset_code, $htmlContent );
			$mail->Body    = $htmlContent;

			//   $mail->Body    = $reset_code;
			//   $mail->AltBody = 'Use this six digit code to verify your account';

			$mail->send();
			echo 'Message has been sent';
			$db_connect = new Database();
			$conn       = $db_connect->conn;
			$sql        = "SELECT * FROM login_table WHERE email='{$email}'";
			$result = mysqli_query( $conn, $sql ) or die( "query unsuccessful" );
			if ( mysqli_num_rows( $result ) > 0 ) {
				$row     = mysqli_fetch_assoc( $result );
				$user_id = $row['id'];
				$sql2    = "UPDATE login_table SET reset_code={$reset_code} WHERE id={$user_id}";
				$result2 = mysqli_query( $conn, $sql2 ) or die( "query unsuccessful" );

			} else {
				echo "this email address is not registered";
			}


		} catch ( Exception $e ) {
			echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
		}

	}
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
    <link rel="stylesheet" href="style/css/main.css">
    <title>Enter Reset Code</title>
</head>
<body class="h-100">
<div class="container-fluid  h-100">
    <div class="row  d-flex justify-content-center align-items-center h-100">
        <div class="col-4 h-50 shadow bg-info-subtle d-flex align-items-center justify-content-center">
            <form class="form-control p-3" action="newpass.php?id=<?php echo $user_id ?>" method="post">
                <div class="mb-4 text-center">
                    <label for="exampleInputPassword1" class="form-label fs-5 text-center">Enter verification code</label>
                    <input type="number" name="reset_code" class="form-control border border-secondary">
                </div>
                <button class="btn btn-primary form-control" type="submit" name="submit">Continue</button>

            </form>

        </div>
    </div>

</div>

</body>
</html>