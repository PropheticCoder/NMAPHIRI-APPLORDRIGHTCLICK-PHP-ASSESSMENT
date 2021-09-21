<?php 
namespace src\v1\Adapters;
use src\v1\ENTITIES\Auth;
use src\v1\Interfaces\AuthInterface;

/**
 * @author Npfariseni Maphiri
 * @copyright Npfariseni Maphiri
 * @package Adapters
 * Adapter rules are declared in interfaces, which contain Use Cases,
 * Adapter Will Then Make Use Of Entities To Process Required Task
 */
class AuthAdapter extends Auth implements AuthInterface
{
    public $result;

    /**
     * login use case creates a token
     */
    public function login()
    {
        return $this->create_token();
    }

    /**
     * forgot password triggers forgot password use case
     * by creating new token and sending email to user
     */
    public function forgot_password()
    {
        return $this->trigger_forgot_password();
    }

    /**
     * logout destroys token
     */
    public function logout()
    {
        return $this->destroy_token();
    }

    /**
     * authentication validates token
     */
    public function authenticate()
    {
        return $this->validate_token();
    }

    public function __construct(string $method,array $data)
    {
        parent::__construct($data);
        $this->result=$this->$method();
    }
}
?>