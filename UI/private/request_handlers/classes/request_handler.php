<?php
/**
 * uncomment when testing
 * 
 * */
//include('server2server.php');
/**
 * request handlers has methods that make API Calls according to use cases
 * @package API
 * @author Mpfariseni
 * @version 1.0.0
 * @access  protected
 * 
 */
class request_handler extends server2server
{
    private $data=array();
    private $host='http://localhost/task_manager';//This Must Be Editted On Setup

    /**
     * constructor
     */
    public function __construct(array $data)
    {
        $this->data=$data;
    }

    /**
     * creates new account
     * @param none
     * @return array $data
     * @access  private
     */
    private function create_account()
    {
        $url=$this->host."/API/v1/Users";
        $communicate=$this->HTTP_REQ("POST",$this->data,$url);
        return  $communicate;
    }
    public function call_create_account()
    {
        return $this->create_account();
    }

    /**
     * creates new account
     * @param none
     * @return array $data
     * @access  private
     */
    private function logout()
    {
        $url=$this->host."/API/v1/Auth";
        $communicate=$this->HTTP_REQ("DELETE",$this->data,$url);
        return  $communicate;
    }
    public function call_logout()
    {
        return $this->logout();
    }

    /**
     * creates new account
     * @param none
     * @return array $data
     * @access  private
     */
    private function login()
    {
        $url=$this->host."/API/v1/Auth";
        $communicate=$this->HTTP_REQ("POST",$this->data,$url);
        return  $communicate;
    }
    public function call_login()
    {
        return $this->login();
    }

    /**
     * triggers forgot_password
     * @param none
     * @return array $data
     * @access  private
     */
    private function forgot_password()
    {
        $url=$this->host."/API/v1/Auth";
        $communicate=$this->HTTP_REQ("PUT",$this->data,$url);
        return  $communicate;
    }
    public function call_forgot_password()
    {
        return $this->forgot_password();
    }


    /**
     * creates new account
     * @param none
     * @return array $data
     * @access  private
     */
    private function edit_account()
    {
        $url=$this->host."/API/v1/Users";
        $communicate=$this->HTTP_REQ("PUT",$this->data,$url);
        return  $communicate;
    }
    public function call_edit_account()
    {
        return $this->edit_account();
    }
    /**
     * authenticates user
     * @param none
     * @return array $data
     * @access  private
     * Given URL Will Return User ID And Tpoken
     */
    private function authenticate()
    {
        //Given URL Will Return User ID And Tpoken
        $url=$this->host."/API/v1/Auth";
        $communicate=$this->HTTP_REQ("GET",$this->data,$url);
        return  $communicate;
    }
    public function call_authenticate()
    {
        return $this->authenticate();
    }

    
    /**
     * gets user info, it is assumed that user is authenticate when this runs
     * @param none
     * @return array $data
     * @access  private
     */
    private function get_user()
    {
        $url=$this->host."/API/v1/Users";
        $communicate=$this->HTTP_REQ("GET",$this->data,$url);
        return  $communicate;
    }
    public function call_get_user()
    {
        return $this->get_user();
    }

    /**
     * gets all tasks
     * @param none
     * @return array $data
     * @access  private
     */
    private function get_all_tasks()
    {
        $url=$this->host."/API/v1/Tasks";
        $communicate=$this->HTTP_REQ("GET",$this->data,$url);
        return  $communicate;
    }
    public function call_get_all_tasks()
    {
        return $this->get_all_tasks();
    }

    /**
     * gets a task
     * works same way as get_all_tasks but lets have it for convenience
     * @param none
     * @return array $data
     * @access  private
     */
    private function get_task()
    {
        $url=$this->host."/API/v1/Tasks";
        $communicate=$this->HTTP_REQ("GET",$this->data,$url);
        return  $communicate;
    }
    public function call_get_task()
    {
        return $this->get_task();
    }


    /**
     * creates a task
     * @param none
     * @return array $data
     * @access  private
     */
    private function create_task()
    {
        $url=$this->host."/API/v1/Tasks";
        $communicate=$this->HTTP_REQ("POST",$this->data,$url);
        return  $communicate;
    }
    public function call_create_task()
    {
        return $this->create_task();
    }

    /**
     * edits task
     * @param none
     * @return array $data
     * @access  private
     */
    private function edit_task()
    {
        $url=$this->host."/API/v1/Tasks";
        $communicate=$this->HTTP_REQ("PUT",$this->data,$url);
        return  $communicate;
    }
    public function call_edit_task()
    {
        return $this->edit_task();
    }


    /**
     * deletes task
     * @param none
     * @return array $data
     * @access  private
     */
    private function delete_task()
    {
        $url=$this->host."/API/v1/Tasks";
        $communicate=$this->HTTP_REQ("DELETE",$this->data,$url);
        return  $communicate;
    }
    public function call_delete_task()
    {
        return $this->delete_task();
    }
}

?>