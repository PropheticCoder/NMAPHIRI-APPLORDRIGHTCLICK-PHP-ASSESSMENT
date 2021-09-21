<?php 
namespace src\v1\Controllers;
use src\v1\Adapters\UsersAdapter;
/**
 * @author Npfariseni Maphiri
 * @copyright Npfariseni Maphiri
 * @package Controllers
 * Will Control Which Adapter Is Used Depending On The Request Method
 */
class UsersController
{
    private $Adapter;
    public function __construct(string $request_method,array $data)
    {
        //GET returns user infro
        if($request_method=='GET') $this->Adapter=new UsersAdapter("return_user_info",$data);
        //POST creates new user
        if($request_method=='POST') $this->Adapter=new UsersAdapter("new_user",$data);
        //PUT resets User
        if($request_method=='PUT') $this->Adapter=new UsersAdapter("reset_user",$data);
        //DELETE deletes User
        if($request_method=='DELETE') $this->Adapter=new UsersAdapter("delete_user",$data);
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