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
    <link href="{{ asset('css/style.css')}}" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.0/font/bootstrap-icons.css">
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
    <div id="main-wrapper">
      <!--**********************************
            Nav header start
        ***********************************-->
      <div class="nav-header sticky-top">
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
            <div class="collapse navbar-collapse navbar-align">
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

      <div class="content-body attendee-home">
        <div class="container-fluid">
          <!--**********************************
            Content body end
        ***********************************-->

        <div class="card">
          <button class="accordion accordion-extra attendee-home-lgt attendee-bg-clr add-contact-font">INSTRUCTION</button>
          <div class="panel accordion-panel-extra accordion-add-contact-colr">
            Dear Maneesh Jha,
              <br>
              Before you attend the upcoming workshop or coaching session please complete a questionnaire about yourself and invite up to 6 other people to provide you with feedback.  The results of this questionnaire will be used during the workshop by your trainer to enable you to compare your view of how you influence with the views of others. There are no right or wrong answers.
              <br>
              <strong>What do you need to do?</strong>
              <br>
              Firstly using the form on the right hand side please provide contact details for up to 6 other people that will provide you with 360 degree feedback. Once you have entered their contact details we will invite them to complete a feedback form for you. Please enter their details carefully leaving no spaces before or after the email addresses and remember to select the relationship in each case - otherwise the forms do not upload.
              <br>
              To add another feedback person please click the option “Add New Contact” at the bottom. Once you are happy to proceed and answer your own feedback form please click the option “Send to 360 Contacts”.
              <br>
              Once you have completed and sent these contacts your own questionnaire will then come up automatically for you to complete and submit. If this does not appear - please check back that the email addresses do not have spaces accidently and that the relationship is selected for each contact and try clicking send again.
              <br>
              Please remember that when you see the feedback these contacts will be named as it is important to look at the feedback in the context of the relationship - so you may want to et them know that you are sending them this feedback request and that it is named so they know to expect that.
              <br>
              Many thanks and we look forward to seeing you soon
              <br>
              Sue Swindell
              <br>
              SRS-The Development Team Ltd
              <br>
              +44 7850 185 351
          </div>
       
         </div>

          <div class="card">
            <div class="card-header attendee-bg-clr attendee-home-lgt">
              ATTENDEE QUESTIONNAIRE
            </div>
            <div class="card-body">
              <p class="card-text attendee-home-font">
                TO COMPLETE THIS INFLUENCING STYLES QUESTIONNAIRE, READ EACH
                STATEMENT AND SCORE IT IN RELATION TO HOW CLOSELY THE STATEMENT
                DESCRIBES THE PERSON ATTENDING THE WORKSHOP.
                <strong
                  >0 = NOT LIKE ME, 1 = QUITE LIKE ME, 2 = VERY LIKE ME</strong
                >
              </p>
            </div>

            <div class="card-body scrollspy-example">
                <form action="{{ route('store-attendeesquestion') }}" method="post" enctype="multipart/form-data">
                @csrf
                    <input type="hidden" value="{{ $id }}" name="key">
                    <table class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th></th>
                            <th>NOT LIKE ME</th>
                            <th>QUITE LIKE ME</th>
                            <th>VERY LIKE ME</th>
                        </tr>
                        </thead>
        
                        <tbody>
                            @foreach ($attendeeQuestion as $question )
                                <tr>
                                    <th>
                                    {{ $question->id }}) {{ $question->question  }}
                                    </th>
                                    <td>
                                    <label class="form-check-custom">
                                        <input type="radio" value="0" name="answer[{{ $question->id }}]" />
                                        <span>0</span>
                                    </label>
                                    </td>
                                    <td>
                                    <label class="form-check-custom">
                                        <input type="radio" value="1" name="answer[{{ $question->id }}]" />
                                        <span>1</span>
                                    </label>
                                    </td>
                                    <td>
                                    <input type="radio" value="2" name="answer[{{ $question->id }}]" />
                                    <span>2</span>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="btn-grp">
                        <button type="submit" class="btn btn-primary">Submit</button>

                        <a href="#" class="btn btn-primary">Cancel</a>
                    </div>
                </form>
            </div>
          </div>

          <!--**********************************
            Footer start
        ***********************************-->
          <div class="footer attendee-home sticky-bottom">
            <div class="copyright">
              <p>
                Copyright © 2023 SRS-The Development Team Ltd. | All Rights
                Reserved
                <a href="./Index.html" target="_blank"
                  >www.srs-development.co.uk</a
                >
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
        </div>
      </div>
      <!--**********************************
        Main wrapper end
    ***********************************-->

      <!--**********************************
        Scripts
    ***********************************-->
      <!-- Required vendors -->
      <script src="{{ asset('vendor/global/global.min.js')}}"></script>
      <script src="{{ asset('js/quixnav-init.js"')}}"></script>
      <script src="{{ asset('js/custom.min.js')}}"></script>
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
    </div>
  </body>
</html>
