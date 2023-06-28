<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width,initial-scale=1" />
        <title>SRS-The Development Ltd</title>
        <!-- Favicon icon -->
        <link
            rel="icon"
            type="image/png"
            sizes="16x16"
            href="{{ asset('images/dashboard-fav-icon-2.png') }}"
            />
        <!--CSS-->
        <link href="{{ asset('css/style.css') }}" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.0/font/bootstrap-icons.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" integrity="sha512-nMNlpuaDPrqlEls3IX/Q56H36qvBASwb3ipuo3MxeWbsQB1881ox0cRv7UPTgBlriqoynt35KjEwgGUeUXIPnw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    </head>
    <body>
        <!--*******************
            Preloader start
            ********************-->
        <!-- <div id="preloader">
            <div class="sk-three-bounce">
                <div class="sk-child sk-bounce1"></div>
                <div class="sk-child sk-bounce2"></div>
                <div class="sk-child sk-bounce3"></div>
            </div>
            </div> -->
        <!--*******************
            Preloader end
            ********************-->
        <!--**********************************
            Main wrapper start
            ***********************************-->
        <div id="main-wrapper attendee-add-contacts">
        <!--**********************************
            Nav header start
            ***********************************-->
        <div class="nav-header sticky-top ">
            <a href="#" class="brand-logo">
            <img class="logo-srs" src="{{ asset('images/srs_logo.jpg') }}" alt="" />
            </a>
        </div>
        <!--**********************************
            Nav header end
            ***********************************-->
        <!--**********************************
            Header start
            ***********************************-->
        <div class="header">
            <div class="header-content">
                <nav class="navbar navbar-expand">
                    <div class="collapse navbar-collapse navbar-align ">
                        <div class="header-left">
                            <div>
                                <div class="welcome-text text-center">
                                    <p id="demo"></p>
                                </div>
                            </div>
                        </div>
                        <!-- <ul class="navbar-nav header-right">
                            <li class="nav-item dropdown header-profile">
                                <a class="nav-link" href="#" role="button" data-toggle="dropdown">
                                    <i class="mdi mdi-account"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a href="./app-profile.html" class="dropdown-item">
                                        <i class="icon-user"></i>
                                        <span class="ml-2">Profile </span>
                                    </a>
                                    
                                    <a href="./page-login.html" class="dropdown-item">
                                        <i class="icon-key"></i>
                                        <span class="ml-2">Logout </span>
                                    </a>
                                </div>
                            </li>
                            </ul> -->
                    </div>
                </nav>
            </div>
        </div>
        <!--**********************************
            Header end ti-comment-alt
            ***********************************-->
        <!--**********************************
            Content body start
            ***********************************-->
        <div class="content-body attendee-home ">
        <div class="container-fluid ">
            <div class="accordion" id="accordionExample">
                <div class="card accordion-item">
                    <div class="accordion-header" id="headingOne">
                        <h2 class="mb-0 accordion-header">
                            <button class="btn btn-link accordion-button" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne" >
                            INSTRUCTION
                            <i class="bi bi-chevron-down"></i>
                            </button>
                        </h2>
                    </div>
                    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                        <div class="card-body accordion-add-contact-colr">
                            Dear Maneesh Jha,
                            <br>
                            <br>
                            Thank-you for helping us organise the questionnaires for the upcoming workshop.
                            <br>
                            Using the form opposite please enter the details of workshop attendees. You can add multiple attendees by clicking the button "Add Another Attendee".
                            <br>
                            Once you are finished simply click the "Send Instruction" button and we will email each attendee with their questionnaire instructions and then update them with the responses they receive.
                            <br>
                            <br>
                            Many thanks for your help,
                            <br>
                            Sue Swindell
                            <br>
                            Managing Director
                            <br>
                            SRS-The Development Team Ltd
                            <br>
                            +44 7850 185 351
                        </div>
                    </div>
                </div>
                <!-- Repeat the structure for additional accordion items -->
            </div>
            <div class="row">
                <div class="col-xl-6 col-xxl-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">ATTENDEES</h4>
                        </div>
                        <div class="card-body">
                            <hr>
                            <h5>ATTENDEE DETAILS</h5>
                            <hr>
                            <div class="basic-form">
                                <form class="attendees-repeater" id="attendees" action=""
                    method="post" enctype="multipart/form-data" id="">
                    @csrf

                    <div data-repeater-list="attendees">
                        <div data-repeater-item>

                            <div class="row d-flex align-items-end">
                                <div class="col-lg-12 mb-4 form-style">
                                    <div class="form-group train-deet">
                                        <label class="itemcost">First Name<span class="filedrequired"> *</span></label>
                                        <div class="input-error">
                                            <input type="text" class="form-control" name="first_name"
                                            value="" />
                                        </div>
                                    </div>
                                    
                                <div class="col-md-2 col-12 mb-50">
                                    <div class="form-group">
                                        <button class="btn btn-outline-danger text-nowrap px-1" data-repeater-delete type="button">
                                            <i data-feather="x" class="mr-25"></i>
                                            <span>Delete</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        <hr />
                        </div>
                    </div>
                                    {{-- <div class="form-row">
                                        <div class="form-group col-md-6 form-gap-2">
                                            <label>First Name</label>
                                            <input type="text" class="form-control" placeholder="Sue" required>
                                        </div>
                                        <div class="form-group col-md-6 form-gap-2">
                                            <label>Last Name</label>
                                            <input type="text" class="form-control" placeholder="Swindell" required>
                                        </div>
                                        <div class="form-group col-md-6 form-gap-2">
                                            <label>Email Address</label>
                                            <input type="email" class="form-control" placeholder="sue.swindell@srs-development.co.uk" required>
                                        </div>
                                        <div class="form-group col-md-6 form-gap-2">
                                            <label class="text-label">Your Job Title</label>
                                            <select class="form-select form-select-sm" id="form-select-sm-attendee-1" aria-label=".form-select-sm example">
                                                <option selected disabled>Select Job Title</option>
                                                <option value="1">Director</option>
                                                <option value="2">Department Head</option>
                                                <option value="2">Manager</option>
                                                <option value="2">Project Manager / Specialist</option>
                                                <option value="2">Team Member</option>
                                            </select>
                                        </div>
                                    </div> --}}


                                    <button type="submit" class="btn btn-primary">Send Instructions</button>
                                    <button type="submit" class="btn btn-primary">Cancel</button>
                                    <button type="button" class="btn btn-primary" data-repeater-create>Add Another Attendee</button>
                                </form>
                            </div>
                            {{-- <div class="attendee-add-contact-relationship">
                                <div class="form-row">
                                    <div class="form-group col-md-6 form-gap-2">
                                        <label>First Name</label>
                                        <input type="text" class="form-control" placeholder="Sue" required>
                                    </div>
                                    <div class="form-group col-md-6 form-gap-2">
                                        <label>Last Name</label>
                                        <input type="text" class="form-control" placeholder="Swindell" required>
                                    </div>
                                    <div class="form-group col-md-6 form-gap-2">
                                        <label>Email Address</label>
                                        <input type="email" class="form-control" placeholder="sue.swindell@srs-development.co.uk" required>
                                    </div>
                                    <div class="form-group col-md-6 form-gap-2">
                                        <label class="text-label">Relationship</label>
                                        <select class="form-select form-select-sm" id="form-select-sm-attendee-2" aria-label=".form-select-sm example">
                                            <option selected disabled>Select Relationship</option>
                                            <option value="1">Director</option>
                                            <option value="2">Department Head</option>
                                            <option value="2">Manager</option>
                                            <option value="2">Project Manager / Specialist</option>
                                            <option value="2">Team Member</option>
                                        </select>
                                    </div>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--**********************************
            Content body end
            ***********************************-->
        <!--**********************************
            Footer start
            ***********************************-->
        <div class="footer attendee-home sticky-bottom">
            <div class="copyright">
                <p>
                    Copyright © 2023 SRS-The Development Team Ltd. | All Rights Reserved
                    <a href="./Index.html" target="_blank">www.srs-development.co.uk</a>
                </p>
            </div>
        </div>
        <!--**********************************
            Footer end
            ***********************************-->
        <!--**********************************
            Support ticket button start
            ***********************************-->
        <!--**********************************
            Support ticket button end
            ***********************************-->
        <!--**********************************
            Main wrapper end
            ***********************************-->
        <!--**********************************
            Scripts
            ***********************************-->
        <!-- Required vendors -->
        
        <script src="{{ asset('vendor/global/global.min.js') }}"></script>
        <script src="{{ asset('js/quixnav-init.js') }}"></script>
        <script src="{{ asset('js/custom.min.js') }}"></script>
        <script src="{{ asset('js/jquery.validate.min.js') }}"></script>
        <script src="{{ asset('js/form/courseattendee/jquery.repeater.min.js') }}"></script>
        <script src="{{ asset('js/form/courseattendee/form-repeater.js') }}"></script>
        <script>
            const currentDateTime = new Date();
            
            const options = {
            weekday: 'long',
            year: 'numeric',
            month: 'long',
            day: 'numeric',
            hour: 'numeric',
            minute: 'numeric',
            second: 'numeric',
            hour12: false
            };
            
            const formattedDateTime = currentDateTime.toLocaleDateString('en-US', options);
            document.getElementById("demo").innerHTML = formattedDateTime;
            
        </script>
        <script>
            // $('#form-select-sm-attendee-1').select2();
            // $('#form-select-sm-attendee-2').select2();
        </script>
    </body>
</html>
