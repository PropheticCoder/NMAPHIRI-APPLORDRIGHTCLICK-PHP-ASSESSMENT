<?php
namespace src\v1\ENTITIES;
use src\v1\database\db;
use src\v1\phpmailer\email;
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
class Auth extends db
{
    private $token;
    private $email;
    private $password;

    public function __construct(array $data)
    {
        if(isset($data['token'])) $this->token=$data['token'];
        if(isset($data['email'])) $this->email=$data['email'];
        if(isset($data['password'])) $this->password=$data['password'];
    }

    /**
     * resets private field if need be
     */
    private function auth_parameters($email=false,$password=false)
    {
        if($email !=false) $this->email=$email;
        if($password !=false) $this->password=$password;
    }

    /**
     * resets private fields if need be
     */
    private function validate_token_parameters($token=false)
    {
        if($token !=false) $this->token=$token;
    }

    /**
     * validates a token
     */
    protected function validate_token($token=false)
    {
        $this->validate_token_parameters($token);
        $return_data=array();
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
            if($token_count ==0) return null;//Return If Token Is Unknown
            $time_remaining=$token_expiry-$time_enquired;//calculate time remaining
            if($time_remaining <=0) return $this->destroy_token($token);//if negative time then destroy token
            //if time is still there just return the u_id and the same token
            $return_data['u_id']=$u_id;
            $return_data['token']=$token;
            return $return_data;
        }
        
        return null;
    }

    /**
     * validates a user
     */
    private function validate_user($email=false,$password=false)
    {
        $this->auth_parameters($email,$password);

        $SQL="SELECT COUNT(u_id),u_id FROM users WHERE email='$this->email'AND password='$this->password'";
        $SQL_EXEC=$this->connect()->query($SQL);
        if($SQL_EXEC ==false) return "Error 07: Could Not Begin Validation";
        while($row=$SQL_EXEC->fetch())
        {
            if($row['COUNT(u_id)']==0) return 0;//if no user found return 0
            else return $row['u_id'];//if user found return u_id
        }
    }


    /**
     * creates a token, generally logs in
     */
    protected function create_token($email=false,$password=false)
    {
        $return_data=array();
        $this->auth_parameters($email,$password);
        $token=md5(time());//create token from mdg hash of time
        $token_expiry=date('Y-m-d H:i:s',time()+1000);//set token expiry
        $u_id=$this->validate_user();//check if user exists and return u_id
        if($u_id==0) return "Invalid Email/Password! Or Create Create A New Account!";//if 0 then o user found see validate user

        $SQL="INSERT INTO tokens (u_id,token,expiry) VALUES ('$u_id','$token','$token_expiry')";
        $SQL_EXEC=$this->connect()->query($SQL);

        $return_data['u_id']=$u_id;
        $return_data['token']=$token;
        if($SQL_EXEC !=false) return $return_data;
    }

    /**
     * resets private fields if needs be
     */
    private function fetch_u_id_parameters($email=false)
    {
        if($email !=false) $this->email=$email;
    }

    /**
     * fetches a user
     */
    private function fetch_user($email=false)
    {
        $this->fetch_u_id_parameters($email);
        $SQL="SELECT u_id,name FROM users WHERE email='$this->email'";
        $SQL_EXEC=$this->connect()->query($SQL);
        if($SQL_EXEC==false) return "Could not enquire u_id";
        while($row=$SQL_EXEC->fetch())
        {
            if($row) return $row;
            else return 0;//return o if nothing found
        }
    }

    /**
     * creates a token for forgot password and sends email
     */
    protected function trigger_forgot_password()
    {
        //get u_id and name
        $user=$this->fetch_user();
        if($user==0) return "User Not Found!";
        $u_id=$user['u_id'];
        $name=$user['name'];
        //create_token
        $token=md5(time());
        $token_expiry=date('Y-m-d H:i:s',time()+1000);//token expiry
        //insert token
        $SQL="INSERT INTO tokens (u_id,token,expiry) VALUES ('$u_id','$token','$token_expiry')";
        $SQL_EXEC=$this->connect()->query($SQL);

        if($SQL_EXEC !=false)
        {
            //create new email object and send email
            $email=new email($name,$this->email,"Forgot Password",$token,"forgot_password");
            return "An Email Has Been Sent!";
        }
        //call the email class
        return "An Email Has Been Sent!";
    }

    /**
     * resets private fields if need be
     */
    private function destroy_token_parameters($token=false)
    {
        if($token !=false) $this->token=$token;
    }

    /**
     * destroys a token, by deleting it from database
     */
    protected function destroy_token($token=false)
    {
        $this->destroy_token_parameters($token);
        $SQL="DELETE FROM tokens WHERE token='$this->token'";
        $SQL_EXEC=$this->connect()->query($SQL);
    }
}