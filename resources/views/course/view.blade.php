@extends('layouts.app')
@section('page_title', 'SRS')
@section('content')
    <style>
        .filedrequired,
        .help-block-error {
            color: #FF1616
        }

        .red-bg {
            background-color: #CF000F;
        }
    </style>

    <!--**********************************
                                                                                                                        Content body start
                                                                                                                    ***********************************-->

    <div class="container-fluid course-view-influencing-container">
        <div class="row row-a page-titles mx-0">
            <div class="col-sm-6 p-md-0-a">
                <div class="view-course-text-a">
                    <h4>{{ isset($modal->coursecategoryname->course_name) ? $modal->coursecategoryname->course_name : '' }}
                    </h4>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb breadcrumb-a">
                    <li class="breadcrumb-item"><a href="{{ route('trainer-report',$modal->id) }}"><button type="button"
                                class="btn btn-dark send-report-btn-a">Send Report to Trainer(s)</button>
                        </a></li>
                </ol>
            </div>
        </div>
        <div class="col-xl-12 col-xxl-12">
            <div class="card">
                <div class="card-header-a card-header">
                    <span class="pull-left">Start Date :
                        {{ isset($modal->start_date) ? dateFormat($modal->start_date, 'd/m/Y') : '' }}</span>
                    <span class="pull-right">Duration : {{ isset($modal->duration) ? $modal->duration : '' }}</span>
                </div>
            </div>

            @if ($modal->trainerDetail->count() > 0)
                <div class="card">
                    <div class="card-header-a card-header">
                        Trainers
                    </div>
                    @foreach ($modal->trainerDetail as $key => $trainerDetail)
                        <div class="card-body card-body-ab">
                            <h5 class="card-title card-title-ab">
                                {{ isset($trainerDetail->first_name) ? $trainerDetail->first_name . ' ' . $trainerDetail->last_name : '' }}
                            </h5>
                            <p class="card-text-a">
                                <span class="card-title card-title-ab">
                                    Email Address :</span> {{ isset($trainerDetail->email) ? $trainerDetail->email : '' }}
                            </p>
                        </div>
                    @endforeach
                </div>
            @endif


            @if ($modal->attendees->count() > 0)
                <div class="card course-view-customize">
                    @foreach ($modal->attendees as $key => $attendees)
                        @php
                            $isBackGroud = getBackgroudColorByStatus($attendees);
                        @endphp

                        <div class="card-header-a card-header {{ $isBackGroud ? 'bg-details' : '' }} ">Attendees :
                            {{ isset($attendees->first_name) ? $attendees->first_name . ' ' . $attendees->last_name : '' }}
                        </div>
                        <div class="card-body">
                            <p class="card-text-a">ATTENDEE NAME : <span
                                    class="card-title card-title-ab">{{ isset($attendees->first_name) ? $attendees->first_name . ' ' . $attendees->last_name : '' }}
                                </span></p>
                            <p class="card-text-a">EMAIL ID : <span class="card-title card-title-ab">
                                    {{ isset($attendees->email) ? $attendees->email : '' }} </span>
                            </p>
                            <p class="card-text-a">QUESTIONNAIRE FILLED : <span class="card-title card-title-ab">
                                    @if ($attendees->questionnaireself)
                                        Yes
                                    @else
                                        No
                                    @endif
                                </span>
                            </p>

                            @if ($attendees->questionnaireself)
                                <a href="{{ route('export-attendees',$attendees->id) }}" class="btn btn-primary">View Report</a>
                            @else
                                <a href="{{ route('chase-email-attendees', $attendees->id) }}"
                                    class="card-link btn btn-primary">Send Chase Email</a>
                            @endif
                        </div>

                        <div class="card text-center">
                            <div class="card-header-a card-header {{ $isBackGroud ? 'bg-details' : '' }} card-text-middle">
                                360 CONTACT
                            </div>
                        </div>


                        @if ($attendees->referraluser->count() > 0)
                            <div class="row">
                                @foreach ($attendees->referraluser as $key => $referraluser)
                                    <div class="col-md-4 card-block-info-con">
                                        <div class="card">
                                            @if ($referraluser->referralusers)
                                                <div class="card-block card-block-info">
                                                @else
                                                    <div class="card-block card-block-info form-not-filled">
                                            @endif

                                            <div class="card-block-content">
                                                <h4 class="card-title">
                                                    {{ isset($referraluser->first_name) ? $referraluser->first_name . ' ' . $referraluser->last_name : '' }}
                                                </h4>
                                                <h6 class="card-subtitle">
                                                    {{ isset($referraluser->email) ? $referraluser->email : '' }}</h6>
                                                <p class="card-text card-text-attendee p-y-1">QUESTIONNAIRE FILLED :
                                                    @if ($referraluser->referralusers)
                                                        Yes
                                                    @else
                                                        No
                                                    @endif
                                                </p>
                                                @if ($referraluser->referralusers)
                                                @else
                                                    <a href="{{ route('chase-email-feedback', $referraluser->id) }}"
                                                        class="card-link btn btn-primary">Send Chase Email</a>
                                                @endif

                                            </div>
                                        </div>
                                    </div>
                            </div>
                        @endforeach
                </div>
            @else
                <div class="card-body card-text-middle">
                    <p class="card-text card-text-a">No 360 CONTACT available</p>
                </div>
            @endif
            @endforeach
        </div>
        @endif
    </div>
    </div>
@endsection
@section('extra-script')
    <script src="{{ asset('vendor/global/global.min.js') }}"></script>
    <script src="{{ asset('js/quixnav-init.js') }}"></script>
    <script src="{{ asset('js/custom.min.js') }}"></script>
@endsection