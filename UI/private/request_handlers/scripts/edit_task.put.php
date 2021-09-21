<?php
$dialogue="";
if(isset($_POST['submit_edit_task']))
{
    $data=array();
    $data['u_id']=$_POST['u_id'];
    $data['task_id']=$_POST['task_id'];
    $data['task_name']=str_replace(' ', '%20', $_POST['task_name']);
    $data['description']=str_replace(' ', '%20', $_POST['description']);
    $data['Complete']=$_POST['Complete'];
    $data['due']=$_POST['due'];
    $request=new request_handler($data);
    $exec=$request->call_edit_task();
    //Call Create Account Calls PUT:http://localhost/task_manager/API/v1/Tasks And Return String
    $exec=json_decode(strVal($exec),true);
    if(!is_array($exec))
    {
        $dialogue='<p style="color:green">'.$exec.'</p>';
        header('Refresh:3;url=/task_manager/UI/home/?token='.$token);
    }
    else header('location:/task_manager/UI/home/?token='.$token);
}
?>