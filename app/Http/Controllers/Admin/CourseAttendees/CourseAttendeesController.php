<?php

namespace App\Http\Controllers\Admin\CourseAttendees;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CourseAttendeesController extends Controller
{
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function create()
    {
        dd('atandingtest';)
        // $rawData = new CompanyOrganizer;
        return view('courseattendees.create');
    }
}
