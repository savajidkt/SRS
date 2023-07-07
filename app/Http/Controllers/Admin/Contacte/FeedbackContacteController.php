<?php

namespace App\Http\Controllers\Admin\Contacte;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FeedbackContacteController extends Controller
{
    public function index($id)
    {
       return view('contacte.create');
    }

    public function store(Request $request)
    {
        dd($request);
    }
}
