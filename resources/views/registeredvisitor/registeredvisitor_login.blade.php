<!DOCTYPE html>
<html lang="en">

<head>
    {{--    {{ asset('') }}--}}
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('panel/img/apple-icon.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('panel/img/favicon.png') }}">
    <title>
        Registered User login
    </title>
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700,900" />
    <!-- Nucleo Icons -->
    <link href="{{ asset('panel/css/nucleo-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('panel/css/nucleo-svg.css') }}" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <!-- Material Icons -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@24,400,0,0" />
    <!-- CSS Files -->
    {{--    {{ asset('') }}--}}
    <link id="pagestyle" href="{{ asset('panel/css/material-dashboard.css?v=3.2.0') }}" rel="stylesheet" />
</head>

<body class="bg-gray-200">
<div class="container position-sticky z-index-sticky top-0">
    <div class="row">
        <div class="col-12">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg blur border-radius-xl top-0 z-index-3 shadow position-absolute my-3 py-2 start-0 end-0 mx-4">
                <div class="container-fluid ps-2 pe-0">
                    <a class="navbar-brand font-weight-bolder ms-lg-0 ms-3 " href="index.html">
                        Registered Visitor Dashboard
                    </a>
                    <button class="navbar-toggler shadow-none ms-2" type="button" data-bs-toggle="collapse" data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon mt-2">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </span>
                    </button>
                    <div class="collapse navbar-collapse" id="navigation">
                        <ul class="navbar-nav mx-auto">
                            <li class="nav-item">
                                <a class="nav-link d-flex align-items-center me-2 active" aria-current="page" href="{{ route('admin.dashboard') }}">
                                    <i class="fa fa-chart-pie opacity-6 text-dark me-1"></i>
                                    Dashboard
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link me-2" href="profile.html">
                                    <i class="fa fa-user opacity-6 text-dark me-1"></i>
                                    Profile
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link me-2" href="register.html">
                                    <i class="fas fa-user-circle opacity-6 text-dark me-1"></i>
                                    Sign Up
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link me-2" href="{{ route('registeredvisitor.login') }}">
                                    <i class="fas fa-key opacity-6 text-dark me-1"></i>
                                    Sign In
                                </a>
                            </li>
                        </ul>
                        <ul class="navbar-nav d-lg-flex d-none">
                            <li class="nav-item d-flex align-items-center">
                                <a class="btn btn-outline-primary btn-sm mb-0 me-2" target="_blank" href="https://www.creative-tim.com/builder?ref=navbar-material-dashboard">Online Builder</a>
                            </li>
                            <li class="nav-item">
                                <a href="https://www.creative-tim.com/product/material-dashboard" class="btn btn-sm mb-0 me-1 bg-gradient-dark">Free download</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- End Navbar -->
        </div>
    </div>
</div>
<main class="main-content  mt-0">
    <div class="page-header align-items-start min-vh-100" style="background-image: url('https://images.unsplash.com/photo-1497294815431-9365093b7331?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1950&q=80');">
        <span class="mask bg-gradient-dark opacity-6"></span>
        <div class="container my-auto">
            <div class="row">
                <div class="col-lg-4 col-md-8 col-12 mx-auto">
                    <div class="card z-index-0 fadeIn3 fadeInBottom">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                            <div class="bg-gradient-dark shadow-dark border-radius-lg py-3 pe-1">
                                <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">Sign in</h4>
                                <div class="row mt-3">
                                    <div class="col-2 text-center ms-auto">
                                        <a class="btn btn-link px-3" href="javascript:;">
                                            <i class="fa fa-facebook text-white text-lg"></i>
                                        </a>
                                    </div>
                                    <div class="col-2 text-center px-1">
                                        <a class="btn btn-link px-3" href="javascript:;">
                                            <i class="fa fa-github text-white text-lg"></i>
                                        </a>
                                    </div>
                                    <div class="col-2 text-center me-auto">
                                        <a class="btn btn-link px-3" href="javascript:;">
                                            <i class="fa fa-google text-white text-lg"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        @if(Session::has('error'))
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                <strong>{{ session::get('error')  }}</strong> You should check in on some of those fields below.
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        <div class="card-body">
                            <form  action="{{ route('registeredvisitor.login')  }}" class="text-start" method="post">
                                @csrf
                                <div class="input-group input-group-outline my-3">
                                    <label class="form-label"></label>
                                    <input type="email" class="form-control" name="email" placeholder="Email Address">
                                </div>
                                <div class="input-group input-group-outline mb-3">
                                    <label class="form-label"></label>
                                    <input type="password" class="form-control" name="password" placeholder="Password">
                                </div>
                                <div class="form-check form-switch d-flex align-items-center mb-3">
                                    <input class="form-check-input" type="checkbox" id="rememberMe" checked>
                                    <label class="form-check-label mb-0 ms-3" for="rememberMe">Remember me</label>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn bg-gradient-dark w-100 my-4 mb-2">Login</button>
                                </div>
                                <p class="mt-4 text-sm text-center">
                                    Don't have an account?
{{--                                    {{ route('admin.register')  }}--}}
                                    <a href="{{ route('registeredvisitor.register') }}" class="text-primary text-gradient font-weight-bold">Sign up</a>
                                </p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <footer class="footer position-absolute bottom-2 py-2 w-100">
            <div class="container">
                <div class="row align-items-center justify-content-lg-between">
                    <div class="col-12 col-md-6 my-auto">
                        <div class="copyright text-center text-sm text-white text-lg-start">
                            © <script>
                                document.write(new Date().getFullYear())
                            </script>,
                            made with <i class="fa fa-heart" aria-hidden="true"></i> by
                            <a href="https://www.creative-tim.com" class="font-weight-bold text-white" target="_blank">Creative Tim</a>
                            for a better web.
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <ul class="nav nav-footer justify-content-center justify-content-lg-end">
                            <li class="nav-item">
                                <a href="https://www.creative-tim.com" class="nav-link text-white" target="_blank">Creative Tim</a>
                            </li>
                            <li class="nav-item">
                                <a href="https://www.creative-tim.com/presentation" class="nav-link text-white" target="_blank">About Us</a>
                            </li>
                            <li class="nav-item">
                                <a href="https://www.creative-tim.com/blog" class="nav-link text-white" target="_blank">Blog</a>
                            </li>
                            <li class="nav-item">
                                <a href="https://www.creative-tim.com/license" class="nav-link pe-0 text-white" target="_blank">License</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</main>
<!--   Core JS Files   -->
<script src="{{ asset('panel/js/core/popper.min.js') }}"></script>
<script src="{{ asset('panel/js/core/bootstrap.min.js') }}"></script>
<script src="{{ asset('panel/js/plugins/perfect-scrollbar.min.js') }}"></script>
<script src="{{ asset('panel/js/plugins/smooth-scrollbar.min.js') }}"></script>
<script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
        var options = {
            damping: '0.5'
        }
        Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
</script>
<!-- Github buttons -->
<script async defer src="https://buttons.github.io/buttons.js"></script>
<!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
<script src="{{ asset('panel/js/material-dashboard.min.js?v=3.2.0') }}"></script>
</body>

</html>
