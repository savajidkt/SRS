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
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Edit Course</a></li>
            </ol>
        </div>
    </div>
    <!-- row -->
    <div class="row">
        <div class="col-xl-12 col-xxl-12">
            <form class="invoice-repeater step-form-horizontal" id="course" action="{{route('course.update', $model)}}"
                method="post" enctype="multipart/form-data" id="step-form-horizontal">
                @csrf
                @method('PUT')
                <div class="card step_1">
                    <div class="card-header">
                        <h4 class="card-title">Please Enter Course Details</h4>
                    </div>
                    <div class="card-body">
                        @include('course.form')
                        <div id="newRow"></div>
                        <button type="submit" class="btn btn-primary">Next</button>
                        <a href="{{ route('course.index')}}" class="btn btn-primary">Cancel</a>
                        <button class="btn btn-primary" type="button" data-repeater-create>Add Another Trainer</button>
                    </div>
                </div>
                <div class="card step_2 hide">
                    <div class="card-header">
                        <h4 class="card-title">Course Details</h4>
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
                                                    value="{{ $companyOrganizer->first_name }}" onkeyup="this.value=this.value.replace(/[^A-z]/g,'');"/>
                                            </div>
                                        </div>
                                        <div class="form-group train-deet">
                                            <label class="itemcost email-customize">Surname<span class="filedrequired">*</span></label>
                                            <div class="input-error">
                                                <input type="text" class="form-control" name="org_last_name"
                                                    value="{{ $companyOrganizer->last_name }}" onkeyup="this.value=this.value.replace(/[^A-z]/g,'');" />
                                            </div>
                                        </div>
                                        <div class="form-group train-deet">
                                            <label class="itemcost email-customize">Email Address<span class="filedrequired">*</span></label>
                                            <div class="input-error">
                                                <input type="text" class="form-control" name="org_email"
                                                    value="{{ $companyOrganizer->email }}" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
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
<link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
<script type="text/javascript">

$( function() {
        $( "#start_date" ).datepicker({
            dateFormat: "dd/mm/yy",
            minDate: 0,
            autoclose: true,
            onSelect: function(selected) {
                var selectedDate = $("#start_date").datepicker("getDate");
            var dt = new Date(selectedDate);
             dt.setDate( dt.getDate() - 1 );

                console.log(dt);
                //$("#end_date").val(dt);
                $("#end_date").datepicker("option","maxDate", selected);
                $("#end_date").datepicker("setDate", dt);
            }
        });
        var selectedDate = $("#start_date").datepicker("getDate");
        console.log(selectedDate);
        $( "#end_date" ).datepicker({
            dateFormat: "dd/mm/yy",
            autoclose: true,
            maxDate:selectedDate
        });
        
        //$("#end_date").datepicker("option","maxDate", selectedDate);
    } );

    $(function() {
        var dtToday = new Date();
        var month = dtToday.getMonth() + 1;
        var day = dtToday.getDate();
        var year = dtToday.getFullYear();
        if (month < 10)
            month = '0' + month.toString();
        if (day < 10)
            day = '0' + day.toString();
        var maxDate = year + '-' + month + '-' + day;
        $('#start_date').attr('min', maxDate);


    });
</script>

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
    
        var inputDate = new Date($(e).val());
            var oneDayInMillis = 24 * 60 * 60 * 1000;
            var resultDate = new Date(inputDate.getTime() + oneDayInMillis);
            var resultDateStr = resultDate.toISOString().split('T')[0];
            console.log(resultDateStr);
            $('#end_date').attr('max', resultDateStr);
    
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