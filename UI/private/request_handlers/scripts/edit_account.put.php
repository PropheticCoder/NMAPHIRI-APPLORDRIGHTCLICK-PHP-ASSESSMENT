<?php
    $dialogue_2="";
    if(isset($_POST['edit_user']))
    {
        $data=array();
        $data['token']=$token;
        $data['u_id']=$_POST['u_id'];
        $data['name']=ucfirst($_POST['name']);
        $request=new request_handler($data);
        $exec=$request->call_edit_account();
        //Call Create Account Calls POST:http://localhost/task_manager/API/v1/Users And Return u_id and token
        $exec=json_decode(strVal($exec),true);
        if(!is_array($exec))
        {
            $dialogue_2 ='<p style="color:green">'.$exec.'</p>';
            //header('Refresh:3;url=/task_manager/UI/home/?token='.$token);
        }
        else header('location:/task_manager/UI/home/?token='.$token);
        include('../private/request_handlers/scripts/get_user_data.get.php');//Reload Data
    }

    if(isset($_POST['new_password']))
    {
        $data=array();
        $data['token']=$token;
        $data['u_id']=$_POST['u_id'];
        $data['old_password']=md5($_POST['old_password']);
        if($_POST['password_1'] !=$_POST['password_2']) $dialogue_2 ='<p style="color:red">Passwords Do Not Match</p>';
        else
        {
            $data['password']=md5($_POST['password_1']);
            $request=new request_handler($data);
            $exec=$request->call_edit_account();
            //Call Create Account Calls POST:http://localhost/task_manager/API/v1/Users And Return u_id and token
            $exec=json_decode(strVal($exec),true);
            if(!is_array($exec))
            {
                $dialogue_2 ='<p style="color:green">'.$exec.'</p>';
                //header('Refresh:3;url=/task_manager/UI/home/?token='.$token);
            }
            else header('location:/task_manager/UI/home/?token='.$token);
            include('../private/request_handlers/scripts/get_user_data.get.php');//Reload Data
        }
    }
?>