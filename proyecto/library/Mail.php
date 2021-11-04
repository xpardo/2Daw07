<?php
 
namespace My;
use \PHPMailer\PHPMailer\PHPMailer;
use \PHPMailer\PHPMailer\Exception as PHPMailerException;
require '../vendor/phpmailer/phpmailer/src/Exception.php';
require '../vendor/phpmailer/phpmailer/src/PHPMailer.php';
require '../vendor/phpmailer/phpmailer/src/SMTP.php';

$mail = new PHPMailer();
$mail->IsSMTP();
$mail->Mailer = "smtp";

class Mail {
    // PHPMailer
    private $_mailer;
    public string $subject;
    public string $body;
    public bool $isHTML;

    /**
     * Constructs mail
     *
     * @param string $subject
     * @param string $body
     * @param bool $isHTML (optional)
     */

    public function __construct(string $subject, string $body, bool $isHTML = false)
    {
        $mail =include(__DIR__ . "/../config/database.php");
        $this->_mailer = new PHPMailer();          

        
        // Setup SMTP server...
        $this->SMTPDebug = $mail['debug'];                    
        $this->isSMTP();                                            
        $this->Host       = $mail['host'];              
        $this->SMTPAuth   = true;                                   
        $this->Username   = $mail['username'];                     
        $this->Password   = $mail['password'];                            
        $this->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;           
        $this->Port       = $mail['port'];

        // Configure mail contact: from and reply...
        $this->setFrom($mail['mail'],$mail['name']);
        $this->addAddress($mail['mail'],$mail['name']);

        // Set subject and body (HTML or not)...
        $this->subject = $subject;
        $this->body    = $body;
        $this->isHTML();       

                                       
    }
  
    public array $to;
    /**
     * Send mail to recipients
     *
     * @param array $to
     * @param array $cc (optional)
     * @param array $bcc (optional)
     * @return bool
     */
    public function send(array $to, array $cc = [], array $bcc = [])
    {
        // Add recipients...
        // Send mail...
        // Clear recipients...
    }
 }
 

 //2daw.equip08@fp.insjoaquimmiir.cat