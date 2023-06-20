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
            <div class="row row-a page-titles mx-0">
                <div class="col-sm-6 p-md-0-a">
                    <div class="view-course-text-a">
                        <h4>Influencing Course</h4>
                    </div>
                </div>
                <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                    <ol class="breadcrumb breadcrumb-a">
                        <li class="breadcrumb-item"><a href="javascript:void(0)"><button type="button" class="btn btn-dark send-report-btn-a">Send Report to Trainer(s)</button>
                        </a></li>
                    </ol>
                </div>
            </div>

            <div class="col-xl-12 col-xxl-12">

                <div class="card">
                    <div class="card-header-a card-header">
                        Trainers
                    </div>
                    <div class="card-body card-body-ab">
                        <h5 class="card-title card-title-ab">Helen Fraser</h5>
                        <p class="card-text-a">
                        <span class="card-title card-title-ab">
                        Email Address :</span> t2@cda.group</p>
                    </div>
                    </div>

                    <div class="card">
                    <div class="card-header-a card-header bg-details">Attendees : Tyler Hewestone</div>
                    <div class="card-body">
                        <p class="card-text-a">ATTENDEE NAME : <span class="card-title card-title-ab">Tyler Hewestone </span></p>
                        <p class="card-text-a">EMAIL ID : <span class="card-title card-title-ab"> t4@Cda.group </span></p>
                        <p class="card-text-a">QUESTIONNAIRE FILLED : <span class="card-title card-title-ab">YES</span></p>
                        <a href="#" class="btn btn-primary">View Report</a>
                    </div>
                    <div class="card text-center">
                        <div class="card-header-a card-header bg-details card-text-middle">
                            360 CONTACT
                        </div>
                        </div>
                    <div class="row row-a">
                        <div class="col-sm-6">
                            <div class="card card-body-details">
                            <div class="card-body card-body-a bg-details">
                                <p>Shannon Timberlake</p>
                                <p>t6@cda.group</p>
                                <p>QUESTIONNAIRE FILLED : YES</p>
                            </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="card card-body-details">
                            <div class="card-body card-body-a bg-details">
                                <p>Daniel Grey</p>
                                <p>t7@cda.group</p>
                                <p>QUESTIONNAIRE FILLED : YES</p>
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>

                    <div class="card">
                    <div class="card-header-a card-header">
                        Attendees : Ben Smith
                    </div>
                    <div class="card-body">
                        <p class="card-text card-text-a">ATTENDEE NAME : <span class="card-title card-title-ab">Ben Smith</span></p>
                        <p class="card-text card-text-a">EMAIL ID : <span class="card-title card-title-ab"> t5@cda.group</span></p>
                        <p class="card-text card-text-a">QUESTIONNAIRE FILLED :<span class="card-title card-title-ab"> NO</span></p>
                        <a href="#" class="btn btn-primary">Send Chase Email</a>
                    </div>
                    <div class="card-header-a card-header card-text-middle">
                        360 CONTACT
                    </div>
                    <div class="card-body card-text-middle">
                        <p class="card-text card-text-a">No 360 CONTACT available</p>
                    </div>
                    </div>

                    <div class="card">
                    <div class="card-header-a card-header">
                        Attendees : Maneesh Jha
                    </div>
                    <div class="card-body">
                        <p class="card-text card-text-a">ATTENDEE NAME : <span class="card-title card-title-ab">Maneesh Jha</span></p>
                        <p class="card-text card-text-a">EMAIL ID : <span class="card-title card-title-ab">maneesh@cda.group</span></p>
                        <p class="card-text card-text-a">QUESTIONNAIRE FILLED :<span class="card-title card-title-ab"> NO</span></p>
                        <a href="#" class="btn btn-primary">Send Chase Email</a>
                    </div>
                    <div class="card-header-a card-header card-text-middle">
                        360 CONTACT
                    </div>
                    <div class="card-body">
                        <div class="col-sm-6 row-card">
                            <div class="card bg-details">
                                <div class="card-body">
                                <p>Manesh Jha</p>
                                <p>maneesh08.jha@gmail.com</p>
                                <p>QUESTIONNAIRE FILLED : YES</p>
                                </div>
                            </div>
                            </div>
                            
                    </div>
                    </div>

                
            </div>

            <!-- row -->
        </div>

    <!--**********************************
            Content body end
        ***********************************-->
@endsection
@section('extra-script')
    <script src="{{ asset('vendor/global/global.min.js') }}"></script>
    <script src="{{ asset('js/quixnav-init.js') }}"></script>
    <script src="{{ asset('js/custom.min.js') }}"></script>
@endsection