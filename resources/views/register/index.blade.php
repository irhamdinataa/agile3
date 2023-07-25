<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport" />
    <title>Register | E-Arsip</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{ asset('admin/modules/bootstrap/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/modules/fontawesome/css/all.min.css') }}" />

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('admin/modules/bootstrap-social/bootstrap-social.css') }}" />

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('admin/css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/css/components.css') }}" />
    <!-- Start GA -->
    <link href="{{ asset('img/iconweb.png') }}" rel="icon">
    <script async src="{{ url('https://www.googletagmanager.com/gtag/js?id=UA-94034622-3') }}"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag("js", new Date());

        gtag("config", "UA-94034622-3");
    </script>
    <!-- /END GA -->
</head>

<body>
    <div id="app">
        <section class="section">
            <div class="container mt-5">
                <div class="row">
                    <div
                        class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                        <br><br><br><br>
                        <div class="card card-primary">
                            <div class="card-header">
                                <h4>Register</h4>
                            </div>

                            <div class="card-body">
                                @if (session('success'))
                                    <div class="alert alert-success">
                                        {!! session('success') !!}
                                    </div>
                                @endif
                                @if (session('error'))
                                    <div class="alert alert-danger">
                                        {!! session('error') !!}
                                    </div>
                                @endif
                                <form action="{{ url('register') }}" method="post">
                                    {{ csrf_field() }}

                                    <div class="input-group mb-3">
                                        <input type="text"
                                            class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
                                            name="name" placeholder="Nama Lengkap" value="{{ old('name') }}">
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-user"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="text-danger">{{ $errors->first('name') }}</p>
                                    <div class="input-group mb-3">
                                        <input type="email"
                                            class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}"
                                            name="email" placeholder="Email" value="{{ old('email') }}">
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-envelope"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="text-danger">{{ $errors->first('email') }}</p>
                                    <div class="input-group mb-3">
                                        <input type="password"
                                            class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}"
                                            name="password" placeholder="Password" value="{{ old('password') }}">
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-lock"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="text-danger">{{ $errors->first('password') }}</p>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-lg btn-block"
                                            tabindex="4">Register</button>
                                    </div>
                                </form>
                                <div class="text-center mt-4 mb-3">
                                    <div class="text-job text-muted">
                                        <a href="{{ url('/login') }}" class="text-small"
                                            style="text-decoration: none;">Login
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
        </section>
    </div>

    <!-- General JS Scripts -->
    <script src="{{ asset('admin/modules/jquery.min.js') }}"></script>
    <script src="{{ asset('admin/modules/popper.js') }}"></script>
    <script src="{{ asset('admin/modules/tooltip.js') }}"></script>
    <script src="{{ asset('admin/modules/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('admin/modules/nicescroll/jquery.nicescroll.min.js') }}"></script>
    <script src="{{ asset('admin/modules/moment.min.js') }}"></script>
    <script src="{{ asset('admin/js/stisla.js') }}"></script>

    <!-- JS Libraies -->

    <!-- Page Specific JS File -->

    <!-- Template JS File -->
    <script src="{{ asset('admin/js/scripts.js') }}"></script>
    <script src="{{ asset('admin/js/custom.js') }}"></script>
</body>

</html>
