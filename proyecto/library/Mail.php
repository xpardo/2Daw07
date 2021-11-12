<?php
 
namespace My;
use \PHPMailer\PHPMailer\PHPMailer;
use \PHPMailer\PHPMailer\Exception as PHPMailerException;
use PHPMailer\PHPMailer\SMTP;

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
        $this->_mailer = new PHPMailer();  
        $mail =include(__DIR__ . "/../config/mail.php");
                
        // Setup SMTP server...
        $this->SMTPDebug = SMTP::DEBUG_SERVER;                                                              
        $this->Host       = $mail['server'] ?? ['host'];              
        $this->SMTPAuth   = true;                                   
        $this->Username   = $mail['server'] ?? ['username'];                     
        $this->Password   = $mail['server'] ?? ['password'];                            
        $this->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;           
        $this->Port       = $mail['server'] ?? ['port'];

        // Configure mail contact: from and reply...
        $this->Mail =  $mail['from'] ?? ['mail'];
        $this->Name = $mail['from'] ?? ['name'];

        // Set subject and body (HTML or not)...
        $this->Subject = $subject;
        $this->Body    = $body;
                                        
    }
  
    public array $to;
    public array $cc;
    
    /**
     * Send mail to recipients
     *
     * @param array $to
     * @param array $cc (optional)
     * @param array $bcc (optional)
     * @return bool
     */
    public function send(array $to = [], array $cc = [], array $bcc = [])
    {


        // Add recipients (to, cc, bcc)...
        $this->to = ["2daw.equip08@fp.insjoaquimmir.cat"];
        $this->cc = ["2daw.equip08@fp.insjoaquimmir.cat"];        
       

        foreach ($to as $rec) 
        {
             $to[] = $rec['to'];
        }

        foreach ($cc as $rec) 
        {
            $cc[] = $rec['cc'];
        }

        // Send mail...


        $this->Subject = 'prova';
        $content = "<p>Aixo és una proba del grup 08</p>";

        $this->MsgHTML($content); 
        // if(!$this->Send()) 
        // {
        //     echo "S'ha produït un error en enviar el correu electrònic.";
        //     var_dump($this);
        // } else 
        // {
        //     echo "Correu electrònic enviat correctament";
        // }
      
   
        // Clear recipients...

        
    }
 }
 

 //2daw.equip08@fp.insjoaquimmiir.cat
 //pep.jimenez@insjoaquimmir.cat