@php
$mycountphp = 1;
    if(count($model->attendees) > 0){
        $mycountphp = count($model->attendees);
    }   
@endphp
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
      href="{{ asset('images/dashboard-fav-icon-2.png')}}"
    />
    <!--CSS-->
    <link href="{{ asset('css/style.css')}}" rel="stylesheet" />
    <link href="{{ asset('css/custom-style.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.0/font/bootstrap-icons.css">
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" integrity="sha512-nMNlpuaDPrqlEls3IX/Q56H36qvBASwb3ipuo3MxeWbsQB1881ox0cRv7UPTgBlriqoynt35KjEwgGUeUXIPnw==" crossorigin="anonymous" referrerpolicy="no-referrer" /> --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('select/css/select2.min.css') }}">

    <script>
        var myCount = 1;
    </script>
    <style>
        .filedrequired,
        .help-block-error {
        color: #FF1616
        }
        .hide {
        display: none;
        }
        .accordion-add-contact-colr p{
            color: #454545 !important;
        }
        .has_error {
    border: 1px solid red;
}

.attendee-home .card-body h5 {
    font-size: 1.2rem !important;
}

@media (min-width: 1200px) and (max-width: 1350px){
.content-body.attendee-home {
    margin-left: 0rem;
}
}

@media only screen and (max-width: 525px){
button.btn.btn-outline-danger {
    font-size: 10px !important;
    width: fit-content !important;
}
}
@media only screen and (max-width: 1440px){
    .attendee-home .card-body h5 {
    font-size: 1rem !important;
}
}

@media screen and (max-width: 767px){
    .attendee-home .card-body h5 {
    font-size: 15px !important;
}
}

.degree-feedback-contact-customise{
                padding:18px 0px;
            }
    </style>
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
          <img class="logo-srs" src="{{ asset('images/srs_logo.jpg')}}" alt="" />
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
                                    <body onload="startTime()">
                                        <p id="demo"></p>
                                    </body>
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
      
            <div class="card">
                <button class="accordion accordion-extra attendee-home-lgt attendee-bg-clr add-contact-font">INSTRUCTION</button>
            <div class="panel accordion-panel-extra accordion-add-contact-colr">
                <div class="degree-feedback-contact-customise">
                  {!! $sidebar !!}
                </div>
            </div>
             
               </div>

              <div class="row">
                <div class="col-xl-6 col-xxl-12">

                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Attendees</h4>
                        </div>
                        <div class="card-body">
                            <hr>
                            <h5 class="card-title attendee-card-title"><strong>Attendee Details</strong></h5>
                            <hr>
                            <div class="basic-form">
                                <form class="attendees-repeater" action="{{ route('store-attendees') }}" method="post"
                                        enctype="multipart/form-data" id="attendees">
                                        @csrf
                                        <input type="hidden" value="{{ $id }}" name="key" >
                                        <div class="">
                                            <div data-repeater-list="attendees">
                                                <div data-repeater-item>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-6 form-gap-2">
                                                            <label>First Name<span class="filedrequired">*</span></label>
                                                            <div class="input-error">
                                                                <input type="text" name="first_name" id="first_name" class="form-control"  onkeyup="this.value=this.value.replace(/[^A-z]/g,'');" required>
                                                        
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-6 form-gap-2">
                                                            <label>Last Name<span class="filedrequired">*</span></label>
                                                            <div class="input-error">
                                                                <input type="text" name="last_name" class="form-control"  onkeyup="this.value=this.value.replace(/[^A-z]/g,'');" required>
                                                        </div>
                                                        </div>
                                                        
                                                        <div class="form-group col-md-6 form-gap-2">
                                                            <label>Email Address<span class="filedrequired">*</span></label>
                                                            <div class="input-error">
                                                                <input type="email" name="email" class="form-control"  required>
                                                        </div>
                                                        </div>
                                                        <div class="form-group col-md-6 form-gap-2">
                                                            <label class="text-label">Your Job Title</label>
                                                            <div class="input-error">
                                                                <select class="form-select form-select-sm" name="job_title" id="form-select-sm-attendee-1" aria-label=".form-select-sm example" required>
                                                                <option value="" selected disabled>Select Job Title</option>
                                                                <option value="1">Director</option>
                                                                <option value="2">Department Head</option>
                                                                <option value="3">Manager</option>
                                                                <option value="4">Project Manager / Specialist</option>
                                                                <option value="5">Team Member</option>
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
                                                        <hr/>
                                                    </div>
                                                </div>
                                            
                                            </div>
                                        </div>     
                                        <hr>   
                                    <button type="submit" class="btn btn-primary">Send Instructions</button>
                                    <button type="button" class="btn btn-primary">Cancel</button>
                                    <button type="button" class="btn btn-primary" data-repeater-create>Add Another Attendee</button>
                                </form>
                            </div>
                        </div>
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
    <script src="{{ asset('vendor/global/global.min.js')}}"></script> 
    <script src="{{ asset('js/quixnav-init.js')}}"></script>
    <script src="{{ asset('js/custom.min.js')}}"></script>
    
    <script src="{{asset('select/js/form-select2.js')}}"></script>
    <script src="{{asset('select/js/select2.full.min.js')}}"></script>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js" integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> --}}
    
     <script src="{{ asset('js/jquery.validate.min.js') }}"></script>
     <script src="{{ asset('js/form/courseattendee/courseattendee.js') }}"></script>
     
    
    <script src="{{ asset('js/form/courseattendee/jquery.repeater.min.js') }}"></script>
    <script src="{{ asset('js/form/courseattendee/form-repeater.js') }}"></script>
    

    <script type="text/javascript">
        function startTime()
        {
            var today=new Date();
            //                   1    2    3    4    5    6    7    8    9   10    11  12   13   14   15   16   17   18   19   20   21   22   23   24   25   26   27   28   29   30   31   32   33
            var suffixes = ['','st','nd','rd','th','th','th','th','th','th','th','th','th','th','th','th','th','th','th','th','th','st','nd','rd','th','th','th','th','th','th','th','st','nd','rd'];

            var weekday = new Array(7);
            weekday[0] = "Sunday";
            weekday[1] = "Monday";
            weekday[2] = "Tuesday";
            weekday[3] = "Wednesday";
            weekday[4] = "Thursday";
            weekday[5] = "Friday";
            weekday[6] = "Saturday";

            var month = new Array(12);
            month[0] = "January";
            month[1] = "February";
            month[2] = "March";
            month[3] = "April";
            month[4] = "May";
            month[5] = "June";
            month[6] = "July";
            month[7] = "August";
            month[8] = "September";
            month[9] = "October";
            month[10] = "November";
            month[11] = "December";

            document.getElementById('demo').innerHTML=(weekday[today.getDay()] + ',' + " " + today.getDate()+'<sup>'+suffixes[today.getDate()]+'</sup>' + " " + month[today.getMonth()] + " " + today.getFullYear() + ' at ' + today.toLocaleTimeString());
            t=setTimeout(function(){startTime()},500);
        }
    </script>

    <script>
        $('.select2').select2();
    </script>
    {{-- <script>
      $('#form-select-sm-attendee-1').select2();
      $('#form-select-sm-attendee-2').select2();
    </script> --}}

<script>
        var acc = document.getElementsByClassName("accordion");
    var i;

    for (i = 0; i < acc.length; i++) {
    acc[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.maxHeight) {
        panel.style.maxHeight = null;
        //add padding-changes, same as base-padding
        panel.style.padding = "0px 18px";
    } else {
        panel.style.maxHeight = panel.scrollHeight + "px";
        //add padding-changes you want to apply when active
        panel.style.padding = "22px 18px";
    } 
    });
    }
  </script>
  </body>
</html>
