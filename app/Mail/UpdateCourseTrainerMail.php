<?php



namespace App\Mail;



use Illuminate\Bus\Queueable;

use Illuminate\Mail\Mailable;

use Illuminate\Support\Facades\URL;

use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;




class UpdateCourseTrainerMail extends Mailable

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
    $trainer_list = '';
    if (is_array($data['invoice']) && count($data['invoice']) > 0) {
      foreach ($data['invoice'] as $key => $value) {
        $trainer_list .= ucwords($value['first_name'] . " " . $value['last_name']) . " <br>";
      }
    }

    $paramArr = [];
    $paramArr['site_url'] = URL::to('/');
    $paramArr['trainer_name'] = $data['trainerArr']['trainer_name'];
    $paramArr['course_date'] = dateFormat($data['trainerArr']['course_date']);
    $paramArr['trainer_list'] = $trainer_list;
    $paramArr['course_name'] = $data['trainerArr']['course_name'];
    $paramArr['company_organiser_attendees_name'] = $data['trainerArr']['company_organiser_attendees_name'];
    $paramArr['company_address'] = $data['trainerArr']['company_address'];
    $paramArr['company_name'] = $data['trainerArr']['company_name'];
    $paramArr['company_organiser_attendees_email'] = $data['trainerArr']['company_organiser_attendees_email'];
    $paramArr['course_end_date'] = dateFormat($data['trainerArr']['course_end_date']);
    $paramArr['year'] = date('Y');

    // dd($paramArr);
  
    $emailTemplate = getEmailTemplatesByID(20);
    if ($emailTemplate) {

      $emailBody = replaceHTMLBodyWithParam($emailTemplate['template'], $paramArr);
      $emailSubject = replaceHTMLBodyWithParam($emailTemplate['subject'], array('company_name' => $data['trainerArr']['company_name'], 'course_name' => $data['trainerArr']['course_name'], 'course_date' => dateFormat($data['trainerArr']['course_end_date'])));
      $emailHeaderFooter = getEmailTemplatesHeaderFooter();
      return $this->subject($emailSubject)->markdown('admin.Mail.companyOrganizerMail', ['emailBody' => $emailBody,'emailHeaderFooter' => $emailHeaderFooter]);

    }
    return false;
  }
}
