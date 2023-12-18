<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--boostrap css file-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">

    <!--styling file-->
    <link rel="stylesheet" href="../../assets/style/css/main.css">
    <title>enter email</title>
</head>
<body class="h-100">
<div class="container-fluid  h-100">
    <div class="row  d-flex justify-content-center align-items-center h-100">
        <div class="col-4 h-50 shadow bg-info-subtle d-flex align-items-center justify-content-center">
            <form class="form-control p-3" action="/forget-pass-data" method="post">
                <div class="mb-4 text-center">
                    <label for="exampleInputPassword1" class="form-label fs-5 text-center">Enter valid email for
                        verification</label>
                    <input type="email" name="email" class="form-control border border-secondary"/>
                    <?php
                    if (isset($_SESSION['field_errors']['email'])) {
                        echo '<div class="invalid-feedback text-start">' . $_SESSION['field_errors']['email'] . '</div>';
                        unset($_SESSION['field_errors']);
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