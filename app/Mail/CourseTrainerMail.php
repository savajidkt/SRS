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
    // dd($data);
    // $trainerDetail = '';
    // if ($data['trainerDetail']) {
    //   foreach ($data['trainerDetail'] as $key => $value) {
    //     $trainerDetail .= ucwords($value->first_name . " " . $value->last_name);
    //   }
    // }
    
    $paramArr = [];
    $paramArr['site_url'] = URL::to('/');
    $paramArr['trainer_name'] = $data['trainerArr']['trainer_name'];
    $paramArr['course_date'] = dateFormat($data['trainerArr']['course_date']);
    // $paramArr['trainer_list'] = $trainerDetail;
    $paramArr['course_name'] = $data['trainerArr']['course_name'];
    $paramArr['company_organiser_attendees_name'] = $data['trainerArr']['company_organiser_attendees_name'];
    $paramArr['company_address'] = '';
    $paramArr['company_organiser_attendees_email'] = $data['trainerArr']['company_organiser_attendees_email'];
    $paramArr['course_end_date'] = dateFormat($data['trainerArr']['course_end_date']);
    $paramArr['attendees_list'] = $data['trainerArr']['attendees_list'];
    $paramArr['link'] = URL::to('/course-attendees/'.$data['key']);
    $paramArr['year'] = date('Y');

    // dd($paramArr);
  
    $emailTemplate = getEmailTemplatesByID(3);
    if ($emailTemplate) {

      $emailBody = replaceHTMLBodyWithParam($emailTemplate['template'], $paramArr);
      // dd($emailBody);
      $emailSubject = replaceHTMLBodyWithParam($emailTemplate['subject'], array('course_date' => dateFormat($data['trainerArr']['course_end_date'])));
      // return $this->subject($emailSubject)->with('body', $emailBody);
      return $this->subject($emailSubject)->markdown('admin.Mail.companyOrganizerMail', ['emailBody' => $emailBody]);

    }
    return false;
  }
}
