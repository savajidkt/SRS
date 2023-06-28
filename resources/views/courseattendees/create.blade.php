<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <title>SRS-The Development Ltd</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/dashboard-fav-icon-2.png') }}" />
    <!--CSS-->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css"
        integrity="sha512-nMNlpuaDPrqlEls3IX/Q56H36qvBASwb3ipuo3MxeWbsQB1881ox0cRv7UPTgBlriqoynt35KjEwgGUeUXIPnw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .filedrequired,
        .help-block-error {
            color: #FF1616;
        }
    </style>
    <script>
        var myCount = 1;
    </script>

</head>

<body>
    <div id="main-wrapper attendee-add-contacts">

        <div class="nav-header sticky-top ">
            <a href="#" class="brand-logo">
                <img class="logo-srs" src="{{ asset('images/srs_logo.jpg') }}" alt="" />
            </a>
        </div>

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
                    </div>
                </nav>
            </div>
        </div>
        <div class="content-body attendee-home ">
            <div class="container-fluid ">
                <div class="accordion" id="accordionExample">
                    <div class="card accordion-item">
                        <div class="accordion-header" id="headingOne">
                            <h2 class="mb-0 accordion-header">
                                <button class="btn btn-link accordion-button" type="button" data-toggle="collapse"
                                    data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                    INSTRUCTION
                                    <i class="bi bi-chevron-down"></i>
                                </button>
                            </h2>
                        </div>
                        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                            data-parent="#accordionExample">
                            <div class="card-body accordion-add-contact-colr">
                                Dear Maneesh Jha,
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
                                    <form class="attendees-repeater" action="" method="post"
                                        enctype="multipart/form-data" id="attendees">
                                        @csrf

                                        <div class="">
                                            <div data-repeater-list="attendees">
                                                <div data-repeater-item>

                                                    <div class="row d-flex align-items-end">
                                                        <div class="form-row">
                                                            <div class="form-group col-md-6 form-gap-2">
                                                                <label>First Name <span class="filedrequired">
                                                                        *</span></label>
                                                                <div class="input-error">
                                                                    <input type="text" name="first_namess"
                                                                        class="form-control" placeholder="Sue" required>
                                                                </div>
                                                            </div>
                                                            <div class="form-group col-md-6 form-gap-2">
                                                                <label>Last Name <span class="filedrequired">
                                                                        *</span></label>
                                                                <div class="input-error">
                                                                    <input type="text" name="last_name"
                                                                        class="form-control" placeholder="Swindell"
                                                                        required>
                                                                </div>
                                                            </div>
                                                            <div class="form-group col-md-6 form-gap-2">
                                                                <label>Email Address <span class="filedrequired">
                                                                        *</span></label>
                                                                <div class="input-error">
                                                                    <input type="email" name="email"
                                                                        class="form-control"
                                                                        placeholder="sue.swindell@srs-development.co.uk"
                                                                        required>
                                                                </div>
                                                            </div>
                                                            <div class="form-group col-md-6 form-gap-2">
                                                                <label class="text-label">Your Job Title</label>
                                                                <div class="input-error">
                                                                    <select class="form-select form-select-sm"
                                                                        name="job_title" id="form-select-sm-attendee-1"
                                                                        aria-label=".form-select-sm example">
                                                                        <option selected disabled>Select Job Title
                                                                        </option>
                                                                        <option value="1">Director</option>
                                                                        <option value="2">Department Head</option>
                                                                        <option value="2">Manager</option>
                                                                        <option value="2">Project Manager /
                                                                            Specialist
                                                                        </option>
                                                                        <option value="2">Team Member</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2 col-12 mb-50">
                                                                <div class="form-group">
                                                                    <button
                                                                        class="btn btn-outline-danger text-nowrap px-1"
                                                                        data-repeater-delete type="button">
                                                                        <i data-feather="x" class="mr-25"></i>
                                                                        <span>Delete</span>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <hr />
                                                    </div>
                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-primary">Send Instructions</button>
                                            <button type="submit" class="btn btn-primary">Cancel</button>
                                            <button type="button" class="btn btn-primary" data-repeater-create>Add
                                                Another
                                                Attendee</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="footer attendee-home sticky-bottom">
                <div class="copyright">
                    <p>
                        Copyright © 2023 SRS-The Development Team Ltd. | All Rights Reserved
                        <a href="./Index.html" target="_blank">www.srs-development.co.uk</a>
                    </p>
                </div>
            </div>

            <script src="{{ asset('vendor/global/global.min.js') }}"></script>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

            <script src="{{ asset('js/jquery.validate.min.js') }}"></script>
            <script src="{{ asset('js/quixnav-init.js') }}"></script>
            <script src="{{ asset('js/custom.min.js') }}"></script>

            <script src="{{ asset('js/form/courseattendee/jquery.repeater.min.js') }}"></script>
            <script src="{{ asset('js/form/courseattendee/form-repeater.js') }}"></script>
            <script src="{{ asset('js/form/courseattendee/courseattendee.js') }}"></script>

</body>

</html>
