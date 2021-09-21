<?php 
namespace src\v1\Interfaces;
/**
 * @author Npfariseni Maphiri
 * @copyright Npfariseni Maphiri
 * @package Interfaces
 * Contain declarations of use cases.
 **/
interface AuthInterface
{
    public function login();
    public function forgot_password();
    public function logout();
    public function authenticate();
}
?>