<?php   include('../private/request_handlers/classes/server2server.php');
        include('../private/request_handlers/classes/request_handler.php');
        include('../private/request_handlers/scripts/create_account.submit.php');  ?>
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
                <h1 style="color: rgb(13,8,9);height: 100px;">tManager</h1>
            </div>
            <div style="text-align:center;font-size:14px"><?php echo $dialogue ?></div>
            <div class="mb-3"><input style="font-size:14px" class="form-control" type="email" name="email" placeholder="Email" required></div>
            <div class="mb-3"><input style="font-size:14px" class="form-control" type="text" name="name" placeholder="Name" required></div>
            <div class="mb-3"><input style="font-size:14px" class="form-control" type="password" name="password_1" placeholder="Create Password" required></div>
            <div class="mb-3"><input style="font-size:14px" class="form-control" type="password" name="password_2" placeholder="Confirm Password" required></div>
            <div class="mb-3"><button class="btn btn-primary d-block w-100" name="create_account" type="submit" style="background: rgb(4,3,4);">Create Account</button></div><a class="forgot" href="/task_manager/UI/login/">Have An Account?</a>
        </form>
    </section>
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>