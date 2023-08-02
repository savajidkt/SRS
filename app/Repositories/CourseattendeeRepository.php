<?php
namespace App\Repositories;
use App\Models\Course;
use Illuminate\Support\Str;
use App\Models\CourseAttendees;
use App\Models\CompanyOrganizer;
use App\Mail\CourseAttendeesMail;
use App\Exceptions\GeneralException;
use App\Libraries\Safeencryption;
use App\Mail\CourseTrainerMail;
use App\Models\Client;
use App\Models\TrainerDetail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Database\Eloquent\Collection;

class CourseAttendeeRepository
{
    /**
     * Method create
     * @param array $data [explicite des
     *cription]
     *
     * @return CourseAttendees
     */
    public function create(array $data): CourseAttendees
    {
        $course = Course::where('key',$data['key'])->first();
        if ($course) {
            $CompanyOrganizer = CompanyOrganizer::where('course_id',$course->id)->first();
            if ($CompanyOrganizer) {
                $attendeesArrList = [];
                foreach ($data['attendees'] as $key => $attendees) {
                    
                    $attendeesArr = [
                        'first_name'    => $attendees['first_name'],
                        'last_name'    => $attendees['last_name'],
                        'email'    => $attendees['email'],
                        'job_title'    => isset($attendees['job_title']) ? $attendees['job_title'] : '2',
                        'course_id'    => $course->id,
                        'organizer_id'    => $CompanyOrganizer->id,
                    ];
                    // dd($attendeesArr);
                    $attendeesArrList[]=$attendeesArr;

                    $data['course'] = $course;
                    $data['companyorganizer'] = $CompanyOrganizer;
                    $trainerDetail = TrainerDetail::where('course_id',$course->id)->get();
                    $data['attendee_name'] = ucwords($attendees['first_name'] . " " . $attendees['last_name']);
                    $data['trainerDetail'] = $trainerDetail;

                    

                    $course->companyorganizer->update(array('confirm_attendee' => 1));
                    $courseAttendees = CourseAttendees::create($attendeesArr);
                    $data['attendee_id'] = $courseAttendees->id;
                    Mail::to($attendees['email'])->send(new CourseAttendeesMail($data));
                   
                    // exit();
                }
                // dd($course->trainer);
                if($course->trainer){
                    foreach ($course->trainer as $key => $trainer) {
                        // dd($trainer);
                        $trainerArr = [];
                        $trainerArr['trainer_name'] = ucwords($trainer->first_name . " " . $trainer->last_name);
                        $trainerArr['course_date'] = $course->start_date;
                        $trainerArr['course_end_date'] = $course->end_date;
                        $trainerArr['course_name'] = $course->coursecategoryname->course_name;

                        $trainerArr['company_organiser_attendees_name'] = $course->companyorganizer->first_name. " " . $course->companyorganizer->last_name;
                        // $trainerArr['company_address'] = $course->end_date;
                        $trainerArr['company_organiser_attendees_email'] = $course->companyorganizer->email;
                        $trainerArr['attendees_list'] = $this->getAttendeeList($attendeesArrList);
                        // dd($trainerArr['attendees_list']);
                        $client = Client::where('id',$course->client_id)->first();
                        $trainerArr['company_address'] = $client->address_one. "<br>" . $client->address_tow ."<br>".$client->town . "<br>" . "Post Code : ".$client->post_code;
                        $trainerArr['company_name'] = $client->company_name;
                        $data['trainerArr'] = $trainerArr;
                        $data['referens_name'] = '';
                        Mail::to($trainer->email)->send(new CourseTrainerMail($data));
                    }
                }
                
                
            }
            
        }
        return $courseAttendees;
    }

    public function getAttendeeList($attendeesArrList)
    {
      //  dd($attendeesArrList);
        $returnTable="";
        if(is_array($attendeesArrList) && count($attendeesArrList) > 0){
            $returnTable .= "<table border=\"1\" cellspacing=\"0\" cellpadding=\"5\" style=\"border-collapse:collapse; width: 100%;\">";
            $returnTable .="<tr><th width=\"301\" valign=\"top\" style=\"background-color:#17365D;color:white;\"><p style=\"margin-top: 10px; margin-bottom: 10px; font-family: arial,helvetica,sans-serif; font-size: 14px; line-height: 2em;\">Attendee Name</p></th><th width=\"247\" valign=\"top\" style=\"background-color:#17365D;color:white;\"><p style=\"margin-top: 10px; margin-bottom: 10px; font-family: arial,helvetica,sans-serif; font-size: 14px; line-height: 2em;\">eMail Address</p></th></tr>";
            $returnTable .= "<tbody>";
            // dd($attendeesArrList);
            foreach($attendeesArrList as $key=> $vlue){
                $returnTable .= "<tr> <td width=\"301\" valign=\"top\" style=\"background-color:#8DB3E2\"><p style=\"margin-top: 10px; margin-bottom: 10px; font-family: arial,helvetica,sans-serif; font-size: 14px; line-height: 2em;\">".$vlue['first_name']. " " .$vlue['last_name']."</p></td><td width=\"247\" valign=\"top\" style=\"background-color:#DBE5F1\"><a href=\"mailto:".$vlue['email']."\"><p style=\"margin-top: 10px; margin-bottom: 10px; font-family: arial,helvetica,sans-serif; font-size: 14px; line-height: 2em;\">".$vlue['email']."</p></a></td></tr>";
            }
            $returnTable .= "</tbody>";
            $returnTable .= "</table>";
        }
        return $returnTable;
    }

    /**
     * Method update
     *
     * @param array $data [explicite description]
     * @param Client $client [explicite description]
     *
     * @return Course
     * @throws Exception
     */
    public function update(array $data , Course $courseAttendees)
    {


        $course = Course::where('id', $data['defualt_course_id'])->first();
        if ($course) {
            $CompanyOrganizer = CompanyOrganizer::where('course_id',$course->id)->first();
            if ($CompanyOrganizer) {
                $attendeesArrList = [];
                $removeAttendList = [];

                $courseAttendeesData = CourseAttendees::where('course_id', $course->id)->get()->toArray();
            
                foreach ($data['attendees'] as $key => $attendees) {
                    $removeAttendList[$attendees['id']] = "";
                    $attendeesArr = [
                        'first_name'    => $attendees['first_name'],
                        'last_name'    => $attendees['last_name'],
                        'email'    => $attendees['email'],
                        'job_title'    => isset($attendees['job_title']) ? $attendees['job_title'] : '2',
                        'course_id'    => $course->id,
                        'organizer_id'    => $CompanyOrganizer->id,
                    ];
                    if (strlen($attendees['id']) > 0 && $attendees['id'] != "") {
                        $courseAttendee = CourseAttendees::find($attendees['id']);
                        $courseAttendee = $courseAttendee->update($attendeesArr);
                    } else {
                        $courseAttendee = new CourseAttendees;
                        $courseAttendee = $courseAttendee->create($attendeesArr);
                    }
                   
                    $attendeesArrList[]=$attendeesArr;
                    if (strlen($attendees['id']) > 0 && $attendees['id'] != "") {
                       
                    } else {
                        $data['course'] = $course;
                        $data['key'] = $course->key;
                        $data['companyorganizer'] = $CompanyOrganizer;
                        $trainerDetail = TrainerDetail::where('course_id',$course->id)->get();
                        $data['attendee_name'] = ucwords($attendees['first_name'] . " " . $attendees['last_name']);
                        $data['trainerDetail'] = $trainerDetail;
                        $course->companyorganizer->update(array('confirm_attendee' => 1));
                        $data['attendee_id'] = $courseAttendee->id;
                        Mail::to($attendees['email'])->send(new CourseAttendeesMail($data));
                    }

                    
                }

                if ($courseAttendeesData) {
                    foreach ($courseAttendeesData as $key1 => $value1) {
                        if (!array_key_exists($value1['id'], $removeAttendList)) {
                            $courseAttendeesDelete = CourseAttendees::find($value1['id']);
                            $courseAttendeesDelete->forceDelete();
                        }
                    }
                }

                // $course->companyorganizer()->update($organizerData);
                if ($course->trainer) {
                    $client = Client::where('id',$course->client_id)->first();
                    $attendeesArrList = CourseAttendees::where('course_id',$course->id)->get();
                    foreach ($course->trainer as $key => $trainer) {
                        $trainerArr = [];
                        $trainerArr['company_name'] = $client->company_name;
                        $trainerArr['trainer_name'] = ucwords($trainer->first_name . " " . $trainer->last_name);
                        $trainerArr['course_date'] = $course->start_date;
                        $trainerArr['course_end_date'] = $course->end_date;
                        $trainerArr['course_name'] = $course->coursecategoryname->course_name;
                        $trainerArr['company_organiser_attendees_name'] = $course->companyorganizer->first_name. " " . $course->companyorganizer->last_name;
                        $trainerArr['company_address'] = $client->address_one. "<br>" . $client->address_tow ."<br>".$client->town . "<br>" . "Post Code : ".$client->post_code;
                        $trainerArr['company_organiser_attendees_email'] = $course->companyorganizer->email;
                        $trainerArr['attendees_list'] = $this->getAttendeeList($attendeesArrList);
                        $trainerArr['questionnaire_360'] = $this->getQuestionnaire360List($attendeesArrList);
                        $data['trainerArr'] = $trainerArr;
                        $data['key'] = $course->key;
                        $data['self_attende'] = '360';
                        $data['referens_name'] ='';

                        Mail::to($trainer->email)->send(new CourseTrainerMail($data));
                        
                    }
                 }  
            }
        }
     
        return $courseAttendees;
    }
    public function getQuestionnaire360List($attendeesArrList)
    {
        
 
        $returnTable = "";
        $returnTable .= "<p>Form completion Status</p>";
       
        if($attendeesArrList){
            $returnTable .= "<table border=\"1\" cellspacing=\"0\" cellpadding=\"5\" style=\"border-collapse:collapse; width: 100%;\">";
            $returnTable .="<tr><th width=\"170\" valign=\"top\" style=\"background-color:#17365D;color:white;\"><p style=\"margin-top: 10px; margin-bottom: 10px; font-family: arial,helvetica,sans-serif; font-size: 14px; line-height: 2em;\">Attendee Name</p></th><th width=\"215\" valign=\"top\" style=\"background-color:#17365D;color:white;\"><p style=\"margin-top: 10px; margin-bottom: 10px; font-family: arial,helvetica,sans-serif; font-size: 14px; line-height: 2em;\">Own Questionnaire Completed</p></th><th width=\"124\" valign=\"top\" style=\"background-color:#17365D;color:white;\"><p style=\"margin-top: 10px; margin-bottom: 10px; font-family: arial,helvetica,sans-serif; font-size: 14px; line-height: 2em;\">Number of 360 Degree Invites Sent</p></th><th width=\"124\" valign=\"top\" style=\"background-color:#17365D;color:white;\"><p style=\"margin-top: 10px; margin-bottom: 10px; font-family: arial,helvetica,sans-serif; font-size: 14px; line-height: 2em;\">Number of 360 Degree Forms Completed</p></th></tr>";
            $returnTable .= "<tbody>";

            //dd($attendeesArrList);
            foreach($attendeesArrList as $key=> $vlue){
                $isFill = "NO";
                if($vlue->questionnaireself !=null){
                    $isFill = "YES - ".date('d/m/Y H:i:s', strtotime($vlue->questionnaireself->created_at));
                }
                $returnTable .= "<tr><td width=\"170\" valign=\"top\" style=\"background-color:#8DB3E2\"><p style=\"margin-top: 10px; margin-bottom: 10px; font-family: arial,helvetica,sans-serif; font-size: 14px; line-height: 2em;\">".$vlue->first_name."</p></td><td width=\"215\" valign=\"top\" style=\"background-color:#DBE5F1\"><p style=\"margin-top: 10px; margin-bottom: 10px; font-family: arial,helvetica,sans-serif; font-size: 14px; line-height: 2em;\">".$isFill."</p></td><td width=\"124\" valign=\"top\" style=\"background-color:#DBE5F1\"><p style=\"margin-top: 10px; margin-bottom: 10px; font-family: arial,helvetica,sans-serif; font-size: 14px; line-height: 2em;\">".$vlue->referraluser->count()."</p></td><td width=\"124\" valign=\"top\" style=\"background-color:#DBE5F1\"><p style=\"margin-top: 10px; margin-bottom: 10px; font-family: arial,helvetica,sans-serif; font-size: 14px; line-height: 2em;\">".$vlue->questionnaireref->count()."</p></td></tr>";
            }
            $returnTable .= "</tbody>";
            $returnTable .= "</table>";
        }
      
        return $returnTable;
    }
    /**
     * Method delete
     *
     * @param Course $course [explicite description]
     *
     * @return bool
     * @throws Exception
     */
    // public function delete(Course $course): bool
    // {
    //     if ($course->delete()) {
    //         return true;
    //     }

    //     throw new Exception('Course delete failed.');
    // }


}