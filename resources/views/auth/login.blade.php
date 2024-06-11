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
                    <h3>Login Here</h3>

                    <label for="username">Username</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                        name="email" value="{{ old('email') }}" required autocomplete="email" autofocus required />
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <label for="password">Password</label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                        name="password" required autocomplete="current-password" required />
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <button class="button-login">{{ __('Login') }}</button>
                    <div class="social">
                        <div class="go"><i class="fab fa-google"></i> Google</div>
                        <div class="fb"><i class="fab fa-facebook"></i> Facebook</div>
                    </div>
                    <style>
                        
                    </style>
                </form>
            </div>

            

        </div>
    </section>

    {{-- <script src="script.js"></script> --}}
    <script src="{{ asset('layout/login/login.js') }}"></script>
</body>

</html>
