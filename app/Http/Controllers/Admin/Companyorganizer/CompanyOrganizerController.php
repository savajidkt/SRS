<?php

namespace App\Http\Controllers\Admin\Companyorganizer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\CompanyorganizerRepository;
use App\Models\CompanyOrganizer;

class CompanyOrganizerController extends Controller
{
    protected $companyorganizerRepository;

    public function __construct(CompanyorganizerRepository $companyorganizerRepository)
    {
        $this->companyorganizerRepository = $companyorganizerRepository;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function create()
    {
        // $rawData = new CompanyOrganizer;
        return view('companyorganizer.create');
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
        $this->companyorganizerRepository->create($request->all());
        return redirect()->route('course.index')->with('success', "Company Organizer created successfully!");
    }
}
