<?php 
namespace src\v1\Adapters;
use src\v1\Interfaces\UsersInterface;
use src\v1\ENTITIES\User;

/**
 * @author Npfariseni Maphiri
 * @copyright Npfariseni Maphiri
 * @package Adapters
 * Adapter rules are declared in interfaces, which contain Use Cases,
 * Adapter Will Then Make Use Of Entities To Process Required Task
 */
class UsersAdapter extends User implements UsersInterface
{
    public $result;

    /**
     * new user checks if user exists
     * inserts user
     * selects u_id
     * creates token
     */
    public function new_user()
    {
        $return=array();
        //Make Sure We Do Not Have Existing Record
        $u_id=$this->select_u_id();
        if($u_id==0) {
            $this->insert();
            $u_id=$this->select_u_id();
            $return=$this->create_token($u_id);
            return $return;
        }
        else return "User Exists!";
    }

    /**
     * reset user validates token
     * selects user
     * updates user
     */
    public function reset_user()
    {
        $return=array();
        //validate token
        $u_id=$this->validate_token();
        if($u_id==0)  return "Invalid Token, Please Restart Process!";
        $user_details=$this->select($u_id);
        return $this->update($u_id);
    }

    /**
     * delete user deletes user
     */
    public function delete_user()
    {
        return $this->delete();
    }

    /**
     * return user info selects user
     */
    public function return_user_info()
    {
        return $this->select();
    }

    public function __construct(string $method,array $data)
    {
        parent::__construct($data);
        $this->result=$this->$method();
    }
}
?>

