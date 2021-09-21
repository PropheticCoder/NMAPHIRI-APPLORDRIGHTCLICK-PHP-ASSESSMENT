<?php
    $tasks_table="";
    $data=array();
    $data['u_id']=$u_id;
    $request=new request_handler($data);
    $exec=$request->call_get_all_tasks();
    $exec=json_decode(strval($exec),true);
    if(is_array($exec))
    {
        foreach($exec as $row_num =>$row)
        {
            $tasks_table .='<tr style="font-size:11px">
                                <td>'.$row['name'].'</td>
                                <td>'.$row['description'].'</td>
                                <td>'.$row['Complete'].'</td>
                                <td>'.$row['due'].'</td>
                                <td>
                                <form method="POST" action="/task_manager/UI/edit_task/?token='.$token.'">
                                    <input type="hidden" name="u_id" value="'.$u_id.'">
                                    <input type="hidden" name="task_id" value="'.$row['task_id'].'">
                                    <input style="border:none;width:30px;font-size:9px;color:green" type="submit" name="edit_task" value="Edit">
                                </form>
                                <form method="POST" action="/task_manager/UI/home/?token='.$token.'">
                                    <input type="hidden" name="u_id" value="'.$u_id.'">
                                    <input type="hidden" name="task_id" value="'.$row['task_id'].'">
                                    <input style="border:none;width:30px;font-size:9px;color:red" type="submit" name="delete_task" value="Delete">
                                </form>
                                </td>
                            </tr>';
        }
    }
?>