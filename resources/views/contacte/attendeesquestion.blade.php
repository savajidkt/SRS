<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <title>SRS-The Development Ltd</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/dashboard-fav-icon-2.png') }}" />
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.0/font/bootstrap-icons.css">
    <style>
        .accordion-add-contact-colr p{
            color: #454545 !important;
        }

        .question-container{
        padding-top: 30px;
      }

      .question-attendee-home-content{
        padding-bottom: 20px;
      }

      .question-attendee-home-content .btn-primary:focus, .btn-primary.focus {
    box-shadow: none;
    color: white;
}

.attendee-error .header .header-content {
    height: 100%;
    padding-left: 0rem;
    padding-right: 0rem;
    align-items: center;
    display: flex;
}

.degree-feedback-contact-customise{
                padding:18px 0px;
            }

            @media only screen and (max-width: 575px){
.header .header-content {
    padding-left: 0rem;
}

.header {
    padding-left: 0rem !important;
 }

 .table thead th {
    font-size: 14px;
 }

 .accordion-extra {
    font-size: 15px;
}

.header .header-content {
    padding-left: 2rem !important;
        }

            }

 .header {
    padding-left: 0rem !important;
 }

 @media only screen and (min-width: 340px) and (max-width: 992px){
.footer {
    padding-left: 0rem;
}
 }

 .footer {
    background: rgba(255, 255, 255, 0.1) !important;
}

.accordion-add-contact-colr p {
    margin-left: 15px;
}

.accordion-extra:after {
    content: '\002B';
    color: #fff;
    font-weight: bold;
    float: right;
    margin-left: 5px;
    display:none;
}
 
@media screen and (max-width: 992px){
.nav-header {
    width: 3.75rem !important;
}

.logo-srs {
    width: 50px !important;
    height: auto !important;
}

.nav-header .brand-logo {
    display: flex;
    height: 100%;
    width: 100%;
    justify-content: flex-start;
    align-items: center;
    font-size: 1.125rem;
    color: #fff;
    text-decoration: none;
    padding-left: 0.25rem;
    font-weight: 700;
}
}

@media screen and (max-width: 768px){
    .table thead th {
    font-size: 14px !important;
    white-space: normal !important;
}

tbody th {
    font-size: 13px;
}

.btn.btn-primary {
    width: fit-content;
    font-size: 12px !important;
}

p.card-text.attendee-home-font {
    font-size: 13px;
}

.accordion-extra {
    font-size: 14px;
}

.accordion-add-contact-colr p {
    font-size: 13px;
}

}

p.card-text.attendee-home-font {
    padding-top: 10px;
}

@media screen and (max-width: 630px){
  /* .header.attendee-home-header .header-content {
    padding-left: 10.3125rem !important;
} */
.attendee-home-header .collapse.navbar-collapse.navbar-align {
    padding-left: 5rem !important;
    padding-right: 6rem !important;
    white-space:normal !important;
}
}
    </style>
    <script>
    window.addEventListener( "pageshow", function ( event ) {
    if(window.performance.navigation.type == 2){
    location.reload();
}
});
 </script>
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
                <img class="logo-srs" src="{{ asset('images/srs_logo.jpg') }}" alt="" />
            </a>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->

        <!--**********************************
            Header start
        ***********************************-->

        <div class="header attendee-home-header">
            <div class="header-content">
                <nav class="navbar navbar-expand">
                    <div class="collapse navbar-collapse navbar-align">
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

        <div class="content-body attendee-home">
            <div class="container-fluid question-container">
                <!--**********************************
            Content body end
        ***********************************-->

                

                <div class="card question-attendee-home-content">
                    <div class="card-header attendee-bg-clr attendee-home-lgt">
                        <strong>
                        ATTENDEE QUESTIONNAIRE
</strong>
                    </div>
                    <div class="card-body">
                        <p class="card-text attendee-home-font">
                            TO COMPLETE THIS INFLUENCING STYLES QUESTIONNAIRE, READ EACH
                            STATEMENT AND SCORE IT IN RELATION TO HOW CLOSELY THE STATEMENT
                            DESCRIBES THE PERSON ATTENDING THE WORKSHOP.
                            <strong>0 = NOT LIKE ME, 1 = QUITE LIKE ME, 2 = VERY LIKE ME</strong>
                        </p>
                    </div>

                    <div class="card-body scrollspy-example">
                        <form id="final_submit" action="{{ route('store-attendeesquestion') }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" value="{{ $id }}" name="key">
                            <input type="hidden" value="{{ $attendee_id }}" name="attendee_id">
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
                                    @foreach ($attendeeQuestion as $question)
                                        <tr class="parant"  data-id="{{ $question->id }}">
                                            <th>
                                                {{ $question->id }}) {{ $question->question }}
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

                                <a href="{{ route('login') }}" class="btn btn-primary">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>


                <div class="card">
                    <button
                        class="accordion-extra attendee-home-lgt attendee-bg-clr add-contact-font">INSTRUCTION</button>
                    <div class="accordion-add-contact-colr">
                    <div class="degree-feedback-contact-customise">
                        {!! $sidebar !!}
                    </div>
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
            </div>
        </div>
        <!--**********************************
        Main wrapper end
    ***********************************-->

        <!--**********************************
        Scripts
    ***********************************-->
        <!-- Required vendors -->
        <script src="{{ asset('vendor/global/global.min.js') }}"></script>
        <script src="{{ asset('js/quixnav-init.js"') }}"></script>
        <script src="{{ asset('js/custom.min.js') }}"></script>

        <script src="{{ asset('js/jquery.validate.min.js') }}"></script>
        <script src="{{ asset('js/form/final-submit.js') }}"></script>

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
