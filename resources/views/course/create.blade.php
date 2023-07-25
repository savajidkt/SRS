@extends('layouts.app')
@section('page_title', 'SRS')
@section('content')
    <style>
        .filedrequired,
        .help-block-error {
            color: #FF1616
        }

        .hide {
            display: none;
        }

        @media screen and (max-width: 992px){
.add_course_step_2_col .email-customize{
white-space: nowrap !important;
}
.add_course_form_content .form-group {
    display: grid;
    grid-template-columns: 100% !important;
    justify-content: flex-start !important;
}
}

.add_course_step_2_col .email-customize{
white-space: nowrap !important;
}

.company-organizer-customise-section{
    margin-bottom:15px;
}

.course-company-edit-container{
    overflow-y:hidden !important;
}
    </style>
    <!--**********************************
                    Content body start
                ***********************************-->

    <div class="container-fluid course-company-edit-container">
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
                                <h4><strong>Company Organizer Details</strong></h4>
                                <hr>
                                <section class="company-organizer-customise-section">
                                    <div class="row">
                                        <div class="col-lg-12 mb-4 form-style add_course_step_2_col">
                                            

                                            <div class="form-group train-deet">
                                                <label class="itemcost email-customize">First Name<span class="filedrequired">*</span></label>
                                                <div class="input-error">
                                                    <input type="text" class="form-control" name="org_first_name"
                                                        value="" onkeyup="this.value=this.value.replace(/[^A-z]/g,'');"/>
                                                </div>
                                            </div>

                                            <div class="form-group train-deet">
                                                <label class="itemcost email-customize">Surname<span class="filedrequired">*</span></label>
                                                <div class="input-error">
                                                    <input type="text" class="form-control" name="org_last_name"
                                                        value="" onkeyup="this.value=this.value.replace(/[^A-z]/g,'');" />
                                                </div>
                                            </div>

                                            <div class="form-group train-deet">
                                                <label class="itemcost email-customize">Email Address<span class="filedrequired">*</span></label>
                                                <div class="input-error">
                                                    <input type="text" class="form-control" name="org_email"
                                                        value="" />
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

        $('#client_id').on('change', function() {
            var selected_option_value = $(this).find(":selected").val();
            if(selected_option_value == '')
            {
                $('#client_id-error').show();
            }else
            {
                $('#client_id-error').hide();
            }
        });

        $('#duration').on('change', function() {
            var selected_option_value = $(this).find(":selected").val();
            if(selected_option_value == '')
            {
                $('#duration-error').show();
            }
            else
            {
                $('#duration-error').hide();
            }
        });

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
