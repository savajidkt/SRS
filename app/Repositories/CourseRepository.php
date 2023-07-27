<?php
namespace App\Repositories;
use App\Models\Course;
use Illuminate\Support\Str;
use App\Models\TrainerDetail;
use App\Models\CompanyOrganizer;
use App\Mail\CompanyOrganizerMail;
use App\Exceptions\GeneralException;
use App\Libraries\Safeencryption;
use Illuminate\Support\Facades\Mail;
use Illuminate\Database\Eloquent\Collection;

class CourseRepository
{
    /**
     * Method create
     * @param array $data [explicite des
     *cription]
     *
     * @return Course
     */
    public function create(array $data): Course
    {
        $key = Str::upper(Str::random(5));
        $SafeencryptionObj = new Safeencryption;
        $newkey = $SafeencryptionObj->encode($key);
        
        $courseData = [
            'course_category_id'    => $data['course_category_id'],
            'start_date'     => $data['start_date'],
            'end_date'       => $data['end_date'],
            'duration'       => $data['duration'],
            'client_id'       => $data['client_id'],
            'path'       => $data['path'],
            'key'       => $newkey,
        ];
        $course = Course::create($courseData);
        foreach ($data['invoice'] as $key => $invoice) 
        {         
            $invoiceArr = [
                'course_id'    => $course->id,
                'first_name'    => $invoice['first_name'],
                'last_name'    => $invoice['last_name'],
                'email'    => $invoice['email'],
            ];

            $course->trainerDetail()->save(new TrainerDetail($invoiceArr));
        }


        $organizerData = [
            'course_id'    => $course->id,
            'first_name'    => $data['org_first_name'],
            'last_name'    => $data['org_last_name'],
            'email'    => $data['org_email'],
            'confirm_attendee'    => 0            
        ];
        $data['key'] = $newkey;
        CompanyOrganizer::create($organizerData);
        Mail::to($data['org_email'])->send(new CompanyOrganizerMail($data));

        // exit;
        return $course;
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
        // dd($data);
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
            
            $organizerData = [
                'course_id'    => $course->id,
                'first_name'    => $data['org_first_name'],
                'last_name'    => $data['org_last_name'],
                'email'    => $data['org_email'],
                'confirm_attendee'    => 1            
            ];
            dd($organizerData);
            $data['key'] = $course->key;
            $course->companyorganizer()->update($organizerData);
            Mail::to($data['org_email'])->send(new CompanyOrganizerMail($data));

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