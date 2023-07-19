<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\URL;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ChaseAttendeesMail extends Mailable
{

  use Queueable, SerializesModels;
  public $data;
  /**
   * Create a new message instance.
   *
   * @return void
   */
  public function __construct($data)
  {
    $this->data = $data;
  }

  /**
   * Build the message.
   *
   * @return $this
   */

  public function build()
  {
    $data = $this->data;

    $emailTemplate = getEmailTemplatesByID(2);
    if ($emailTemplate) {     
      $createdAt =  Carbon::createFromFormat('d/m/Y', $data['course_date'])->format('m/d/Y');
      $emailBody = replaceHTMLBodyWithParam($emailTemplate['template'], $data);
      $emailSubject = replaceHTMLBodyWithParam($emailTemplate['subject'], array('course_date' => dateFormat($createdAt)));
      $emailHeaderFooter = getEmailTemplatesHeaderFooter();
      return $this->subject($emailSubject)->markdown('admin.Mail.companyOrganizerMail', ['emailBody' => $emailBody,'emailHeaderFooter' => $emailHeaderFooter]);
    }
    return false;
  }
}
