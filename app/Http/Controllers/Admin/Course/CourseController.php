<?php

namespace App\Http\Controllers\Admin\Course;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CreateRequest as AdminCreateRequest;
use App\Http\Requests\Course\CreateRequest;
use App\Http\Requests\Course\EditRequest;
use App\Models\Client;
use App\Models\CompanyOrganizer;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\CourseCategory;
use App\Repositories\CourseRepository;
use Yajra\DataTables\Facades\DataTables;

class CourseController extends Controller
{
    protected $courseRepository;

    public function __construct(CourseRepository $courseRepository)
    {
        $this->courseRepository = $courseRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {

           
            $data = Course::select('*');
            // $data->orderBy('start_date', 'ASC');
            $data->orderBy($request->order[0]['column'], $request->order[0]['dir']);
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('course_category_id', function (Course $course) {
                    return $course->coursecategoryname->course_name;
                })
                ->addColumn('start_date', function (Course $course) {
                    // return $course->start_date;
                    return date('d-m-Y',strtotime($course->start_date));
                })
                ->addColumn('duration', function (Course $course) {
                    return $course->duration;
                    
                })
                ->filterColumn('start_date', function($query, $keyword) {
                    $sql = "CONCAT(courses.start_date,'-',courses.duration)  like ?";
                    $query->whereRaw($sql, ["%{$keyword}%"]);
                })
                ->addColumn('client_id', function (Course $course) {
                    return $course->clientname->company_name;
                })
                ->filterColumn('client_id', function ($query, $keyword) {
                    $query->whereHas('clientname', function ($query) use ($keyword) {
                        $query->where('company_name', 'LIKE', '%' . $keyword . '%');
                    });
                })
                ->addColumn('action', function ($row) {
                    return $row->action;
                })->rawColumns(['action'])->make(true);
        }

        return view('course.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function create()
    {
        $rawData = new Course;
        $courseCategory = CourseCategory::all();
        $clientList = Client::all();
        return view('course.create',['model' => $rawData,'courseCategory' => $courseCategory,'clientList' => $clientList]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function store(CreateRequest $request)
    {
        // dd($request->all());
        $this->courseRepository->create($request->all());
        return redirect()->route('course.index')->with('success', "Course created successfully!");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        //dd($course);
        //return view('course.viewHtml',['modal'=>$course]);
        return view('course.view',['modal'=>$course]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Course $course [explicite description]
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function edit(Course $course)
    {
        $course->loadMissing('trainerDetail');
        $courseCategory = CourseCategory::all();
        $clientList = Client::all();
        $companyOrganizer = CompanyOrganizer::where('course_id',$course->id)->first();
        return view('course.edit', ['model' => $course,'courseCategory' => $courseCategory,'clientList' => $clientList,'companyOrganizer' => $companyOrganizer]);
    }

    /**
     * Method update
     *
     * @param \App\Http\Requests\Client\EditRequest $request
     * @param \App\Models\Course $course
     *
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function update(EditRequest $request, Course $course)
    {
        // dd($request->all());
        $this->courseRepository->update($request->all(), $course);
        return redirect()->route('course.index')->with('success', "Course updated successfully!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        $this->courseRepository->delete($course);
        return response()->json(['status' => true,'message' => '']);
    }

}

