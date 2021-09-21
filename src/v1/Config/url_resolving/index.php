<?php 
//Listens to url and assigns url varialbles accordingly
$running_script=explode("/",$_SERVER['SCRIPT_FILENAME']);
$api_version=$running_script[5];
$entity=$running_script[6];