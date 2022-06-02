<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Login</title>

    @include('layouts.links')
</head>

<body class="bg-primary">
    <div class="container-fluid" id="login-bg">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="login-content">
                <div class="login-logo">
                    <img id="logo" src="/images/logo.png" alt="logo">

                </div>
                <div class="card">
                    <h3 class="card-header text-center">LogIn</h3>
                    <div class="card-body">
                        <form method="POST" action="{{ route('login.custom') }}">
                            @csrf
                            @if (Session::has('error'))
                                <span class="text-danger">{{ Session::get('error') }}</span>
                            @endif
                            <div class="form-group mb-3">
                                <input type="text" placeholder="Email" id="email" class="form-control" name="email"
                                    required autofocus>
                                @if ($errors->has('email'))
                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                            </div>
                            <div class="form-group mb-3">
                                <input type="password" placeholder="Password" id="password" class="form-control"
                                    name="password" required>
                                @if ($errors->has('password'))
                                    <span class="text-danger">{{ $errors->first('password') }}</span>
                                @endif
                            </div>
                            <div class="form-group mb-3">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember"> Remember Me
                                    </label>
                                    <label class="pull-right">
                                        <a href="#">Forgotten Password?</a>
                                    </label>

                                </div>
                            </div>
                            <div class="d-grid mx-auto">
                                <button type="submit" class="btn btn-dark btn-block">LOGIN</button>
                            </div>
                            <div class="social-login-content">
                                <div class="social-button">
                                    <button type="button"
                                        class="btn btn-primary bg-google btn-flat btn-addon m-t-10">
                                        <i class="fa-brands fa-google"></i>Sign in with google</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
</main>