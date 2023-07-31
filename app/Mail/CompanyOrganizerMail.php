<?php



namespace App\Mail;



use Illuminate\Bus\Queueable;

use Illuminate\Mail\Mailable;

use Illuminate\Support\Facades\URL;

use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;




class CompanyOrganizerMail extends Mailable

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
    $paramArr['company_organiser_name'] = $data['org_first_name'] . ' ' . $data['org_last_name'];
    $paramArr['course_date'] = $data['start_date'];
    $paramArr['trainer_list'] = $trainer_list;
    $paramArr['link'] = URL::to('/course-attendees/'. $data['key']);
    $paramArr['course_end_date'] = $data['end_date'];
    $paramArr['year'] = date('Y');
  // dd($paramArr);
    $emailTemplate = getEmailTemplatesByID(1);
    
    if ($emailTemplate) {

      $emailBody = replaceHTMLBodyWithParam($emailTemplate['template'], $paramArr);
      $emailSubject = replaceHTMLBodyWithParam($emailTemplate['subject'], array('course_date' => $data['start_date']));
      $emailHeaderFooter = getEmailTemplatesHeaderFooter();
     echo "Hello";
     exit;
      file_put_contents('abbbbbbbbbbb.txt', print_r($emailBody,true));
      
      // return $this->subject($emailSubject)->with('body', $emailBody);
      return $this->subject($emailSubject)->markdown('admin.Mail.companyOrganizerMail', ['emailBody' => $emailBody, 'emailHeaderFooter' => $emailHeaderFooter]);

    }
    return false;
  }
}
