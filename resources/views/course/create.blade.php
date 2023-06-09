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
            <div class="row page-titles mx-0">
                
                    <div>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Course Management</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Add Clients</a></li>
                    </ol>
                </div>
            </div>
            <!-- row -->
            <div class="row">
                <div class="col-xl-12 col-xxl-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Please Enter Course Details</h4>
                        </div>
                        <div class="card-body">
                        <form class="invoice-repeater step-form-horizontal" id="client" action="{{ route('course.store') }}" method="post"
                            enctype="multipart/form-data" id="step-form-horizontal" >

                            
                                @csrf
                                @include('course.form')
                                <div id="newRow"></div>
                                <button type="submit" class="btn btn-primary">Next</button>
                                <button type="submit" class="btn btn-primary">Cancel</button>
                                <button class="btn btn-primary" type="button" data-repeater-create>
                                Add Another Trainer
                                                </button>
                                <!-- <button class="btn btn-primary" type="button" >Add Another Trainer</button> -->
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
@endsection
