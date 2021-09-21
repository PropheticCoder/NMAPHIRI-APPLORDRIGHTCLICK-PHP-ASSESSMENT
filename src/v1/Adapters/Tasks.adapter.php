<?php 
namespace src\v1\Adapters;

use src\v1\ENTITIES\Tasks;
use src\v1\Interfaces\TasksInterface;

/**
 * @author Npfariseni Maphiri
 * @copyright Npfariseni Maphiri
 * @package Adapters
 * Adapter rules are declared in interfaces, which contain Use Cases,
 * Adapter Will Then Make Use Of Entities To Process Required Task
 */
class TasksAdapter extends Tasks implements TasksInterface
{
    public $result;

    /**
     * create task inserts new task
     */
    public function create_task()
    {
        return $this->insert();
    }

    /**
     * update task updates task
     */
    public function update_task()
    {
        return $this->update();
    }

    /**
     * fetch tasks selects task
     */
    public function fetch_tasks()
    {
        return $this->select();
    }

    /**
     * delete tasks deletes task
     */
    public function delete_tasks()
    {
        return $this->delete();
    }

    public function __construct(string $method,array $data)
    {
        parent::__construct($data);
        $this->result=$this->$method();
    }
}
?>
