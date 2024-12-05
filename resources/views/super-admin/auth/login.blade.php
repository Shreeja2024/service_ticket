<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin | Log in</title>
    {{-- <link rel="icon" type="image/x-icon" href="{{ asset('assetsBackend') }}/images/favicon.png"> --}}
    <link rel="icon" type="image/x-icon" href="{{ asset('assets') }}/img/favicon.ico">

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&amp;display=fallback">
    <link rel="stylesheet" href="{{ asset('assetsBackend') }}/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('assetsBackend') }}/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('assetsBackend') }}/dist/css/adminlte.min.css">
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <a href=""><img src="{{ asset('assetsBackend') }}/images/logo.jpg"
                    width="150px"></a>
        </div>

        <div class="card">
            <div class="card-body login-card-body">
                
                <p class="login-box-msg">Sign In</p>
                @if ($message = Session::get('error'))
                    <div class="alert alert-danger alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>{{ $message }}</strong>
                    </div>
                @endif
                @php
                    $userRemember = request()->cookie('remember_me');
                    // dd($userRemember);
                @endphp
                <form action="{{ route('super-admin.login.submit')}}" method="POST">
                    @csrf
                    <div class="input-group mb-1">
                        <input type="email" id="email" name="email" class="form-control" placeholder="Email"
                            value="{{ old('email', request()->cookie('email')) }}">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    @if ($errors->has('email'))
                        <div class="text-danger mb-2">{{ $errors->first('email') }}</div>
                    @endif

                    <div class="input-group mb-1 mt-2">
                        <input type="password" id="password"
                            value="{{ old('password', request()->cookie('password')) }}" name="password"
                            class="form-control" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                {{-- <span class="fas fa-lock"></span> --}}
                                <span class="fas fa-lock password-show" id="togglePassword"
                                    style="cursor: pointer;"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-8">
                            <div class="icheck-primary">
                                <input @if (old('remember') == 'on' || $userRemember) checked @endif type="checkbox" name="remember"
                                    id="remember">
                                <label for="remember">
                                    Remember Me
                                </label>
                            </div>
                            {{-- <p class="mb-1">
                                <a href="#">I forgot my password</a>
                            </p> --}}
                        </div>
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                        </div>

                    </div>
            </div>
            @if ($errors->has('password'))
                <div class="text-danger mb-2">{{ $errors->first('password') }}</div>
            @endif


            </form>
            
        </div>
    </div>
    </div>
    <script src="{{ asset('assetsBackend') }}/plugins/jquery/jquery.min.js"></script>
    <script src="{{ asset('assetsBackend') }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('assetsBackend') }}/dist/js/adminlte.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#togglePassword').on('click', function() {
                const passwordField = $('#password');
                const passwordFieldType = passwordField.attr('type');

                if (passwordFieldType === 'password') {
                    passwordField.attr('type', 'text');
                    $(this).removeClass('fas fa-lock').addClass('fas fa-unlock');
                } else {
                    passwordField.attr('type', 'password');
                    $(this).removeClass('fas fa-unlock').addClass('fas fa-lock');
                }
            });
        });
    </script>
</body>

</html>
