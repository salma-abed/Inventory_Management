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

    <div class="unix-login">
        <div class="container-fluid" id="login-bg">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="login-content">
                        <div class="login-logo">
                            <img id="logo" src="/images/logo.png" alt="logo">

                        </div>
                        <div class=" login-form">
                            <h4>LOGIN</h4>
                            <form>
                                <div class="form-group">
                                    <label>Username</label>
                                    <input type="text" class="form-control" placeholder="Username">
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" class="form-control" placeholder="Password">
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox"> Remember Me
                                    </label>
                                    <label class="pull-right">
                                        <a href="#">Forgotten Password?</a>
                                    </label>

                                </div>
                                <button type="submit" class="btn btn-primary btn-flat m-b-30 m-t-30">Sign in</button>
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

</body>

</html>