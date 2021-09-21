<?php
namespace src\v1\ENTITIES;
use src\v1\database\db;
/**
 * @author Npfariseni Maphiri
 * @copyright Npfariseni Maphiri
 * @package ENTITIES
 * In Here Are The Methods Responsible For
 *  Creating A New Entity Record,
 *  Updating Entity Record,
 *  Read Entity Record(s)
 *  Delete Entity Record
 *  Database access is only limited to entities
 */
class Tasks extends db
{
    private $u_id;
    private $task_id;
    private $task_name;
    private $description;
    private $complete;
    private $due;

    public function __construct(array $data)
    {
        if(isset($data['u_id'])) $this->u_id=$data['u_id'];
        if(isset($data['task_id'])) $this->task_id=$data['task_id'];
        if(isset($data['task_name'])) $this->task_name=filter_var($data['task_name'],FILTER_SANITIZE_STRING);
        if(isset($data['description'])) $this->description=$data['description'];
        if(isset($data['Complete'])) $this->complete=$data['Complete'];
        if(isset($data['due'])) $this->due=$data['due'];
    }


    /**
     * gets count of tasks
     *  */ 
    private function task_count($u_id)
    {
        $SQL="SELECT COUNT(task_id) FROM tasks WHERE u_id=$this->u_id";
        $SQL_EXEC=$this->connect()->query($SQL);
        if($SQL_EXEC ==false) return "Error 03: Unable To Retrieve Tasks Count";
        while($row=$SQL_EXEC->fetch())
        {
            return $row['COUNT(task_id)'];
        }
    }

    /**
     * resets private fields if they are insert alternately
     */
    private function insert_parameters($u_id=false,$task_name=false,$description=false,$complete=false,$due=false)
    {
        if($u_id !=false) $this->u_id=$u_id;
        if($task_name !=false) $this->task_name=$task_name;
        if($description !=false) $this->description=$description;
        if($complete !=false) $this->complete=$complete;
        if($due !=false) $this->due=$due;
    }

    /**
     * inserts Task
     */
    protected function insert($u_id=false,$task_name=false,$description=false,$complete=false,$due=false)
    {
        //reset fields if need be
        $this->insert_parameters($u_id,$task_name,$description,$complete,$due);
        $init_count=$this->task_count($this->u_id);//get task count
        //insert task
        $SQL="INSERT INTO tasks (u_id,name,description,Complete,due) VALUES ('$this->u_id','$this->task_name','$this->description','$this->complete','$this->due')";
        $SQL_EXEC=$this->connect()->query($SQL);

        //recount tasks
        $final_count=$this->task_count($this->u_id);
        //if task count increased then we have a new task
        if($final_count>$init_count) return "Task Created Successfully";
        else return "Error 04: Could Not Verify Task Creation!";
    }


    /**
     * resets private fields if need be
     */
    private function update_parameters($u_id=false,$task_id=false,$task_name=false,$description=false,$complete=false,$due=false)
    {
        if($u_id !=false) $this->u_id=$u_id;
        if($task_id !=false) $this->task_id=$task_id;
        if($task_name !=false) $this->task_name=$task_name;
        if($description !=false) $this->description=$description;
        if($complete !=false) $this->complete=$complete;
        if($due !=false) $this->due=$due;
    }

    /**
     * updates a task
     */
    protected function update($u_id=false,$task_id=false,$task_name=false,$description=false,$complete=false,$due=false)
    {
        $this->update_parameters($u_id,$task_id,$task_name,$description,$complete,$due);
        $SQL="UPDATE tasks SET name='$this->task_name',description='$this->description',Complete='$this->complete',due='$this->due' WHERE u_id='$this->u_id' AND task_id='$this->task_id'";
        $SQL_EXEC=$this->connect()->query($SQL);
        if($SQL_EXEC==false) return "Error 05: Could Not Update Task!";
        return "Task Updated Successfully!";
    }


    /**
     * resets private fields if need be
     */
    private function select_parameters($u_id=false,$task_id=false)
    {
        if($u_id !=false) $this->u_id=$u_id;
        if($task_id !=false) $this->task_id=$task_id;
    }

    /**
     * selects tasks or task
     */
    protected function select($u_id=false,$task_id=false)
    {
        $return_data=array();
        $this->select_parameters($u_id,$task_id);

        //The nearest task is a priority
        //if we have a task_id set then fetch with task_id
        //else fetch only with u_id
        if(isset($this->task_id)) $SQL="SELECT name,description,Complete,due FROM tasks WHERE task_id='$this->task_id' ORDER BY due ASC";
        else $SQL="SELECT task_id,name,description,Complete,due FROM tasks WHERE u_id='$this->u_id' ORDER BY due ASC";
        $SQL_EXEC=$this->connect()->query($SQL);
        if($SQL_EXEC==false) return "Error 06: Could Not Fetch Tasks!";
        while($row=$SQL_EXEC->fetch())
        {
            array_push($return_data,$row);
        }
        return $return_data;
    }

    /**
     * reset private fields if need be
     */
    private function delete_parameters($u_id=false,$task_id=false)
    {
        if($u_id !=false) $this->u_id=$u_id;
        if($task_id !=false) $this->task_id=$task_id;
    }

    /**
     * deletes a Task
     */
    protected function delete($u_id=false,$task_id=false)
    {
        $this->delete_parameters($u_id,$task_id);
        if(!isset($this->task_id)) $SQL="DELETE FROM tasks WHERE u_id='$this->u_id'";
        else $SQL="DELETE FROM tasks WHERE u_id='$this->u_id' AND task_id=$this->task_id";
        $SQL_EXEC=$this->connect()->query($SQL);
        if($SQL_EXEC==false) return "Could Not Delete Task(s)!";
        return "Task(s) Deleted!";
    }
}
?>