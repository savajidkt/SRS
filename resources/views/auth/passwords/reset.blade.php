<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Reset Password | SRS-Reporting Ltd</title>
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
                        <img src="{{asset('images/srs_logo.jpg')}}" alt="">
                        <h4>{{ __('Reset Password') }}</h4>
                    </div>
                    <form class="em-pass" method="POST" action="{{ route('reset.password.post') }}">
                     @csrf
                     <input type="hidden" name="token" value="{{ $token }}">
                   <div class="col-12">
                      <div class="input-group has-validation">
                         <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus placeholder="Email" require>

                         @error('email')
                             <span class="invalid-feedback" style="display: block;" role="alert">
                                 <strong>{{ $message }}</strong>
                             </span>
                         @enderror
                      </div>
                   </div>
                   <div class="col-12">
                   <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required  placeholder="New Password">
                     @error('password')
                         <span class="invalid-feedback" style="display: block;" role="alert">
                             <strong>{{ $message }}</strong>
                         </span>
                     @enderror
                   </div>
                   <div class="col-12">
                   <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required  placeholder="Confirm Password">
                   </div>
                   <div class="col-12">
                      <button class="btn btn-primary w-100" type="submit">{{ __('Reset Password') }}</button>
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

