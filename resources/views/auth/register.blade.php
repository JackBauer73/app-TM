<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TM | Registration Page</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">

    <style>
        .logo1 {
            width: 150px;
        }
    </style>

</head>

<body class="hold-transition register-page"
    style="background-image: url('assets/images/bg_tm.jpg'); background-color: rgba(0, 0, 0, 0.5);background-repeat: no-repeat; background-size: cover;backdrop-filter: blur(10px);">
    <a href="{{ url('/') }}">
        <img class="logo1" src="{{ asset('images/logo_TournamentManager.png') }}" alt="Logo"></a>
    <div class="register-box">
        <div class="register-logo">
            <a href="{{ url('/') }}"><span style="color: white;"><b>TOURNAMENT</b>MANAGER</span></a>

        </div>
        @include('partials.errors')

        <div class="card">
            <div class="card-body register-card-body">
                <p class="login-box-msg">Inscription d'un nouvel utilisateur</p>
                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="select-group mb-3">
                        <select name="role" class="form-control" id="role-select" required>
                            <option value="Club">Club</option>
                            <option value="Player">Joueur</option>
                        </select>
                    </div>
                    <!-- Numéro du Club -->
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="number" placeholder="Numbero du Club"
                            id="number" value="{{ old('number') }}" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-id-card"></span>
                            </div>
                        </div>
                    </div>


                    <div class="input-group mb-3">
                        <input type="text" name="name" id="name" class="form-control"
                            placeholder="Full name">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="email" name="email" id="email" class="form-control" placeholder="Email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>

                    </div>
                    <div class="input-group mb-3">
                        <input type="password" name="password" class="form-control" placeholder="Password"
                            id="password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" name="password_confirmation" id="password_confirmation"
                            class="form-control" placeholder="Retype password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8">
                            <div class="icheck-primary">
                                <input type="checkbox" id="agreeTerms" name="terms" value="agree">
                                <label for="agreeTerms">
                                    I agree to the <a href="#">terms</a>
                                </label>
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">S'enregistrer</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
                <a href="{{ route('login') }}" class="text-center">Je suis déjà membre</a>
            </div>
            <!-- /.form-box -->
        </div><!-- /.card -->
    </div>
    <!-- /.register-box -->

    <!-- jQuery -->
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('dist/js/adminlte.min.js') }}"></script>


</body>

</html>
