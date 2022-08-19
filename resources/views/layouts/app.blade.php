<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="icon" href="{!! asset('images/logo.jpg') !!}"/>
    <title>{{ config('app.name', 'Zetech University CMS') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app">

    <!-- Main Content -->
    <div id="content">

<!-- Topbar -->
<nav class="navbar navbar-expand navbar-light bg-white topbar static-top shadow">

<div class="container-fluid ml-2 mr-2">

<!-- Sidebar Toggle (Topbar) -->
<button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
    </button>



<a class="navbar-brand" href="{{ url('/') }}">
    <img src="{{url('images/logo.jpg')}}" class="img img-responsive " width="50px" height="60px"> {{ config('app.name', 'Zetech University CMS') }}
</a> 
    

    

    <!-- Topbar Navbar -->
    <ul class="navbar-nav ml-auto">
        <!-- Nav Item - User Information -->
        <li class="nav-item mt-2 mr-2">
            <a class="btn btn-primary btn-sm d-none" href="{{ url('/') }}"><i class="fas fa-arrow-left"></i> &nbsp{{ __('Back to Home') }}</a>
        </li>
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-sign-in-alt fa-sm fa-fw mr-2 text-dark"></i>
                <span class="mr-2 d-none d-lg-inline text-dark">Login As</span>
            </a>
            <!-- Dropdown - User Information -->
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in mt-4"
                aria-labelledby="userDropdown">
                <a class="dropdown-item" href="{{url('login')}}">
                    <i class="fas fa-lock fa-sm fa-fw mr-2 text-dark-800"></i>
                    Admin
                </a>
                <a class="dropdown-item" href="{{url('/hodLogin')}}">
                    <i class="fas fa-user fa-sm fa-fw mr-2 text-dark-800"></i>
                    HOD
                </a>
                <a class="dropdown-item" href="{{url('/registrarLogin')}}">
                    <i class="fas fa-list-alt fa-sm fa-fw mr-2 text-dark-800"></i>
                    Registrar
                </a>
                <a class="dropdown-item" href="{{url('/financeLogin')}}">
                    <i class="fas fa-credit-card fa-sm fa-fw mr-2 text-dark-800"></i>
                    Finance Officer
                </a>
                <a class="dropdown-item" href="{{url('/roLogin')}}">
                    <i class="fa fa-address-book fa-sm fa-fw mr-2 text-dark-800"></i>
                    Records Officer
                </a>
                <a class="dropdown-item" href="{{url('/librarianLogin')}}">
                    <i class="fas fa-book fa-sm fa-fw mr-2 text-dark-800"></i>
                    Librarian
                </a>
                <a class="dropdown-item" href="{{url('/studentLogin')}}">
                    <i class="fas fa-user-circle  fa-sm fa-fw mr-2 text-dark-800"></i>
                    Student
                </a>
            </div>
        </li>

        <!-- <li class="nav-item">
            <a class="nav-link text-dark" href="{{url('/register') }}">
                <i class="fas fa-user-plus fa-sm fa-fw mr-2 text-dark"></i>
                <span class="mr-2 d-none d-lg-inline text-dark">Register</span>
            </a>
        </li> -->

    </ul>
</div>
</nav>

</div>
        <main class="py-4">
            @yield('content')
        </main>
    </div>

    <script>
        $(document).ready(function() {
            $('#table').DataTable();
        } );
    </script>

<link rel="stylesheet" href="https://cdn.datatables.net/1.10.2/css/jquery.dataTables.min.css">
<script type="text/javascript" src="https://cdn.datatables.net/1.10.2/js/jquery.dataTables.min.js"></script>

     <!-- Bootstrap core JavaScript-->
     <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

<!-- css --> 
<link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" rel="stylesheet"/>


</body>
</html>
