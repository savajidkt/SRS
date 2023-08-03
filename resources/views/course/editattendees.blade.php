@php
    
    $mycountphp = 1;
    
    if (count($courseAttendeesList) > 0) {
        $mycountphp = count($courseAttendeesList);
    }
    
@endphp

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



        @media only screen and (max-width: 525px) {

            .edit-attendees-container-fluid button.btn.btn-outline-danger {

                font-size: 12px !important;

            }

        }



        @media only screen and (max-width: 525px) and (min-width: 323px) {

            .btn.btn-primary {

                width: fit-content;

                font-size: 12px !important;

            }



        }





        @media only screen and (max-width: 390px) {

            .btn.btn-primary {

                width: fit-content;

                font-size: 11px !important;

                margin-bottom: 5px;

            }



            button.btn.btn-outline-danger {

                font-size: 11px !important;

            }

        }
    </style>

    <script>
        var myCount = {{ $mycountphp }};
    </script>

    <!--**********************************

                        Content body start

                    ***********************************-->



    {{-- <div class="container-fluid edit-attendees-container-fluid">

            <div class="row">

                <div class="col-xl-12 col-xxl-12">

                    <div class="card">

                        <div class="card-header">

                            <h4 class="card-title">Attendees</h4>

                        </div>

                        <div class="card-body add_course_form_content">

                            <form action="#" id="step-form-horizontal" class="step-form-horizontal">

                                <div>

                                    <hr>

                                    <h4>Attendee Details 1</h4>

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

        </div> --}}



    <div class="container-fluid  edit-attendees-container-fluid">

        <div class="row">

            <div class="col-xl-6 col-xxl-12">

                <div class="card">

                    <div class="card-header">

                        <h4 class="card-title">Attendees</h4>

                    </div>

                    <div class="card-body">

                        <hr>

                        <h4><strong>Attendee Details</strong></h4>

                        <hr>

                        {{-- <hr> --}}

                        <br />

                        <div class="basic-form">

                            <form class="attendees-repeater" action="{{ route('update-attendees', $model) }}" method="post"
                                enctype="multipart/form-data" id="attendees">

                                @csrf

                                {{-- <input type="hidden" value="{{ $id }}" name="key" > --}}

                                <div class="">

                                    @if (count($courseAttendeesList) > 0)

                                        <div data-repeater-list="attendees">

                                            @foreach ($courseAttendeesList as $key => $attendees)
                                                <input type="hidden" name="defualt_course_id"
                                                    value="{{ $attendees->course_id }}">

                                                <input type="hidden" name="defualt_organizer_id"
                                                    value="{{ $attendees->organizer_id }}">



                                                <div data-repeater-item>

                                                    <div class="form-row">

                                                        <div class="form-group col-md-6 form-gap-2">

                                                            <label>First Name</label>

                                                            <div class="input-error">

                                                                <input type="hidden" name="id"
                                                                    value="{{ $attendees->id }}">

                                                                <input type="hidden" name="course_id"
                                                                    value="{{ $attendees->course_id }}">

                                                                <input type="hidden" name="organizer_id"
                                                                    value="{{ $attendees->organizer_id }}">

                                                                <input type="text" name="first_name"
                                                                    value="{{ $attendees->first_name }}"
                                                                    class="form-control" placeholder="Sue"
                                                                    onkeyup="this.value=this.value.replace(/[^A-z]/g,'');"
                                                                    required>

                                                            </div>

                                                        </div>

                                                        <div class="form-group col-md-6 form-gap-2">

                                                            <label>Last Name</label>

                                                            <div class="input-error">

                                                                <input type="text" name="last_name"
                                                                    value="{{ $attendees->last_name }}" class="form-control"
                                                                    placeholder="Swindell"
                                                                    onkeyup="this.value=this.value.replace(/[^A-z]/g,'');"
                                                                    required>

                                                            </div>

                                                        </div>

                                                        <div class="form-group col-md-6 form-gap-2">

                                                            <label>Email Address</label>

                                                            <div class="input-error">

                                                                <input type="email" name="email"
                                                                    value="{{ $attendees->email }}" class="form-control"
                                                                    placeholder="sue.swindell@srs-development.co.uk"
                                                                    required>

                                                            </div>

                                                        </div>

                                                        <div class="form-group col-md-6 form-gap-2">

                                                            <label class="text-label attendee_job_title_cls"
                                                                id="attendee_job_title_0" data-c-id="0"
                                                                attendee-job-title="attendee_job_title">Your Job
                                                                Title</label>

                                                            <div class="input-error">

                                                                <select class="form-select form-select-sm my-select2"
                                                                    name="job_title" aria-label=".form-select-sm example"
                                                                    id="my_contact_data_0"
                                                                    my-contacts-data="my_contact_data">

                                                                    <option value="" selected disabled>Select Job
                                                                        Title</option>

                                                                    <option value="1"
                                                                        {{ isset($attendees->job_title) && $attendees->job_title == '1' ? 'selected' : '' }}>
                                                                        Director</option>

                                                                    <option value="2"
                                                                        {{ isset($attendees->job_title) && $attendees->job_title == '2' ? 'selected' : '' }}>
                                                                        Department Head</option>

                                                                    <option value="3"
                                                                        {{ isset($attendees->job_title) && $attendees->job_title == '3' ? 'selected' : '' }}>
                                                                        Manager</option>

                                                                    <option value="4"
                                                                        {{ isset($attendees->job_title) && $attendees->job_title == '4' ? 'selected' : '' }}>
                                                                        Project Manager / Specialist</option>

                                                                    <option value="5"
                                                                        {{ isset($attendees->job_title) && $attendees->job_title == '5' ? 'selected' : '' }}>
                                                                        Team Member</option>

                                                                </select>

                                                            </div>

                                                        </div>

                                                        <div class="col-md-2 col-12 mb-50">

                                                            <div class="form-group">

                                                                <button class="btn btn-outline-danger text-nowrap px-1"
                                                                    data-repeater-delete data-delete="{{ $attendees->id }}"
                                                                    type="button">

                                                                    <i data-feather="x" class="mr-25"></i>

                                                                    <span>Delete</span>

                                                                </button>

                                                            </div>

                                                        </div>

                                                        {{-- <hr/> --}}

                                                    </div>

                                                    <hr />

                                                </div>
                                            @endforeach

                                        </div>
                                    @else
                                        <div data-repeater-list="attendees">
                                            <input type="hidden" name="defualt_course_id" value="{{ $model->id }}">
                                            <input type="hidden" name="defualt_organizer_id"
                                                value="{{ $model->companyorganizer->id }}">
                                            <div data-repeater-item>
                                                <div class="form-row">
                                                    <div class="form-group col-md-6 form-gap-2">
                                                        <label>First Name</label>
                                                        <div class="input-error">
                                                            <input type="hidden" name="id" value="">
                                                            <input type="hidden" name="course_id"
                                                                value="{{ $model->id }}">
                                                            <input type="hidden" name="organizer_id"
                                                                value="{{ $model->companyorganizer->id }}">

                                                            <input type="text" name="first_name" value=""
                                                                class="form-control" placeholder="Sue"
                                                                onkeyup="this.value=this.value.replace(/[^A-z]/g,'');"
                                                                required>
                                                        </div>
                                                    </div>

                                                    <div class="form-group col-md-6 form-gap-2">
                                                        <label>Last Name</label>
                                                        <div class="input-error">
                                                            <input type="text" name="last_name" value=""
                                                                class="form-control" placeholder="Swindell"
                                                                onkeyup="this.value=this.value.replace(/[^A-z]/g,'');"
                                                                required>

                                                        </div>

                                                    </div>

                                                    <div class="form-group col-md-6 form-gap-2">

                                                        <label>Email Address</label>

                                                        <div class="input-error">

                                                            <input type="email" name="email" value=""
                                                                class="form-control"
                                                                placeholder="sue.swindell@srs-development.co.uk" required>

                                                        </div>

                                                    </div>

                                                    <div class="form-group col-md-6 form-gap-2">

                                                        <label class="text-label attendee_job_title_cls"
                                                            id="attendee_job_title_0" data-c-id="0"
                                                            attendee-job-title="attendee_job_title">Your Job
                                                            Title</label>

                                                        <div class="input-error">

                                                            <select class="form-select form-select-sm my-select2"
                                                                name="job_title" aria-label=".form-select-sm example"
                                                                id="my_contact_data_0" my-contacts-data="my_contact_data">

                                                                <option value="" selected disabled>Select Job
                                                                    Title</option>

                                                                <option value="1">
                                                                    Director</option>

                                                                <option value="2">
                                                                    Department Head</option>

                                                                <option value="3">
                                                                    Manager</option>

                                                                <option value="4">
                                                                    Project Manager / Specialist</option>

                                                                <option value="5">
                                                                    Team Member</option>

                                                            </select>

                                                        </div>

                                                    </div>

                                                    <div class="col-md-2 col-12 mb-50">

                                                        <div class="form-group">

                                                            <button class="btn btn-outline-danger text-nowrap px-1"
                                                                data-repeater-delete type="button">

                                                                <i data-feather="x" class="mr-25"></i>

                                                                <span>Delete</span>

                                                            </button>

                                                        </div>

                                                    </div>

                                                    {{-- <hr/> --}}

                                                </div>

                                                <hr />

                                            </div>

                                        </div>
                                    @endif

                                </div>

                                <button type="submit" class="btn btn-primary">Send Instructions</button>

                                <a href="{{ route('course.index') }}" type="button" class="btn btn-primary">Cancel</a>

                                <button type="button" class="btn btn-primary" data-repeater-create>Add Another
                                    Attendee</button>

                            </form>

                        </div>

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

<script type="text/javascript">
    var moduleConfig = {
        deleteAttendee: "{!! route('delete-attendees') !!}"
    };
</script>
    <script src="{{ asset('js/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('js/form/editcourse/editcourse.js') }}"></script>
    <script src="{{ asset('js/form/editcourse/jquery.repeater.min.js') }}"></script>
    <script src="{{ asset('js/form/editcourse/form-repeater.js') }}"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            setTimeout(function() {
                var selects = $('body').find('.my-select2');
                $.each(selects, function(i, selectElement) {
                    $(selectElement).removeClass('select2-hidden-accessible').next(
                            '.select2-container')
                        .remove();
                    $(selectElement).removeAttr('data-select2-id tabindex aria-hidden');
                    initSelect2(selectElement);
                });
            }, 200);

            function initSelect2(selectElement) {
                $(selectElement).select2({
                    minimumResultsForSearch: Infinity
                });
            }
        }, false);
    </script>
    <script>
        function Func_a(e) {
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
