<?php
namespace App\Repositories;
use App\Exceptions\GeneralException;
use App\Models\TrainerDetail;
use App\Models\Course;
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
        // dd($data);
        $courseData = [
            'course_category_id'    => $data['course_category_id'],
            'start_date'     => $data['start_date'],
            'end_date'       => $data['end_date'],
            'duration'       => $data['duration'],
            'client_id'       => $data['client_id'],
            'path'       => $data['path'],
        ];
        $course = Course::create($courseData);

        foreach ($data['invoice'] as $key => $invoice) 
        {         
            $invoiceArr = [
                'first_name'    => $invoice['first_name'],
                'last_name'    => $invoice['last_name'],
                'email'    => $invoice['email'],
            ];

            $course->trainerDetail()->save(new TrainerDetail($invoiceArr));
        }
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