<?php
namespace App\Repositories;
use App\Models\Course;
use Illuminate\Support\Str;
use App\Models\CourseAttendees;
use App\Models\CompanyOrganizer;
use App\Mail\CourseAttendeesMail;
use App\Exceptions\GeneralException;
use App\Libraries\Safeencryption;
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
        //dd($course);
        if($course)
        {
            $CompanyOrganizer = CompanyOrganizer::where('course_id',$course->id)->first();
            if($CompanyOrganizer)
            {
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

                    Mail::to($attendees['email'])->send(new CourseAttendeesMail($data));
                    
                    $courseAttendees = CourseAttendees::create($attendeesArr);
                }
                //$course->attendees()->save($attendeesArr);
            }
            
        }
        return $courseAttendees;
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
    public function update(array $data, Course $course): Course
    {
        $courseData = [
            'course_category_id'    => $data['course_category_id'],
            'start_date'     => $data['start_date'],
            'end_date'       => $data['end_date'],
            'duration'       => $data['duration'],
            'client_id'       => $data['client_id'],
            'path'       => $data['path'],
        ];

        if ($course->update($courseData)) {
            $course->trainerDetail()->delete();
            foreach ($data['invoice'] as $key => $invoice) {
                $invoiceArr = [
                    'first_name'    => $invoice['first_name'],
                    'last_name'    => $invoice['last_name'],
                    'email'    => $invoice['email'],
                ];

                $course->trainerDetail()->save(new TrainerDetail($invoiceArr));
            }

            return $course;
        }

        throw new Exception('Course update failed.');
    }

    /**
     * Method delete
     *
     * @param Course $course [explicite description]
     *
     * @return bool
     * @throws Exception
     */
    public function delete(Course $course): bool
    {
        if ($course->delete()) {
            return true;
        }

        throw new Exception('Course delete failed.');
    }


}