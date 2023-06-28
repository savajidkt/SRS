<?php

namespace App\Http\Controllers\Admin\Courseattendee;

use App\Http\Controllers\Controller;
use App\Libraries\Safeencryption;
use App\Models\CompanyOrganizer;
use App\Models\Course;
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
       $course = Course::where('key',$id)->first();
       if($course)
       {
        $CompanyOrganizer = CompanyOrganizer::where('course_id',$course->id)->first();
        if($CompanyOrganizer)
        {
            return view('courseattendees.create',['id'=>$id]);
        }
        
       }
       return view('courseattendees.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $this->courseAttendeeRepository->create($request->all());
        return redirect()->back()->with('success', "Course Attendees successfully!");
    }
}
