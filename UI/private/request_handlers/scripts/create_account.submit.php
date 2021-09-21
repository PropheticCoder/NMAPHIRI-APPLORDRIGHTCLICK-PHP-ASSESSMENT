<?php
    $dialogue="";
    if(isset($_POST['create_account']))
    {
        if($_POST['password_1'] !=$_POST['password_2']) $dialogue="Passwords Do Not Match!";
        $data=array();
        $data['email']=$_POST['email'];
        $data['name']=ucfirst($_POST['name']);
        $data['password']=md5($_POST['password_1']);
        $request=new request_handler($data);
        $exec=$request->call_create_account();
        //Call Create Account Calls POST:http://localhost/task_manager/API/v1/Users And Return u_id and token
        $exec=json_decode(strVal($exec),true);
        if(!is_array($exec)) $dialogue=$exec;
        else header('location:/task_manager/UI/home/?token='.$exec['token']);
    }
?>