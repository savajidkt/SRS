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
    $emailtemp_id = 3;
    $data = $this->data;
    // dd($data);
$myTable = "";  
    if( isset($data['self_attende']) && $data['self_attende'] == 'Yes' ){
      $attendees_lists = $data['trainerArr']['attendees_list'];
      $questionnaire_360 = $data['trainerArr']['questionnaire_360'];
      $myTable = $attendees_lists."".$questionnaire_360;
      $emailtemp_id = 5;
    }else if( isset($data['self_attende']) && $data['self_attende'] == '360' ){
      $attendees_lists = $data['trainerArr']['attendees_list'];
      $questionnaire_360 = $data['trainerArr']['questionnaire_360'];
      $myTable = $attendees_lists."".$questionnaire_360;
      $emailtemp_id = 6;
    } else {
      $myTable = $data['trainerArr']['attendees_list'];
      $emailtemp_id = 3;
    }

    
    $paramArr = [];
    $paramArr['site_url'] = URL::to('/');
    $paramArr['trainer_name'] = $data['trainerArr']['trainer_name'];
    $paramArr['course_date'] = $data['trainerArr']['course_date'];
    // $paramArr['trainer_list'] = $trainerDetail;
    $paramArr['course_name'] = $data['trainerArr']['course_name'];
    $paramArr['company_organiser_attendees_name'] = $data['trainerArr']['company_organiser_attendees_name'];
    $paramArr['company_address'] = $data['trainerArr']['company_address'];
    $paramArr['company_name'] = $data['trainerArr']['company_name'];
    $paramArr['company_organiser_attendees_email'] = $data['trainerArr']['company_organiser_attendees_email'];
    $paramArr['course_end_date'] = $data['trainerArr']['course_end_date'];
    $paramArr['attendees_list'] = $myTable;
    $paramArr['attendee_name'] = isset($data['attendee_name']) ? $data['attendee_name'] : '' ;
    $paramArr['referens_name'] = isset($data['referens_name']) ? $data['referens_name'] : '' ; 
    // $paramArr['link'] = URL::to('/course-attendees/'.$data['key']);
    $paramArr['year'] = date('Y');

    // dd($paramArr);
  
    $emailTemplate = getEmailTemplatesByID($emailtemp_id);
    if ($emailTemplate) {

      $emailBody = replaceHTMLBodyWithParam($emailTemplate['template'], $paramArr);
      // dd($emailBody);
      if( isset($data['self_attende']) && $data['self_attende'] == 'Yes' ){
        $emailSubject = replaceHTMLBodyWithParam($emailTemplate['subject'], array('company_name' => $data['trainerArr']['company_name'], 'course_name' => $data['trainerArr']['course_name'], 'course_date' => $data['trainerArr']['course_end_date']));
      } else if( isset($data['self_attende']) && $data['self_attende'] == '360' ){
        $emailSubject = replaceHTMLBodyWithParam($emailTemplate['subject'], array('company_name' => $data['trainerArr']['company_name'], 'course_name' => $data['trainerArr']['course_name'], 'course_date' => $data['trainerArr']['course_end_date']));
      }else
      {
        $emailSubject = replaceHTMLBodyWithParam($emailTemplate['subject'], array('company_name' => $data['trainerArr']['company_name'], 'course_name' => $data['trainerArr']['course_name'], 'course_date' => $data['trainerArr']['course_end_date']));
      }
      $emailHeaderFooter = getEmailTemplatesHeaderFooter();
      // return $this->subject($emailSubject)->with('body', $emailBody);
      return $this->subject($emailSubject)->markdown('admin.Mail.companyOrganizerMail', ['emailBody' => $emailBody,'emailHeaderFooter' => $emailHeaderFooter]);

    }
    return false;
  }
}
