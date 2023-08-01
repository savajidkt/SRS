@extends('layouts.app')
@section('page_title','Dashboard')
@section('content')
<!-- Dashboard Ecommerce Starts -->
<div id="survey-results" class="my-2"></div>
<div class="row  text-center mx-0">
  <div class="col-12 border-right py-1">    
    <h1 class="font-weight-bolder mb-0" id="completed">Welcome to SRS</h1>    
    <a href="{{ route('profile.edit',Auth::user()->id)}}" class="btn btn-primary mt-3">Back to Profile</a>
  </div>
</div>
@endsection
