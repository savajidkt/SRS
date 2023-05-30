<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\CreateRequest;
use App\Http\Requests\User\EditRequest;
use App\Http\Requests\User\PDFRequest;
use App\Models\User;
use App\Models\UserSurvey;
use App\Repositories\CompanyRepository;
use App\Repositories\ProjectRepository;
use App\Repositories\UserRepository;
use Barryvdh\DomPDF\Facade\Pdf;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Barryvdh\Snappy\Facades\SnappyPdf;
use Illuminate\Support\Facades\App;

class UsersController extends Controller
{
    /** \App\Repository\UserRepository $userRepository */
    protected $userRepository;
    /** \App\Repository\CompanyRepository $companyRepository */
    protected $companyRepository;
    /** \App\Repository\ProjectRepository $projectRepository */
    protected $projectRepository;

    public function __construct(UserRepository $userRepository, CompanyRepository $companyRepository, ProjectRepository $projectRepository)
    {
        $this->userRepository       = $userRepository;
        $this->companyRepository    = $companyRepository;
        $this->projectRepository    = $projectRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {

            $data = User::select('*');
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('full_name', function (User $user) {
                    return $user->fullName;
                })
                ->editColumn('user_status', function (User $user) {
                    return $user->status_name;
                })
                ->editColumn('survey_status', function (User $user) {

                    return $user->survey ? $user->survey->survey_status : '<a href="javascript:void(0)" class=""><span class="badge badge-danger">Incomplete</span></a>';
                })
                ->orderColumn('full_name', function ($query, $order) {
                    $query->orderByRaw('CONCAT_WS(\' \', first_name, last_name) ' . $order);
                })
                ->addColumn('action', function ($row) {
                    return $row->action;
                })->rawColumns(['action', 'user_status', 'survey_status'])->make(true);
        }

        return view('admin.user.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function create()
    {
        //

        $rawData    = new User;
        $companies  = $this->companyRepository->getCompany();
        $projects   = $this->projectRepository->getProject();
        return view('admin.user.create', ['model' => $rawData, 'companies' => $companies, 'projects' => $projects]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function store(CreateRequest $request)
    {
        $this->userRepository->create($request->all());

        return redirect()->route('users.index')->with('success', "User created successfully!");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\User $user [explicite description]
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function edit(User $user)
    {
        $companies  = $this->companyRepository->getCompany();
        $projects   = $this->projectRepository->getProject();
        return view('admin.user.edit', ['model' => $user, 'companies' => $companies, 'projects' => $projects]);
    }

    /**
     * Method update
     *
     * @param \App\Http\Requests\User\EditRequest $request
     * @param \App\Models\User $user
     *
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function update(EditRequest $request, User $user)
    {
        $this->userRepository->update($request->all(), $user);

        return redirect()->route('users.index')->with('success', "User updated successfully!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $this->userRepository->delete($user);

        return redirect()->route('users.index')->with('success', "User deleted successfully!");
    }

    /**
     * Method changeStatus
     *
     * @param Request $request [explicite description]
     *
     * @return JsonResponse
     */
    public function changeStatus(Request $request): JsonResponse
    {
        $input = $request->all();
        $user  = User::find($input['user_id']);
        // dd($user);
        if ($this->userRepository->changeStatus($input, $user)) {
            return response()->json([
                'status' => true,
                'message' => 'User status updated successfully.'
            ]);
        }

        throw new Exception('User status does not change. Please check sometime later.');
    }

    public function resetSurveyTime(Request $request): JsonResponse
    {
        $input = $request->all();
        $userSurvey  = UserSurvey::where('user_id', $input['user_id'])->first();
        //dd($userSurvey);
        if ($userSurvey) {
            $this->userRepository->resetSurveyTime($input, $userSurvey);
        }
        return response()->json([
            'status' => true,
            'message' => 'User survey time reset successfully.'
        ]);

        throw new Exception('User status does not change. Please check sometime later.');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function generatePDF()
    {

        $data = [
            'title' => 'Welcome to ItSolutionStuff.com',
            'date' => date('m/d/Y')
        ];
       //return view('admin.pdf-reports.front-page');
         $pdf = PDF::loadView('admin.pdf-reports.front-page', $data)->setPaper('a4');
         return $pdf->download('itsolutionstuff.pdf');
        //  $pdf = App::make('dompdf.wrapper');
        //  $html = view('admin.pdf-reports.front-page')->render();
        //  $pdf->loadHTML($html);
        // return $pdf->stream();
    }

    // function to generate PDF
    public function generatePDF1(int $id, PDFRequest $request)
    {
        
        $userSurvey  = UserSurvey::where('user_id', $id)->first();
        $html = view('admin.pdf-reports.front-page',['userSurvey' => $userSurvey])->render();
        $html .= view('admin.pdf-reports.introduction')->render();
        $pdf = SnappyPdf::loadHTML($html);
        // $pdf = SnappyPdf::loadView('admin.pdf-reports.front-page');
        $pdf->setOption('enable-javascript', true);
        $pdf->setOption('javascript-delay', 5000);
        $pdf->setOption('enable-smart-shrinking', true);
        $pdf->setOption('no-stop-slow-scripts', true);
        return $pdf->stream();
        //return $pdf->download('test.pdf');
    }
}
