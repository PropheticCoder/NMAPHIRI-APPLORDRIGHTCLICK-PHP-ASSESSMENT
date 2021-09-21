# NMAPHIRI APPLORDRIGHTCLICK PHP ASSESSMENT
# INSTALLATION 
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

API Usage For Postman Testing Has Been Provided In Below And In HOST/API/api_usage.php
Contact me on 0740120033 For Any Assistance If You Come Accross Issues.

# TESTING AND USAGE
This API Was Tested Using Postman API Testing Tool
Make Sure To Send Requests With Appropriate REQUEST_METHOD Or The API Wont Work.
Alternately Refer To UI/private/request_handlers/classes/server2server.php For The curl code used to call this API
This API Has 3 Entities That Are Adapted Into Use Cases Which Are Then Controlled By Controllers
- Entity Number 1 - Users
- - GET  HOST/API/v1/Users - Uses token and u_id to fetch User Info - {u_id,token}
- - POST HOST/API/v1/Users - Creates New User By email,name and password - {email,name,password}
- - PUT  HOST/API/v1/Users - Updates A User depending on input received - {name || old_password, password || password}
                         u_id must be specified at all times
                         If name is only sent it updates name
                         if old password is sent it updates password after old password evaluation
                         If just password is set it resets the password
- - DELETE HOST/API/v1/Users- Deletes A User From Database - {token - u_id}

- Entity Number 2 - Auth
- - GET  HOST/API/v1/Auth - Verifies that a token is valid by returning u_id and same token - {token}
- - POST HOST/API/v1/Auth - Creates a new token - {email,password}
- - PUT  HOST/API/v1/Auth - Triggers Forgot Password Use Case By Creating Token And Sending Forgot Password Email - {email}
- - DELETE HOST/API/v1/Auth - Deletes A token - {token}

- Entity Number 3 - Tasks
- - GET  HOST/API/v1/Tasks - Fetches Tasks By u_id or task_id - {u_id || task_id}
- - POST HOST/API/v1/Tasks - Creates New Task - {u_id,task_name,description,Complete,due}
- - PUT  HOST/API/v1/Tasks - Updates A Task - {u_id,task_id}
- - DELETE HOST/API/v1/Tasks - Deletes A Tasks {u_id,task_id}