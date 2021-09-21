<?php
$dialogue="";
if(isset($_POST['create_task']))
{
    $mysqli=new mysqli("localhost","root","","test");
    $data=array();
    $data['u_id']=mysqli_real_escape_string($mysqli,$_POST['u_id']);
    $data['task_name']=str_replace(' ', '%20', $_POST['task_name']);
    $data['description']=str_replace(' ', '%20', $_POST['description']);
    $data['Complete']=$_POST['Complete'];
    $data['due']=$_POST['due'];
    $request=new request_handler($data);
    $exec=$request->call_create_task();
    //Call Create Account Calls POST:http://localhost/task_manager/API/v1/Tasks And Return u_id and token
    $exec=json_decode(strVal($exec),true);
    if(!is_array($exec))
    {
        $dialogue='<p style="color:green">'.$exec.'</p>';
        header('Refresh:3;url=/task_manager/UI/home/?token='.$token);
    }
    else header('location:/task_manager/UI/home/?token='.$token);
}
?>