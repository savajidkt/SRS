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
                        <h4>{{$model->company_name}}</h4>
                    </div>
                </div>
                <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                    <ol class="breadcrumb breadcrumb-a">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Location : {{$model->town}}</a></li>
                    <!-- <li class="breadcrumb-item active"><a href="javascript:void(0)">Herts</a></li> -->
                    </ol>
                </div>
            </div>


            <div class="col-xl-12 col-xxl-12">

                <div class="card">
                    <div class="card-header-a card-header">
                        Address
                    </div>
                    <div class="card-body card-body-ab">
                        <h5 class="card-title card-title-ab">{{$model->address_one}},{{$model->address_tow}}</h5>
                        <p class="card-text-a">
                        <span class="card-title card-title-ab">
                            Post Code : {{$model->post_code}}</span></p>
                    </div>
                    </div>

                    <div class="card">
                    <div class="card-header-a card-header">
                        Contacts
                    </div>
                    @foreach ($model->contacts as $key=> $contact )
                        <div class="card-body">
                            <p class="card-text card-text-a"><span class="card-title card-title-ab">{{$contact->first_name . ' '}}{{$contact->last_name}}</span></p>
                            <p class="card-text card-text-a"><span class="card-title card-title-ab">Job Title :</span> {{$contact->job_title}}</p>
                            <p class="card-text card-text-a"><span class="card-title card-title-ab">Phone Number :</span> {{$contact->phone_number}}</p>
                            <p class="card-text card-text-a"><span class="card-title card-title-ab">Mobile Number : </span> {{$contact->mobile_number}}</p>
                            <p class="card-text card-text-a"><span class="card-title card-title-ab">Email Address : </span>{{$contact->email}}</p>
                        </div>
                        
                    @endforeach
                    
                    </div>

                    <div class="card">
                    <div class="card-header-a card-header">
                        Notes
                    </div>
                    <div class="card-body">
                        <p class="card-text card-text-a">{{$model->notes}}</p>
                    </div>
                    
                    </div>

                
            </div>

            <!-- row -->
        </div>

    <!--**********************************
            Content body end
        ***********************************-->
@endsection