<link rel="stylesheet" href="{{  asset('assets\css\bootstrap.css') }}">
<link rel="stylesheet" type="text/css" href="{{asset('assets\css\email.css')}}">
<title>MOVY</title>

<script>
function myFunction() {
  var x = document.getElementById("password");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}

function confirmFunction() {
  var x = document.getElementById("password-confirm");
  if (x.type === "password ") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>

<body class="my-login-page">
    <section class="h-100">
        <div class="container h-100">
            <div class="row justify-content-md-center align-items-center h-100">
                <div class="card-wrapper">

                    <div class="cardx fat">
                        <div class="card-body">
                            <h4 class="card-title">Reset Password</h4>
                            <form method="POST" class="my-login-validation" novalidate="" action="{{ route('password.update') }}">
                                @csrf

                                <input type="hidden" name="token" value="{{ $token }}">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input id="email" type="email" class="form-control" name="email" placeholder="Email address" value="{{ $email ?? old('email') }}">
                                    <span class="text-danger">@error('email'){{$message}} @enderror</span>
                                </div>
                                <div class="form-group">
                                    <label for="password">New Password</label>
                                    <input id="password" type="password" class="form-control" name="password" placeholder="Enter new password">
                                    <span class="text-danger">@error('password'){{$message}}@enderror</span>
                                    <div>
                                        <input type="checkbox" onclick="myFunction()" style="margin:2%;margin-left: 2%" ><span style="font-size: 0.9em;color: white"> Show Password</span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="password-confirm">Confirm Password</label>
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Enter confirm password">
                                    <span class="text-danger">@error('password_confirmation'){{$message}} @enderror</span>
                                    <div>
                                        <input type="checkbox" onclick="confirmFunction()" style="margin:2%;margin-left: 2%" ><span style="font-size: 0.9em;color: white"> Show Password</span>
                                    </div>
                                </div>

                                <div class="form-group m-0">
                                    <button type="submit" class="btn btn-primary btn-block">
                                        Reset Password
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="footer">
                        Copyright &copy; 2022 &mdash; MOVY
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="jquery-3.4.1.min.js"></script>
    <script src="bootstrap/js/popper.js"></script>
    <script src="bootstrap/js/bootstrap.js"></script>
    <script src="js/my-login.js"></script>
</body>