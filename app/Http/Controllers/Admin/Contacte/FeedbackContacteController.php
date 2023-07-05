<?php

namespace App\Http\Controllers\Admin\Contacte;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FeedbackContacteController extends Controller
{
    public function index()
    {
       return view('contacte.create');
    }
}
