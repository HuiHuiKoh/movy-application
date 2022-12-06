<link rel="stylesheet" href="{{asset('assets\css\login.css')}}">
<link rel="stylesheet" href="{{asset('assets\css\error.css')}}">
<title>MOVY</title>

<div class="parent clearfix">
    <div class="bg-illustration">
        <img src="import/assets/img/login.jpg" alt="logo">

        <div class="burger-btn">
            <span></span>
            <span></span>
            <span></span>
        </div>

    </div>

    <div class="login">

        <div class="container">
            <h1>Welcome Back</h1>

            @if (\Session::has('error'))
            <div class="invalid invalid-danger">
                <ul>
                    <li>{!! \Session::get('error') !!}</li>
                </ul>
            </div>
            @endif

            @if ($errors->any())
            <div class="invalid invalid-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            @if (\Session::has('success'))
            <div class="invalid invalid-success">
                <ul>
                    <li>{!! \Session::get('success') !!}</li>
                </ul>
            </div>
            @endif

            <div class="login-form">
                <form action="{{ route('user.validate_login')}}" method="POST">
                    @csrf
                    <p>Email <i style="color:red;">*</i></p>
                    <input type="email" id="email" name="email" placeholder="E-mail Address">

                    <p>Password <i style="color:red;">*</i></p>
                    <input type="password" id="password" name="password" placeholder="Password">

                    <div class="forget-pass">
                        <p><a href="{{route('password.request')}}">Forgot Password?</a></p>
                        <br>
                        <span style="color:white;">Don't have an account?</span><a href="{{asset('registration')}}">Sign Up</a>

                    </div>

                    <button type="submit">LOG-IN</button>

                </form>
            </div>

        </div>
    </div>
</div>