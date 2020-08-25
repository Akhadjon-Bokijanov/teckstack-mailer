<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require '../../vendor/autoload.php';

class Email
{
    protected $mail;

    public $senderMail;
    public $senderName;

    public $receiverEmail;
    public $receiverName;
    public $replyTo;
    
    public $subject;
    public $body;
    public $altBody;

    public function __construct()
    {
        $this->mail = new PHPMailer(true);
    }

    public function send()
    {
        try{
             //Server settings
            //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
            $this->mail->isSMTP();                                            // Send using SMTP
            $this->mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
            $this->mail->SMTPAuth   = true;                                   // Enable SMTP authentication
            $this->mail->Username   = 'techstack.uz@gmail.com';                     // SMTP username
            $this->mail->Password   = 'menmanoch';                               // SMTP password
            $this->mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
            $this->mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

            //Recipients
            $this->mail->setFrom( $this->senderMail, $this->senderName);
            $this->mail->addAddress($this->receiverEmail, $this->receiverName);     // Add a recipient
            $this->mail->addReplyTo('info@example.com', 'Information');


            // Content
            $this->mail->isHTML(true);                                  // Set email format to HTML
            $this->mail->Subject = $this->subject;
            $this->mail->Body    = $this->body;
            $this->mail->AltBody = $this->altBody;

            $this->mail->send();
            echo 'Message has been sent';
        }
        catch(Exception $e)
        {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }

}