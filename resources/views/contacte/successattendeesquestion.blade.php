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
      } 
      .error-bg{
      background-color:#000066;
      }

      .error-danger{
        color: #D8000C;
        background-color:#FFBABA;
        border:1px solid #D8000C;
      }

      .error-style-decor{
        list-style-type:circle;
        color:red;
      }

      .error-text{
        color: #D8000C;
      }


      .error-heading-text{
        color:#fff;
        font-size:18px;
        font-weight:500;
      }

      .attendee-home-error{
        margin-left:0rem;
        overflow-y: hidden !important;
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
                                    <p id="demo"></p>
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
      
            
              {{-- <div class="card">
                <button class="accordion accordion-extra attendee-home-lgt attendee-bg-clr add-contact-font">INSTRUCTION</button>
                <div class="panel accordion-panel-extra accordion-add-contact-colr">
                  {!! $sidebar !!}
                </div>
             
               </div> --}}
              
                            
            <div class="card error-bg">
                <div class="success-error-content">

                <div class="card-header error-heading-text">
                  Thank You
                </div>
                

                <div class="alert alert-success alert-dismissible d-flex align-items-center fade show success-text-clr">
                    <i class="bi-check-circle-fill"></i>  <strong class="mx-2"></strong> 
                    {!! $message !!}
                   
                    {{-- <strong class="mx-2">Thank You!</strong> for completing your online form for your upcoming course with SRS The Development Team. We look forward to working with you soon. --}}
                    {{-- If you have any queries or need any more details please contact your company organiser. --}}
                    <!-- <button type="button" class="btn-close" data-bs-dismiss="alert"></button> -->
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js" integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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

  </body>
</html>
