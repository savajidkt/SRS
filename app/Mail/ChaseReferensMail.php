<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Support\Facades\URL;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ChaseReferensMail extends Mailable
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

    $emailTemplate = getEmailTemplatesByID(4);
    if ($emailTemplate) {

      $emailBody = replaceHTMLBodyWithParam($emailTemplate['template'], $data);
      $emailSubject = replaceHTMLBodyWithParam($emailTemplate['subject'], array('attendee_name' => $data['attendee_name']));
      $emailHeaderFooter = getEmailTemplatesHeaderFooter();

      return $this->subject($emailSubject)->markdown('admin.Mail.companyOrganizerMail', ['emailBody' => $emailBody,'emailHeaderFooter' => $emailHeaderFooter]);
    }
    return false;
  }
}
