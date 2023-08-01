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
          color: red !important;
      }
      .bg-details>h5, p {
          color: red;
          margin-bottom:0rem !important;
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

      .error-danger a {
        color:red;
      }

      .alert.error-danger {
    position: relative;
    padding: 0.75rem 1.25rem;
    margin-bottom: 1rem;
    border: 1px solid transparent;
    border-radius: 0rem;
    margin: 15px;
}

.attendee-home-error .card{
  border-radius: 0rem;
}

#attendee-error .content-body.attendee-home-error {
    overflow-y: unset !important;
}

#attendee-error .content-body.attendee-home-error .container-fluid {
    padding-right: 30px;
    padding-left: 30px;
    overflow-y: hidden !important;
}

@media only screen and (min-width: 340px) and (max-width: 992px){
.footer.attendee-home {
    padding-left: 0rem;
}
}

.degree-error-contact-customise li a:hover{
color:red;
text-decoration:underline !important;
}

.degree-error-contact-customise ul {
    padding: 0px 30px;
}

.degree-error-contact-customise li {
    list-style: disc !important;
    font-weight:normal !important;
    white-space: nowrap;
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
    padding-left: 0rem;
}

.error-heading-text {
    font-size: 15px;
}

}

.attendee-error{

display: flex !important;
  flex-direction: column;
  justify-content: space-between;
}

.attendee-home-error{
  min-height:88vh !important;
}

.footer {
    background: rgba(255, 255, 255, 0.1) !important;
}

@media screen and (max-width: 992px){
.header .header-content {
    padding-left: 0rem !important;
    padding-right: 0rem;
}
}

@media screen and (max-width: 630px){
  /* .header.attendee-home-header .header-content {
    padding-left: 10.3125rem !important;
} */
.attendee-error .collapse.navbar-collapse.navbar-align {
    padding-left: 5rem !important;
    padding-right: 6rem !important;
    white-space:normal !important;
}
}
    </style>
  </head>

  <body>
   
    <div id="main-wrapper attendee-error" class="attendee-error">
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
                <div class="card-header error-heading-text">
                 <strong>FOLLOWING ERROR OCCURED</strong>
                </div>
                

                <div class="alert alert-warning alert-dismissible fade show error-danger" role="alert">
                <div class="degree-error-contact-customise">
                    {!! $message !!}
</div>
                    {{-- <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button> --}}
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



  </body>
</html>
