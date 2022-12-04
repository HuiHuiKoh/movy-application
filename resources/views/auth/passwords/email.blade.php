<link rel="stylesheet" href="{{  asset('assets\css\bootstrap.css') }}">
<link rel="stylesheet" type="text/css" href="{{asset('assets\css\email.css')}}">
<title>MOVY</title>
<body class="my-login-page">
    <section class="h-100">
        <div class="container h-100">
            <div class="row justify-content-md-center align-items-center h-100">
                <div class="card-wrapper">

                    <div class="cardx fat">
                        <div class="card-body">
                            <h4 class="card-title">Forgot Password</h4>
                            <form method="POST" class="my-login-validation" novalidate="" action="{{ route('password.email') }}">
                                @csrf

                                @if (session('status'))
                                <div class="alert alert-ssuccess">
                                    {{ session('status') }}
                                </div>
                                @endif
                                <div class="form-group">
                                    <label for="email" style="color:#ffffff;">E-Mail Address</label>
                                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Enter your email">
                                    <span class="text-danger">@error('email'){{ $message }} @enderror</span>
                                </div>

                                <div class="form-group m-0">
                                    <button type="submit" class="btn btn-primary btn-block">
                                        Submit
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


</body>

