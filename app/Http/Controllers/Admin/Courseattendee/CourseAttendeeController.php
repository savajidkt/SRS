<?php



namespace App\Http\Controllers\Admin\Courseattendee;





use PDF;

use Exception;

use Dompdf\Dompdf;

use Dompdf\Options;

use App\Models\Course;

use Illuminate\Http\Request;

use App\Models\CourseAttendees;

use App\Mail\ChaseAttendeesMail;

use App\Models\CompanyOrganizer;

use App\Libraries\Safeencryption;

use Illuminate\Support\Facades\App;

use Illuminate\Support\Facades\URL;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Mail;

use App\Mail\CourseTrainerMailReport;

use App\Models\TrainerDetail;

use Illuminate\Support\Facades\Storage;

use App\Repositories\CourseAttendeeRepository;



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
        if (!$course) {
            $messgeTemplate = getEmailTemplatesByID(23);
            if ($messgeTemplate) {
                $paramArr = [];
                $message  = replaceHTMLBodyWithParam($messgeTemplate['template'], $paramArr);
            }
            return view('courseattendees.error', ['message' => $message]);
        }
        $isExpire = courseExpired($course->start_date, $course->end_date);
        if (!$isExpire) {
            $messgeTemplate = getEmailTemplatesByID(22);
            if ($messgeTemplate) {
                $paramArr = [];
                $message  = $messgeTemplate['template'];
            }

            return view('courseattendees.errorexpire', ['message' => $message]);
        }


        if ($course) {

            $CompanyOrganizer = CompanyOrganizer::where('course_id', $course->id)->where('confirm_attendee', 0)->first();

            //dd($CompanyOrganizer);

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
        if (empty($request->key)) {
            return redirect()->to(url('/'));
        }
        // $sidebar = '';
        // $message = '';
        $course = Course::where('key', $request->key)->first();
        // if ($course) {

        //     $CompanyOrganizer = CompanyOrganizer::where('course_id', $course->id)->first();
        //     if ($CompanyOrganizer) {
        //         $emailTemplate = getEmailTemplatesByID(9);

        //         if ($emailTemplate) {
        //             $paramArr['contact_name'] = ucwords($CompanyOrganizer->first_name . " " . $CompanyOrganizer->last_name);
        //             $sidebar = replaceHTMLBodyWithParam($emailTemplate['template'], $paramArr);
        //         }

        //         $messgeTemplate = getEmailTemplatesByID(12);
        //         if ($messgeTemplate) {
        //             $message  = replaceHTMLBodyWithParam($messgeTemplate['template'], $paramArr);

        //         }

        //     }

        // }





        $this->courseAttendeeRepository->create($request->all());

        // return view('courseattendees.success', ['sidebar' => $sidebar, 'message' => $message]);
        return redirect()->route('course-attendee-thankyou', $course->id);
    }



    public function editattendees(Course $courseAttendees)
    {

        $courseAttendeesList = CourseAttendees::where('course_id', $courseAttendees->id)->get();

        return view('course.editattendees', ['model' => $courseAttendees, 'id' => $courseAttendees->id, 'courseAttendeesList' => $courseAttendeesList]);
    }



    public function update(Request $request, Course $courseAttendees)
    {
        $this->courseAttendeeRepository->update($request->all(), $courseAttendees);

        return redirect()->route('course.index')->with('success', "Attendees updated successfully!");
    }



    public function exportAttendees($attendee_id)

    {

        $courseAttendeesList = CourseAttendees::where('id', $attendee_id)->first();

        $pdf_file = $attendee_id . "_report.pdf";

        if (!Storage::disk('pdf')->exists($pdf_file)) {

            if ($courseAttendeesList->courses->count() > 0) {

                if ($courseAttendeesList->courses[0]->coursecategoryname->course_name == "Influencing Questions") {

                    $fileNamePDF = "SRS Influencing Report - " . $courseAttendeesList->courses[0]->clientname->company_name . ' - ' . str_replace("-", ".", $courseAttendeesList->courses[0]->start_date) . ' - ' . ucwords($courseAttendeesList->first_name . " " . $courseAttendeesList->last_name) . '.pdf';

                    $myContent = view('pdf.report', ['courseAttendeesList' => $courseAttendeesList, 'fileNamePDF' => $fileNamePDF]);



                    if ($myContent != "") {

                        try {

                            $options = new Options();

                            $options->set('isRemoteEnabled', true);

                            $options->set('defaultFont', 'calibri');

                            $options->setIsFontSubsettingEnabled(true);

                            $dompdf = new Dompdf($options);

                            $dompdf->loadHtml($myContent);

                            $dompdf->setPaper('Legal', 'portrait');

                            $dompdf->render();

                            $dompdf->stream("SRS Influencing Report - " . $courseAttendeesList->courses[0]->clientname->company_name . ' - ' . str_replace("-", ".", $courseAttendeesList->courses[0]->start_date) . ' - ' . ucwords($courseAttendeesList->first_name . " " . $courseAttendeesList->last_name) . '.pdf', array("Attachment" => false));

                            exit;
                        } catch (Exception $e) {

                            print_r($e->getMesssage());

                            exit;
                        }
                    }
                }
            }
        }
    }



    public function trainerReport($course_id)

    {

        $trainer_emails = [];

        $trainers = "";

        $course_organisor = "";

        $course_organisor_email = "";

        $Course = Course::find($course_id);



        if ($Course->trainerDetail) {

            foreach ($Course->trainerDetail as $key => $value) {

                $trainer_emails[] = $value->email;

                $trainers .= $value->first_name . ' ' . $value->last_name . '<br>';
            }
        }

        $course_organisor = ucwords($Course->clientname->clientdetails->first_name . " " . $Course->clientname->clientdetails->last_name);

        $course_organisor_email = $Course->clientname->clientdetails->email;

        $atteendeeTable = '<table border="1" cellspacing="0" cellpadding="5" style="border-collapse:collapse; width: 100%;"><tr><th width="301" valign="top" style="background-color:#17365D;color:white;"><p>Attendee Name</p></th><th width="247" valign="top" style="background-color:#17365D;color:white;"><p>eMail Address</p></th></tr><tbody>';

        $atteendeeDetailTable = '<table border="1" cellspacing="0" cellpadding="5" style="border-collapse:collapse; width: 100%;">

						  <tr>

							<th width="152" valign="top" style="background-color:#17365D;color:white;"><p>Attendee Name</p></th>

							<th width="127" valign="top" style="background-color:#17365D;color:white;"><p align="center">Own Questionnaire Completed</p></th>

							<th width="112" valign="top" style="background-color:#17365D;color:white;"><p>Number of 360 Degree Invites Sent</p></th>

							<th width="92" valign="top" style="background-color:#17365D;color:white;"><p>Number of 360 Degree Forms Completed</p></th>

							<th width="66" valign="top" style="background-color:#17365D;color:white;"><p>Download</p></th>

						  </tr>';

        if ($Course->attendees) {



            foreach ($Course->attendees as $key => $value) {

                $name  = $value->first_name . ' ' . $value->last_name;

                $questionnaire_filled = "NO";

                $reportLink = "";

                if ($value->questionnaireself) {

                    $questionnaire_filled = "YES - " . date('d/m/Y h:i:s', strtotime($value->questionnaireself->created_at));

                    $reportLink = '<a style="color:#000066" target="_blank"  href="' . route('export-attendees', $value->id) . '"><b>Click Here</b></a>';
                }

                $atteendeeTable .= '<tr> <td width="301" valign="top" style="background-color:#8DB3E2"><p>' . ucwords($name) . '</p></td><td width="247" valign="top" style="background-color:#DBE5F1"><p>' . $value->email . '</p></td></tr>';

                $atteendeeDetailTable .= '<tr>

								<td valign="top" style="background-color:#8DB3E2"><p>' . ucwords($name) . '</p></td>

								<td valign="top" style="background-color:#DBE5F1"><p>' . $questionnaire_filled . '</p></td>

								<td valign="top" style="background-color:#DBE5F1"><p align="center">' . $value->referraluser->count() . '</p></td>

								<td valign="top" style="background-color:#DBE5F1"><p align="center">' . $value->questionnaireref->count() . '</p></td>

								<td valign="top" style="background-color:#DBE5F1"><p align="center">' . $reportLink . '</p></td>

							  </tr>';
            }
        }

        $atteendeeTable .= "</tbody></table>";

        $atteendeeDetailTable .= "</tbody></table>";

        if ($Course->trainerDetail) {

            foreach ($Course->trainerDetail as $key => $value) {

                $emailArr = [];

                $emailArr['trainer_name'] = ucwords($value->first_name . " " . $value->last_name);

                $emailArr['company_name'] = $Course->clientname->company_name;

                $emailArr['course_date'] = date('d/m/Y', strtotime($Course->start_date));

                $emailArr['course_name'] = $Course->coursecategoryname->course_name;

                $emailArr['trainer_names'] = $trainers;

                $emailArr['company_organiser_attendees_name'] = $course_organisor;

                $emailArr['company_address'] = $Course->clientname->address_one . ' <br> ' . $Course->clientname->address_tow . ' <br> ' . $Course->clientname->town . ' <br> ' . $Course->clientname->country . ' <br> Post Code - ' . $Course->clientname->post_code;

                $emailArr['company_organiser_attendees_email'] = $course_organisor_email;

                $emailArr['course_end_date'] = date('d/m/Y', strtotime($Course->end_date));

                $emailArr['attendees_list'] = $atteendeeTable;

                $emailArr['attendees_fill_list'] = $atteendeeDetailTable;

                $emailTemplate = getEmailTemplatesByID(19);

                if ($emailTemplate) {

                    $data = [];

                    $data['emailBody'] = replaceHTMLBodyWithParam($emailTemplate['template'], $emailArr);

                    $data['emailSubject'] = replaceHTMLBodyWithParam($emailTemplate['subject'], array('company_name' => $emailArr['company_name'], 'course_name' => $emailArr['course_name'], 'course_date' => dateFormat($Course->start_date)));

                    $data['emailHeaderFooter'] = getEmailTemplatesHeaderFooter();

                    Mail::to($value->email)->send(new CourseTrainerMailReport($data));
                }
            }
        }

        return redirect()->back()->with('success', 'Report Summary has been Sent to Trainers');
    }



    public function chaseEmailAttendees($id)

    {

        $CourseAttendees = CourseAttendees::find($id);

        if ($CourseAttendees) {

            $Course = Course::find($CourseAttendees->course_id);

            if ($Course) {

                $TrainerDetail = TrainerDetail::where('course_id', $CourseAttendees->course_id)->get();

                $trainerDetailName = '';

                if ($TrainerDetail) {

                    foreach ($TrainerDetail as $key => $value) {

                        $trainerDetailName .= ucwords($value->first_name . " " . $value->last_name) . " <br>";
                    }
                }

                $trainerDetailName = trim($trainerDetailName, ', ');

                $paramArr = [];

                $paramArr['site_url'] = URL::to('/');

                $paramArr['attendee_name'] = $CourseAttendees->first_name . ' ' . $CourseAttendees->last_name;

                $paramArr['course_date'] = dateFormat($Course->start_date);

                $paramArr['questionnaire_end_date'] = dateFormat($Course->end_date);

                $paramArr['trainer_list'] = $trainerDetailName;

                $paramArr['link'] = URL::to('/feedback-contacte/' . $Course->key . '/' . $id);

                Mail::to($CourseAttendees->email)->send(new ChaseAttendeesMail($paramArr));

                return redirect()->route('course.show', $CourseAttendees->course_id)->with('success', "Chase Email has been sent Successfully");
            } else {

                return redirect()->back()->with('error', 'Chase Email has been sent Failed!');
            }
        }

        return redirect()->back()->with('error', 'Chase Email has been sent Failed!');
    }
    public function courseattendeethankyou($id)
    {
        $CompanyOrganizer = CompanyOrganizer::where('course_id', $id)->first();
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
        return view('courseattendees.success', ['sidebar' => $sidebar, 'message' => $message]);
    }

    public function deleteAttendees(Request $request)
    {

        if (strlen($request->id) > 0) {
            $courseAttendees = CourseAttendees::find($request->id);
            $this->courseAttendeeRepository->deleteAttendees($courseAttendees);
            return response()->json([
                'status' => true,
                'message' => ''
            ]);
        }
        return response()->json([
            'status' => false
        ]);
    }
}
