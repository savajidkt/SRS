<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;

class ForgotPasswordMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * User Model.
     *
     * @var User
     */
    protected $user;

    /** @var $title */
    protected $title;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        $this->user     = $user;
        $this->title    = 'Reset Password Notification - SRS-Reporting Ltd';
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $token = DB::table('password_resets')->where('email', $this->user->email)->orderBy('created_at', 'desc')->first();

        // return $this
        //     ->to($this->user->email)
        //     ->subject($this->title)
        //     ->view('emails.forgot-password', [
        //         'url'     => route('password.reset', $token->token)
        //     ]);

            $paramArr = [];
            $paramArr['site_url'] = URL::to('/');
            $paramArr['link'] = route('password.reset', $token->token);
            $paramArr['first_name'] = $this->user->first_name;
            $paramArr['last_name'] = $this->user->last_name;
            $paramArr['title'] = $this->user->title;
            
            $emailTemplate = getEmailTemplatesByID(25);
            if ($emailTemplate) {
        
              $emailBody = replaceHTMLBodyWithParam($emailTemplate['template'], $paramArr);
              $emailSubject = replaceHTMLBodyWithParam($emailTemplate['subject'], array());
              // return $this->subject($emailSubject)->with('body', $emailBody);
              $emailHeaderFooter = getEmailTemplatesHeaderFooter();
              return $this->subject($emailSubject)->markdown('admin.Mail.companyOrganizerMail', ['emailBody' => $emailBody,'emailHeaderFooter' => $emailHeaderFooter]);
        
            }
            return false;
    }
}
