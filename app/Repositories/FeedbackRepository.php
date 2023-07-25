<?php
namespace App\Repositories;
use Illuminate\Support\Str;
use App\Models\AttendeeReferens;
use App\Models\Course;
use App\Models\TrainerDetail;
use App\Models\CompanyOrganizer;
use App\Models\CourseAttendees;
use App\Mail\AttendeeReferensMail;
use App\Exceptions\GeneralException;
use App\Libraries\Safeencryption;
use Illuminate\Support\Facades\Mail;
use Illuminate\Database\Eloquent\Collection;

class FeedbackRepository
{
    /**
     * Method create
     * @param array $data [explicite des
     *cription]
     *
     * @return AttendeeReferens
     */
    public function create(array $data): AttendeeReferens
    {
        // dd($data);
        $course = Course::where('key',$data['key'])->first();
        if($course)
        {
            $CompanyOrganizer = CompanyOrganizer::where('course_id',$course->id)->first();
            if($CompanyOrganizer)
            {

                $courseAttendees = CourseAttendees::where('course_id',$course->id)->first();
                if($courseAttendees)
                {
                    $AttendeeRefreshArrList = [];
                    foreach ($data['contacte'] as $key => $contacte) 
                    {         
                       
                        $AttendeeRefreshArrListArr = [
                            'course_id'    => $course->id,
                            'organizer_id'    => $CompanyOrganizer->id,
                            'attendees_id'    => $data['attendee_id'],
                            'first_name'    => $contacte['first_name'],
                            'last_name'    => $contacte['last_name'],
                            'email'    => $contacte['email'],
                            'relationship'    => $contacte['relationship'],
                        ];

                        $AttendeeRefreshArrList[] = $AttendeeRefreshArrListArr;
                      
                        $data['course'] = $course;
                        $data['courseAttendeesList'] = $courseAttendees;
                       
                        Mail::to($contacte['email'])->send(new AttendeeReferensMail($data));
                      
                        $attendeeRefresh = AttendeeReferens::create($AttendeeRefreshArrListArr);
                    }
                }
                
            }
            
        }
        
        return $attendeeRefresh;
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