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
      
            

              
                            
            <div class="card error-bg">
                <div class="card-header error-heading-text">
                  Following Error Occured
                </div>
                

                <div class="alert alert-warning alert-dismissible fade show error-danger" role="alert">
                    <p class="error-text">This course has been cancelled. If you need any more help or information please feel free to contact us:</p>
                      <ul>
                          <li href="#" class="error-style-decor">sue.swindell@srs-development.co.uk</li>
                      <li href="#" class="error-style-decor">www.srs-development.co.uk</li>
                      </ul>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
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

            </div>
        </div>
          

          
      <!--**********************************
            Content body end
        ***********************************-->

      <!--**********************************
            Footer start
        ***********************************-->
      
        


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



  </body>
</html>
