Making Sure That All Hosts Match With The Current Host Of The App Will Avoid Redirection Issues When The Enviroment Of App Changes
Suggesting that you host the app in http://localhost/task_manager as this is the host I currently have on my machine.

Steps

1. Change host in "UI/private/request_handlers/classes/request_handler.php"[This Will Change The Host Of The API]
2. Change host in "UI/private/host.php		[This Will Change The Host Where The App Redirects Around]
3. Change host in "src/v1/host/host.php"	[This Will Change The Host Used In Any API Classes]
4. Change host in "src/v1/Config/phpmailer/emails/host.php" [This Will Change The Host Specified In Emails]
5. Import database using sql file in "src/v1/Config/db/"    
6. Change database credentials in "src/v1/Config/db/db.class.php"
7. Run App

API Usage For Postman Testing Has Been Provided In HOST/API/api_usage.php
Contact me on 0740120033 For Any Assistance If You Come Accross Issues.