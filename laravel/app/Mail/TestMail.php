<?php
namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class TestMail extends Mailable
{
	/* use Queueable, SerializesModels; */
	
	public function __construct(array $content)
   {
       $this->content = $content;
   }
 
   public function build()
   {
       // pass here your email template file
       return $this->markdown('mails.testmail')
           ->with('content', $this->content);
           $request->user()->sendEmailVerificationNotification();

   }

}