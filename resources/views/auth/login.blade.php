<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <title>Preskool - Login</title>

    <link rel="shortcut icon" href="{{ asset('') }}assets/img/favicon.png">

    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,500;0,700;0,900;1,400;1,500;1,700&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('') }}assets/plugins/bootstrap/css/bootstrap.min.css">

    <link rel="stylesheet" href="{{ asset('') }}assets/plugins/feather/feather.css">

    <link rel="stylesheet" href="{{ asset('') }}assets/plugins/icons/flags/flags.css">

    <link rel="stylesheet" href="{{ asset('') }}assets/plugins/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="{{ asset('') }}assets/plugins/fontawesome/css/all.min.css">

    <link rel="stylesheet" href="{{ asset('') }}assets/css/style.css">
</head>

<body>
    <div class="main-wrapper login-body">
        <div class="login-wrapper">
            <div class="container">
                <div class="loginbox">
                    <div class="login-left">
                        <img class="img-fluid" src="{{ asset('') }}assets/img/login.png" alt="Logo">
                    </div>
                    <div class="login-right">
                        <div class="login-right-wrap">
                            <h1 class="mb-3">Selamat Datang di SIKAMIN</h1>
                            {{-- <p class="account-subtitle"></a></p> --}}
                            <h5 class="mb-3">Silahkan Login!</h5>
                            <form action="{{ url('/login/auth') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label>Username <span class="login-danger">*</span></label>
                                    <input name="username" class="form-control" type="text">
                                    <span class="profile-views"><i class="fas fa-user-circle"></i></span>
                                </div>
                                <div class="form-group">
                                    <label>Password <span class="login-danger">*</span></label>
                                    <input name="password" class="form-control pass-input" type="text">
                                    <span class="profile-views feather-eye toggle-password"></span>
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-primary btn-block" type="submit">Login</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="{{ asset('') }}assets/js/jquery-3.6.0.min.js"></script>

    <script src="{{ asset('') }}assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="{{ asset('') }}assets/js/feather.min.js"></script>

    <script src="{{ asset('') }}assets/js/script.js"></script>
</body>

</html>
