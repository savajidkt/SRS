<?php



namespace App\Mail;



use Illuminate\Bus\Queueable;

use Illuminate\Mail\Mailable;

use Illuminate\Support\Facades\URL;

use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;




class CourseAttendeesMail extends Mailable

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
    $attendees_list = '';
    if (is_array($data['attendees']) && count($data['attendees']) > 0) {
      foreach ($data['attendees'] as $key => $value) {
        $attendees_list .= ucwords($value['first_name'] . " " . $value['last_name']) . " <br>";
      }
    }
    
   
    $paramArr = [];
    $paramArr['site_url'] = URL::to('/');
    // $paramArr['attendees_name'] = $data['attendees']['first_name'] . ' ' . $data['attendees']['last_name'];
    $paramArr['course_date'] = dateFormat($data['course']['start_date']);
    $paramArr['attendees_list'] = $attendees_list;
    $paramArr['link'] = URL::to('/course-attendees/'.$data['key']);
    $paramArr['course_end_date'] = dateFormat($data['course']['end_date']);
    $paramArr['year'] = date('Y');

    // dd($paramArr);
  
    $emailTemplate = getEmailTemplatesByID(2);
    if ($emailTemplate) {

      $emailBody = replaceHTMLBodyWithParam($emailTemplate['template'], $paramArr);
      $emailSubject = replaceHTMLBodyWithParam($emailTemplate['subject'], array('course_date' => dateFormat($data['course']['start_date'])));
      // return $this->subject($emailSubject)->with('body', $emailBody);
      return $this->subject($emailSubject)->markdown('admin.Mail.companyOrganizerMail', ['emailBody' => $emailBody]);

    }
    return false;
  }
}
