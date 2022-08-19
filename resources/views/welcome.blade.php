<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <link rel="icon" href="{!! asset('images/logo.jpg') !!}"/>
    <title>{{ config('app.name', 'Zetech University CMS') }} | Home</title>

    <!-- Custom fonts for this template-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{asset('css/sb-admin-2.min.css')}}" rel="stylesheet">

    <style>
button:focus {
  outline: none;
  -webkit-box-shadow: none;
          box-shadow: none;
}

a,
a:hover {
  text-decoration: none;
  display: inline-block;
  -webkit-transition: 0.3s ease-in-out;
  transition: 0.3s ease-in-out;
}

img {
  display: inline-block;
  max-width: 100%;
}

@media (min-width: 1200px) {
  .container {
    max-width: 1300px;
  }
}

#main-carousel {
  margin-top: 20px;
  text-shadow: 1px 2px 3px #0000001f;
}

#main-carousel h5 {
  font-size: 2rem;
  font-family: inherit;
  font-weight: 300;
  -webkit-animation: leftToRight 1s ease-in-out .5s;
          animation: leftToRight 1s ease-in-out .5s;
}

#main-carousel h2 {
  font-size: 4.5rem;
  font-weight: 900;
  font-family: inherit;
  letter-spacing: 2px;
  -webkit-animation: topToBottom 1s linear .3s;
          animation: topToBottom 1s linear .3s;
}

#main-carousel .carousel-caption {
  right: 15%;
  bottom: unset;
  top: 50%;
  -webkit-transform: translateY(-50%);
          transform: translateY(-50%);
  text-align: left;
}

#main-carousel .carousel-control-next,
#main-carousel .carousel-control-prev {
  top: 50%;
  bottom: unset;
  -webkit-transform: translateY(-50%);
          transform: translateY(-50%);
  width: 4%;
  font-size: 2.5rem;
  background-color: rgba(255, 255, 255, 0.2);
  padding: 5px;
  -webkit-transition: 5s all;
  transition: 5s all;
}

#main-carousel .carousel-control-next {
  border-top-left-radius: 50px;
  border-bottom-left-radius: 50px;
}

#main-carousel .carousel-control-prev {
  border-top-right-radius: 50px;
  border-bottom-right-radius: 50px;
}

#main-carousel .btn-info {
  background: transparent;
  text-transform: uppercase;
  border: 0;
  font-family: "helveticaregular";
  font-size: 1.2rem;
  position: relative;
  padding: 20px 0 0;
  margin: 20px 0 0;
}

#main-carousel .btn-info::before {
  content: '';
  position: absolute;
  top: 0;
  left: 0;
  width: 63px;
  height: 5px;
  background-color: #fff;
}

.home__form {
  padding: 1.5rem;
  background-color: #fff;
  -webkit-box-shadow: 0 0 1.5rem rgba(0, 0, 0, 0.2);
          box-shadow: 0 0 1.5rem rgba(0, 0, 0, 0.2);
  position: relative;
  z-index: 1;
  top: -50px;
  font-size: 1.2rem;
      width: 80%;
    margin: auto;
}

.home__form h3 {
  font-size: 1rem;
  font-weight: bold;
}

.home__form p {
  font-size: 1rem;
  margin-bottom: 1.5rem;
}

.home__form form {
  text-align: left;
}

.home__form form label {
  font-size: 1rem;
  color: rgba(0, 0, 0, 0.7);
  font-family: "helveticaregular";
}

.home__form form .input-box {
  position: relative;
}

.home__form form .input-box .fa {
  position: absolute;
  right: 0;
  top: 50%;
  -webkit-transform: translateY(-50%);
          transform: translateY(-50%);
  border-left: 1px solid #cdcdcd;
  padding: 3px 15px 3px 10px;
  color: #898989;
}

.home__form form .input-box input {
  height: 45px;
}

.home__form form .input-box textarea,
.home__form form .input-box input {
  border-color: #efefef;
  -webkit-box-shadow: inset 0 0 5px rgba(0, 0, 0, 0.05);
          box-shadow: inset 0 0 5px rgba(0, 0, 0, 0.05);
  border-radius: 5px;
  font-size: 1rem;
  padding: 10px;
  caret-color: #fc5546;
}

.home__form form .input-box textarea:focus + .fa,
.home__form form .input-box input:focus + .fa {
  color: #fc5546;
  border-color: #fc5546;
}

.home__form form .input-box textarea:not(:placeholder-shown),
.home__form form .input-box input:not(:placeholder-shown) {
  border-color: green;
}

.btn.btn-danger {
  width: 100%;
  height: 45px;
  font-size: 1.2rem;
  background-color: #fc5546;
  text-transform: uppercase;
  border-radius: 5px;
  border-color: transparent;
  -webkit-transition: .3s all;
  transition: .3s all;
}

.btn.btn-danger:hover {
  background: #231833;
}

.btn-more {
  font-size: 1.1rem;
  color: #000;
  font-family: "helveticaregular";
}

.btn-more span {
  border-bottom: 1px dotted #000;
}


/* How to use the system Styling */
.board{
    width: 75%;
margin: 60px auto;
height: 500px;
background: #fff;
/*box-shadow: 10px 10px #ccc,-10px 20px #ddd;*/
}
.board .nav-tabs {
    position: relative;
    /* border-bottom: 0; */
    /* width: 80%; */
    margin: 40px auto;
    margin-bottom: 0;
    box-sizing: border-box;

}

.board > div.board-inner{
    background: #fafafa url(http://subtlepatterns.com/patterns/geometry2.png);
    background-size: 30%;
}

p.narrow{
    width: 60%;
    margin: 10px auto;
}

.liner{
    height: 2px;
    background: #ddd;
    position: absolute;
    width: 80%;
    margin: 0 auto;
    left: 0;
    right: 0;
    top: 50%;
    z-index: 1;
}

.nav-tabs > li.active > a, .nav-tabs > li.active > a:hover, .nav-tabs > li.active > a:focus {
    color: #555555;
    cursor: default;
    /* background-color: #ffffff; */
    border: 0;
    border-bottom-color: transparent;
}

span.round-tabs{
    width: 70px;
    height: 70px;
    line-height: 70px;
    display: inline-block;
    border-radius: 100px;
    background: white;
    z-index: 2;
    position: absolute;
    left: 0;
    text-align: center;
    font-size: 25px;
}

span.round-tabs.one{
    color: rgb(34, 194, 34);border: 2px solid rgb(34, 194, 34);
}

li.active span.round-tabs.one{
    background: #fff !important;
    border: 2px solid #ddd;
    color: rgb(34, 194, 34);
}

span.round-tabs.two{
    color: #febe29;border: 2px solid #febe29;
}

li.active span.round-tabs.two{
    background: #fff !important;
    border: 2px solid #ddd;
    color: #febe29;
}

span.round-tabs.three{
    color: #3e5e9a;border: 2px solid #3e5e9a;
}

li.active span.round-tabs.three{
    background: #fff !important;
    border: 2px solid #ddd;
    color: #3e5e9a;
}

span.round-tabs.four{
    color: #f1685e;border: 2px solid #f1685e;
}

li.active span.round-tabs.four{
    background: #fff !important;
    border: 2px solid #ddd;
    color: #f1685e;
}

span.round-tabs.five{
    color: #999;border: 2px solid #999;
}

li.active span.round-tabs.five{
    background: #fff !important;
    border: 2px solid #ddd;
    color: #999;
}

.nav-tabs > li.active > a span.round-tabs{
    background: #fafafa;
}
.nav-tabs > li {
    width: 20%;
}
/*li.active:before {
    content: " ";
    position: absolute;
    left: 45%;
    opacity:0;
    margin: 0 auto;
    bottom: -2px;
    border: 10px solid transparent;
    border-bottom-color: #fff;
    z-index: 1;
    transition:0.2s ease-in-out;
}*/
.nav-tabs > li:after {
    content: " ";
    position: absolute;
    left: 45%;
   opacity:0;
    margin: 0 auto;
    bottom: 0px;
    border: 5px solid transparent;
    border-bottom-color: #ddd;
    transition:0.1s ease-in-out;
    
}
.nav-tabs > li.active:after {
    content: " ";
    position: absolute;
    left: 45%;
   opacity:1;
    margin: 0 auto;
    bottom: 0px;
    border: 10px solid transparent;
    border-bottom-color: #ddd;
    
}
.nav-tabs > li a{
   width: 70px;
   height: 70px;
   margin: 20px auto;
   border-radius: 100%;
   padding: 0;
}

.nav-tabs > li a:hover{
    background: transparent;
}

.tab-content{
}
.tab-pane{
   position: relative;
padding-top: 50px;
}
.tab-content .head{
    font-family: 'Roboto Condensed', sans-serif;
    font-size: 25px;
    text-transform: uppercase;
    padding-bottom: 10px;
}
.btn-outline-rounded{
    padding: 10px 40px;
    margin: 20px 0;
    border: 2px solid transparent;
    border-radius: 25px;
}

.btn.green{
    background-color:#5cb85c;
    /*border: 2px solid #5cb85c;*/
    color: #ffffff;
}



@media( max-width : 585px ){
    
    .board {
width: 90%;
height:auto !important;
}
    span.round-tabs {
        font-size:16px;
width: 50px;
height: 50px;
line-height: 50px;
    }
    .tab-content .head{
        font-size:20px;
        }
    .nav-tabs > li a {
width: 50px;
height: 50px;
line-height:50px;
}

.nav-tabs > li.active:after {
content: " ";
position: absolute;
left: 35%;
}

.btn-outline-rounded {
    padding:12px 20px;
    }
}

@-webkit-keyframes leftToRight {
  0% {
    opacity: 0;
    -webkit-transform: translateX(-80px);
            transform: translateX(-80px);
  }
  80% {
    -webkit-transform: translateX(20px);
            transform: translateX(20px);
    opacity: .7;
  }
  100% {
    opacity: 1;
    -webkit-transform: translateX(0);
            transform: translateX(0);
  }
}

@keyframes leftToRight {
  0% {
    opacity: 0;
    -webkit-transform: translateX(-80px);
            transform: translateX(-80px);
  }
  80% {
    -webkit-transform: translateX(20px);
            transform: translateX(20px);
    opacity: .7;
  }
  100% {
    opacity: 1;
    -webkit-transform: translateX(0);
            transform: translateX(0);
  }
}

@-webkit-keyframes topToBottom {
  0% {
    opacity: 0;
    -webkit-transform: translateY(-50px);
            transform: translateY(-50px);
  }
  80% {
    -webkit-transform: translateY(10px);
            transform: translateY(10px);
    opacity: .7;
  }
  100% {
    opacity: 1;
    -webkit-transform: translateY(0);
            transform: translateY(0);
  }
}

@keyframes topToBottom {
  0% {
    opacity: 0;
    -webkit-transform: translateY(-50px);
            transform: translateY(-50px);
  }
  80% {
    -webkit-transform: translateY(10px);
            transform: translateY(10px);
    opacity: .7;
  }
  100% {
    opacity: 1;
    -webkit-transform: translateY(0);
            transform: translateY(0);
  }
}
    </style>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

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
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-sign-in-alt fa-sm fa-fw mr-2 text-dark"></i>
                                <span class="mr-2 d-none d-lg-inline text-dark">Login As</span>
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in mt-0"
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
            <!-- End of Main Content -->
            <div id="main-carousel" class="carousel slide mt-0" data-ride="carousel">

            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{url('images/img1.jpg')}}" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h2 class="text-primary"> Graduation Clearance Made Easy</h2>
                        <div class="">
                            <a href="#0" class="btn btn-primary">GET MORE INFO</a>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="{{url('images/img2.jpg')}}" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h2 class="text-primary"> Graduate Happily</h2>
                        <div class="">
                            <a href="#0" class="btn btn-primary">GET MORE INFO</a>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="{{url('images/img3.jpg')}}" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h2 class="text-primary"> Clear in peace</h2>
                        <div class="">
                            <a href="#0" class="btn btn-primary">GET MORE INFO</a>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="{{url('images/img4.jpg')}}" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                       <!--<h5>It is a long established </h5>-->
                        <h2 class="text-primary"> Easy Clearance</h2>
                        <div class="">
                            <a href="#0" class="btn btn-primary">GET MORE INFO</a>
                        </div>
                    </div>
                </div>


            </div>
            <a class="carousel-control-prev" href="#main-carousel" role="button" data-slide="prev">
                <i class="fa fa-angle-left" aria-hidden="true"></i>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#main-carousel" role="button" data-slide="next">
                <i class="fa fa-angle-right" aria-hidden="true"></i>
                <span class="sr-only">Next</span>
            </a>
        </div>
        <section class="home__form">
            <div class="container-fluid">
                <div class="home__form-container text-center">
                    <h3>Get In Touch</h3>
                    <p>Please get in touch with our support team and expect a response within 24 working hours.</p>
                    <form>
                        <div class="row">
                            <div class="col-sm-3">
                                <div class="form-group">

                                    <div class="input-box ">
                                        <input type="text" class="form-control" placeholder="Name *" aria-label="Name" aria-describedby="name" required>
                                        <i class="fa fa-user" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <div class="input-box ">
                                        <input type="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" class="form-control" placeholder="Email" aria-label="email" aria-describedby="email">
                                        <i class="fa fa-envelope" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>

                            <!--
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <div class="input-box ">
                                        <input type="text" class="form-control" placeholder="Phone" aria-label="phone" aria-describedby="phone">
                                        <i class="fa fa-phone" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>

                            -->
                            <div class="col-sm-3">

                                <div class="form-group">
                                    <div class="input-box ">
                                        <textarea class="form-control" placeholder="Message" rows="1"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3"><button type="submit" class="btn btn-danger btn-sm">Submit Now!</button></div>
                        </div>

                    </form>
                </div>
            </div>
        </section>


        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>


    <!-- Bootstrap core JavaScript-->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

<!-- css --> 
<link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" rel="stylesheet"/>

    <!-- Core plugin JavaScript-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{url('js/sb-admin-2.min.js')}}"></script>
    <!-- Page level plugins -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="{{url('js/chart-area-demo.js')}}"></script>
    <script src="{{url('js/chart-pie-demo.js')}}"></script>

    <script>
        $(function(){
        $('a[title]').tooltip();
        });
    </script>

</body>

</html>