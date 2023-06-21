@extends('layouts.app')
@section('page_title','SRS')
@section('content')
<!--**********************************
    Content body start
***********************************-->
<div class="container-fluid">
    <div class="row page-titles mx-0">
        <!-- <div class="col-sm-6">
            <div class="welcome-text">
                <h4>Hi, welcome back!</h4>
                <span class="ml-1">Sue Swindell</span>
            </div>
            </div> -->
        <!-- <div class="col-sm-6 justify-content-sm-end mt-2 mt-sm-0 d-flex"> -->
        <div>
            <h3>EDIT QUESTION</h3>
        </div>
    </div>
    <form action="{{route('attendee.update',$model)}}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label attendee-question">Question</label>
            <textarea class="form-control" name="question" id="exampleFormControlTextarea1" rows="3" placeholder="I am able to tell others how I am feeling about a situation" required>{{(isset($model->question))?$model->question:''}}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        {{-- <button type="button" class="btn btn-primary">Cancel</button> --}}
        <a href="{{ route('attendee.index') }}" class="btn btn-primary">Cancel</a>
    </form>
    <!-- row -->
</div>


<!--**********************************
    Content body end
***********************************-->
@endsection
@section('extra-script')

<script src="{{asset('vendor/select2/js/select2.full.min.js')}}"></script>
<script src="{{asset('js/plugins-init/select2-init.js')}}"></script>
@endsection