<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Support\Facades\URL;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class RemoveAttendeeTrainerMail extends Mailable
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

    $paramArr = [];
    $paramArr['site_url'] = URL::to('/');
    $paramArr['trainer_name'] = $data['trainer_name'];
    $paramArr['course_date'] = $data['course_date'];
    $paramArr['course_name'] = $data['course_name'];
    $paramArr['company_organiser_attendees_name'] = $data['company_organiser_attendees_name'];
    $paramArr['company_address'] = $data['company_address'];
    $paramArr['company_name'] = $data['company_name'];
    $paramArr['company_organiser_attendees_email'] = $data['company_organiser_attendees_email'];
    $paramArr['course_end_date'] = $data['course_end_date'];
    $paramArr['attendees_list'] = $data['attendees_list'] . "" . $data['questionnaire_360'];
    $paramArr['attendee_name'] = isset($data['attendee_name']) ? $data['attendee_name'] : '';
    $paramArr['year'] = date('Y');
    $emailTemplate = getEmailTemplatesByID(26);
    if ($emailTemplate) {
      $emailBody = replaceHTMLBodyWithParam($emailTemplate['template'], $paramArr);
      $emailSubject = replaceHTMLBodyWithParam($emailTemplate['subject'], array('company_name' => $data['company_name'], 'course_name' => $data['course_name'], 'course_date' => $data['course_end_date']));
      $emailHeaderFooter = getEmailTemplatesHeaderFooter();
      return $this->subject($emailSubject)->markdown('admin.Mail.companyOrganizerMail', ['emailBody' => $emailBody, 'emailHeaderFooter' => $emailHeaderFooter]);
    }
    return false;
  }
}
