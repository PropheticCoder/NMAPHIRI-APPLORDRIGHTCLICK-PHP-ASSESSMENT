<?php 
namespace src\v1\Interfaces;
/**
 * @author Npfariseni Maphiri
 * @copyright Npfariseni Maphiri
 * @package Interfaces
 * Contain declarations of use cases.
 **/
interface TasksInterface
{
    public function create_task();
    public function update_task();
    public function fetch_tasks();
    public function delete_tasks();
}
?>