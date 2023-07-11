<?php

namespace App\Http\Controllers\Admin\Contacte;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\FeedbackRepository;
use App\Http\Requests\Contacte\CreateRequest;
use App\Models\AttendeeQuestions;
use App\Models\AttendeeReferens;
use App\Models\Course;
use App\Models\CourseAttendees;
use App\Models\QuestionnaireAnswers;
use App\Models\Questions;

class FeedbackContacteController extends Controller
{
    protected $feedbackRepository;

    public function __construct(FeedbackRepository $feedbackRepository)
    {
        $this->feedbackRepository = $feedbackRepository;
    }

    public function index($id)
    {
       return view('contacte.create',['id' => $id]);
    }

    public function store(Request $request)
    {
        // dd($request);
        $this->feedbackRepository->create($request->all());
        return redirect()->route('attendees-questionnaire',$request->key)->with('success', "Course created successfully!");
    }

    public function attendeesquestion($id)
    {
        $attendeeQuestion = AttendeeQuestions::all();
        return view('contacte.attendeesquestion',['attendeeQuestion' => $attendeeQuestion ,'id' => $id]);
    }

    public function StoreAttendeesquestion(Request $request)
    {
        $course = Course::where('key', $request->key)->first();
        if($course) 
        {
            $attendeeReferens = AttendeeReferens::where('course_id', $course->id)->first();
            if($attendeeReferens) 
            {
                $AttendeeQuestionsList = [];
                foreach ($request['answer'] as  $key=> $answer) {
                    $AttendeeQuestionsArr = [
                        'contact_id'    => $attendeeReferens->id,
                        'attendees_id'    => $attendeeReferens->attendees_id,
                        'question_id'    => $key,
                        'answer'    => $answer,
                        'type'    => 0,
                    ];

                    $AttendeeQuestionsList[] = $AttendeeQuestionsArr;
                    
                    $attendeeQuestions = QuestionnaireAnswers::create($AttendeeQuestionsArr);
                }
            }
        }
        return view('courseattendees.success');
    }
    public function question($id)
    {
        $questions = Questions::all();
        return view('contacte.question',['questions' => $questions ,'id' => $id]);
    }

    public function storequestion(Request $request)
    {
        $course = Course::where('key', $request->key)->first();
        if($course) 
        {
            $attendeeReferens = AttendeeReferens::where('course_id', $course->id)->first();
            if($attendeeReferens) 
            {
                $AttendeeQuestionsList = [];
                foreach ($request['answer'] as  $key => $answer) {
                    
                    $AttendeeQuestionsArr = [
                        'contact_id'    => $attendeeReferens->id,
                        'attendees_id'    => $attendeeReferens->attendees_id,
                        'question_id'    => $key,
                        'answer'    => $answer,
                        'type'    => 1,
                    ];

                  
                  // echo "<pre>";
                   //print_r($AttendeeQuestionsArr);
                   
                    $attendeeQuestions = QuestionnaireAnswers::create($AttendeeQuestionsArr);
                    
                }
            }
        }
        exit;
        return view('courseattendees.success');
    }
}
