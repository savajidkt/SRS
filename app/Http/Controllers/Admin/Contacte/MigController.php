<?php

namespace App\Http\Controllers\Admin\Contacte;


use Carbon\Carbon;
use App\Models\Client;
use App\Models\Course;
use App\Models\Questions;
use App\Mail\ThankyouMail;
use Illuminate\Http\Request;
use App\Mail\ChaseReferensMail;
use App\Mail\CourseTrainerMail;
use App\Models\CourseAttendees;
use App\Models\AttendeeReferens;
use App\Models\CompanyOrganizer;
use App\Libraries\Safeencryption;
use App\Models\AttendeeQuestions;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
use App\Http\Controllers\Controller;
use App\Models\QuestionnaireAnswers;
use Illuminate\Support\Facades\Mail;
use App\Repositories\FeedbackRepository;
use App\Http\Requests\Contacte\CreateRequest;

class MigController extends Controller
{

    public function index()
    {
        //$this->clientAndClientContact();
        //$this->coursesAndOrganizer();
        $this->courseAttendees();
        //$this->courseTrainers();
        //$this->attendeeReferens();
        //$this->questionnaireAnswers();

        // $this->questionnaireAnswersUpdate();
    }
    public function clientAndClientContact()
    {

        echo "client And ClientContact Remove Exit";
        exit;

        $client_companies = DB::table('client_companies_jayesh')->get();
        if ($client_companies) {
            foreach ($client_companies as $key => $value) {



                DB::table('clients')->insert(
                    array(
                        'id'     =>   $value->id,
                        'company_name'   => (trim($value->company_name)) ? trim($value->company_name) : NULL,
                        'address_one'   => (trim($value->address_1)) ? trim($value->address_1) : NULL,
                        'address_tow'   => (trim($value->address_2)) ? trim($value->address_2) : NULL,
                        'town'   => (trim($value->town)) ? trim($value->town) : NULL,
                        'country'   =>  NULL,
                        'post_code'   => (trim($value->post_code)) ? trim($value->post_code) : NULL,
                        'notes'   => (trim($value->notes)) ? trim($value->notes) : NULL,
                    )
                );

                $client_contacts = DB::table('client_contacts_jayesh')->where('company_id', $value->id)->first();


                if ($client_contacts) {
                    DB::table('client_contacts')->insert(
                        array(
                            'id'     =>   $client_contacts->id,
                            'client_id'     =>   $client_contacts->company_id,
                            'first_name'   =>   $client_contacts->first_name,
                            'last_name'   =>   $client_contacts->last_name,
                            'phone_number'   =>   $client_contacts->phone_number,
                            'mobile_number'   =>   $client_contacts->mobile_number,
                            'email'   =>   $client_contacts->email_address,
                            'job_title'   =>   $client_contacts->job_title
                        )
                    );
                }
            }
            echo "Done";
            exit;
        }
    }

    public function coursesAndOrganizer()
    {

        echo "courses And Organizer Remove Exit";
        exit;

        $courses_jayesh = DB::table('courses_jayesh')->get();
        if ($courses_jayesh) {
            foreach ($courses_jayesh as $key => $value) {

                DB::table('courses')->insert(
                    array(
                        'id'     =>   $value->id,
                        'course_category_id'     =>   1,
                        'start_date'   => (trim($value->course_date)) ? trim($value->course_date) : NULL,
                        'end_date'   => (trim($value->questionnaire_end_date)) ? trim($value->questionnaire_end_date) : NULL,
                        'duration'   => (trim($value->course_duration)) ? trim($value->course_duration) : NULL,
                        'client_id'   => (trim($value->client_id)) ? trim($value->client_id) : NULL,
                        'path'     =>   1,
                        'key'   => (trim($value->key)) ? trim($value->key) : NULL,
                    )
                );


                DB::table('company_organizers')->insert(
                    array(
                        'course_id'     =>   $value->id,
                        'first_name'   => (trim($value->first_name)) ? trim($value->first_name) : NULL,
                        'last_name'   => (trim($value->last_name)) ? trim($value->last_name) : NULL,
                        'email'   => (trim($value->email_address)) ? trim($value->email_address) : NULL,
                        'confirm_attendee'   => 1,
                    )
                );
            }
            echo "Done";
            exit;
        }
    }

    public function courseAttendees()
    {

        // echo "course Attendees Remove Exit";
        // exit;

        $course_attendees_jayesh = DB::table('course_attendees_jayesh')->get();
        if ($course_attendees_jayesh) {
            foreach ($course_attendees_jayesh as $key => $value) {

                $job_title = trim($value->job_title);
                
                if ($job_title == 4) {
                    $job_title = 5;
                } else if ($job_title == 3) {
                    $job_title = 4;
                } else if ($job_title == 2) {
                    $job_title = 3;
                } else if ($job_title == 1) {
                    $job_title = 2;
                } else if ($job_title == 0) {
                    $job_title = 1;
                }

                $company_organizers = DB::table('company_organizers')->where('course_id', $value->course_id)->first();
                DB::table('course_attendees')->insert(
                   array(
                        'id'     =>   $value->id,
                        'course_id'     => (trim($value->course_id)) ? trim($value->course_id) : NULL,
                        'organizer_id'   => (trim($company_organizers->id)) ? trim($company_organizers->id) : NULL,
                        'first_name'   => (trim($value->first_name)) ? trim($value->first_name) : NULL,
                        'last_name'   => (trim($value->last_name)) ? trim($value->last_name) : NULL,
                        'email'   => (trim($value->email_address)) ? trim($value->email_address) : NULL,
                        'job_title'     => $job_title,
                        'updated_at'   => (trim($value->questionnaire_filled_datetime)) ? trim($value->questionnaire_filled_datetime) : NULL,
                    )
                );
            }
            echo "Done";
            exit;
        }
    }


    public function courseTrainers()
    {

        echo "course Trainers Remove Exit";
        exit;

        $course_trainers_jayesh = DB::table('course_trainers_jayesh')->get();
        if ($course_trainers_jayesh) {
            foreach ($course_trainers_jayesh as $key => $value) {


                $courses = DB::table('courses')->where('id', $value->course_id)->first();
                if ($courses) {
                    DB::table('trainer_details')->insert(
                        array(
                            'id'     =>   $value->id,
                            'course_id'     => (trim($value->course_id)) ? trim($value->course_id) : NULL,
                            'first_name'   => (trim($value->first_name)) ? trim($value->first_name) : NULL,
                            'last_name'   => (trim($value->last_name)) ? trim($value->last_name) : NULL,
                            'email'   => (trim($value->email_address)) ? trim($value->email_address) : NULL
                        )
                    );
                }
            }
            echo "Done";
            exit;
        }
    }

    public function questionnaireAnswers()
    {

        echo "questionnaire Answers Remove Exit";
        exit;

        $questionnaire_answers_jayesh = DB::table('questionnaire_answers')->skip(0)->take(10000)->get();


        if ($questionnaire_answers_jayesh) {
            foreach ($questionnaire_answers_jayesh as $key => $value) {
                if ($value->attendees_id != 0) {
                    $course_attendees = DB::table('course_attendees')->where('id', $value->attendees_id)->count();
                    if ($course_attendees == 0) {
                        DB::table('questionnaire_answers')->delete($value->id);
                    }
                } else if ($value->contact_id != 0) {
                    $attendee_referens = DB::table('attendee_referens')->where('id', $value->contact_id)->count();
                    if ($attendee_referens == 0) {
                        DB::table('questionnaire_answers')->delete($value->id);
                    } else {

                        $attendee_referens = DB::table('attendee_referens')->where('id', $value->contact_id)->first();
                        DB::table('questionnaire_answers')->where('id', $value->id)->update(array('attendees_id' => $attendee_referens->attendees_id));
                    }
                }

                if ('329664' ==  $value->id) {
                    echo "All DOne";
                }
            }
            echo "Next";
            exit;
        }
    }

    public function attendeeReferens()
    {

        echo "attendee Referens Remove Exit";
        exit;

        $sixty_contacts_jayesh = DB::table('sixty_contacts_jayesh')->get();
        if ($sixty_contacts_jayesh) {
            foreach ($sixty_contacts_jayesh as $key => $value) {
                $course_attendees = DB::table('course_attendees')->where('id', $value->attendee_id)->first();
                if ($course_attendees) {
                    DB::table('attendee_referens')->insert(
                        array(
                            'id'     =>   $value->id,
                            'course_id'     => (trim($course_attendees->course_id)) ? trim($course_attendees->course_id) : NULL,
                            'organizer_id'     => (trim($course_attendees->organizer_id)) ? trim($course_attendees->organizer_id) : NULL,
                            'attendees_id'     => (trim($value->attendee_id)) ? trim($value->attendee_id) : NULL,
                            'first_name'   => (trim($value->first_name)) ? trim($value->first_name) : NULL,
                            'last_name'   => (trim($value->last_name)) ? trim($value->last_name) : NULL,
                            'email'   => (trim($value->email_address)) ? trim($value->email_address) : NULL,
                            'relationship'   => (trim($value->job_title)) ? trim($value->job_title) : 0,
                            'questionnaire_filled'   => (trim($value->questionnaire_filled)) ? trim($value->questionnaire_filled) : NULL,
                            'updated_at'   => (trim($value->questionnaire_filled_datetime)) ? trim($value->questionnaire_filled_datetime) : NULL
                        )
                    );
                }
            }
            echo "Done";
            exit;
        }
    }

    public function questionnaireAnswersUpdate()
    {

        echo "Question ID Update 36 to 70 Replace 1 to 35";
        exit;

        $questionnaire_answers_jayesh = DB::table('questionnaire_answers')->where('type', 1)->get();

        if ($questionnaire_answers_jayesh) {

            $i = 1;
            $j = 1;
            foreach ($questionnaire_answers_jayesh as $key => $value) {

                if ($i == 36) {
                    $i = 1;
                }
                DB::table('questionnaire_answers')->where('id', $value->id)->update(array('question_id' => $i));

                if ('329688' ==  $value->id) {
                    echo "All Done";
                }

                $i++;
            }
        }
    }
}
