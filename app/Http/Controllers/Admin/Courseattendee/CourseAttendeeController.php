<?php

namespace App\Http\Controllers\Admin\Courseattendee;

use App\Http\Controllers\Controller;
use App\Libraries\Safeencryption;
use App\Models\CompanyOrganizer;
use App\Models\Course;
use Illuminate\Http\Request;

class CourseAttendeeController extends Controller
{
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
            return view('courseattendees.create');
        }
        
       }
       return view('');
    }
}
