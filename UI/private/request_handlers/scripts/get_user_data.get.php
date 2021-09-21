<?php
//Interscript usage preparation
$u_id=0;
$u_name="";
$u_email="";
$token="";
$dialogue="";

if(isset($_GET['token']))
{
    $data=array();
    $data['token']=$_GET['token'];
    $request=new request_handler($data);
    $exec=$request->call_authenticate();
    $exec=json_decode(strval($exec),true);
    if($exec==null || $exec==false) header('location:/task_manager/UI/login/');
    $token=$exec['token'];//Set For Interscript Usage
    $u_id=$exec['u_id'];//Set For InterScript Usage

    
    $data=array();
    $data['u_id']=$u_id;
    $request=new request_handler($data);
    $exec=$request->call_get_user();
    $exec=json_decode(strval($exec),true);
    $u_name=$exec['name'];//Set For Interscript usage
    $u_email=$exec['email'];
}
else header('location:/task_manager/UI/login/');
?>