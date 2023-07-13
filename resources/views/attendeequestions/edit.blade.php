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
            <h3 class="edit-attendee-q">EDIT QUESTION</h3>
        </div>
    </div>
    <form action="{{route('attendee.update',$model)}}" method="POST">
        @csrf
        @method('PUT')
        
        
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label attendee-question">Question</label>
            <textarea class="form-control" name="question" id="exampleFormControlTextarea1" rows="3" placeholder="I am able to tell others how I am feeling about a situation" required>{{(isset($model->question))?$model->question:''}}</textarea>
        </div>

        <div class="col-md-6 edit-question-category-at">
            <div class="form-group form-group-category">
                <label class="text-label text-label-category">Category<span class="filedrequired text-error"> *</span></label>
                <div class="input-error">
                    <select class="form-select form-select-sm" aria-label=".form-select-sm example" id="category_id" name="category_id" >
                        <option value="1" {{ isset($model->category_id) && $model->category_id == 1 ? 'selected' : '' }}>Emotive</option>
                        <option value="2" {{ isset($model->category_id) && $model->category_id == 2 ? 'selected' : '' }}>Assertive</option>
                        <option value="3" {{ isset($model->category_id) && $model->category_id == 3 ? 'selected' : '' }}>Persuasive</option>
                        <option value="4" {{ isset($model->category_id) && $model->category_id == 4 ? 'selected' : '' }}>Listening</option>
                        <option value="5" {{ isset($model->category_id) && $model->category_id == 5 ? 'selected' : '' }}>Trusting</option>
                        <option value="6" {{ isset($model->category_id) && $model->category_id == 6 ? 'selected' : '' }}>Inspiring</option>
                        <option value="7" {{ isset($model->category_id) && $model->category_id == 7 ? 'selected' : '' }}>Knowing Self</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="btn-influencing-question">
        <button type="submit" class="btn btn-primary">Update</button>
        {{-- <button type="button" class="btn btn-primary">Cancel</button> --}}
        <a href="{{ route('attendee.index') }}" class="btn btn-primary">Cancel</a>
        </div>
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