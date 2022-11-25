<link rel="stylesheet" href="{{asset('assets\css\login.css')}}">
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
        @if (\Session::has('success'))
        <div class="alert alert-success">
            <ul>
                <li>{!! \Session::get('success') !!}</li>
            </ul>
        </div>
        @endif
        <div class="container">
            <h1>Welcome Back</h1>

            <div class="login-form">
                <form action="{{ route('user.validate_login')}}" method="POST">
                    @csrf
                    <p>Email <i style="color:red;">*</i></p>
                    <input type="email" id="email" name="email" placeholder="E-mail Address">
                    
                    <p>Password <i style="color:red;">*</i></p>
                    <input type="password" id="password" name="password" placeholder="Password">

                    <div class="forget-pass">
                        <span style="color:white;">Don't have an account?</span><a href="#">Sign Up</a>
                    </div>

                    <button type="submit">LOG-IN</button>

                </form>
            </div>

        </div>
    </div>
</div>