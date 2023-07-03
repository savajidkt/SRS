<?php



namespace App\Mail;



use Illuminate\Bus\Queueable;

use Illuminate\Mail\Mailable;

use Illuminate\Support\Facades\URL;

use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;




class CourseTrainerMail extends Mailable

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
    $trainerDetail = '';
    if ($data['trainerDetail']) {
      foreach ($data['trainerDetail'] as $key => $value) {
        $trainerDetail .= ucwords($value->first_name . " " . $value->last_name);
      }
    }
    
   
    $paramArr = [];
    $paramArr['site_url'] = URL::to('/');
    // $paramArr['attendees_name'] = $data['attendees']['first_name'] . ' ' . $data['attendees']['last_name'];
    $paramArr['course_date'] = dateFormat($data['course']['start_date']);
    $paramArr['trainer_list'] = $trainerDetail;
    $paramArr['attendee_name'] = $data['attendee_name'];
    $paramArr['link'] = URL::to('/course-attendees/'.$data['key']);
    $paramArr['questionnaire_end_date'] = dateFormat($data['course']['end_date']);
    $paramArr['year'] = date('Y');

    // dd($paramArr);
  
    $emailTemplate = getEmailTemplatesByID(3);
    if ($emailTemplate) {

      $emailBody = replaceHTMLBodyWithParam($emailTemplate['template'], $paramArr);
      $emailSubject = replaceHTMLBodyWithParam($emailTemplate['subject'], array('course_date' => dateFormat($data['course']['start_date'])));
      // return $this->subject($emailSubject)->with('body', $emailBody);
      return $this->subject($emailSubject)->markdown('admin.Mail.companyOrganizerMail', ['emailBody' => $emailBody]);

    }
    return false;
  }
}
