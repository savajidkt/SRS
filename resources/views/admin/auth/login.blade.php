<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>SRS-The Development Ltd</title>
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
                        <p>Welcome back! Please login to your account.</p>
                    </div>
                        <form class="em-pass" action="{{ route('login') }}" method="POST">
                        @csrf

                            <label for="email">Email Address</label>                            
                            <input class="form-control" id="email" type="text" name="email" placeholder="" value="{{ old('email') }}" aria-describedby="login-email" autofocus="" tabindex="1" required />
                                @error('email')
                                <span class="invalid-feedback" style="display: block;" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror


                            <label for="password">Password</label>
                            <input class="form-control form-control-merge" id="password" type="password" name="password" placeholder="" aria-describedby="login-password" tabindex="2" />
                                         
                            @error('password')
                            <span class="invalid-feedback" style="display: block;" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                          
                          
                        <div class="form-checkbox">
                            <div class="form-checkbox-content">
                                    <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <label for="remember">
                                    Remember me
                                  </label>
                                  

                            </div>
                              {{-- <p>Forgot Password</p> --}}
                        </div>
                        <div class="login-btn">
                            <input type="submit" class="log-btn" value="Login"/>
                            {{-- <a href="" class="sign-btn">Sign up</a> --}}
                            @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}" class="sign-btn">Forgot Password</a>
                            @endif
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
