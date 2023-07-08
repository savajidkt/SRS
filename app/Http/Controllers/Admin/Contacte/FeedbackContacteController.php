<?php

namespace App\Http\Controllers\Admin\Contacte;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\FeedbackRepository;
use App\Http\Requests\Contact\CreateRequest;

class FeedbackContacteController extends Controller
{
    protected $feedbackRepository;

    public function __construct(FeedbackRepository $feedbackRepository)
    {
        $this->feedbackRepository = $feedbackRepository;
    }

    public function index($id)
    {
       return view('contacte.create',['id' => $id]);
    }

    public function store(Request $request)
    {
        $this->feedbackRepository->create($request->all());
        return redirect()->route('attendees-questionnaire')->with('success', "Course created successfully!");
    }

    public function attendeesquestion()
    {
        return view('contacte.attendeesquestion');
    }
}
