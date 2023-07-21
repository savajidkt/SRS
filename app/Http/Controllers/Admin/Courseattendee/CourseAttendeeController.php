<?php

namespace App\Http\Controllers\Admin\Courseattendee;

use App\Http\Controllers\Controller;
use App\Libraries\Safeencryption;
use App\Models\CompanyOrganizer;
use App\Models\Course;
use App\Models\CourseAttendees;
use App\Repositories\CourseAttendeeRepository;
use Illuminate\Http\Request;

class CourseAttendeeController extends Controller
{
    protected $courseAttendeeRepository;

    public function __construct(CourseAttendeeRepository $courseAttendeeRepository)
    {
        $this->courseAttendeeRepository = $courseAttendeeRepository;
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function index($id)
    {
        $message = '';
       $course = Course::where('key',$id)->first();
       if($course)
       {
        $CompanyOrganizer = CompanyOrganizer::where('course_id',$course->id)->where('confirm_attendee',0)->first();
        // dd($CompanyOrganizer);
        if($CompanyOrganizer)
        {
            $emailTemplate = getEmailTemplatesByID(8);
            if ($emailTemplate) {
                $paramArr['contact_name'] = ucwords($CompanyOrganizer->first_name . " " . $CompanyOrganizer->last_name);
                $sidebar = replaceHTMLBodyWithParam($emailTemplate['template'], $paramArr);
                
          
              }
            return view('courseattendees.create',['id'=>$id,'model' => $course,'sidebar' => $sidebar]);
        }
        else
        {
            $messgeTemplate = getEmailTemplatesByID(15);
            if ($messgeTemplate)
            {
                $paramArr = [];
                $message  = replaceHTMLBodyWithParam($messgeTemplate['template'],$paramArr);
            }
            return view('courseattendees.error',['message' => $message]);
        }
        
       }
       return view('courseattendees.error');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // dd($request);
        $sidebar = '';
        $message = '';
        $course = Course::where('key',$request->key)->first();
       
        if($course) {
            $CompanyOrganizer = CompanyOrganizer::where('course_id', $course->id)->first();
           
            if($CompanyOrganizer) 
            {
                $emailTemplate = getEmailTemplatesByID(9);
                
                if ($emailTemplate) {
                    $paramArr['contact_name'] = ucwords($CompanyOrganizer->first_name . " " . $CompanyOrganizer->last_name);
                    $sidebar = replaceHTMLBodyWithParam($emailTemplate['template'], $paramArr);
                    
            
                }
                $messgeTemplate = getEmailTemplatesByID(12);
                if ($messgeTemplate)
                {
                    $message  = replaceHTMLBodyWithParam($messgeTemplate['template'],$paramArr);
                }
            }
        }

       
        $this->courseAttendeeRepository->create($request->all());
        return view('courseattendees.success',['sidebar' => $sidebar , 'message' => $message]);
        // return redirect()->back()->with('success', "Course Attendees successfully!");
    }

    public function editattendees(CourseAttendees $courseAttendees)
    {
        $courseAttendeesList = CourseAttendees::where('course_id',$courseAttendees->id)->get();
        return view('course.editattendees',['model' => $courseAttendees,'id' => $courseAttendees->id,'courseAttendeesList' => $courseAttendeesList]);
    }

    public function update(Request $request ,CourseAttendees $courseAttendees)
    {
        $this->courseAttendeeRepository->update($request->all(),$courseAttendees);
        return redirect()->route('course.index')->with('success', "Attendees updated successfully!");
    }

}
