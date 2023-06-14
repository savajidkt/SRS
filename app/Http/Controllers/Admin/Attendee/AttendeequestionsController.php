<?php

namespace App\Http\Controllers\Admin\Attendee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Attendee\EditRequest;
use App\Models\AttendeeQuestions;
use App\Repositories\AttendeequestionsRepository;
use Yajra\DataTables\Facades\DataTables;

class AttendeequestionsController extends Controller
{
    protected $attendeequestionsRepository;

    public function __construct(AttendeequestionsRepository $attendeequestionsRepository)
    {
        $this->attendeequestionsRepository = $attendeequestionsRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // dd('test');
        if ($request->ajax()) {

            $data = AttendeeQuestions::select('*');
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('question', function (AttendeeQuestions $attendeeQuestions) {
                    return $attendeeQuestions->question;
                })
                ->addColumn('action', function ($row) {
                    return $row->action;
                })->rawColumns(['action'])->make(true);
        }

        return view('attendeequestions.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    // public function create()
    // {
    //     $rawData = new Client;
    //     return view('client.create',['model' => $rawData]);
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    // public function store(CreateRequest $request)
    // {
    //     // dd($request);
    //     $this->clientRepository->create($request->all());
    //     return redirect()->route('client.index')->with('success', "Client created successfully!");
    // }

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
     * @param \App\Models\AttendeeQuestions $usquestioner [explicite description]
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function edit(AttendeeQuestions $attendee)
    {
        return view('attendeequestions.edit', ['model' => $attendee]);
    }

    /**
     * Method update
     *
     * @param \App\Http\Requests\Client\EditRequest $request
     * @param \App\Models\AttendeeQuestions $client
     *
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function update(EditRequest $request, AttendeeQuestions $attendee)
    {
    //    dd($request);
        $this->attendeequestionsRepository->update($request->all(), $attendee);

        return redirect()->route('attendee.index')->with('success', "Attendee updated successfully!");
    }

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
