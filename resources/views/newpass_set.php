<?php
session_start();
$user_id=$id3;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--boostrap css file-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">

    <!--styling file-->
    <link rel="stylesheet" href="/assets/style/css/main.css">

    <title>Change password</title>
</head>
<body class="h-100">
<div class="container-fluid  h-100">
    <div class="row  d-flex justify-content-center align-items-center h-100">
        <div class="col-4 h-50 shadow bg-info-subtle d-flex align-items-center justify-content-center">
            <form class="form-control p-3" action="/newpass-set-data/<?php echo $user_id; ?>" method="post">
                <div class="mb-4 text-center">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control border border-secondary"/>

                    <?php
                    if (isset($_SESSION['newpass_field_errors'])) {
                        echo '<div class="invalid-feedback text-start">' . $_SESSION['newpass_field_errors']['password'] . '</div>';
//                        unset($_SESSION['newpass_field_errors']);
                    }
                    ?>

                </div>
                <div class="mb-4 text-center">
                    <label for="exampleInputPassword1" class="form-label">Confirm password</label>
                    <input type="password" name="confirm_password" class="form-control border border-secondary"/>
                    <?php
                    if (isset($_SESSION['newpass_field_errors'])) {
                        echo '<div class="invalid-feedback text-start">' . $_SESSION['newpass_field_errors']['confirm_password'] . '</div>';
                        unset($_SESSION['newpass_field_errors']);
                    }
                    if(isset($_SESSION['reset_pass_error'])){
                        echo '<div class="invalid-feedback text-start">' . $_SESSION['reset_pass_error'] . '</div>';
                        unset($_SESSION['reset_pass_error']);
                    }

                    ?>
                </div>
                <button class="btn btn-primary form-control" type="submit" name="submit">Change password</button>

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