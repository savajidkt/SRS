@extends('layouts.app')
@section('page_title', 'SRS')
@section('content')

   
        <div class="container-fluid">
            <div class="row row-a page-titles mx-0">
                <div class="col-sm-6 p-md-0-a">
                    <div class="view-course-text-a">
                        <h4>Influencing Course</h4>
                    </div>
                </div>
                <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                    <ol class="breadcrumb breadcrumb-a">
                        <li class="breadcrumb-item"><a href="javascript:void(0)"><button type="button"
                                    class="btn btn-dark send-report-btn-a">Send Report to Trainer(s)</button>
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
                        <h5 class="card-title card-title-ab">Sue Swindell</h5>
                        <p class="card-text-a">
                            <span class="card-title card-title-ab">
                                Email Address :</span>sue.swindell@srs-development.co.uk
                        </p>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header-a card-header bg-details">Attendees : Kirsty Halmarack</div>
                    <div class="card-body">
                        <p class="card-text-a">ATTENDEE NAME : <span class="card-title card-title-ab">Kirsty
                                Halmarack</span></p>
                        <p class="card-text-a">EMAIL ID : <span class="card-title card-title-ab">
                                Kirsty.Halmarack@marks-and-spencer.com </span></p>
                        <p class="card-text-a">QUESTIONNAIRE FILLED : <span class="card-title card-title-ab">YES</span></p>
                        <a href="#" class="btn btn-primary">View Report</a>
                    </div>
                    <div class="card text-center">
                        <div class="card-header-a card-header bg-details card-text-middle">
                            360 CONTACT
                        </div>
                    </div>

                    <div class="row">

                        <div class="col-md-4 card-block-info-con">
                            <div class="card">
                                <div class="card-block card-block-info">
                                    <div class="card-block-content">
                                        <h4 class="card-title">Laura Barton</h4>
                                        <h6 class="card-subtitle">Laura.Barton@marks-and-spencer.com</h6>
                                        <p class="card-text card-text-attendee p-y-1">QUESTIONNAIRE FILLED : YES</p>
                                        <!-- <a href="#" class="card-link btn btn-primary">Send Chase Email</a> -->
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 card-block-info-con">
                            <div class="card">
                                <div class="card-block card-block-info">
                                    <div class="card-block-content">
                                        <h4 class="card-title">Juliette Cottam</h4>
                                        <h6 class="card-subtitle">Juliette.Cottam@marks-and-spencer.com</h6>
                                        <p class="card-text card-text-attendee p-y-1">QUESTIONNAIRE FILLED : YES</p>
                                        <!-- <a href="#" class="card-link btn btn-primary">Send Chase Email</a> -->
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 card-block-info-con">
                            <div class="card">
                                <div class="card-block card-block-info">
                                    <div class="card-block-content">
                                        <h4 class="card-title">Lucy Young</h4>
                                        <h6 class="card-subtitle">Lucy.Young@marks-and-spencer.com</h6>
                                        <p class="card-text card-text-attendee p-y-1">QUESTIONNAIRE FILLED : YES</p>
                                        <!-- <a href="#" class="card-link btn btn-primary">Send Chase Email</a> -->
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 card-block-info-con">
                            <div class="card">
                                <div class="card-block">
                                    <div class="card-block-content">
                                        <h4 class="card-title">Catherine Malyon</h4>
                                        <h6 class="card-subtitle">Catherine.x.Malyon@marks-and-spencer.com</h6>
                                        <p class="card-text card-text-attendee p-y-1">QUESTIONNAIRE FILLED : YES</p>
                                        <!-- <a href="#" class="card-link btn btn-primary">Send Chase Email</a> -->
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>


                <div class="card">
                        <div class="card-header-a card-header">Attendees : Kirsty Evans</div>
                        <div class="card-body">
                          <p class="card-text-a">ATTENDEE NAME : <span class="card-title card-title-ab">Kirsty Evans</span></p>
                          <p class="card-text-a">EMAIL ID : <span class="card-title card-title-ab"> Kirsty.Evans@marks-and-spencer.com</span></p>
                          <p class="card-text-a">QUESTIONNAIRE FILLED : <span class="card-title card-title-ab">YES</span></p>
                          <a href="#" class="btn btn-primary">View Report</a>
                        </div>
                        <div class="card text-center">
                            <div class="card-header-a card-header card-text-middle">
                                360 CONTACT
                            </div>
                          </div>

                          <div class="row">

                            <div class="col-md-4 card-block-info-con">
                                <div class="card">
                                  <div class="card-block card-block-info form-not-filled">
                                    <div class="card-block-content">
                                      <h4 class="card-title">Lucy McLaren</h4>
                                    <h6 class="card-subtitle">Lucy.McLaren@marks-and-spencer.com</h6>
                                    <p class="card-text card-text-attendee p-y-1">QUESTIONNAIRE FILLED : NO</p>
                                    <a href="#" class="card-link btn btn-primary">Send Chase Email</a>
                                    </div>
                                  </div>
                                </div>
                              </div>
    
                              <div class="col-md-4 card-block-info-con">
                                <div class="card card-block form-filled">
                                  <div class="card-block-info">
                                    <div class="card-block-content">
                                      <h4 class="card-title">Tara Ryan</h4>
                                    <h6 class="card-subtitle">Tara.Ryan@marks-and-spencer.com</h6>
                                    <p class="card-text card-text-attendee p-y-1">QUESTIONNAIRE FILLED : YES</p>
                                    <!-- <a href="#" class="card-link btn btn-primary">Send Chase Email</a> -->
                                    </div>
                                  </div>
                                </div>
                              </div>
    
                              <div class="col-md-4 card-block-info-con">
                                <div class="card">
                                  <div class="card-block card-block-info form-not-filled">
                                    <div class="card-block-content">
                                      <h4 class="card-title">Alice Duggan</h4>
                                    <h6 class="card-subtitle">Alice.Duggan@marks-and-spencer.com</h6>
                                    <p class="card-text card-text-attendee p-y-1">QUESTIONNAIRE FILLED : NO</p>
                                    <a href="#" class="card-link btn btn-primary">Send Chase Email</a>
                                    </div>
                                  </div>
                                </div>
                              </div>
    
                              <div class="col-md-4 card-block-info-con">
                                <div class="card card-block form-filled">
                                  <div class="card-block-info">
                                    <div class="card-block-content">
                                      <h4 class="card-title">Lucy McLaren</h4>
                                    <h6 class="card-subtitle">Lucy.McLaren@marks-and-spencer.com</h6>
                                    <p class="card-text card-text-attendee p-y-1">QUESTIONNAIRE FILLED : YES</p>
                                    <!-- <a href="#" class="card-link btn btn-primary">Send Chase Email</a> -->
                                    </div>
                                  </div>
                                </div>
                              </div>

                              <div class="col-md-4 card-block-info-con">
                                <div class="card card-block form-filled">
                                  <div class="card-block-info">
                                    <div class="card-block-content">
                                      <h4 class="card-title">Tara Ryan</h4>
                                    <h6 class="card-subtitle">Tara.Ryan@marks-and-spencer.com</h6>
                                    <p class="card-text card-text-attendee p-y-1">QUESTIONNAIRE FILLED : YES</p>
                                    <!-- <a href="#" class="card-link btn btn-primary">Send Chase Email</a> -->
                                    </div>
                                  </div>
                                </div>
                              </div>

                              <div class="col-md-4 card-block-info-con">
                                <div class="card">
                                  <div class="card-block card-block-info form-not-filled">
                                    <div class="card-block-content">
                                      <h4 class="card-title">Alice Duggan</h4>
                                    <h6 class="card-subtitle">Alice.Duggan@marks-and-spencer.com</h6>
                                    <p class="card-text card-text-attendee p-y-1">QUESTIONNAIRE FILLED : NO</p>
                                    <a href="#" class="card-link btn btn-primary">Send Chase Email</a>
                                    </div>
                                  </div>
                                </div>
                              </div>

                              <div class="col-md-4 card-block-info-con">
                                <div class="card">
                                  <div class="card-block card-block-info form-not-filled">
                                    <div class="card-block-content">
                                      <h4 class="card-title">Lauren Henry</h4>
                                    <h6 class="card-subtitle">lauren.henry@marks-and-spencer.com</h6>
                                    <p class="card-text card-text-attendee p-y-1">QUESTIONNAIRE FILLED : NO</p>
                                    <a href="#" class="card-link btn btn-primary">Send Chase Email</a>
                                    </div>
                                  </div>
                                </div>
                              </div>


                              <div class="col-md-4 card-block-info-con">
                                <div class="card">
                                  <div class="card-block card-block-info form-not-filled">
                                    <div class="card-block-content">
                                      <h4 class="card-title">Lizzie Wilcox</h4>
                                    <h6 class="card-subtitle">Elizabeth.wilcox@marks-and-spencer.com</h6>
                                    <p class="card-text card-text-attendee p-y-1">QUESTIONNAIRE FILLED : NO</p>
                                    <a href="#" class="card-link btn btn-primary">Send Chase Email</a>
                                    </div>
                                  </div>
                                </div>
                              </div>

                              <div class="col-md-4 card-block-info-con">
                                <div class="card card-block form-filled">
                                  <div class="card-block-info">
                                    <div class="card-block-content">
                                      <h4 class="card-title">Alice Duggan</h4>
                                    <h6 class="card-subtitle">Alice.Duggan@marks-and-spencer.com</h6>
                                    <p class="card-text card-text-attendee p-y-1">QUESTIONNAIRE FILLED : YES</p>
                                    <!-- <a href="#" class="card-link btn btn-primary">Send Chase Email</a> -->
                                    </div>
                                  </div>
                                </div>
                              </div>

                              

                          </div>

                      </div>
            </div>
        </div>
    </div>
@endsection
@section('extra-script')
    <script src="{{ asset('vendor/global/global.min.js') }}"></script>
    <script src="{{ asset('js/quixnav-init.js') }}"></script>
    <script src="{{ asset('js/custom.min.js') }}"></script>
@endsection
