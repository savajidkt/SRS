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
            padding-left: 15px;
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

            .footer {
    background: rgba(255, 255, 255, 0.1) !important;
}

.attendee-home .card{
    width:100% !important;
}

/*the container must be positioned relative:*/
.customise-select {
  position: relative;
  display: flex;
  flex-direction: column;
}

.customise-select select {
  display: none; /*hide original SELECT element:*/
}

/*style the arrow inside the select element:*/
.select-selected:after {
  position: absolute;
  content: "";
  top: 17px;
  right: 15px;
  width: 0;
  height: 0;
  border: 6px solid transparent;
  border-color: #828690 transparent transparent transparent;
}



/*point the arrow upwards when the select box is open (active):*/
.select-selected.select-arrow-active:after {
  border-color: transparent transparent #828690 transparent;
  top: 10px;
}

/*style the items (options), including the selected item:*/
.select-items div,.select-selected {
  color: #828690;
  padding: 8px 16px;
  border: 1px solid #eaeaea;
  border-radius: 0.25rem;
  cursor: pointer;
  user-select: none;
}

/*style items (options):*/
.select-items {
  position: absolute;
  background-color: #fff;
  border-radius: 0rem;
  top: 100%;
  left: 0;
  right: 0;
  z-index: 99;
height:100px;
  overflow-y:scroll;
}

/*hide the items when the select box is closed:*/
.select-hide {
  display: none;
}

.select-items div:hover, .same-as-selected {
  background-color: #000066;
  color:#fff !important;
}

.select-selected {
    border: 1px solid #eaeaea;
}


.accordion-extra:after {
    content: '\002B';
    color: #fff;
    font-weight: bold;
    float: right;
    margin-left: 5px;
    display:none;
}

@media only screen and (max-width: 525px){

    button.accordion-extra.attendee-home-lgt.attendee-bg-clr.add-contact-font {
    font-size: 16px;
}

label.text-label {
    font-size: 14px !important;
}

.attendee-home .btn.btn-primary {
    width: fit-content;
    font-size: 14px !important;
}

button.btn.btn-outline-danger {
    font-size: 14px !important;
    width: fit-content !important;
}

}

@media only screen and (max-width: 429px){
.attendee-home .btn.btn-primary {
    width: fit-content;
    font-size: 13px !important;
    margin-bottom: 5px;
}

button.btn.btn-outline-danger {
    font-size: 13px !important;
    width: fit-content !important;
}
}


@media only screen and (min-width: 1441px){

    button.accordion-extra.attendee-home-lgt.attendee-bg-clr.add-contact-font {
    font-size: 19.2px;
}
}

@media only screen and (min-width: 768px) and (max-width: 1440px){
    button.accordion-extra.attendee-home-lgt.attendee-bg-clr.add-contact-font {
    font-size: 17px;
}
}

@media screen and (max-width: 992px){
.header .header-content {
    padding-left: 0rem !important;
    padding-right: 0rem;
}

.header {
padding-left: 0rem;
}
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
                                                            <div class="input-error customise-select">
                                                                <div class="input-error">
                                                                    <select class="form-select form-select-sm my-select2" name="job_title" aria-label=".form-select-sm example" id="my_contact_data_0" my-contacts-data="my_contact_data" required>
                                                                        <option value="" selected disabled>Select Job Title</option>
                                                                        <option value="1">Director</option>
                                                                        <option value="2">Department Head</option>
                                                                        <option value="3">Manager</option>
                                                                        <option value="4">Project Manager / Specialist</option>
                                                                        <option value="5">Team Member</option>
                                                                    </select>
                                                                </div>
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
                                                </div>
                                                <hr/>
                                            
                                            </div>
                                        </div>     
                                        {{-- <hr/>    --}}
                                    <button type="submit" class="btn btn-primary">Send Instructions</button>
                                    <a href="{{ route('login') }}" class="btn btn-primary">Cancel</a>
                                    <button type="button" class="btn btn-primary" data-repeater-create>Add Another Attendee</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                <button class="accordion-extra attendee-home-lgt attendee-bg-clr add-contact-font">INSTRUCTION</button>
            <div class="accordion-add-contact-colr">
                <div class="degree-feedback-contact-customise">
                  {!! $sidebar !!}
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
        </div>
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
    <script src="{{ asset('js/form/courseattendee/courseattendee.js') }}"></script>
    <script src="{{ asset('js/form/courseattendee/jquery.repeater.min.js') }}"></script>
    <script src="{{ asset('js/form/courseattendee/form-repeater.js') }}"></script>

    <script src="{{ asset('select/js/form-select2.js') }}"></script>
    <script src="{{ asset('select/js/select2.full.min.js') }}"></script>
    <script>
        $('#my_contact_data_0').select2({
            minimumResultsForSearch: Infinity
        });
    </script>

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

<script>
// var x, i, j, l, ll, selElmnt, a, b, c;
// /*look for any elements with the class "customise-select":*/
// x = document.getElementsByClassName("customise-select");
// l = x.length;
// for (i = 0; i < l; i++) {
//   selElmnt = x[i].getElementsByTagName("select")[0];
//   ll = selElmnt.length;
//   /*for each element, create a new DIV that will act as the selected item:*/
//   a = document.createElement("DIV");
//   a.setAttribute("class", "select-selected");
//   a.innerHTML = selElmnt.options[selElmnt.selectedIndex].innerHTML;
//   x[i].appendChild(a);
//   /*for each element, create a new DIV that will contain the option list:*/
//   b = document.createElement("DIV");
//   b.setAttribute("class", "select-items select-hide");
//   for (j = 1; j < ll; j++) {
//     /*for each option in the original select element,
//     create a new DIV that will act as an option item:*/
//     c = document.createElement("DIV");
//     c.innerHTML = selElmnt.options[j].innerHTML;
//     c.addEventListener("click", function(e) {
//         /*when an item is clicked, update the original select box,
//         and the selected item:*/
//         var y, i, k, s, h, sl, yl;
//         s = this.parentNode.parentNode.getElementsByTagName("select")[0];
//         sl = s.length;
//         h = this.parentNode.previousSibling;
//         for (i = 0; i < sl; i++) {
//           if (s.options[i].innerHTML == this.innerHTML) {
//             s.selectedIndex = i;
//             h.innerHTML = this.innerHTML;
//             y = this.parentNode.getElementsByClassName("same-as-selected");
//             yl = y.length;
//             for (k = 0; k < yl; k++) {
//               y[k].removeAttribute("class");
//             }
//             this.setAttribute("class", "same-as-selected");
//             break;
//           }
//         }
//         h.click();
//     });
//     b.appendChild(c);
//   }
//   x[i].appendChild(b);
//   a.addEventListener("click", function(e) {
//       /*when the select box is clicked, close any other select boxes,
//       and open/close the current select box:*/
//       e.stopPropagation();
//       closeAllSelect(this);
//       this.nextSibling.classList.toggle("select-hide");
//       this.classList.toggle("select-arrow-active");
//     });
// }
// function closeAllSelect(elmnt) {
//   /*a function that will close all select boxes in the document,
//   except the current select box:*/
//   var x, y, i, xl, yl, arrNo = [];
//   x = document.getElementsByClassName("select-items");
//   y = document.getElementsByClassName("select-selected");
//   xl = x.length;
//   yl = y.length;
//   for (i = 0; i < yl; i++) {
//     if (elmnt == y[i]) {
//       arrNo.push(i)
//     } else {
//       y[i].classList.remove("select-arrow-active");
//     }
//   }
//   for (i = 0; i < xl; i++) {
//     if (arrNo.indexOf(i)) {
//       x[i].classList.add("select-hide");
//     }
//   }
// }
// /*if the user clicks anywhere outside the select box,
// then close all select boxes:*/
// document.addEventListener("click", closeAllSelect);
</script>


  </body>
</html>
