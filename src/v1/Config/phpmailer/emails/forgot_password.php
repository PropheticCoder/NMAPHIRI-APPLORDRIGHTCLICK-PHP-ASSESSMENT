<?php 
include('host.php');
$email_body='<!DOCTYPE html>
<html>
    <head>
        <title>tManager | Account Created</title>
        <style>
            .outer_box
            {
                border:1px solid black;
                width:300px;
                height:500px;
                margin:auto;
                margin-top:7%;
            }
            .logo{
                margin-top:25%;
                text-align: center;
                font-size:large;
            }

            .main_text{
                text-align:center;
                font-size:25px;
            }

            .sub_text{
                text-align:center;
                font-size:18px;
            }

            .button{
                text-align:center;
                font-size:14px;
            }

            .button_p
            {
                width:100px;
                padding:2%;
                border:1px solid black;
                margin:auto;
                border-radius:25px;
            }

            .button_p a
            {
                text-decoration: none;
                color:black;
            }
        </style>
    </head>
    <body>
        <div class="main">
            <div class="outer_box">
                <div class="logo">
                    <h1>tManager</h1>
                </div>

                <div class="main_text">
                    <p>
                        Forgot Password
                    </p>
                </div>

                <div class="sub_text">
                    <p>
                    Hello '.$recipient_name.', You requested to change your password,<br>
                    a link to change your password has been provided below.
                    <br>
                    the link expires in 2 minutes.
                    </p> 
                </div>

                <div class="button">
                    <p class="button_p">
                        <a href="'.$host.'/UI/new_password/?token='.$token.'">Change your password</a>
                    </p> 
                </div>
            </div>
        </div>
    </body>
</html>';
?>