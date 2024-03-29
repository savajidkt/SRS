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

        .card.card-question-ab {
    margin-bottom: 0rem;
}

    </style>



    
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

                    <li class="breadcrumb-item"><a href="{{ route('trainer-report', $modal->id) }}"><button type="button"

                                class="btn btn-dark send-report-btn-a">Send Report to Trainer(s)</button>

                        </a></li>

                </ol>

            </div>

        </div>

        <div class="col-xl-12 col-xxl-12">

            <div class="card">

                <div class="card-header-a card-header">

                    <span class="pull-left">Start Date :

                        {{ $modal->start_date }}</span>

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

                                        Email Address :</span>
                                    {{ isset($trainerDetail->email) ? $trainerDetail->email : '' }}

                            </p>

                        </div>

                    @endforeach

                </div>

            @endif





            @if ($modal->attendees->count() > 0)



                @foreach ($modal->attendees as $key => $attendees)

                   

                        @php

                            $isBackGroud = getBackgroudColorByStatus($attendees);

                        @endphp
                        <div class="card">
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



                            @if (enableReportButton($attendees))
                                    <a href="{{ route('export-attendees', $attendees->id) }}" target="_blank"
                                        class="btn btn-primary">View

                                    Report</a>

                            @elseif (!$attendees->questionnaireself)

                                <a href="{{ route('chase-email-attendees', $attendees->id) }}"

                                    class="card-link btn btn-primary">Send Chase Email</a>

                            @endif

                        </div>



                            <div class="card text-center ">

                                <div
                                    class="card-header-a card-header {{ $isBackGroud ? 'bg-details' : '' }} card-text-middle">

                                360 CONTACT

                            </div>

                        </div>



                        @if ($attendees->referraluser->count() > 0)

                            <div class="row view-course-row-a">

                                @foreach ($attendees->referraluser as $key => $referraluser)

                                    <div class="col-md-4 card-block-info-con card-block-col-view">

                                        <div class="card view-card-customise">



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
                                                    @if (!$referraluser->referralusers)
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
                    <div class="row card-text-middle" style="color: #454545;padding: 20px 0px;">
                        No 360 CONTACT available
                    </div>
                @endif
            </div>
        @endforeach

        @endif

    </div>

    </div>
    </div>
@endsection

@section('extra-script')

   
    <script src="{{ asset('js/quixnav-init.js') }}"></script>

    <script src="{{ asset('js/custom.min.js') }}"></script>
@endsection