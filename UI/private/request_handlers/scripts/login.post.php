<?php
    $dialogue="";
    if(isset($_POST['login']))
    {
        $data=array();
        $data['email']=$_POST['email'];
        $data['password']=md5($_POST['password']);
        $request=new request_handler($data);
        $exec=$request->call_login();
        //Call Create Account Calls POST:http://localhost/task_manager/API/v1/Users And Return u_id and token
        $exec=json_decode(strVal($exec),true);
        if(!is_array($exec)) $dialogue='<p style="font-size:11px">'.$exec.'</p>';
        else header('location:/task_manager/UI/home/?token='.$exec['token']);
    }

    if(isset($_GET['token']))
    {
        $data=array();
        $data['token']=$_GET['token'];
        $request=new request_handler($data);
        $exec=$request->call_logout();
        //Call Create Account Calls POST:http://localhost/task_manager/API/v1/Users And Return u_id and token
        $exec=json_decode(strVal($exec),true);
        if(!is_array($exec)) $dialogue='<p style="font-size:11px">'.$exec.'</p>';
        else header('location:/task_manager/UI/home/?token='.$exec['token']);
    }
?>