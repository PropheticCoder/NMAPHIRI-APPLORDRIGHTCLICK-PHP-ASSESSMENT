<?php
namespace src\v1\database;
/**
 * @author Npfariseni Maphiri
 * @copyright Npfariseni Maphiri
 * @package Configurations/Database
 */
class db
{
    private $host;
    private $user;
    private $password;
    private $dbname;

    /**
     * connect function
     * creates a pdo connection to database
     * @param none
     * @return pdo connection
     * @access  protected
     * This Method Was Extracted From Stack Overflow In 2018 And Has Been In Usage Since
     * change config in body of connect to suit your database
     */

    protected function connect()
    {
        $this->host="localhost";
        $this->user= "root";
        $this->password="";
        $this->dbname = "task_manager";
        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbname;
        $pdo = new \PDO($dsn, $this->user, $this->password);
        $pdo->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_ASSOC);
        return $pdo;
    }
}
?>