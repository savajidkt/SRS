<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Reset Password | SRS-The Development Ltd</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('images/dashboard-fav-icon-2.png')}}">
    <link href="{{asset('css/style.css')}}" rel="stylesheet">

</head>

<body class="h-100">

    <section class="registration-login-page">

        <div class="login-page">
            <div class="login-page-content">
                <div class="login-page-left">
                  <img class="img-left" src="{{asset('images/Group 243.png')}}" alt="">
                </div>
                <div class="login-page-right">
                   <div class="login-page-form">

                    <div class="login-page-img">
                        <img src="./images/srs_logo.jpg" alt="">
                        <h4>FORGOT YOUR PASSWORD ?</h4>
                        <p class="text-para">Enter your email address and we'll send you instructions on how to reset your password.</p>
                    </div>
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                        <form class="em-pass" method="POST"  action="{{ route('forgot-password') }}">
                           @csrf
                           
                            <label for="fname">Email Address</label>
                            <input id="email" type="email" class=" @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus placeholder="Email Address" require>

                            @error('email')
                                <span class="invalid-feedback" style="display: block;" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                          
                          <div class="form-checkbox">
                           
                          </div>
                          <div class="login-btn">
                            <input type="submit" class="log-btn" value="Send Link" />
                            <a href="{{ route('login') }}"  class="sign-btn">Login</a>
                           </div>
                        </form>
                   </div> 
                   
                </div>
            </div>
        </div>

    </section>

   <!--**********************************
        Scripts
    ***********************************-->   
    <!-- Required vendors -->
    <script src="{{asset('vendor/global/global.min.js')}}"></script>
    <script src="{{asset('js/quixnav-init.js')}}"></script>
    <script src="{{asset('js/custom.min.js')}}"></script>

</body>

</html>


