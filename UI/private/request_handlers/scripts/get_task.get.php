<?php
$task_name="";
$description="";
$complete="";
$due="";
$u_id;
$task_id="";
$completed_html="";
if(isset($_POST['edit_task'])||isset($_POST['submit_edit_task']))
{
    if(isset($_POST['submit_edit_task'])) error_reporting(0);//Turn Off error reporting for the moment of click only
    $data=array();
    $data['u_id']=$_POST['u_id'];
    $data['task_id']=$_POST['task_id'];
    $request=new request_handler($_POST);
    $exec=$request->call_get_task();
    $exec=json_decode(strval($exec),true);
    if(is_array($exec))
    {
        $u_id=$data['u_id'];
        $task_id=$data['task_id'];
        $task_name=$exec[0]['name'];
        $description=$exec[0]['description'];
        $complete=$exec[0]['Complete'];
        $due=$exec[0]['due'];
        if($complete=="YES")
        {
            $completed_html='<optgroup label="Completed?" required>
                <option value="YES" selected="">Yes</option>
                <option value="NO">No</option>
            </optgroup>';
        }
        else if($complete=="NO"){
            $completed_html='<optgroup label="Completed?">
            <option value="YES">Yes</option>
            <option value="NO" selected="">No</option>
        </optgroup>';
        }
    }
}else header('location:/task_manager/UI/home?token='.$token);
?>