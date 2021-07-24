<?php
 
namespace App\Mail;
 
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
 
class NewsletterConfirmMail extends Mailable
{
	var $title;
	var $body;
	var $subject;
	
    use Queueable, SerializesModels;
 
 
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }
 
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
       return $this->from(env('MAIL_FROM_ADDRESS'))
					->subject($this->subject)
                   ->view('mail.newsletterconfirm')
                   ->with(
                    [
                        'title' => $this->title,
                        'body' => $this->body,
                    ]);
    }
}