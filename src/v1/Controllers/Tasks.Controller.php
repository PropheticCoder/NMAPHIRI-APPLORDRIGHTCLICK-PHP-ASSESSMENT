<?php 
namespace src\v1\Controllers;
use \src\v1\Adapters\TasksAdapter;
/**
 * @author Npfariseni Maphiri
 * @copyright Npfariseni Maphiri
 * @package Controllers
 * Will Control Which Adapter Is Used Depending On The Request Method
 */
class TasksController
{
    private $Adapter;
    public function __construct(string $request_method,array $data)
    {
        //GET fetches tasks
        if($request_method=='GET') $this->Adapter=new TasksAdapter("fetch_tasks",$data);
        //POST creates tasks
        if($request_method=='POST') $this->Adapter=new TasksAdapter("create_task",$data);
        //PUT updates Task
        if($request_method=='PUT') $this->Adapter=new TasksAdapter("update_task",$data);
        //DELETE deletes Task
        if($request_method=='DELETE') $this->Adapter=new TasksAdapter("delete_tasks",$data);
    }
    public function run()
    {
        return $this->Adapter->result;
    }

    public function __destruct()
    {
        exit;
    }
}
?>