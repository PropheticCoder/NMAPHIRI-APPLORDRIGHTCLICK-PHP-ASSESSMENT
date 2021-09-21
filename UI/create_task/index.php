<?php   
        include('../private/host.php');
        include('../private/request_handlers/classes/server2server.php');
        include('../private/request_handlers/classes/request_handler.php');
        include('../private/request_handlers/scripts/get_user_data.get.php');
        include('../private/request_handlers/scripts/create_task.post.php');
        ?>
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
    <main style="margin: auto;">
        <header>
            <h1 id="logo" class="logo" style="text-align: center;margin-top: 5%;">tManager</h1>
            <div id="nav_bar" class="nav_bar" style="text-align: center;margin-bottom: 0;">
                <div class="btn-group" role="group">
                    <a class="btn btn-primary" role="button" style="font-size: 12px;background: transparent;color: black;border-color: black;" href="<?php echo $host ?>/UI/account/?token=<?php echo $token ?>">Account</a>
                    <a class="btn btn-primary" role="button" style="font-size: 12px;color: black;background: transparent;border-color: black;" href="<?php echo $host ?>/UI/create_task/?token=<?php echo $token ?>">Create Task</a>
                    <a class="btn btn-primary" role="button" style="font-size: 12px;color: black;background: transparent;border-color: black;" href="<?php echo $host ?>/UI/home/?token=<?php echo $token ?>">Manage Tasks</a>
                    <a class="btn btn-primary" role="button" style="font-size: 12px;color: black;background: transparent;border-color: black;" href="<?php echo $host ?>/UI/login/?token=<?php echo $token ?>">Log Out</a>
                </div>
            </div>
        </header>
        <section id="body" class="body" style="margin-top: 5%;">
            <section id="body_container" class="body_container" style="margin: auto;margin-top: 0%;">
                <div id="user_details" class="user_details" style="/*margin: auto;*/text-align: center;">
                    <p><?php echo $u_name ?>'s Task Manager</p>
                </div>
                <div id="page_name" class="page_name" style="text-align: center;font-size: 11px;">
                    <h5 style="font-size: 16px;font-weight: bold;">Create Task</h5>
                    <?php echo $dialogue ?>
                </div>
                <div id="form" class="form">
                    <form method="POST" action="<?php echo $host ?>/UI/create_task/?token=<?php echo $token?>">
                        <input type="hidden" name="u_id" value="<?php echo $u_id ?>">
                        <div class="input-group"><span class="input-group-text" style="width: 95px;font-size: 11px;">Task Name</span><input class="form-control" name="task_name" type="text" required=""></div>
                        <div class="input-group"><span class="input-group-text" style="font-size: 11px;width: 95px;">Description</span><input class="form-control" name="description" type="text"></div>
                        <div class="input-group"><span class="input-group-text" style="font-size: 11px;width: 95px;">Completed</span><select class="form-select" name="Complete" required="">
                                <optgroup label="Completed?">
                                    <option value="YES">Yes</option>
                                    <option value="NO" selected>No</option>
                                </optgroup>
                            </select></div>
                        <div class="input-group"><span class="input-group-text" style="font-size: 11px;width: 95px;">Due</span><input class="form-control" name="due" type="datetime-local" required=""></div>
                        <button class="btn btn-primary float-end" style="background-color:black" name="create_task" type="submit">Create</button>
                    </form>
                </div>
            </section>
        </section>
    </main>
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>