<?php

namespace App\Http\Controllers\Admin\Course;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CreateRequest as AdminCreateRequest;
use App\Http\Requests\Course\CreateRequest;
use App\Http\Requests\Course\EditRequest;
use App\Models\Client;
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
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('course_category_id', function (Course $course) {
                    return $course->coursecategoryname->course_name;
                })
                ->addColumn('start_date', function (Course $course) {
                    return $course->start_date;
                })
                ->addColumn('duration', function (Course $course) {
                    return $course->duration;
                })
                ->addColumn('client_id', function (Course $course) {
                    return $course->clientname->company_name;
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
        // dd($request);
        $this->courseRepository->create($request->all());
        return redirect()->route('course.index')->with('success', "Course created successfully!");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function show(Client $client)
    // {
    //     $client->loadMissing('contacts');
    //     return view('client.view', ['model' => $client]);
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Question $usquestioner [explicite description]
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    // public function edit(Client $client)
    // {
    //     $client->loadMissing('contacts');
    //     return view('client.edit', ['model' => $client]);
    // }

    /**
     * Method update
     *
     * @param \App\Http\Requests\Client\EditRequest $request
     * @param \App\Models\Client $client
     *
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    // public function update(EditRequest $request, Client $client)
    // {
       
    //     $this->clientRepository->update($request->all(), $client);

    //     return redirect()->route('client.index')->with('success', "Client updated successfully!");
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function destroy(Client $client)
    // {
    //     $this->clientRepository->delete($client);

    //     return redirect()->route('client.index')->with('success', "Client deleted successfully!");
    // }
}

