<!DOCTYPE html>
<!-- Coding By CodingNepal - codingnepalweb.com -->
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>

    <!-- Unicons -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css" />
    {{-- css and js --}}
    <link rel="stylesheet" href="{{ asset('layout/login/login.css') }}">

</head>

<body>
    <!-- Header -->
    <header class="header">
        <nav class="nav">
            <a href="#" class="nav_logo">TuanButWebMovie</a>

            <ul class="nav_items">
                <li class="nav_item">
                    <a href="{{ route('home') }}" class="nav_link">Home</a>
                    <a href="#" class="nav_link">Product</a>
                    <a href="#" class="nav_link">Services</a>
                    <a href="https://www.facebook.com/dinhtuanbut/" class="nav_link">Contact</a>
                </li>
            </ul>

            <button class="button" id="form-open">Login</button>
        </nav>
    </header>

    <!-- Home -->
    <section class="home">
        <div class="form_container">
            <i class="uil uil-times form_close"></i>
            <!-- Login From -->
            <div class="form login_form">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <h2>Login</h2>

                    <div class="input_box">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                            name="email" value="{{ old('email') }}" required autocomplete="email" autofocus
                            required />
                        <i class="uil uil-envelope-alt email"></i>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="input_box">
                        <input id="password" type="password"
                            class="form-control @error('password') is-invalid @enderror" name="password" required
                            autocomplete="current-password" required />
                        <i class="uil uil-lock password"></i>
                        <i class="uil uil-eye-slash pw_hide"></i>
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="option_field">
                        <span class="checkbox">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                {{ old('remember') ? 'checked' : '' }} />
                            <label for="check">{{ __('Remember Me') }}</label>
                        </span>
                        <a href="#" class="forgot_pw">Forgot password?</a>
                    </div>

                    <button class="button">{{ __('Login') }}</button>
                    @if (Route::has('password.request'))
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                    @endif

                    <div class="login_signup">Don't have an account? <a href="#" id="signup">Signup</a></div>
                    <div class="login_social">
                        <div class="login-button facebook">
                            <a href="{{ route('login-social',['provider'=>'facebook']) }}" class="">
                                <img src="https://www.facebook.com/images/fb_icon_325x325.png" alt="Facebook" width="24"
                                    height="24">
                                    <span>

                                        Continue with Facebook
                                    </span>
                            </a>
                        </div>
                        <div class="login-button google">
                            <a href="{{ route('login-social',['provider'=>'google']) }}" class="">
                                <img src="https://www.google.com/images/branding/googlelogo/2x/googlelogo_light_color_92x30dp.png"
                                    alt="Google" width="24" height="24">
                                    <span style="color:#000;">
                                        Continue with Google
                                    </span>
                            </a>
                        </div>
                        <style>
                            .login_social {
                                display: flex;
                                flex-direction: column;
                                justify-content: center;
                                align-items: center;
                                height: 100%;
                                background-color: #fff;
                                margin: 0;
                            }

                            .login-button {
                                cursor: pointer;
                                display: flex;
                                align-items: center;
                                justify-content: center;
                                width: 100%;
                                padding: 15px;
                                margin: 10px;
                                border-radius: 5px;
                                font-size: 16px;
                                text-decoration: none;
                                color: #fff;
                                font-family: Arial, sans-serif;
                            }
                            .login-button span{
                                color: #fff;
                            }
                            .login-button a{
                                text-decoration: none;
                            }
                            .facebook {
                                background-color: #1877f2;
                            }

                            .google {
                                background-color: #ffffff;
                                color: #3c4043;
                                border: 1px solid #dadce0;
                            }

                            

                            .login-button img {
                                margin-right: 10px;
                            }
                        </style>
                    </div>
                </form>
            </div>

            <!-- Signup From -->
            <div class="form signup_form">
                <form action="#">
                    <h2>Signup</h2>

                    <div class="input_box">
                        <input type="email" placeholder="Enter your email" required />
                        <i class="uil uil-envelope-alt email"></i>
                    </div>
                    <div class="input_box">
                        <input type="password" placeholder="Create password" required />
                        <i class="uil uil-lock password"></i>
                        <i class="uil uil-eye-slash pw_hide"></i>
                    </div>
                    <div class="input_box">
                        <input type="password" placeholder="Confirm password" required />
                        <i class="uil uil-lock password"></i>
                        <i class="uil uil-eye-slash pw_hide"></i>
                    </div>

                    <button class="button">Signup Now</button>

                    <div class="login_signup">Already have an account? <a href="#" id="login">Login</a>
                    </div>
                </form>
            </div>

        </div>
    </section>

    {{-- <script src="script.js"></script> --}}
    <script src="{{ asset('layout/login/login.js') }}"></script>
</body>

</html>
