<?php   

        include('../private/host.php');
        include('../private/request_handlers/classes/server2server.php');
        include('../private/request_handlers/classes/request_handler.php');
        include('../private/request_handlers/scripts/login.post.php');  ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>AppLord Task Manager</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/Login-Form-Clean.css">
    <link rel="stylesheet" href="../assets/css/styles.css">
</head>

<body>
    <section class="login-clean">
        <form method="post">
            <h2 class="visually-hidden">Login Form</h2>
            <div class="illustration">
                <h1 style="color: rgb(13,8,9);height: 111px;">tManager</h1>
            </div>
            <?php echo $dialogue ?>
            <div class="mb-3"><input class="form-control" type="email" name="email" placeholder="Email"></div>
            <div class="mb-3"><input class="form-control" type="password" name="password" placeholder="Password"></div>
            <div class="mb-3"><button class="btn btn-primary d-block w-100" name="login" type="submit" style="background: rgb(4,3,4);">Log In</button></div>
            <a class="forgot" href="<?php echo $host ?>/UI/create_account/">Create Account</a>
            <a class="forgot" href="<?php echo $host ?>/UI/forgot_password/">Forgot your password?</a>
        </form>
    </section>
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>