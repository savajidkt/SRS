<?php



namespace App\Mail;



use Illuminate\Bus\Queueable;

use Illuminate\Mail\Mailable;

use Illuminate\Support\Facades\URL;

use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;




class AttendeeReferensMail extends Mailable

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
    
    $contacte_list = '';
    $firstName = '';
    $lastName = '';
    if (is_array($data['contacte']) && count($data['contacte']) > 0) {
      foreach ($data['contacte'] as $key => $value) {
        $contacte_list .= ucwords($value['first_name'] . " " . $value['last_name']) . " <br>";
        $firstName .= ucwords($value['first_name']);
        $lastName .= ucwords($value['last_name']);
      }
    }
    
    // dd($contacte_list);
   
    $paramArr = [];
    $paramArr['site_url'] = URL::to('/');
    $paramArr['attendee_name'] = $data['courseAttendeesList']['first_name'] . ' ' . $data['courseAttendeesList']['last_name'];
    $paramArr['course_date'] = dateFormat($data['course']['start_date']);
    $paramArr['contacte_list'] = $contacte_list;
    $paramArr['link'] = URL::to('/question/'. $data['key']);
    $paramArr['questionnaire_end_date'] = dateFormat($data['course']['end_date']);
    $paramArr['year'] = date('Y');
    $paramArr['first_name'] = $firstName;
    $paramArr['last_name'] = $lastName;
  // dd($paramArr);
    $emailTemplate = getEmailTemplatesByID(4);
    if ($emailTemplate) {

      $emailBody = replaceHTMLBodyWithParam($emailTemplate['template'], $paramArr);
      $emailSubject = replaceHTMLBodyWithParam($emailTemplate['subject'], array('course_date' => dateFormat($data['course']['start_date'])));
      // return $this->subject($emailSubject)->with('body', $emailBody);
      return $this->subject($emailSubject)->markdown('admin.Mail.companyOrganizerMail', ['emailBody' => $emailBody]);

    }
    return false;
  }
}
