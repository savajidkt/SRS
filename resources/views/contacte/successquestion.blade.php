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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" integrity="sha512-nMNlpuaDPrqlEls3IX/Q56H36qvBASwb3ipuo3MxeWbsQB1881ox0cRv7UPTgBlriqoynt35KjEwgGUeUXIPnw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
      .accordion-add-contact-colr p{
          color: #454545 !important;
      }

      .bg-details>h5, p {
          color: #454545;
          margin-bottom: 0rem !important;
      } 
      .error-bg{
      background-color:#000066;
      }

      .error-danger{
        color: red;
        background-color:#FFBABA;
        border:1px solid red;
      }

      .error-style-decor{
        list-style-type:circle;
        color:red;
      }

      .error-text{
        color: red;
      }


      .error-heading-text{
        color:#fff;
        font-size:18px;
        font-weight:500;
      }

      .attendee-home-error{
        margin-left:0rem;
      }

      .success-text-clr{
        color:#006400;
      }

      #attendee-error .attendee-home-error{
      margin-left:0rem !important;
      }

      .success-error-content{
        margin:0 15px;
      }

      .attendee-error .attendee-home-error .container-fluid  .success-error-content .success-text-clr p{
        margin-bottom:0rem !important;
      }

      .success-text-clr a {
    color: red;
}

.align-items-center.success-text-clr {
    align-items: center !important;
    gap: 15px;
}

.error-heading-text{
  padding: 1.25rem;
}

.bi-check-circle-fill::before {
    content: "\f26a";
    font-size: 40px;
}
@media only screen and (min-width: 768px){
[data-sidebar-style="mini"] .content-body.attendee-home-error {
    margin-left: 0rem;
}
}

.success-customise-para li {
    list-style: disc;
}

.accordion-add-contact-colr{
  margin:15px 0px;
}

.accordion-add-contact-colr a{
color:red;
}
.content-body.attendee-home-error {
    overflow-y: unset !important;
}

.content-body .container-fluid {
    padding-right: 30px;
    padding-left: 30px;
    overflow-y: hidden !important;
}
.degree-feedback-contact-customise{
                padding:18px 0px;
            }

            .degree-feedback-contact-customise li {
    list-style: disc !important;
    font-weight:normal !important;
}

.degree-feedback-contact-customise li a:hover{
color:red;
text-decoration:underline !important;
}

.degree-feedback-contact-customise ul {
    padding: 0px 40px;
}

@media only screen and (min-width: 340px) and (max-width: 992px){
.footer.attendee-home {
    padding-left: 0rem;
}
}

.header .header-content {
    height: 100%;
    padding-left: 0rem;
    padding-right: 0rem;
    align-items: center;
    display: flex;
}

@media only screen and (max-width: 575px){
  .header .header-content {
    padding-left: 0rem !important;
}
  }

  .success-customise-para ul {
    color: red;
    padding: 0px 35px;
}

.success-customise-para li a:hover{
color:red;
text-decoration:underline !important;
}

@media only screen and (max-width: 525px){

.header .header-content {
padding-right: 2rem !important;
}
}
  </style>
  </head>

  <body>
   
    <div id="main-wrapper attendee-error">
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

        <div class="content-body attendee-home-error">
            <div class="container-fluid ">
      
            
              
              
                            
            <div class="card error-bg">
                <div class="success-error-content">
                <div class="card-header error-heading-text">
                  <strong>THANK YOU</strong>
                </div>
                

                <div class="alert alert-success alert-dismissible d-flex align-items-center fade show success-text-clr">
                    <i class="bi-check-circle-fill"></i>
                    <div class="success-customise-para">
                    {!! $message !!}
                    <!-- <button type="button" class="btn-close" data-bs-dismiss="alert"></button> -->
              </div>
                </div>

                </div>
                        
            </div>

            {{-- <div class="card">
                <button class="accordion-extra attendee-home-lgt attendee-bg-clr add-contact-font">INSTRUCTION</button>
                <div class="accordion-add-contact-colr">
                <div class="degree-feedback-contact-customise">
                  {!! $sidebar !!}
                </div>
            </div>
             
               </div> --}}

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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js" integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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

  </body>
</html>
