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
        <link rel="stylesheet" type="text/css" href="{{ asset('select/css/select2.min.css') }}">
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
            .has_error {
            border: 1px solid red;
            }
            @media (min-width: 1200px) and (max-width: 1350px){
            .content-body.attendee-home {
            margin-left: 0rem;
            }
            }
            @media (max-width: 1290px){
            .contacte-card-header{
            padding: 1.25rem 0rem 5px;
            }
            }
            @media only screen and (min-width: 768px){
            [data-sidebar-style="mini"] .content-body {
            margin-left: 0rem;
            }
            }
            .degree-feedback-contact-customise{
            padding:18px 0px;
            }
            @media only screen and (max-width: 768px){
            .accordion-extra {
            font-size: 15px;
            }
            .accordion-add-contact-colr p {
            color: #454545 !important;
            font-size: 13px;
            }
            .degree-feedback-contact-customise p{
            color: #454545 !important;
            }
            .card-header:first-child {
            font-size: 15px;
            }
            button.btn.btn-outline-danger {
            font-size: 12px !important;
            width: fit-content;
            }
            .attendee-home .btn.btn-primary {
            width: fit-content;
            font-size: 12px !important;
            }
            }
            @media only screen and (max-width: 400px){
            button.btn.btn-outline-danger {
            font-size: 10px !important;
            width: fit-content;
            }
            .attendee-home .btn.btn-primary {
            width: fit-content;
            font-size: 10px !important;
            }  
            .header .header-content {
            padding-left: 2rem !important;
            }
            }
            @media only screen and (max-width: 525px){
            .header .header-content {
            padding-left: 2rem !important;
            }
            }
            .footer {
            background: rgba(255, 255, 255, 0.1) !important;
            }
            .card {
            box-shadow: none;
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
            .header .header-content {
            padding-left: 0rem !important;
            padding-right: 0rem;
            }
            }
            .header .header-content {
            padding-left: 0rem;
            padding-right: 0rem;
            }
            .accordion-add-contact-colr p {
            margin-left: 15px;
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

            @media screen and (max-width: 630px){
  /* .header.attendee-home-header .header-content {
    padding-left: 10.3125rem !important;
} */
.attendee-home-header .collapse.navbar-collapse.navbar-align {
    padding-left: 6rem !important;
    padding-right: 6rem !important;
    white-space:normal !important;
}
}
.form-group.train-deet[data-select2-id] >.input-error {
  display: flex;
  flex-direction: column-reverse;
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
        <div class="header attendee-home-header">
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
    <div class="content-body attendee-home ">
        <div class="container-fluid ">
            <div class="card">
                <div class="card-header attendee-home-lgt attendee-bg-clr add-contact-font">
                    <strong>360-DEGREE FEEDBACK CONTACTS</strong>
                </div>
                @if ($ext_id == "360-frm" || ($attCount != '0'))
                <div class="card-body myExistdiv">
                    <!-- <h5 class="card-title">Special title treatment</h5> -->
                    <p class="card-text attendee-home-font">You already added {{ $attCount }} contact. if you do not want to add more then you can skip this step.
                    </p>
                    <div class="btn-grp">
                        <a href="{{ route('attendees-questionnaire',[$id,$at_id]) }}" class="btn btn-primary mySkepBTN">Skip this step</a>
                        <p class="attendee-home-font">or</p>
                        <a href="javascript:void(0);" class="btn btn-primary myAddedBTN">Add New Contact</a>
                    </div>
                </div>
                @endif
                <div class="row myclsdiv {{  ( (isset($ext_id) && $ext_id == "360-frm") || $attCount != '0' ) ? 'hide' :'' }}">
                <div class="col-xl-6 col-xxl-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="basic-form">
                                <form class="contacte-repeater" action="{{ route('store-contacte') }}" method="post"
                                    enctype="multipart/form-data" id="contacte">
                                    @csrf
                                    <input type="hidden" value="{{ $id }}" name="key" >
                                    <input type="hidden" value="{{ isset($ext_id) ? $ext_id:'con' }}" name="ext_id">
                                    @if($ext_id == '360-frm')
                                    <input type="hidden" value="{{ $at_id }}" name="attendee_id">
                                    @else
                                    <input type="hidden" value="{{ $at_id }}" name="attendee_id">
                                    @endif
                                    <div class="card-header contacte-card-header">
                                        <h4 class="card-title">Contact Details</h4>
                                    </div>
                                    <br>
                                    <div class="">
                                        <div data-repeater-list="contacte">
                                            <div data-repeater-item>
                                                {{-- 
                                                <div class="row d-flex align-items-end">
                                                    --}}
                                                    <div class="form-row contacte-form-content">
                                                        <div class="form-group col-md-6 form-gap-2">
                                                            <label>First Name<span class="filedrequired">*</span></label>
                                                            <div class="input-error">
                                                                <input type="text" class="form-control" name="first_name" onkeyup="this.value=this.value.replace(/[^A-z]/g,'');" placeholder="" >
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-6 form-gap-2">
                                                            <label>Last Name<span class="filedrequired">*</span></label>
                                                            <div class="input-error">
                                                                <input type="text" class="form-control" name="last_name" onkeyup="this.value=this.value.replace(/[^A-z]/g,'');" placeholder="" >
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-6 form-gap-2">
                                                            <label>Email Address<span class="filedrequired">*</span></label>
                                                            <div class="input-error">
                                                                <input type="email" class="form-control" name="email" placeholder="" id="email_0" email-id="email">
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-6 form-gap-2">
                                                            <label>Confirm Email Address<span class="filedrequired">*</span></label>
                                                            <div class="input-error">
                                                                <input type="email" class="form-control" name="confirm_email" placeholder="" id="confirm_email_0" confirm-email-id="confirm_email">
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-6 form-gap-2">
                                                            <label>Relationship</label>
                                                            <div class="input-error customise-select">
                                                                <div class="input-error">
                                                                    <select class="form-select form-select-sm my-select2 mYChangeEvent"
                                                                        name="relationship" 
                                                                        aria-label=".form-select-sm example" id="my_contact_data_0" my-contacts-data="my_contact_data">
                                                                        <option value="" selected disabled>Select
                                                                            Relationship
                                                                        </option>
                                                                        <option value="1">He/She is my line manager
                                                                        </option>
                                                                        <option value="2">He/She reports to me
                                                                        </option>
                                                                        <option value="3">He/She is my colleague/peer
                                                                        </option>
                                                                        <option value="4">Any other relationship
                                                                        </option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                    </div>
                                                    <button class="btn btn-outline-danger text-nowrap px-1"
                                                                    data-repeater-delete type="button">
                                                                <i data-feather="x" class="mr-25"></i>
                                                                <span>Delete</span>
                                                                </button>
                                                        <hr/>
                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-primary">Send to 360 Contacts</button>
                                            <a href="{{ route('login') }}" class="btn btn-primary">Cancel</a>
                                            <button type="button" class="btn btn-primary" data-repeater-create>Add New Contact</button>
                                </form>
                                </div>
                                </div>
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
    <script src="{{ asset('js/form/contacte/contacte.js') }}"></script>
    <script src="{{ asset('js/form/contacte/jquery.repeater.min.js') }}"></script>
    <script src="{{ asset('js/form/contacte/form-repeater.js') }}"></script>
    <script src="{{ asset('select/js/form-select2.js') }}"></script>
    <script src="{{ asset('select/js/select2.full.min.js') }}"></script>
    <script>
        $('#my_contact_data_0').select2({
        
            minimumResultsForSearch: Infinity
        
        });
        
    </script>
    <script>
        $(document).ready(function () {
            $(document).on("change",".mYChangeEvent",function(){
                
                $('#'+$(this).attr('data-select2-id')+'-error').hide();
        });
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