<?php
namespace src\v1\ENTITIES;

use Exception;
use src\v1\database\db;//Database access limitted only to entities
/**
 * @author Npfariseni Maphiri
 * @copyright Npfariseni Maphiri
 * @package ENTITIES
 * In Here Are The Methods Responsible For
 *  Creating A New Entity Record,
 *  Updating Entity Record,
 *  Read Entity Record(s)
 *  Delete Entity Record
 *  Database access is only limited to entities
 */
class User extends db
{
    private $u_id;
    private $name;
    private $email;
    private $password;
    private $old_password;
    private $token;

    public function __construct(array $data)
    {
        if(isset($data['u_id'])) $this->u_id=$data['u_id'];
        if(isset($data['name'])) $this->name=$data['name'];
        if(isset($data['email'])) $this->email=$data['email'];
        if(isset($data['password'])) $this->password=$data['password'];
        if(isset($data['old_password'])) $this->old_password=$data['old_password'];
        if(isset($data['token'])) $this->token=$data['token'];
    }

    /**
     * uses email to return u_id
     */
    protected function select_u_id()
    {
        $SQL="SELECT u_id FROM Users WHERE email='$this->email'";
        $SQL_EXEC=$this->connect()->query($SQL);
        if($SQL_EXEC==false) return "Error 01: Error Querying For u_id";
        while($row=$SQL_EXEC->fetch())
        {
            return $row['u_id'];
        }
        return 0;
    }

    /**
     * Inserts New User Into Database
     */
    protected function insert($email=false,$name=false,$password=false)
    {
        //Check If fields are entered the alternate way.
        if($email !=false) $this->email=$email;
        if($name !=false) $this->name=$name;
        if($password !=false) $this->password=$password;

        //Return Some Errors If Some Data Missing
        if(!isset($this->email)) return "Email Required!";
        if(!isset($this->name)) return "Name Required!";
        if(!isset($this->password)) return "Password Required";
        
        $return_data=array();
        //If Nothing returned already this will run
        $SQL="INSERT into Users (email,name,password) VALUES ('$this->email','$this->name','$this->password')";
        $SQL_EXEC=$this->connect()->query($SQL);
    }

    /**
     * creates token
     */
    protected function create_token($u_id=false)
    {
        $return_data=array();
        $token=md5(time());
        $token_expiry=date('Y-m-d H:i:s',time()+1000);

        //If u_id did not come back return error
        if($u_id==0) return "Invalid Email/Password! Or Create Create A New Account!";


        $SQL="INSERT INTO tokens (u_id,token,expiry) VALUES ('$u_id','$token','$token_expiry')";
        $SQL_EXEC=$this->connect()->query($SQL);
        $return_data['u_id']=$u_id;
        $return_data['token']=$token;
        if($SQL_EXEC !=false) return $return_data;
    }


    protected function update($u_id=false,$email=false,$name=false,$password=false)
    {
         //Check If fields are entered the alternate way.
        if($u_id !=false) $this->u_id=$u_id;
        if($email !=false) $this->email=$email;
        if($name !=false) $this->name=$name;
        if($password !=false) $this->password=$password;


        if(isset($this->old_password))
        {
            //If we have old password, we are updating while logged in
            $SQL="SELECT COUNT(u_id),password FROM users WHERE password='$this->old_password'";
            $SQL_EXEC=$this->connect()->query($SQL);
            if($SQL_EXEC ==false) return "Error 08: Could not validate old password!";
            while($row=$SQL_EXEC->fetch()) 
            {
                if($row['password'] != $this->old_password) return "Incorrect Password!";
            }
            $SQL="UPDATE Users SET password='$this->password' WHERE u_id='$this->u_id'";
        }
        //if no password is set we are udating personal details
        if(!isset($this->password)) $SQL="UPDATE Users SET name='$this->name' WHERE u_id='$this->u_id'";
        //If we have a password standing alone under update we are updating passowrd via token so no old password
        if(isset($this->password))  $SQL="UPDATE Users SET password='$this->password' WHERE u_id='$this->u_id'";
        $SQL_EXEC=$this->connect()->query($SQL);
        return "Account Modified!";//Will either way, this has to be tested to do zero% failure
    }

    /**
     * selects user
     */
    protected function select($u_id=false)
    {
        if($u_id !=false) $this->u_id=$u_id;
        $SQL="SELECT email,name FROM Users WHERE u_id='$this->u_id'";
        $SQL_EXEC=$this->connect()->query($SQL);
        if($SQL_EXEC==false) return 0;
        while($row=$SQL_EXEC->fetch())
        {
            return $row;//Just return row
        }
        return $this->u_id;//Left To Avoid Bugs
    }

    /**
     * validates a token
     */
    protected function validate_token()
    {
        /**
         * Variable Declaration
         */
        $token=$this->token;
        $token_expiry="";
        $token_count="";
        $u_id=0;
        $time_enquired=strtotime(date("Y-m-d H:i:s",time()));

        $SQL="SELECT COUNT(token),u_id,expiry FROM tokens WHERE token='$token'";
        $SQL_EXEC=$this->connect()->query($SQL);
        if($SQL_EXEC !=false)//If Query Success
        {
            while($row=$SQL_EXEC->fetch())
            {
                $token_count=$row['COUNT(token)'];
                $token_expiry=strtotime($row['expiry']);
                $u_id=$row['u_id'];
            }
            if($token_count ==0) return 0;//Return If Token Is Unknown
            $time_remaining=$token_expiry-$time_enquired;
            if($time_remaining <=0) return 0;//If token expired return 0
            return $u_id;
        }
        
        return false;
    }

    /**
     * deletes a user
     */
    protected function delete()
    {
        $SQL="DELETE FROM Users WHERE u_id='$this->u_id'";
        $SQL_EXEC=$this->connect()->query($SQL);
    }
}
?>