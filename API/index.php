<?php
/**
 * @author Npfariseni Maphiri
 * @package API - EndPoint
 */
include("../../../src/v1/Config/requirements/index.php");//load requirements
if($execute==true)//if execute was not ruled false
{
    $controller = "\src\\".$api_version."\\Controllers\\".$entity."Controller";//create controller name from url 
    $request=new $controller($_SERVER['REQUEST_METHOD'],$_REQUEST);//create new controller object
    echo json_encode($request->run(),JSON_FORCE_OBJECT);//return response
}else json_encode($execute,JSON_FORCE_OBJECT);//If Not True Some Error Took Place In Check PreRequirements, Return The Error
?>