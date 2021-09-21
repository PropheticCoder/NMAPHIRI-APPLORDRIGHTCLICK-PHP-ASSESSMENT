<?php
    $dialogue="";
    if(isset($_POST['forgot_password']))
    {
        $data=array();
        $data['email']=$_POST['email'];
        $request=new request_handler($data);
        $exec=$request->call_forgot_password();
        //Call Create Account Calls :http://localhost/task_manager/API/v1/Users And Return u_id and token
        $exec=json_decode(strVal($exec),true);
        if(!is_array($exec)) $dialogue=$exec;
        else header('location:/task_manager/UI/home/?token='.$exec['token']);
    }
?>