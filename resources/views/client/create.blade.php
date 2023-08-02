@extends('layouts.app')
@section('page_title', 'SRS')
@section('content')
    <style>
        .filedrequired,
        .help-block-error {
            color: #FF1616;
            white-space: nowrap;
        }
    </style>
    <!--**********************************
                Content body start
            ***********************************-->

    <div class="container-fluid client-management-add-container">
        <div class="row page-titles mx-0">
            <!-- <div class="col-sm-6 p-md-0">
                        <div class="welcome-text">
                            <h4>Hi, welcome back!</h4>
                            <p class="mb-0">Sue Swindell</p>
                        </div>
                    </div> -->
            <!-- <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex"> -->
            <div>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Client Management</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Add Clients</a></li>
                </ol>
            </div>
        </div>
        <!-- row -->
        <div class="row">
            <div class="col-xl-12 col-xxl-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Please Enter Client Details</h4>
                    </div>
                    <div class="card-body">
                        <form class="invoice-repeater" id="client" action="{{ route('client.store') }}" method="post"
                            enctype="multipart/form-data" id="step-form-horizontal" class="step-form-horizontal">
                            @csrf
                            @include('client.form')
                            <div id="newRow"></div>
                            <div class="btn-client-edit">
                                <button type="submit" class="btn btn-primary">Save Changes</button>
                                <a href="{{ route('client.index') }}" class="btn btn-primary">Cancel</a>

                                <button class="btn btn-primary" type="button" data-repeater-create>
                                    <span>Add New Contact</span>
                                </button>
                            </div>


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
    <script src="{{ asset('js/form/client.js') }}"></script>
    <script src="{{ asset('js/form/jquery.repeater.min.js') }}"></script>
    <script src="{{ asset('js/form/form-repeater.js') }}"></script>
    <script>
        $('.select2').select2();
    </script>
@endsection
