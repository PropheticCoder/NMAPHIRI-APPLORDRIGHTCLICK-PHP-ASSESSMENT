<?php
    $dialogue="";
    if(isset($_POST['delete_task']))
    {
        $request=new request_handler($_POST);
        $exec=$request->call_delete_task();
        //Call Create Account Calls POST:http://localhost/task_manager/API/v1/Users And Return u_id and token
        $exec=json_decode(strVal($exec),true);
        if(!is_array($exec))
        {
            $dialogue='<tr style="font-size:11px">
                    <td style="background-color:orange;color:white">'.$exec.'</td>
                    </tr>';
            include('../private/request_handlers/scripts/get_all_tasks.get.php');//Reload Table
        }
        else header('location:/task_manager/UI/home/?token='.$token);
    }
?>