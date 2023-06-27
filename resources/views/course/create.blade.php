@extends('layouts.app')
@section('page_title', 'SRS')
@section('content')
    <style>
        .filedrequired,
        .help-block-error {
            color: #FF1616
        }
        .hide{ display: none;}
    </style>
    <!--**********************************
                Content body start
            ***********************************-->

    <div class="container-fluid">
        <div class="row page-titles mx-0">

            <div>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Course Management</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Add Course</a></li>
                </ol>
            </div>
        </div>
        <!-- row -->
        <div class="row">
            <div class="col-xl-12 col-xxl-12">

                <form class="invoice-repeater step-form-horizontal" id="course" action="{{ route('course.store') }}"
                    method="post" enctype="multipart/form-data" id="step-form-horizontal">
                    @csrf


                    <div class="card step_1">
                        <div class="card-header">
                            <h4 class="card-title">Please Enter Course Details</h4>
                        </div>
                        <div class="card-body">
                            @include('course.form')
                            <div id="newRow"></div>
                            <button type="submit" class="btn btn-primary">Next</button>
                            <a href="{{ route('course.index') }}" class="btn btn-primary">Cancel</a>
                            <button class="btn btn-primary" type="button" data-repeater-create>Add Another Trainer</button>
                        </div>
                    </div>

                    <div class="card step_2 hide">
                        <div class="card-header">
                            <h4 class="card-title">COURSE DETAILS</h4>
                        </div>
                        <div class="card-body add_course_form_content">
                            <div>
                                <hr>
                                <h4>COMPANY ORGANIZER DETAILS</h4>
                                <hr>
                                <section>
                                    <div class="row">
                                        <div class="col-lg-12 mb-4 form-style add_course_step_2_col">
                                            <div class="form-group train-deet add_course_form">
                                                <label class="text-label">First Name*</label>
                                                <input type="text" name="org_first_name" class="form-control" placeholder=""
                                                    >
                                            </div>


                                            <div class="form-group train-deet add_course_form">
                                                <label class="text-label">Surname*</label>
                                                <input type="text" name="org_last_name" class="form-control" placeholder=""
                                                    >
                                            </div>



                                            <div class="form-group train-deet add_course_form">
                                                <label class="text-label">Email Address*</label>
                                                <div class="input-group">
                                                   
                                                    <input type="email" name="org_email" class="form-control"
                                                        id="inputGroupPrepend2" aria-describedby="inputGroupPrepend2"
                                                        placeholder="" >
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </section>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                                    <a href="{{ route('course.index') }}" class="btn btn-primary">Cancel</a>
                        </div>
                    </div>


                </form>
            </div>
        </div>
    </div>

    <!--**********************************
                Content body end
            ***********************************-->
@endsection
@section('extra-script')
    <script src="{{ asset('js/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('js/form/course.js') }}"></script>
    <script src="{{ asset('js/form/course/jquery.repeater.min.js') }}"></script>
    <script src="{{ asset('js/form/course/form-repeater.js') }}"></script>
    <script>
        $('.select2').select2();
    </script>
    <script>
        function Func_a(e) {

            // alert();
            // Get the specific date
            
            var specificDate = new Date($(e).val());

            // Subtract one day from the specific date
            var yesterday = new Date(specificDate);
            yesterday.setDate(specificDate.getDate() - 1);

            // Format the yesterday's date
            var formattedDate = yesterday.toISOString().split('T')[0];

            // Output the formatted date
            $('#end_date').val(formattedDate);
            // console.log(formattedDate);
        }
        
    </script>
@endsection
