<?php
namespace src\v1\phpmailer;
use \PHPMailer\PHPMailer\PHPMailer;
use \PHPMailer\PHPMailer\Exception;
class email extends PHPMailer{

    /**
     * adapted from phpmailer and restructured into a gateway
     */
    private function config(string $recipient_email,string $recipient_name,string $subject)
    {
        //Server settings
        $this->SMTPOptions=array('ssl'=>array('verify_peer'=>false,'verify_peer_name'=>false,'allow_self_signed'=>true));
        $this->SMTPDebug = 0;                                 // Enable verbose debug output
        $this->isSMTP();                                      // Set mailer to use SMTP
        $this->Host = 'smtp.gmail.com';                   // Specify main and backup SMTP servers
        $this->SMTPAuth = true;                               // Enable SMTP authentication
        $this->Username = 'applordtmanager@gmail.com';              // SMTP username
        $this->Password = '@AppLordtManager2021';                           // SMTP password
        $this->SMTPSecure = 'TLS';                            // Enable TLS encryption, `ssl` also accepted
        $this->Port = 587;                                    // TCP port to connect to

        //Recipients
        $this->setFrom('applordtmanager@gmail.com', 'tManager');          //This is the email your form sends From
        $this->addAddress($recipient_email, $recipient_name); // Add a recipient address

        //Content
        $this->isHTML(true);                                  // Set email format to HTML
        $this->Subject = $subject;
    }

    /**
     * fetches the body of specified email
     */
    private function body(string $recipient_name,$token=false,string $email_file)
    {
        include($email_file.'.php');
        $this->Body    = $email_body;
        //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    }

    public function __destruct()
    {
        //exit;//exit should only run on controllers
    }

    public function __construct(string $recipient_name,string $recipient_email,string $subject,$token=false,$email_file)
    {
        try {
            $this->config($recipient_email,$recipient_name,$subject);
            $this->body($recipient_name,$token,$email_file);
            $this->send();
        }
        catch (Exception $e) {
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $this->ErrorInfo;
        }
        //$this->__destruct();//self destruct
    }
}
?>