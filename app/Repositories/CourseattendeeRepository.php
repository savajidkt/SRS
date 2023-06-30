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
        if($course)
        {
            $CompanyOrganizer = CompanyOrganizer::where('course_id',$course->id)->first();
            if($CompanyOrganizer)
            {
                $attendeesArrList = [];
                foreach ($data['attendees'] as $key => $attendees) 
                {         
                    // dd($attendees);
                    $attendeesArr = [
                        'first_name'    => $attendees['first_name'],
                        'last_name'    => $attendees['last_name'],
                        'email'    => $attendees['email'],
                        'job_title'    => $attendees['job_title'],
                        'course_id'    => $course->id,
                        'organizer_id'    => $CompanyOrganizer->id,
                    ];

                    $attendeesArrList[]=$attendeesArr;

                    $data['course'] = $course;
                    $data['companyorganizer'] = $CompanyOrganizer;
                    $trainerDetail = TrainerDetail::where('course_id',$course->id)->get();
                    $data['attendee_name'] = ucwords($attendees['first_name'] . " " . $attendees['last_name']);
                    $data['trainerDetail'] = $trainerDetail;
                    // dd($data);
                    Mail::to($attendees['email'])->send(new CourseAttendeesMail($data));
                    $course->companyorganizer->update(array('confirm_attendee' => 1));
                    // exit();
                    $courseAttendees = CourseAttendees::create($attendeesArr);
                    // exit();
                }
                //$course->attendees()->save($attendeesArr);
                // dd($course->trainer);
                if($course->trainer){
                    foreach ($course->trainer as $key => $trainer) {

                        $trainerArr = [];
                        $trainerArr['trainer_name'] = ucwords($trainer->first_name . " " . $trainer->last_name);
                        $trainerArr['course_date'] = $course->start_date;
                        $trainerArr['course_end_date'] = $course->end_date;
                        $trainerArr['course_name'] = $course->coursecategoryname->course_name;

                        $trainerArr['company_organiser_attendees_name'] = $course->companyorganizer->first_name. " " . $course->companyorganizer->last_name;
                        $trainerArr['company_address'] = $course->end_date;
                        $trainerArr['company_organiser_attendees_email'] = $course->companyorganizer->email;
                        $trainerArr['attendees_list'] = $this->getAttendeeList($attendeesArrList);
                        dd($trainerArr);
                        Mail::to($trainer->email)->send(new CourseTrainerMail($data));
                    }
                }
                
                
            }
            
        }
        
        return $courseAttendees;
    }

    public function getAttendeeList($attendeesArrList)
    {
        $returnTable='';
        if(is_array($attendeesArrList) && count($attendeesArrList) > 0){
            foreach($attendeesArrList as $key=>$vlue){
                $attendeesArrList
            }
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
    // public function update(array $data, Course $course): Course
    // {
    //     $courseData = [
    //         'course_category_id'    => $data['course_category_id'],
    //         'start_date'     => $data['start_date'],
    //         'end_date'       => $data['end_date'],
    //         'duration'       => $data['duration'],
    //         'client_id'       => $data['client_id'],
    //         'path'       => $data['path'],
    //     ];

    //     if ($course->update($courseData)) {
    //         $course->trainerDetail()->delete();
    //         foreach ($data['invoice'] as $key => $invoice) {
    //             $invoiceArr = [
    //                 'first_name'    => $invoice['first_name'],
    //                 'last_name'    => $invoice['last_name'],
    //                 'email'    => $invoice['email'],
    //             ];

    //             $course->trainerDetail()->save(new TrainerDetail($invoiceArr));
    //         }

    //         return $course;
    //     }

    //     throw new Exception('Course update failed.');
    // }

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