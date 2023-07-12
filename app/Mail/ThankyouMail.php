<?php



namespace App\Mail;



use Illuminate\Bus\Queueable;

use Illuminate\Mail\Mailable;

use Illuminate\Support\Facades\URL;

use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;




class ThankyouMail extends Mailable

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
    
    // dd($data);
    
   
    $paramArr = [];
    $paramArr['site_url'] = URL::to('/');
    $paramArr['course_date'] = dateFormat($data['attendeeArr']['course_date']);
    $paramArr['attendees_name'] = $data['attendeeArr']['attendees_name'];
    $paramArr['ref_name'] = $data['attendeeArr']['ref_name'];
    $paramArr['link'] = URL::to('/feedback-contacte/'.$data['key']);
    $paramArr['course_name'] = $data['attendeeArr']['course_name'];
    $paramArr['trainer_name'] = $data['attendeeArr']['trainer_name'];
    $paramArr['company_organiser_attendees_name'] = $data['attendeeArr']['company_organiser_attendees_name'];
    $paramArr['ref_list'] = $data['attendeeArr']['ref_name'];
    $paramArr['course_name'] = $data['attendeeArr']['course_name'];
    $paramArr['attendees_list'] = $data['attendeeArr']['attendees_list'];
    // $paramArr['questionnaire_end_date'] = dateFormat($data['course']['end_date']);
    $paramArr['year'] = date('Y');

    // dd($paramArr);
  
    $emailTemplate = getEmailTemplatesByID(7);
    if ($emailTemplate) {

      $emailBody = replaceHTMLBodyWithParam($emailTemplate['template'], $paramArr);
      // $emailSubject = replaceHTMLBodyWithParam($emailTemplate['subject'], array('course_date' => dateFormat($data['course']['start_date'])));
      $emailSubject = replaceHTMLBodyWithParam($emailTemplate['subject'], array('company_name' => $data['attendeeArr']['company_organiser_attendees_name'], 'course_name' => $data['attendeeArr']['course_name'], 'course_date' => dateFormat($data['attendeeArr']['course_date'])));
      // return $this->subject($emailSubject)->with('body', $emailBody);
      return $this->subject($emailSubject)->markdown('admin.Mail.companyOrganizerMail', ['emailBody' => $emailBody]);

    }
    return false;
  }
}
