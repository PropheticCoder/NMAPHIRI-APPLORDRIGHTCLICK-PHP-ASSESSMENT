<?php 
namespace src\v1\Interfaces;
/**
 * @author Npfariseni Maphiri
 * @copyright Npfariseni Maphiri
 * @package Interfaces
 * Contain declarations of use cases.
 **/
interface UsersInterface
{
    public function new_user();
    public function reset_user();
    public function delete_user();
    public function return_user_info();
}
?>