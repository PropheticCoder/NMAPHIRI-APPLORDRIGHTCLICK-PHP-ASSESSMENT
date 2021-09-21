<?php 
//all required files are declared here
require_once("../../../src/v1/Config/Globals/Globals.php");
require_once("../../../src/v1/Config/security/validate_request_method.php");
require_once("../../../src/v1/Config/Access_Control_Headers/index.php");
require_once("../../../src/v1/Config/url_resolving/index.php");

require '../../../src/v1/Config/phpmailer/src/Exception.php';
require '../../../src/v1/Config/phpmailer/src/PHPMailer.php';
require '../../../src/v1/Config/phpmailer/src/SMTP.php';
require '../../../src/v1/Config/phpmailer/emails/email.class.php';

require_once("../../../src/v1/Config/db/db.class.php");

require_once("../../../src/v1/Entities/Auth.php");
require_once("../../../src/v1/Entities/Users.php");
require_once("../../../src/v1/Entities/Tasks.php");
require_once("../../../src/v1/Interfaces/Auth.interface.php");
require_once("../../../src/v1/Interfaces/Users.interface.php");
require_once("../../../src/v1/Interfaces/Tasks.interface.php");
require_once("../../../src/v1/Adapters/Auth.adapter.php");
require_once("../../../src/v1/Adapters/Users.adapter.php");
require_once("../../../src/v1/Adapters/Tasks.adapter.php");
require_once("../../../src/v1/Controllers/Auth.Controller.php");
require_once("../../../src/v1/Controllers/Users.Controller.php");
require_once("../../../src/v1/Controllers/Tasks.Controller.php");
?>