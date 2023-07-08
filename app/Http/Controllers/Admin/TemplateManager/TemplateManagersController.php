<?php

namespace App\Http\Controllers\Admin\TemplateManager;

use Illuminate\Http\Request;
use App\Models\EmailTemplate;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Requests\EmailTemplate\EditRequest;
use App\Repositories\TemplateManagerRepository;

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

            $data = EmailTemplate::select('*');

            return DataTables::of($data)
                ->addIndexColumn()
                ->editColumn('course', function (EmailTemplate $emailTemplate) {
                    return $emailTemplate->course;
                })
                ->editColumn('name', function (EmailTemplate $emailTemplate) {
                    return $emailTemplate->name;
                })               
                ->addColumn('action', function (EmailTemplate $emailTemplate) {
                    return $emailTemplate->action;
                })
                ->rawColumns(['action'])->make(true);
        }


        return view('template-managers.index');
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
}
