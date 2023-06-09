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
    <script>
        var myCount = 1;
    </script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" integrity="sha512-nMNlpuaDPrqlEls3IX/Q56H36qvBASwb3ipuo3MxeWbsQB1881ox0cRv7UPTgBlriqoynt35KjEwgGUeUXIPnw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .filedrequired,
        .help-block-error {
            color: #FF1616
        }
        .accordion-add-contact-colr p{
            color: #454545 !important;
        }
        .hide{
display: none;
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
      
         <div class="card">
          <button class="accordion accordion-extra attendee-home-lgt attendee-bg-clr add-contact-font">INSTRUCTION</button>
          <div class="panel accordion-panel-extra accordion-add-contact-colr">
            {!! $sidebar !!}
          </div>
       
         </div>
          

            

              <div class="card">
                <div class="card-header attendee-home-lgt attendee-bg-clr add-contact-font">
                    <strong>360-DEGREE FEEDBACK CONTACTS</strong>
                </div>
                @if ($ext_id == "360-frm")
                <div class="card-body myExistdiv">
                    <!-- <h5 class="card-title">Special title treatment</h5> -->
                    <p class="card-text attendee-home-font">You already added 1 contact. if you do not want to add more then you can skip this step.
                  </p>
                    <div class="btn-grp">
                      <a href="attendee-questionnaire.html" class="btn btn-primary mySkepBTN">Skip this step</a>
                    <p class="attendee-home-font">or</p>
                    <a href="javascript:void(0);" class="btn btn-primary myAddedBTN">Add New Contact</a>
                    </div>
                </div>
                
                @endif
                
                
              </div>

              <div class="row myclsdiv {{  (isset($ext_id) && $ext_id == "360-frm") ? 'hide' :'' }}">
                <div class="col-xl-6 col-xxl-12">

                    <div class="card">
                      
                        <div class="card-body">
                            <div class="basic-form">
                                <form class="contacte-repeater" action="{{ route('store-contacte') }}" method="post"
                                        enctype="multipart/form-data" id="contacte">
                                    @csrf
                                        <input type="hidden" value="{{ $id }}" name="key" >
                                        <input type="hidden" value="{{ $ext_id }}" name="attendee_id">
                                    <div class="">
                                        <div data-repeater-list="contacte">
                                            <div data-repeater-item>
                                                <div class="card-header">
                                                    <h4 class="card-title">CONTACT DETAILS</h4>
                                                </div>
                                                <br>
                                                <div class="row d-flex align-items-end">
                                                    
                                                    <div class="form-row">
                                                        <div class="form-group col-md-6 form-gap-2">
                                                            <label>First Name</label>
                                                            <div class="input-error">
                                                                <input type="text" class="form-control" name="first_name" placeholder="Sue" >
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-6 form-gap-2">
                                                            <label>Last Name</label>
                                                            <div class="input-error">
                                                                <input type="text" class="form-control" name="last_name" placeholder="Swindell" >
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="form-group col-md-6 form-gap-2">
                                                            <label>Email Address</label>
                                                            <div class="input-error">
                                                                <input type="email" class="form-control" name="email" placeholder="sue.swindell@srs-development.co.uk" id="email_0" email-id="email">
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-6 form-gap-2">
                                                            <label>Confirm Email Address</label>
                                                            <div class="input-error">
                                                                <input type="email" class="form-control" name="confirm_email" placeholder="sue.swindell@srs-development.co.uk" id="confirm_email_0" confirm-email-id="confirm_email">
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-6 form-gap-2">
                                                        <label class="text-label">Relationship</label>
                                                        <div class="input-error">
                                                            <select class="form-select form-select-sm" name="relationship" id="form-select-sm-attendee" aria-label=".form-select-sm example">
                                                                <option selected disabled>Select Relationship</option>
                                                                <option value="1">He/She is my line manager</option>
                                                                <option value="2">He/She reports to me</option>
                                                                <option value="3">He/She is my colleague/peer</option>
                                                                <option value="4">Any other relationship</option>
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
                                                <hr/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Send to 360 Contacts</button>
                                    <button type="button" class="btn btn-primary">Cancel</button>
                                    <button type="button" class="btn btn-primary" data-repeater-create>Add New Contact</button>
                                </form>
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

    <script src="{{ asset('js/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('js/form/contacte/contacte.js') }}"></script>

    <script src="{{ asset('js/form/contacte/jquery.repeater.min.js') }}"></script>
    <script src="{{ asset('js/form/contacte/form-repeater.js') }}"></script>
    
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
        $(document).on('click','.myAddedBTN',function(){
            $('.myExistdiv').addClass('hide');
            $('.myclsdiv').removeClass('hide');
        });
      $('#form-select-sm-attendee').select2();
    </script>

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
