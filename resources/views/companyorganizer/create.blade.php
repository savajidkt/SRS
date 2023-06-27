@extends('layouts.app')
@section('page_title', 'SRS')
@section('content')
<style>
    .filedrequired, .help-block-error{ color: #FF1616}
</style>
    <!--**********************************
            Content body start
        ***********************************-->
        <div class="container-fluid">
            <div class="row page-titles mx-0">
                
                    <div>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Course Management</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Add Courses</a></li>
                    </ol>
                </div>
            </div>
            <!-- row -->
            <div class="row">
                <div class="col-xl-12 col-xxl-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">COURSE DETAILS</h4>
                        </div>
                        <div class="card-body add_course_form_content">
                            <form action="{{ route('companyorganizer.store') }}" method="post" id="step-form-horizontal" class="step-form-horizontal">
                                @csrf
                                <div>
                                    <hr>
                                    <h4>COMPANY ORGANIZER DETAILS</h4>
                                   <hr>
                                    <section>
                                        <div class="row">
                                            <div class="col-lg-12 mb-4 form-style add_course_step_2_col">
                                                <div class="form-group train-deet add_course_form">
                                                    <label class="text-label">First Name*</label>
                                                    <input type="text" name="first_name"  class="form-control" placeholder="" required>
                                                </div>
                                            
                                            
                                                <div class="form-group train-deet add_course_form">
                                                    <label class="text-label">Surname*</label>
                                                    <input type="text" name="last_name" class="form-control" placeholder="" required>
                                                </div>
                                            
                                        
                                           
                                                <div class="form-group train-deet add_course_form">
                                                    <label class="text-label">Email Address*</label>
                                                    <div class="input-group">
                                                        <input type="hidden" name="course_id" value="1">
                                                        <input type="email" name="email" class="form-control" id="inputGroupPrepend2" aria-describedby="inputGroupPrepend2" placeholder="" required>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </section>

                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                                    <a href="{{ route('course.index') }}" class="btn btn-primary">Cancel</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <!--**********************************
            Content body end
        ***********************************-->
@endsection
@section('extra-script')
    <script src="{{ asset('js/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('js/form/companyorganizer/companyorganizer.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js" integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@endsection
