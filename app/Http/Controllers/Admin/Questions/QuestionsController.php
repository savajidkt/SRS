<?php

namespace App\Http\Controllers\Admin\Questions;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Questions\EditRequest;
use App\Models\Questions;
use App\Repositories\QuestionsRepository;
use Yajra\DataTables\Facades\DataTables;

class QuestionsController extends Controller
{
    protected $questionsRepository;

    public function __construct(QuestionsRepository $questionsRepository)
    {
        $this->questionsRepository = $questionsRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        if ($request->ajax()) {

            $data = Questions::select('*');
            $data->orderBy($request->order[0]['column'], $request->order[0]['dir']);
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('question', function (Questions $question) {
                    return $question->question;
                })
                ->addColumn('action', function ($row) {
                    return $row->action;
                })
                ->filter(function ($query) use($request) {
                    if (!empty($request->customFilter)) {
                        $query->where('category_id',$request->customFilter);
                    }
                }, true)
                ->rawColumns(['action'])->make(true);
        }

        return view('questions.index');
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
     * @param \App\Models\Questions $questions [explicite description]
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function edit(Questions $question)
    {
        return view('questions.edit', ['model' => $question]);
    }

    /**
     * Method update
     *
     * @param \App\Http\Requests\Questions\EditRequest $request
     * @param \App\Models\Questions $client
     *
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function update(EditRequest $request, Questions $question)
    {
        $this->questionsRepository->update($request->all(), $question);

        return redirect()->back()->with('success', "Questions updated successfully!");
    }

}
