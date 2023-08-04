<?php

namespace App\Http\Controllers\Admin\Contacte;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\FeedbackRepository;
use App\Http\Requests\Contacte\CreateRequest;
use App\Libraries\Safeencryption;
use App\Models\AttendeeQuestions;
use App\Models\AttendeeReferens;
use App\Models\Course;
use App\Models\CourseAttendees;
use App\Models\QuestionnaireAnswers;
use App\Models\Questions;
use Illuminate\Support\Facades\Mail;
use App\Mail\CourseTrainerMail;
use App\Mail\ThankyouMail;
use App\Mail\ChaseReferensMail;
use App\Models\Client;
use Illuminate\Support\Facades\URL;
use App\Models\CompanyOrganizer;

class FeedbackContacteController extends Controller
{
    protected $feedbackRepository;

    public function __construct(FeedbackRepository $feedbackRepository)
    {
        $this->feedbackRepository = $feedbackRepository;
    }

    public function index($id,$at_id = null,$ext_id = null)
    {
        $sidebar = '';
        $course = Course::where('key',$id)->first();
        $courseAttendees = CourseAttendees::where('id', $at_id)->first();
        if(!$course ){
            $messgeTemplate = getEmailTemplatesByID(23);
            if ($messgeTemplate) {
                $paramArr = [];
                $message  = replaceHTMLBodyWithParam($messgeTemplate['template'], $paramArr);
            }
            return view('contacte.error', ['message' => $message]);
        }
        if(!$courseAttendees){
            $messgeTemplate = getEmailTemplatesByID(22);
            if ($messgeTemplate) {
                $paramArr = [];
                $message  = $messgeTemplate['template'];
            }
            return view('courseattendees.errorexpire', ['message' => $message]);
            
        }

        $isExpire = courseExpired($course->start_date, $course->end_date);
        if (!$isExpire) {
            $messgeTemplate = getEmailTemplatesByID(22);
            if ($messgeTemplate) {
                $paramArr = [];
                $message  = $messgeTemplate['template'];
            }
            return view('courseattendees.errorexpire', ['message' => $message]);
        }


        
        if($ext_id!='360-frm'){
            $questionnaireAnswers = QuestionnaireAnswers::where('attendees_id',$at_id)->where('type',0)->count();
            if($questionnaireAnswers> 0)
            {
                $messgeTemplate = getEmailTemplatesByID(16);
                if ($messgeTemplate)
                {
                    $paramArr = [];
                    $message  = replaceHTMLBodyWithParam($messgeTemplate['template'],$paramArr);
                }
                return view('contacte.error',['message' => $message]);
        
            }
        }
        
       
        if($course) {
            $attCount=0;
            $courseAttendees = CourseAttendees::where('id', $at_id)->first();
            if($courseAttendees)
            {
                if($courseAttendees->referraluser){
                    $attCount = $courseAttendees->referraluser()->count();
                }
            } 
            else
            {

                $messgeTemplate = getEmailTemplatesByID(22);
                if ($messgeTemplate)
                {
                    $paramArr = [];
                    $message  = replaceHTMLBodyWithParam($messgeTemplate['template'],$paramArr);
                }
                return view('contacte.error',['message' => $message]);
                
            }
            
            if($courseAttendees) 
            {
                $emailTemplate = getEmailTemplatesByID(10);
                
                if ($emailTemplate) {
                    $paramArr['contact_name'] = ucwords($courseAttendees->first_name . " " . $courseAttendees->last_name);
                    $sidebar = replaceHTMLBodyWithParam($emailTemplate['template'], $paramArr);
            
                }
            }
        }
       return view('contacte.create',['id' => $id,'sidebar' => $sidebar,'ext_id' => $ext_id,'at_id' => $at_id,'attCount'=>$attCount]);
    }

    public function store(Request $request)
    {
        $this->feedbackRepository->create($request->all());
       
        $questionnaireAnswers = QuestionnaireAnswers::where('attendees_id',$request->attendee_id)->where('type',0)->count();
        if($questionnaireAnswers> 0)
        {
            
            return redirect()->route('thankyou',24);
    
        }

        return redirect()->route('attendees-questionnaire',[$request->key,$request->attendee_id,$request->ext_id])->with('success', "Course created successfully!");
    }

    public function attendeesquestion($id,$attendee_id,$ext_id = null)
    {
        // dd($attendee_id);

        $sidebar = '';
        $course = Course::where('key',$id)->first();
        $courseAttendees = CourseAttendees::where('id', $attendee_id)->first();
        if(!$course ){
            $messgeTemplate = getEmailTemplatesByID(23);
            if ($messgeTemplate) {
                $paramArr = [];
                $message  = replaceHTMLBodyWithParam($messgeTemplate['template'], $paramArr);
            }
            return view('contacte.error', ['message' => $message]);
        }
        if(!$courseAttendees){
            $messgeTemplate = getEmailTemplatesByID(22);
            if ($messgeTemplate) {
                $paramArr = [];
                $message  = $messgeTemplate['template'];
            }
            return view('courseattendees.errorexpire', ['message' => $message]);
            
        }
        
        $isExpire = courseExpired($course->start_date, $course->end_date);
        if (!$isExpire) {
            $messgeTemplate = getEmailTemplatesByID(22);
            if ($messgeTemplate) {
                $paramArr = [];
                $message  = $messgeTemplate['template'];
            }
            return view('courseattendees.errorexpire', ['message' => $message]);
        }


        
        $questionnaireAnswers = QuestionnaireAnswers::where('attendees_id',$attendee_id)->where('type',0)->count();
        if($questionnaireAnswers> 0)
        {
            $messgeTemplate = getEmailTemplatesByID(16);
            if ($messgeTemplate)
            {
                $paramArr = [];
                $message  = replaceHTMLBodyWithParam($messgeTemplate['template'],$paramArr);
            }
            return view('contacte.error',['message' => $message]);
    
        }

        if($ext_id != '360-frm')
        {
            
            $questionnaireAnswers = QuestionnaireAnswers::where('attendees_id',$attendee_id)->where('type',0)->count();

            if($questionnaireAnswers> 0)
            {
                $messgeTemplate = getEmailTemplatesByID(16);
                if ($messgeTemplate)
                {
                    $paramArr = [];
                    $message  = replaceHTMLBodyWithParam($messgeTemplate['template'],$paramArr);
                }
                return view('contacte.error',['message' => $message]);
        
            }
        }
        // if($course) 
        // {
        $attendeename = CourseAttendees::where('id', $attendee_id)->first();
        if($attendeename) 
        {
            $emailTemplate = getEmailTemplatesByID(11);
            
            if ($emailTemplate) {
                $paramArr['contact_name'] = ucwords($attendeename->first_name . " " . $attendeename->last_name);
                $sidebar = replaceHTMLBodyWithParam($emailTemplate['template'], $paramArr);
            }
        }
        // }
        $attendeeQuestion = AttendeeQuestions::all();
        return view('contacte.attendeesquestion',['attendeeQuestion' => $attendeeQuestion ,'id' => $id,'sidebar' => $sidebar,'attendee_id' => $attendee_id]);
    }

    public function StoreAttendeesquestion(Request $request)
    {
        if(empty($request->key)){
            return redirect()->to(url('/'));
        }
        $message = '';
        $course = Course::where('key', $request->key)->first();
        if($course) 
        {
            $attendeeReferens = AttendeeReferens::where('course_id', $course->id)->first();
            if($attendeeReferens) 
            {
                $AttendeeQuestionsList = [];
                foreach ($request['answer'] as  $key=> $answer) {
                    $AttendeeQuestionsArr = [                        
                        'attendees_id'    => $request->attendee_id,
                        'question_id'    => $key,
                        'answer'    => $answer,
                        'type'    => 0,
                    ];

                    $AttendeeQuestionsList[] = $AttendeeQuestionsArr;
                    
                    $attendeeQuestions = QuestionnaireAnswers::create($AttendeeQuestionsArr);
                }
                // $attendeeReferens->update(array('questionnaire_filled' => 'YES'));
                if($course->trainer)
                {
                    foreach ($course->trainer as $key => $trainer) {
                        // dd($trainer);
                        $trainerArr = [];
                        $trainerArr['trainer_name'] = ucwords($trainer->first_name . " " . $trainer->last_name);
                        $trainerArr['course_date'] = $course->start_date;
                        $trainerArr['course_end_date'] = $course->end_date;
                        $trainerArr['course_name'] = $course->coursecategoryname->course_name;

                        $trainerArr['company_organiser_attendees_name'] = $course->companyorganizer->first_name. " " . $course->companyorganizer->last_name;
                        // $trainerArr['company_address'] = '';
                        $trainerArr['company_organiser_attendees_email'] = $course->companyorganizer->email;

                        $client = Client::where('id',$course->client_id)->first();
                        $trainerArr['company_address'] = $client->address_one. "<br>" . $client->address_tow ."<br>".$client->town . "<br>" . "Post Code : ".$client->post_code;
                        $trainerArr['company_name'] = $client->company_name;
                        $attendeesArrList = CourseAttendees::where('course_id',$course->id)->get();
                        // $attendeesArrList = $attendeesArr;

                        $trainerArr['attendees_list'] = $this->getAttendeeList($attendeesArrList);
                        $trainerArr['questionnaire_360'] = $this->getQuestionnaire360List($attendeesArrList);
                        $data['trainerArr'] = $trainerArr;
                        $data['self_attende'] = 'Yes';
                        $attendeeData = CourseAttendees::where('id', $request->attendee_id)->first();
                        $data['attendee_name'] = $attendeeData->first_name. " " . $attendeeData->last_name;
                        $data['referens_name'] = '';
                        
                         Mail::to($trainer->email)->send(new CourseTrainerMail($data));
                        //  dd($data);
                    }
                }
            }
        }
        // $messgeTemplate = getEmailTemplatesByID(13);
        // if ($messgeTemplate)
        // {
        //     $paramArr = [];
        //     $message  = replaceHTMLBodyWithParam($messgeTemplate['template'],$paramArr);
        // }
        // return view('contacte.successattendeesquestion',['message' => $message]);
        return redirect()->route('contacte-thankyou');
    }
    public function getQuestionnaire360List($attendeesArrList)
    {
        
 
        $returnTable = "";
        $returnTable .= "<p>Form completion Status</p>";
       
        if($attendeesArrList){
            $returnTable .= "<table border=\"1\" cellspacing=\"0\" cellpadding=\"5\" style=\"border-collapse:collapse; width: 100%;\">";
            $returnTable .="<tr><th width=\"170\" valign=\"top\" style=\"background-color:#17365D;color:white;\"><p style=\"margin-top: 10px; margin-bottom: 10px; font-family: arial,helvetica,sans-serif; font-size: 14px; line-height: 2em;\">Attendee Name</p></th><th width=\"215\" valign=\"top\" style=\"background-color:#17365D;color:white;\"><p style=\"margin-top: 10px; margin-bottom: 10px; font-family: arial,helvetica,sans-serif; font-size: 14px; line-height: 2em;\">Own Questionnaire Completed</p></th><th width=\"124\" valign=\"top\" style=\"background-color:#17365D;color:white;\"><p style=\"margin-top: 10px; margin-bottom: 10px; font-family: arial,helvetica,sans-serif; font-size: 14px; line-height: 2em;\">Number of 360 Degree Invites Sent</p></th><th width=\"124\" valign=\"top\" style=\"background-color:#17365D;color:white;\"><p style=\"margin-top: 10px; margin-bottom: 10px; font-family: arial,helvetica,sans-serif; font-size: 14px; line-height: 2em;\">Number of 360 Degree Forms Completed</p></th></tr>";
            $returnTable .= "<tbody>";

            
            foreach($attendeesArrList as $key=> $vlue){
               
                $isFill = "NO";
                if($vlue->questionnaireself){
                    $isFill = "YES - ".date('d/m/Y H:i:s', strtotime($vlue->questionnaireself->created_at));
                }
                $returnTable .= "<tr><td width=\"170\" valign=\"top\" style=\"background-color:#8DB3E2\"><p style=\"margin-top: 10px; margin-bottom: 10px; font-family: arial,helvetica,sans-serif; font-size: 14px; line-height: 2em;\">".$vlue->first_name ." ".$vlue->last_name."</p></td><td width=\"215\" valign=\"top\" style=\"background-color:#DBE5F1\"><p style=\"margin-top: 10px; margin-bottom: 10px; font-family: arial,helvetica,sans-serif; font-size: 14px; line-height: 2em;\">".$isFill."</p></td><td width=\"124\" valign=\"top\" style=\"background-color:#DBE5F1\"><p style=\"margin-top: 10px; margin-bottom: 10px; font-family: arial,helvetica,sans-serif; font-size: 14px; line-height: 2em;\">".$vlue->referraluser->count()."</p></td><td width=\"124\" valign=\"top\" style=\"background-color:#DBE5F1\"><p style=\"margin-top: 10px; margin-bottom: 10px; font-family: arial,helvetica,sans-serif; font-size: 14px; line-height: 2em;\">".$vlue->questionnaireref->count()."</p></td></tr>";
            }
            $returnTable .= "</tbody>";
            $returnTable .= "</table>";
        }
      
        return $returnTable;
    }

    public function getAttendeeList($attendeesArrList)
    {
        
 
        $returnTable = "";
       
        if($attendeesArrList){
            $returnTable .= "<table border=\"1\" cellspacing=\"0\" cellpadding=\"5\" style=\"border-collapse:collapse; width: 100%;\">";
            $returnTable .="<tr><th width=\"301\" valign=\"top\" style=\"background-color:#17365D;color:white;\"><p style=\"margin-top: 10px; margin-bottom: 10px; font-family: arial,helvetica,sans-serif; font-size: 14px; line-height: 2em;\">Attendee Name</p></th><th width=\"247\" valign=\"top\" style=\"background-color:#17365D;color:white;\"><p style=\"margin-top: 10px; margin-bottom: 10px; font-family: arial,helvetica,sans-serif; font-size: 14px; line-height: 2em;\">eMail Address</p></th></tr>";
            $returnTable .= "<tbody>";
             
            foreach($attendeesArrList as $key=> $vlue){
               
                $returnTable .= "<tr> <td width=\"301\" valign=\"top\" style=\"background-color:#8DB3E2\"><p style=\"margin-top: 10px; margin-bottom: 10px; font-family: arial,helvetica,sans-serif; font-size: 14px; line-height: 2em;\">".$vlue['first_name']. " " .$vlue['last_name']."</p></td><td width=\"247\" valign=\"top\" style=\"background-color:#DBE5F1\"><a href=\"mailto:".$vlue['email']."\"><p style=\"margin-top: 10px; margin-bottom: 10px; font-family: arial,helvetica,sans-serif; font-size: 14px; line-height: 2em;\">".$vlue['email']."</p></a></td></tr>";
            }
            $returnTable .= "</tbody>";
            $returnTable .= "</table>";
        }
       
        return $returnTable;
    }
    public function question($id,$attendee_id,$ext_id = null,$contact_id = null)
    {
      
        $sidebar = '';
        $course = Course::where('key',$id)->first();
        $courseAttendees = CourseAttendees::where('id', $attendee_id)->first();
        if(!$course ){
            $messgeTemplate = getEmailTemplatesByID(23);
            if ($messgeTemplate) {
                $paramArr = [];
                $message  = replaceHTMLBodyWithParam($messgeTemplate['template'], $paramArr);
            }
            return view('contacte.error', ['message' => $message]);
        }
        if(!$courseAttendees){
            $messgeTemplate = getEmailTemplatesByID(22);
            if ($messgeTemplate) {
                $paramArr = [];
                $message  = $messgeTemplate['template'];
            }
            return view('courseattendees.errorexpire', ['message' => $message]);
            
        }
        $isExpire = courseExpired($course->start_date, $course->end_date);
       
        if (!$isExpire) {
            $messgeTemplate = getEmailTemplatesByID(22);
            if ($messgeTemplate) {
                $paramArr = [];
                $message  = $messgeTemplate['template'];
            }
            return view('courseattendees.errorexpire', ['message' => $message]);
        }
         


        
        $questionnaireAnswers = QuestionnaireAnswers::where('attendees_id',$attendee_id)->where('contact_id',$contact_id)->where('type',1)->count();
        if(($ext_id != '360-frm' && $ext_id != 'con') || $questionnaireAnswers > 0)
        {
                $messgeTemplate = getEmailTemplatesByID(16);
                if ($messgeTemplate)
                {
                    $paramArr = [];
                    $message  = replaceHTMLBodyWithParam($messgeTemplate['template'],$paramArr);
                }
                return view('contacte.error',['message' => $message]);
        
        }
        if($course) {
            $attendeeReferens = AttendeeReferens::where('id', $contact_id)->first();
            if($attendeeReferens) 
            {
                $emailTemplate = getEmailTemplatesByID(21);
                
                if ($emailTemplate) {
                    $paramArr['contact_name'] = ucwords($attendeeReferens->first_name . " " . $attendeeReferens->last_name);
                    $courseAttendees = CourseAttendees::where('id', $attendee_id)->first();
                    $paramArr['attendee_name'] = ucwords($courseAttendees->first_name . " " . $courseAttendees->last_name);
                    $sidebar = replaceHTMLBodyWithParam($emailTemplate['template'], $paramArr);
                    
            
                }
            }
        }
        $questions = Questions::all();
        return view('contacte.question',['questions' => $questions,'attendee_id' => $attendee_id ,'id' => $id,'sidebar' => $sidebar,'ext_id' => $ext_id,'contact_id' => $contact_id]);
    }

    public function storequestion(Request $request)
    {
        
        $SafeencryptionObj = new Safeencryption;
        $course = Course::where('key', $request->key)->first();
        if($course) 
        {
            $attendeeReferens = AttendeeReferens::where('id', $request['contact_id'])->first();
            if($attendeeReferens) 
            {
                $AttendeeQuestionsList = [];
                foreach ($request['answer'] as  $key => $answer) {
                    
                    $AttendeeQuestionsArr = [
                        'contact_id'    => $request['contact_id'],
                        'attendees_id'    => $request['attendee_id'],
                        'question_id'    => $key,
                        'answer'    => $answer,
                        'type'    => 1,
                    ];

                    $attendeeQuestions = QuestionnaireAnswers::create($AttendeeQuestionsArr);
                  
                }
                $attendeeReferens->update(array('questionnaire_filled' => 'YES'));
                $trainer_name = '';
                if($course->trainer)
                {
                    foreach ($course->trainer as $key => $trainer) {
                        $trainerArr = [];
                        $trainer_name .= ucwords($trainer->first_name . " " . $trainer->last_name).'<br>';
                        $trainerArr['trainer_name'] = ucwords($trainer->first_name . " " . $trainer->last_name);
                        $trainerArr['course_date'] = $course->start_date;
                        $trainerArr['course_end_date'] = $course->end_date;
                        $trainerArr['course_name'] = $course->coursecategoryname->course_name;
                        $trainerArr['company_organiser_attendees_name'] = $course->companyorganizer->first_name. " " . $course->companyorganizer->last_name;
                        // $trainerArr['company_address'] = '';
                        $trainerArr['company_organiser_attendees_email'] = $course->companyorganizer->email;

                        $client = Client::where('id',$course->client_id)->first();
                        $trainerArr['company_address'] = $client->address_one. "<br>" . $client->address_tow ."<br>".$client->town . "<br>" . "Post Code : ".$client->post_code;
                        $trainerArr['company_name'] = $client->company_name;
                        
                        $attendeesArrList = CourseAttendees::where('course_id',$course->id)->get();
                        $trainerArr['attendees_list'] = $this->getAttendeeList($attendeesArrList);
                        $trainerArr['questionnaire_360'] = $this->getQuestionnaire360List($attendeesArrList);
                        $data['trainerArr'] = $trainerArr;
                        $data['self_attende'] = '360';
                        $attendeeData = CourseAttendees::where('id',$request['attendee_id'])->first();
                        $data['attendee_name'] = $attendeeData->first_name. " " . $attendeeData->last_name;
                        $data['referens_name'] = $attendeeReferens->first_name. " " . $attendeeReferens->last_name;
                        Mail::to($trainer->email)->send(new CourseTrainerMail($data));
                    }
                }

                $attende = CourseAttendees::where('id',$attendeeReferens->attendees_id)->first();
                $attendeeArr = [];
                $attendeeArr['trainer_name']= $trainer_name; 
                $attendeeArr['attendees_name'] = ucwords($attende->first_name . " " . $attende->last_name);
                $attendeeArr['course_date'] = $course->start_date;
                $attendeeArr['ref_name'] = ucwords($attendeeReferens->first_name . " " . $attendeeReferens->last_name);
                $attendeeArr['course_end_date'] = $course->end_date;
                $attendeeArr['course_name'] = $course->coursecategoryname->course_name;
                $attendeeArr['company_organiser_attendees_name'] = $course->companyorganizer->first_name. " " . $course->companyorganizer->last_name;
                $attendeeArr['attendees_list'] = $this->getAttendeerefList($course->id);
                $data['attendeeArr'] = $attendeeArr;
                $data['key'] = $request->key.'/'.$request['attendee_id'].'/360-frm';
                // $data['ext_ext'] = '360-frm';
                // $data['attendees_id'] = $request['attendee_id'];
                $newkey = $SafeencryptionObj->encode($key);
                Mail::to($attende->email)->send(new ThankyouMail($data));


            }
        }
        // exit;
        return redirect()->route('thankyou',14);
    }
    public function getAttendeerefList($course_id)
    {
        
        $attendeeReferens = AttendeeReferens::where('course_id', $course_id)->get();

       
        $returnTable = "";
       
        if($attendeeReferens){
            $returnTable .= "<table border=\"1\" cellspacing=\"0\" cellpadding=\"5\" style=\"border-collapse:collapse; width: 100%;\">";
            $returnTable .="<tr><th width=\"301\" valign=\"top\" style=\"background-color:#17365D;color:white;\"><p style=\"margin-top: 10px; margin-bottom: 10px; font-family: arial,helvetica,sans-serif; font-size: 14px; line-height: 2em;\">Attendee Name</p></th><th width=\"247\" valign=\"top\" style=\"background-color:#17365D;color:white;\"><p style=\"margin-top: 10px; margin-bottom: 10px; font-family: arial,helvetica,sans-serif; font-size: 14px; line-height: 2em;\">Own Questionnaire Completed</p></th></tr>";
            $returnTable .= "<tbody>";
            //  dd($attendeeReferens);
            foreach($attendeeReferens as $key=> $vlue){
               
               $isFill = "NO";
                if($vlue->referralusers){
                    $isFill = "YES - ".date('d/m/Y H:i:s', strtotime($vlue->referralusers->created_at));
                }
                   
                $returnTable .= "<tr> <td width=\"301\" valign=\"top\" style=\"background-color:#8DB3E2\"><p style=\"margin-top: 10px; margin-bottom: 10px; font-family: arial,helvetica,sans-serif; font-size: 14px; line-height: 2em;\">".$vlue['first_name']. " " .$vlue['last_name']."</p></td><td width=\"247\" valign=\"top\" style=\"background-color:#DBE5F1\"><p style=\"margin-top: 10px; margin-bottom: 10px; font-family: arial,helvetica,sans-serif; font-size: 14px; line-height: 2em;\">".$isFill."</p></td></tr>";
            }
            $returnTable .= "</tbody>";
            $returnTable .= "</table>";
        }
                    
        return $returnTable;
                }
public function chaseEmailFeedback($id)
    {


        $attendeeReferens = AttendeeReferens::where('id', $id)->first();
        if ($attendeeReferens) {
            $paramArr = [];
            $paramArr['site_url'] = URL::to('/');
            $paramArr['attendee_name'] = $attendeeReferens->attendeedata->first_name . ' ' . $attendeeReferens->attendeedata->last_name;

            if ($attendeeReferens->attendeedata->courses->count() > 0) {
                $paramArr['course_date'] = dateFormat($attendeeReferens->attendeedata->courses[0]->start_date);
                $paramArr['questionnaire_end_date'] = dateFormat($attendeeReferens->attendeedata->courses[0]->end_date);
                $paramArr['link'] = URL::to('/question/' . $attendeeReferens->attendeedata->courses[0]->key.'/'.$attendeeReferens->attendees_id.'/con/'.$attendeeReferens->id);
            } else {
                $paramArr['course_date'] = '';
                $paramArr['questionnaire_end_date'] = '';
                $paramArr['link'] =  URL::to('/');
            }

            $paramArr['year'] = date('Y');
            $paramArr['first_name'] = $attendeeReferens->first_name;
            $paramArr['last_name'] = $attendeeReferens->last_name;

            Mail::to($attendeeReferens->email)->send(new ChaseReferensMail($paramArr));            
            return redirect()->route('course.show', $attendeeReferens->course_id)->with('success', "360 Contacts Chase Email has been sent Successfully");
        }
        return redirect()->back()->with('error', '360 Contacts Chase Email has been sent Failed!');
    }
    public function thankyou($temp_id)
    {
        $messgeTemplate = getEmailTemplatesByID($temp_id);
        if ($messgeTemplate)
        {
            $paramArr = [];
            $message  = replaceHTMLBodyWithParam($messgeTemplate['template'],$paramArr);
        }
        return view('contacte.successquestion',['message' => $message]);
    }
    public function contactethankyou()
    {
        $messgeTemplate = getEmailTemplatesByID(13);
        if ($messgeTemplate)
        {
            $paramArr = [];
            $message  = replaceHTMLBodyWithParam($messgeTemplate['template'],$paramArr);
        }
        return view('contacte.successattendeesquestion',['message' => $message]);
    }
}