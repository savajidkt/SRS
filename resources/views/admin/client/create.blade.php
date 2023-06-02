@extends('admin.layout.app')
@section('page_title','SRS')
@section('content')
<!--**********************************
    Content body start
***********************************-->

<div class="container-fluid">
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
                    <form action="{{route('client.store')}}" method="POST" id="step-form-horizontal" class="step-form-horizontal">
                        @csrf
                        @include('admin.client.form')
                            <button type="submit" class="btn btn-primary">Save Changes</button>
                            <button type="submit" class="btn btn-primary">Cancel</button>
                            <button type="submit" class="btn btn-primary">Add New Contact</button>
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
