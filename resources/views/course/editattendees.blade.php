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
    </style>
    <!--**********************************
                    Content body start
                ***********************************-->

        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-12 col-xxl-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">ATTENDEES</h4>
                        </div>
                        <div class="card-body add_course_form_content">
                            <form action="#" id="step-form-horizontal" class="step-form-horizontal">
                                <div>
                                    <hr>
                                    <h4>ATTENDEE DETAILS 1</h4>
                                    <hr>
                                    <section>
                                        <div class="row">
                                            <div class="col-lg-12 mb-4 form-style add_course_step_2_col">
                                                <div class="form-group train-deet add_course_form">
                                                    <label class="text-label">First Name*</label>
                                                    <input type="text" name="firstName" class="form-control" placeholder="" required>
                                                </div>
                                            
                                            
                                                <div class="form-group train-deet add_course_form">
                                                    <label class="text-label">Surname*</label>
                                                    <input type="text" name="lastName" class="form-control" placeholder="" required>
                                                </div>
                                            
                                        
                                            
                                                <div class="form-group train-deet add_course_form">
                                                    <label class="text-label">Email Address*</label>
                                                    <div class="input-group">
                                                        <input type="email" class="form-control" id="inputGroupPrepend2" aria-describedby="inputGroupPrepend2" placeholder="" required>
                                                    </div>
                                                </div>

                                                <div class="form-group train-deet add_course_form edit_attendees_sel">
                                                    <label class="text-label">Your Job Title</label>
                                                        <select class="form-select form-select-sm" id="form-select-sm-attendee" aria-label=".form-select-sm example">
                                                            <option selected>Select Job Title</option>
                                                            <option value="1">Director</option>
                                                            <option value="2">Department Head</option>
                                                            <option value="3">Manager</option>
                                                            <option value="4">Project Manager/Specialist</option>
                                                            <option value="5">Team Member</option>
                                                            </select>
                                                </div>

                                            </div>
                                        </div>
                                    </section>

                                </div>
                                <a href="#" class="btn btn-primary">Send instructions</a>
                                    <a href="#" class="btn btn-primary">Cancel</a>
                                    <a href="#" class="btn btn-primary">Add Another Attendee</a>
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
