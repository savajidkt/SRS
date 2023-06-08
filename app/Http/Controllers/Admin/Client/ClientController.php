<?php

namespace App\Http\Controllers\Admin\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\Client\CreateRequest;
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
                ->editColumn('status', function (Client $client) {
                    return $client->status;
                })
                // ->editColumn('type', function (Question $question) {
                //     return $question->type_name;
                // })
                // ->filterColumn('first_name', function ($query, $keyword) {
                //     $query->orWhere('first_name', 'like', '%'.$keyword.'%');
                // })
                // ->filterColumn('last_name', function ($query, $keyword) {
                //     $query->orWhere('last_name', 'like', '%'.$keyword.'%');
                // })
                // ->filterColumn('user_status', function ($query, $keyword) {
                //     $status = strtolower($keyword) =='active'? 1 : 0;
                //     return $query->orWhere('user_status', $status);
                // })
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
        return view('client.create');
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
}
