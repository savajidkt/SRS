@extends('layouts.app')
@section('page_title', 'SRS')
@section('content')
    <style>
        .filedrequired,
        .help-block-error {
            color: #FF1616
        }
    </style>
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
                 
                    <?php
                    
 if( $model->type == "email" ){
           ?>                 <li class="breadcrumb-item"><a href="javascript:void(0)">Template Manager</a></li>           
                            <li class="breadcrumb-item active"><a href="javascript:void(0)">Email Template Manager</a></li>
                            <?php
        } else if( $model->type == "help" ){
            ?>                            
                             <li class="breadcrumb-item"><a href="javascript:void(0)">Template Manager</a></li> 
                            <li class="breadcrumb-item active"><a href="javascript:void(0)">Help Template Manager</a></li>
                            <?php

        } else if( $model->type == "message" ){
            ?>                            
            ?>                 <li class="breadcrumb-item"><a href="javascript:void(0)">Template Manager</a></li> 
                            <li class="breadcrumb-item active"><a href="javascript:void(0)">Message Template Manager</a></li>
                            <?php
        } else if( $model->type == "template" ){
            ?>
                                            <li class="breadcrumb-item"><a href="javascript:void(0)">Template Manager</a></li> 
                            <li class="breadcrumb-item active"><a href="javascript:void(0)">Common Template Manager</a></li>
                            
                            <?php
        }

?>

                </ol>
            </div>
        </div>
        <!-- row -->
        <div class="row">
            <div class="col-xl-12 col-xxl-12">
                <div class="card">
                    <div class="card-header card-header-a">
                        UPDATE TEMPLATE
                    </div>
                    <div class="card-body">
                        <form id="templatemanager" action="{{ route('templatemanager.update', $model) }}" method="post"
                            enctype="multipart/form-data" id="step-form-horizontal" class="step-form-horizontal">
                            @csrf
                            @method('PUT')
                            @include('template-managers.form')
                            <div id="newRow"></div>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                            <?php
 if( $model->type == "email" ){
           ?>
                            <a href="{{ route('templatemanager.index') }}" class="btn btn-primary">Cancel</a>
                            <?php
        } else if( $model->type == "help" ){
            ?>
                            <a href="{{ route('templatemanager-help') }}" class="btn btn-primary">Cancel</a>
                            <?php

        } else if( $model->type == "message" ){
            ?>
                            <a href="{{ route('templatemanager-customize') }}" class="btn btn-primary">Cancel</a>
                            <?php
        } else if( $model->type == "template" ){
            ?>
                            <a href="{{ route('templatemanager-common') }}" class="btn btn-primary">Cancel</a>
                            <?php
        }

?>


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
    <script src="{{ asset('js/form/emailTemplate.js') }}"></script>
    <script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.ckeditor').ckeditor();
        });
    </script>
@endsection
