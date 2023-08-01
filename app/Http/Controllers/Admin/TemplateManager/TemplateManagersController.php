<?php



namespace App\Http\Controllers\Admin\TemplateManager;



use Illuminate\Http\Request;

use App\Models\EmailTemplate;

use App\Http\Controllers\Controller;

use Yajra\DataTables\Facades\DataTables;

use App\Repositories\TemplateManagerRepository;

use App\Http\Requests\EmailTemplate\EditRequest;

use App\Http\Requests\EmailTemplate\EditHelpRequest;

use App\Http\Requests\EmailTemplate\EditMessageRequest;

use App\Http\Requests\EmailTemplate\EditTemplateRequest;



class TemplateManagersController extends Controller

{



    protected $templateManagerRepository;

    public function __construct(TemplateManagerRepository $templateManagerRepository)

    {

        $this->templateManagerRepository       = $templateManagerRepository;

    }



    /**

     * Display a listing of the resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function index(Request $request)

    {

        if ($request->ajax()) {



            $data = EmailTemplate::select('*')->where('type', 'email');

            $data->orderBy($request->order[0]['column'], $request->order[0]['dir']);

            return DataTables::of($data)

                ->addIndexColumn()

                ->editColumn('template_name', function (EmailTemplate $emailTemplate) {

                    return $emailTemplate->template_name;

                })

                ->editColumn('course', function (EmailTemplate $emailTemplate) {

                    return $emailTemplate->course;

                })

                ->addColumn('action', function (EmailTemplate $emailTemplate) {

                    return $emailTemplate->action;

                })

                ->rawColumns(['action'])->make(true);

        }





        return view('template-managers.index', array('type' => 'email'));

    }





    /**

     * Show the form for editing the specified resource.

     *

     * @param \App\Models\EmailTemplate $emailTemplate [explicite description]

     *

     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory

     */

    public function edit(EmailTemplate $templatemanager)

    {



        return view('template-managers.edit', ['model' => $templatemanager]);

    }



    /**

     * Method update

     *

     * @param \App\Http\Requests\Admin\EditRequest $request

     * @param \App\Models\EmailTemplate $emailTemplate

     *

     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse

     */

    public function update(EditRequest $request, EmailTemplate $templatemanager)

    {



        $this->templateManagerRepository->update($request->all(), $templatemanager);

        return redirect()->route('templatemanager.index')->with('success', 'Email Template updated successfully!');

    }





    /**

     * Display a listing of the resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function help(Request $request)

    {

        if ($request->ajax()) {



            $data = EmailTemplate::select('*')->where('type', 'help');

            $data->orderBy($request->order[0]['column'], $request->order[0]['dir']);

            return DataTables::of($data)

                ->addIndexColumn()

                ->editColumn('name', function (EmailTemplate $emailTemplate) {

                    return $emailTemplate->name;

                })

                ->editColumn('course', function (EmailTemplate $emailTemplate) {

                    return $emailTemplate->course;

                })

                ->addColumn('action', function (EmailTemplate $emailTemplate) {

                    return $emailTemplate->action;

                })

                ->rawColumns(['action'])->make(true);

                

        }





        return view('template-managers.help', array('type' => 'help'));

    }



    /**

     * Show the form for editing the specified resource.

     *

     * @param \App\Models\EmailTemplate $emailTemplate [explicite description]

     *

     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory

     */

    public function editHelp(EmailTemplate $templatemanager)

    {

        return view('template-managers.edit-help', ['model' => $templatemanager]);

    }



    /**

     * Method update

     *

     * @param \App\Http\Requests\Admin\EditHelpRequest $request

     * @param \App\Models\EmailTemplate $emailTemplate

     *

     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse

     */

    public function updateHelp(EditHelpRequest $request, EmailTemplate $templatemanager)

    {

        $this->templateManagerRepository->updateHelp($request->all(), $templatemanager);

        return redirect()->route('templatemanager-help')->with('success', 'Email Template updated successfully!');

    }





    /**

     * Display a listing of the resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function common(Request $request)

    {

        if ($request->ajax()) {



            $data = EmailTemplate::select('*')->where('type', 'template');

            $data->orderBy($request->order[0]['column'], $request->order[0]['dir']);

            return DataTables::of($data)

                ->addIndexColumn()

                ->editColumn('name', function (EmailTemplate $emailTemplate) {

                    return $emailTemplate->name;

                })

                ->editColumn('course', function (EmailTemplate $emailTemplate) {

                    return $emailTemplate->course;

                })

                ->addColumn('action', function (EmailTemplate $emailTemplate) {

                    return $emailTemplate->action;

                })

                ->rawColumns(['action'])->make(true);

        }





        return view('template-managers.common', array('type' => 'template'));

    }



    public function editTemplate(EmailTemplate $templatemanager)

    {

        return view('template-managers.edit-template', ['model' => $templatemanager]);

    }





    public function updateTemplate(EditTemplateRequest $request, EmailTemplate $templatemanager)

    {

        $this->templateManagerRepository->updateTemplate($request->all(), $templatemanager);

        return redirect()->route('templatemanager-common')->with('success', 'Email Template updated successfully!');

    }





    /**

     * Display a listing of the resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function customize(Request $request)

    {

        if ($request->ajax()) {



            $data = EmailTemplate::select('*')->where('type', 'message');

            $data->orderBy($request->order[0]['column'], $request->order[0]['dir']);

            return DataTables::of($data)

                ->addIndexColumn()

                ->editColumn('name', function (EmailTemplate $emailTemplate) {

                    return $emailTemplate->name;

                })

                ->editColumn('course', function (EmailTemplate $emailTemplate) {

                    return $emailTemplate->course;

                })

                ->addColumn('action', function (EmailTemplate $emailTemplate) {

                    return $emailTemplate->action;

                })

                ->rawColumns(['action'])->make(true);

        }





        return view('template-managers.customize', array('type' => 'message'));

    }



    public function editMessage(EmailTemplate $templatemanager)

    {

        return view('template-managers.edit-message', ['model' => $templatemanager]);

    }





    public function updateMessage(EditMessageRequest $request, EmailTemplate $templatemanager)

    {

        $this->templateManagerRepository->updateMessage($request->all(), $templatemanager);

        return redirect()->route('templatemanager-customize')->with('success', 'Email Template updated successfully!');

    }

}