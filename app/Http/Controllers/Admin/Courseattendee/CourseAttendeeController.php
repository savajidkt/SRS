<?php

namespace App\Http\Controllers\Admin\Courseattendee;

use PDF;
use Exception;
use Dompdf\Dompdf;
use Dompdf\Options;
use App\Models\Course;
use Illuminate\Http\Request;
use App\Models\CourseAttendees;
use App\Models\CompanyOrganizer;
use App\Libraries\Safeencryption;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
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
        $course = Course::where('key', $id)->first();
        if ($course) {
            $CompanyOrganizer = CompanyOrganizer::where('course_id', $course->id)->where('confirm_attendee', 0)->first();
            // dd($CompanyOrganizer);
            if ($CompanyOrganizer) {
                $emailTemplate = getEmailTemplatesByID(8);
                if ($emailTemplate) {
                    $paramArr['contact_name'] = ucwords($CompanyOrganizer->first_name . " " . $CompanyOrganizer->last_name);
                    $sidebar = replaceHTMLBodyWithParam($emailTemplate['template'], $paramArr);
                }
                return view('courseattendees.create', ['id' => $id, 'model' => $course, 'sidebar' => $sidebar]);
            } else {
                $messgeTemplate = getEmailTemplatesByID(15);
                if ($messgeTemplate) {
                    $paramArr = [];
                    $message  = replaceHTMLBodyWithParam($messgeTemplate['template'], $paramArr);
                }
                return view('courseattendees.error', ['message' => $message]);
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
        $course = Course::where('key', $request->key)->first();

        if ($course) {
            $CompanyOrganizer = CompanyOrganizer::where('course_id', $course->id)->first();

            if ($CompanyOrganizer) {
                $emailTemplate = getEmailTemplatesByID(9);

                if ($emailTemplate) {
                    $paramArr['contact_name'] = ucwords($CompanyOrganizer->first_name . " " . $CompanyOrganizer->last_name);
                    $sidebar = replaceHTMLBodyWithParam($emailTemplate['template'], $paramArr);
                }
                $messgeTemplate = getEmailTemplatesByID(12);
                if ($messgeTemplate) {
                    $message  = replaceHTMLBodyWithParam($messgeTemplate['template'], $paramArr);
                }
            }
        }


        $this->courseAttendeeRepository->create($request->all());
        return view('courseattendees.success', ['sidebar' => $sidebar, 'message' => $message]);
        // return redirect()->back()->with('success', "Course Attendees successfully!");
    }

    public function editattendees(CourseAttendees $courseAttendees)
    {
        $courseAttendeesList = CourseAttendees::where('course_id', $courseAttendees->id)->get();
        return view('course.editattendees', ['model' => $courseAttendees, 'id' => $courseAttendees->id, 'courseAttendeesList' => $courseAttendeesList]);
    }

    public function update(Request $request, CourseAttendees $courseAttendees)
    {
        $this->courseAttendeeRepository->update($request->all(), $courseAttendees);
        return redirect()->route('course.index')->with('success', "Attendees updated successfully!");
    }

    public function exportAttendees($attendee_id)
    {

        $courseAttendeesList = CourseAttendees::where('id', $attendee_id)->first();
        //dd($courseAttendeesList->questionnaireanser);
        // dd($courseAttendeesList->courses[0]->clientname->company_name);
        $pdf_file = $attendee_id . "_report.pdf";
        if (!Storage::disk('pdf')->exists($pdf_file)) {
            if ($courseAttendeesList->courses->count() > 0) {
                if ($courseAttendeesList->courses[0]->coursecategoryname->course_name == "Influencing Questions") {
                    $fileName = "SRS Influencing Report - " . $courseAttendeesList->courses[0]->clientname->company_name . ' - ' . str_replace("-", ".", $courseAttendeesList->courses[0]->start_date) . ' - ' . ucwords($courseAttendeesList->first_name . " " . $courseAttendeesList->last_name) . '.pdf';
                    ob_get_clean();
                    ob_start();
                    //$myContent = view('pdf.report', ['courseAttendeesList' => $courseAttendeesList])->render();

                    //echo $myContent; exit;

                    $pdf = PDF::loadView('pdf.report', ['courseAttendeesList' => $courseAttendeesList]);
                    return $pdf->stream($fileName);

                    // $myContent = ob_get_clean();
                    if ($myContent != "") {
                        try {
                            $options = new Options();

                            //$options->setDpi(300);
                            $options->set('defaultFont', 'calibri');
                            $options->setIsFontSubsettingEnabled(true);
                            $dompdf = new Dompdf($options);
                            $dompdf->loadHtml($myContent);
                            $dompdf->setPaper('Legal', 'portrait');
                            $dompdf->render();
                            //$dompdf->stream("file.pdf", array("Attachment" => false));
                            $dompdf->stream($fileName, array("Attachment" => false));
                            exit();
                        } catch (Exception $e) {
                            print_r($e->getMesssage());
                            exit;
                        }
                    }
                }
            }
        }




        $data = [
            'title' => 'Welcome to ItSolutionStuff.com',
            'date' => date('m/d/Y')
        ];

        $pdf = PDF::loadView('pdf.report', $data);

        return $pdf->stream('itsolutionstuff.pdf');
    }

    public function trainerReport($course_id)
    {
        echo "Triner";
    }
}