<?php

namespace App\Http\Controllers\Admin\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\Client\CreateRequest;
use App\Http\Requests\Client\EditRequest;
use Illuminate\Http\Request;
use App\Models\Client;
use App\Repositories\ClientRepository;
use Yajra\DataTables\Facades\DataTables;

class ClientController extends Controller
{
    protected $clientRepository;

    public function __construct(ClientRepository $clientRepository)
    {
        $this->clientRepository = $clientRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {

            $data = Client::select('*');
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('company_name', function (Client $client) {
                    return $client->company_name;
                })
                ->addColumn('post_code', function (Client $client) {
                    return $client->post_code;
                })
                ->addColumn('action', function ($row) {
                    return $row->action;
                })->rawColumns(['action'])->make(true);
        }

        return view('client.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function create()
    {
        $rawData = new Client;
        return view('client.create',['model' => $rawData]);
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
        $this->clientRepository->create($request->all());
        return redirect()->route('client.index')->with('success', "Client created successfully!");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function show(Question $question)
    // {
    //     //
    //     $question->loadMissing('options');
    //     return view('admin.survey-question.view', ['model' => $question]);
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Question $usquestioner [explicite description]
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function edit(Client $client)
    {
        // dd($client);
        $client->loadMissing('contacts');
        return view('client.edit', ['model' => $client]);
    }

    /**
     * Method update
     *
     * @param \App\Http\Requests\Client\EditRequest $request
     * @param \App\Models\Client $client
     *
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function update(EditRequest $request, Client $client)
    {
       
        $this->clientRepository->update($request->all(), $client);

        return redirect()->route('client.index')->with('success', "Client updated successfully!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        $this->clientRepository->delete($client);

        return redirect()->route('client.index')->with('success', "Client deleted successfully!");
    }
}
