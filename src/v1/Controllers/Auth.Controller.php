<?php 
namespace src\v1\Controllers;
use src\v1\Adapters\AuthAdapter;
/**
 * @author Npfariseni Maphiri
 * @copyright Npfariseni Maphiri
 * @package Controllers
 * Will Control Which Adapter Is Used Depending On The Request Method
 */
class AuthController
{
    private $Adapter;
    public function __construct(string $request_method,array $data)
    {
        //GET Authenticates User
        if($request_method=='GET') $this->Adapter=new AuthAdapter("authenticate",$data);
        //POST logs in User
        if($request_method=='POST') $this->Adapter=new AuthAdapter("login",$data);
        //PUT triggers forgot password user case
        if($request_method=='PUT') $this->Adapter=new AuthAdapter("forgot_password",$data);
        //DELETE logs ut User
        if($request_method=='DELETE') $this->Adapter=new AuthAdapter("logout",$data);
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