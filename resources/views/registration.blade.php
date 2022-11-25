<link rel="stylesheet" href="{{asset('assets\css\register.css')}}">
<link rel="stylesheet" href="{{asset('assets\css\error.css')}}">
<title>MOVY</title>


<div class="parent clearfix">
    <div class="bg-illustration" style="background:#2A2A2A;">
        <img src="import/assets/img/logo.png" alt="logo">
        <div class="burger-btn">
            <span></span>
            <span></span>
            <span></span>
        </div>

    </div>



    <div class="register">
        <div class="container" >
            
            <h1>Sign Up</h1>

            @if ($errors->any())
            <div class="invalid invalid-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <div class="register-form">
                <form action=" {{route('user.validate_registration')}}" method="POST">
                    @csrf
                    <p>Name <i style="color:red;">*</i></p>
                    <input type="text" id="name" name="name" placeholder="Name">                   
                    <p>Phone No <i style="color:red;">*</i></p>
                    <input type="tel" id="phone" name="phone" placeholder="Phone No">
                    <p>Email <i style="color:red;">*</i></p>
                    <input type="email" id="email" name="email" placeholder="E-mail Address">
                    <p>Password <i style="color:red;">*</i></p>
                    <input type="password" id="password" name="password" placeholder="Password">
                    <p>Date of Birth <i style="color:red;">*</i></p>
                    <input type="date" id="birth" name="birth" placeholder="">

                    <button type="submit">SIGN-UP</button>

                </form>
            </div>

        </div>
    </div>
</div>