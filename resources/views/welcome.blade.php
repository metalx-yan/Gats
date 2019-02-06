<html>
    <head>
        <title>Home</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="utf-8">
        <meta name="keywords" content="Skill Point Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
    SmartPhone Compatible web template, free WebDesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
        <script>
            addEventListener("load", function () {
                setTimeout(hideURLbar, 0);
            }, false);

            function hideURLbar() {
                window.scrollTo(0, 1);
            }
        </script>

        <!-- Bootstrap Core CSS -->
        <link href="{{ asset('css/home/bootstrap.css') }}" rel="stylesheet" type="text/css">
        <!-- login icon animation -->
        <link href="{{ asset('css/home/animate.css') }}" rel="stylesheet" type="text/css" media="all">
        <!-- Custom CSS -->
        <link href="{{ asset('css/home/style.css') }}" rel="stylesheet" type="text/css">
        <!-- font-awesome icons -->
        {{-- <link href="{{ asset('css/home/fontawesome-all.min.css') }}" rel="stylesheet" type="text/css"> --}}

        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
        <!-- //Custom Theme files -->
        <!-- online fonts -->
        <link href="//fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i"
            rel="stylesheet">
        <link href="//fonts.googleapis.com/css?family=Gentium+Book+Basic:400,400i,700i" rel="stylesheet">
        <!--//online fonts -->
    </head>

    <body>
        <header>
        <div class="header-top">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <ul class="d-flex agileh col-sm-12">
                            <li>
                                <h3>
                                    <a href="{{ route('home') }}"><img src="{{ asset('/images/logosekolah.png') }}" alt="" height="10%" width="10%"></a> &nbsp
                                    <a href="{{ route('home') }}" class="text-white">SMKN 4 Kota Tangerang</a>
                                </h3>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-6 hearder-right-agile agile">
                        <div class="d-flex">
                            <!-- Multiple select filter  -->
                                <label for=""><br><br></label>
                            <div class="login-wthree my-auto">
                                <a href="{{ route('login') }}" class="text-white text-capitalize">login <span class="fas fa-sign-in-alt flash animated infinite"></span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-bottom">
            <div class="container">
                <nav class="navbar navbar-expand-lg navbar-light p-0">
                </nav>
            </div>
        </div>
    </header>

       <!-- Carousel -->
    <div class="row justify-content-center align-items-center no-gutters banner-agile">
        <div class="col-lg-8">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item bg1 active">
                        <div class="bnr-text-wthree">
                            <h3 class="b-w3ltxt">the perfect theme for</h3>
                            <p class="mx-auto text-capitalize mt-2 text-white">education and training center</p>
                        </div>
                    </div>
                    <!-- slider text -->
                    <div class="carousel-item bg2">
                        <div class="bnr-text-wthree">
                            <h3 class="b-w3ltxt">the perfect theme for</h3>
                            <p class="mx-auto text-capitalize mt-2 text-white">education and training center</p>
                        </div>
                    </div>
                    <!-- slider text -->
                    <div class="carousel-item bg3">
                        <div class="bnr-text-wthree">
                            <h3 class="b-w3ltxt">the perfect theme for</h3>
                            <p class="mx-auto text-capitalize mt-2 text-white">education and training center</p>
                        </div>
                    </div>
                    <!-- slider text -->
                </div>
            </div>
            <!-- Carousel -->
            <!-- //banner -->
        </div>
        <div class="col-lg-4">
            <div class="wthree-form">
                <h4>Pilih Jadwal Sesuai Kelas</h4>
                <i><p class="login-sub">Let’s find a perfect course for you now!</p></i>
                <form action="home.html" method="get" class="register-wthree">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-12">
                                <span class="fas fa-envelope-open"></span>
                                <label>
                                    Kelas
                                </label>
                                <select name="" id="" class="form-control">
                                    <option value="">---Select---</option>
                                    @foreach (App\Models\Level::all() as $level)
                                        @foreach ($level->majors as $major)
                                            <option value="{{ $major->id }}">{{ $major->level->class }} {{ $major->name }}</option>
                                        @endforeach
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                     <div class="form-group">
                        <div class="row">
                            <div class="col-md-12">
                                <span class="fas fa-envelope-open"></span>
                                <label>
                                    Jurusan   
                                </label>
                                <select name="" id="" class="form-control">
                                    <option value="">---Select---</option>
                                        @foreach (App\Models\Level::all() as $level)
                                            @foreach ($level->majors as $major)
                                                @foreach ($major->expertises as $expertise)
                                                    <option value="{{ $expertise->id }}">{{ $expertise->name }} {{ $expertise->part }}</option>
                                                @endforeach
                                            @endforeach
                                        @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                     <div class="form-group">
                        <div class="row">
                            <div class="col-md-12">
                                <span class="fas fa-envelope-open"></span>
                                <label>
                                    Kelas
                                </label>
                                <select name="" id="" class="form-control">
                                    <option value="">---Select---</option>
                                    @foreach (App\Models\Level::all() as $level)
                                        <option value="{{ $level->id }}">{{ $level->class }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="mt-4">
                        <button type="submit" class="btn btn-agile btn-block w-100">register</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- //carousel -->
    <!-- //banner -->
    <!-- about -->
    <section class="wthree-row py-sm-5 py-3 about-top" id="ab-bot">
        <div class="container pt-lg-5">
            <div class="title-section pb-4">
                <h3 class="main-title-agile">about skill point</h3>
                <div class="title-line">
                </div>
            </div>
            <div class="agileits-top-row row py-md-5">
                <div class="col-lg-4 col-md-6">
                    <div class="agileits-about-grids">
                        <span class="fas fa-book-reader text-color1"></span>
                        <h4>university life
                            <span></span>
                        </h4>
                        <p>Itaque earum rerum hic tenetur asap iente delectus rulla accumsan ac elit in coeiciendis
                            maiores alias.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6  mb-lg-0 mb-4">
                    <div class="agileits-about-grids">
                        <span class="fas fa-graduation-cap text-color2"></span>
                        <h4>graduation
                            <span></span>
                        </h4>
                        <p>Itaque earum rerum hic tenetur asap iente delectus rulla accumsan ac elit in coeiciendis
                            maiores alias.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mx-auto">
                    <div class="agileits-about-grids">
                        <span class="fas fa-bezier-curve text-color3"></span>
                        <h4>social
                            <span></span>
                        </h4>
                        <p>Itaque earum rerum hic tenetur asap iente delectus rulla accumsan ac elit in coeiciendis
                            maiores alias.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="about-bottom-agileinfo pb-lg-5">
        <div class="row justify-content-center align-items-center no-gutters abbot-main">
            <div class="col-lg-6 p-0 left-about-bg">
            </div>
            <div class="col-lg-6 p-0 abbot-right">
                <div class="card">
                    <div class="card-body px-sm-5 px-3 py-4">
                        <i class="fas fa-chalkboard  text-color1"></i>
                        <h3 class="about-sub-title card-title align-self-center pt-sm-0 pt-3">Learn Anywhere Online</h3>
                        <span class="w3-line"></span>
                        <p class="card-text align-self-center my-3">
                            Vestibulum volutpat non eros ut vulputate. Nunc id risus accumsan Donec mi nulla, auctor
                            nec sem a, ornare auctor mi. Sed
                            mi tortor, commodo a felis in, fringilla tincidunt nulla.</p>
                        <p class="card-text align-self-center mb-4">Donec mi nulla, auctor nec sem a, ornare auctor mi.
                            Sed mi tortor, commodo a felis in, fringilla
                            tincidunt nulla. Vestibulum volutpat non eros ut vulputate.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row  align-items-center no-gutters abbot-grid2">
            <div class="col-lg-6 py-lg-3 px-sm-5 px-3 py-4 abbot-right order-lg-0 order-1">
                <i class="fas fa-user-graduate  text-color3"></i>
                <h3 class="about-sub-title card-title align-self-center pt-sm-0 pt-3">Professional Teachers</h3>
                <span class="w3-line"></span>
                <span class="w3-line mx-auto text-center d-block"></span>
                <p class="card-text align-self-center my-3">
                    Vestibulum volutpat non eros ut vulputate. Nunc id risus accumsan Donec mi nulla, auctor
                    nec sem a, ornare auctor mi. Sed
                    mi tortor, commodo a felis in, fringilla tincidunt nulla.</p>
                <p class="card-text align-self-center mb-4">Donec mi nulla, auctor nec sem a, ornare auctor mi.
                    Sed mi tortor, commodo a felis in, fringilla
                    tincidunt nulla. Vestibulum volutpat non eros ut vulputate.</p>
            </div>
            <div class="col-lg-6 p-0 right-about-bg  order-lg-1 order-0">
            </div>
        </div>
        <div class="row justify-content-center align-items-center no-gutters abbot-main">
            <div class="col-lg-6 p-0 last-about-bg ">
            </div>
            <div class="col-lg-6 p-0 abbot-right">
                <div class="card">
                    <div class="card-body px-sm-5 px-3 py-4">
                        <i class="fas fa-university  text-color2"></i>
                        <h3 class="about-sub-title card-title pt-sm-0 pt-3">Graduation Certificate</h3>
                        <p class="card-text align-self-center my-3">
                            Vestibulum volutpat non eros ut vulputate. Nunc id risus accumsan Donec mi nulla, auctor
                            nec sem a, ornare auctor mi. Sed
                            mi tortor, commodo a felis in, fringilla tincidunt nulla.</p>
                        <p class="card-text align-self-center mb-4">Donec mi nulla, auctor nec sem a, ornare auctor mi.
                            Sed mi tortor, commodo a felis in, fringilla
                            tincidunt nulla. Vestibulum volutpat non eros ut vulputate.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- //about -->
    <!-- stats -->
    <section class="agile_stats mt-0">
        <div class="container">
            <div class="title-section pb-4">
                <h3 class="main-title-agile">why choose us?</h3>
                <div class="title-line">
                </div>
            </div>
            <div class="row my-sm-5">
                <div class="col-lg-4">
                    <ul class="list-group mt-lg-3 pb-lg-0 pb-3 wcu-even">
                        <li class="list-group-item border-0">
                            <i class="fas fa-check mr-3"></i>Flexible Learning </li>
                        <li class="list-group-item border-0">
                            <i class="fas fa-check mr-3"></i>Home Study</li>
                        <li class="list-group-item border-0">
                            <i class="fas fa-check mr-3"></i>Open Learning</li>
                        <li class="list-group-item border-0">
                            <i class="fas fa-check mr-3"></i>Getting A Qualification</li>
                        <li class="list-group-item border-0">
                            <i class="fas fa-check mr-3"></i>Improve Your Skills</li>
                    </ul>
                </div>
                <div class="col-lg-4">
                    <ul class="list-group mt-3 pb-lg-0 pb-3 wcu-even flex-column-reverse">
                        <li class="list-group-item border-0">
                            <i class="fas fa-check mr-3"></i>Flexible Learning </li>
                        <li class="list-group-item border-0">
                            <i class="fas fa-check mr-3"></i>Home Study</li>
                        <li class="list-group-item border-0">
                            <i class="fas fa-check mr-3"></i>Open Learning</li>
                        <li class="list-group-item border-0">
                            <i class="fas fa-check mr-3"></i>Getting A Qualification</li>
                        <li class="list-group-item border-0">
                            <i class="fas fa-check mr-3"></i>Improve Your Skills</li>
                    </ul>
                </div>
                <div class="col-lg-4">
                    <ul class="list-group mt-3">
                        <li class="list-group-item border-0">
                            <i class="fas fa-check mr-3"></i>Flexible Learning </li>
                        <li class="list-group-item border-0">
                            <i class="fas fa-check mr-3"></i>Home Study</li>
                        <li class="list-group-item border-0">
                            <i class="fas fa-check mr-3"></i>Open Learning</li>
                        <li class="list-group-item border-0">
                            <i class="fas fa-check mr-3"></i>Getting A Qualification</li>
                        <li class="list-group-item border-0">
                            <i class="fas fa-check mr-3"></i>Improve Your Skills</li>
                    </ul>
                </div>
            </div>
            <div class="container pt-5">
                <div class="title-section pb-4  text-center">
                    <h3 class="main-title-agile">the world of massive online courses</h3>
                    <span class="bg-theme"></span>
                </div>
                <div class="row stat-row  position-relative text-center">
                    <img src="" alt="" class="img-fluid position-absolute" />
                    <div class="col-lg-3 col-md-6">
                        <div class="counter py-4 px-3 bg1-theme">
                            <i class="far fa-smile"></i>
                            <p class="count-text text-capitalize">satisfied students</p>
                            <div class="timer count-title count-number mt-2" data-to="9890" data-speed="1500"></div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 mt-md-0 mt-sm-5 mt-3">
                        <div class="counter py-4 px-3 bg2-theme">
                            <i class="fab fa-slideshare"></i>
                            <p class="count-text text-capitalize">passionate instructors</p>
                            <div class="timer count-title count-number mt-2" data-to="6799" data-speed="1500"></div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 mt-lg-0 mt-sm-5 mt-3">
                        <div class="counter py-4 px-3 bg3-theme">
                            <i class="fas fa-layer-group"></i>
                            <p class="count-text text-capitalize">available courses</p>
                            <div class="timer count-title count-number mt-2" data-to="733" data-speed="100"></div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 mt-lg-0  mt-sm-5 mt-3">
                        <div class="counter py-4 px-3 bg4-theme">
                            <i class="fas fa-award"></i>
                            <p class="count-text text-capitalize">years of experience</p>
                            <div class="timer count-title count-number mt-2" data-to="43" data-speed="100"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- //stats -->
    <!-- footer top -->
    <div class="footer-top py-5">
        <div class="container">
            <div class="row footer-cform pt-lg-5">
                <div class="col-lg-6">
                    <h5 class="footer-top-title">site navigation</h5>
                    <div class="footer-top-agileits">
                        <ul class="list-agileits d-flex">
                            <li>
                                <a href="index.html" class="nav-link py-0 pl-0">
                                    Home
                                </a>
                            </li>
                            <li>
                                <a href="about.html" class="nav-link py-0">
                                    About Us
                                </a>
                            </li>
                            <li>
                                <a href="services.html" class="nav-link py-0">
                                    Services
                                </a>
                            </li>
                            <li>
                                <a href="portfolio.html" class="nav-link py-0">
                                    portfolio
                                </a>
                            </li>
                        </ul>
                        <ul class="list-agileits d-flex">
                            <li>
                                <a href="courses.html" class="nav-link py-0 pl-0">
                                    courses
                                </a>
                            </li>
                            <li>
                                <a href="index.html" class="nav-link py-0">
                                    privacy policy
                                </a>
                            </li>
                            <li>
                                <a href="contact.html" class="nav-link py-0">
                                    Contact Us
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="footer-cont-btm">
                        <h5 class="footer-top-title">contact information</h5>
                        <address class="my-4">
                            <p>+4667 Woodland Terrace Folsom, California 916-983-6577.</p>
                        </address>
                        <ul class="d-flex header-agile pt-0">
                            <li>
                                <span class="fas fa-envelope-open"></span>
                                <a href="mailto:example@email.com" class="text-secondary">info@example.com</a>
                            </li>
                            <li>
                                <span class="fas fa-phone-volume"></span>
                                <p class="d-inline text-secondary">+456 123 7890</p>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 wthree-form-left my-lg-0 mt-4">
                    <h5 class="footer-top-title">send us a message</h5>
                    <div class="footer-top-form">
                        <form action="#" method="get" class="footer-top-wthree">
                            <div class="form-group d-flex">
                                <label>
                                    Name
                                </label>
                                <input class="form-control" type="text" placeholder="Johnson" name="email" required="">
                            </div>
                            <div class="form-group d-flex">
                                <label>
                                    Email
                                </label>
                                <input class="form-control" type="email" placeholder="example@email.com" name="email"
                                    required="">
                            </div>
                            <div class="form-group d-flex">
                                <label>
                                    Phone
                                </label>
                                <input class="form-control" type="text" placeholder="XXXX XXXX XX" name="email"
                                    required="">
                            </div>
                            <div class="form-group d-flex">
                                <label>
                                    Message
                                </label>
                                <textarea class="form-control" rows="5" id="contactcomment" placeholder="Your message"
                                    required></textarea>
                            </div>
                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn btn-agile btn-block w-25">Send</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- //footer top -->
    <!-- footer -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="social-icons d-flex  my-auto justify-content-lg-start justify-content-center">
                        <h2 class="mr-4">stay connected :</h2>
                        <ul class="social-iconsv2 agileinfo">
                            <li>
                                <a href="#">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fab fa-twitter"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fab fa-google-plus-g"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fab fa-linkedin-in"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 my-lg-auto mt-3">
                    <div class="cpy-right text-lg-right text-center">
                        <p class="text-secondary">© 2018 Skill Point. All rights reserved | Design by
                            <a href="http://w3layouts.com"> W3layouts.</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <script src="{{ asset('js/home/jquery-2.2.3.min.js') }}"></script>
    <!-- loading-gif Js -->
    <script src="{{ asset('js/home/modernizr.js') }}"></script>
    <script>
        //paste this code under head tag or in a seperate js file.
        // Wait for window load
        $(window).load(function () {
            // Animate loader off screen
            $(".se-pre-con").fadeOut("slow");;
        });
    </script>
    <!--// loading-gif Js -->
    <!-- Multiple select filter using jQuery -->
    <script src="{{ asset('js/home/custom-select.js') }}"></script>
    <!-- //Multiple select filter using jQuery -->
    <!-- stats counter -->
    <script src="{{ asset('js/home/counter.js') }}"></script>
    <!-- script for password match -->
   {{--  <script>
        window.onload = function () {
            document.getElementById("password1").onchange = validatePassword;
            document.getElementById("password2").onchange = validatePassword;
        }

        function validatePassword() {
            var pass2 = document.getElementById("password2").value;
            var pass1 = document.getElementById("password1").value;
            if (pass1 != pass2)
                document.getElementById("password2").setCustomValidity("Passwords Don't Match");
            else
                document.getElementById("password2").setCustomValidity('');
            //empty string means no validation error
        }
    </script> --}}
    <!-- script for password match -->
    <!-- start-smooth-scrolling -->
    <script src="{{ asset('js/home/move-top.js') }}">
    </script>
    <script src="{{ asset('js/home/easing.js') }}"></script>
    <script>
        jQuery(document).ready(function ($) {
            $(".scroll").click(function (event) {
                event.preventDefault();

                $('html,body').animate({
                    scrollTop: $(this.hash).offset().top
                }, 1000);
            });
        });
    </script>
    <!-- //end-smooth-scrolling -->
    <!-- smooth-scrolling-of-move-up -->
    <script>
        $(document).ready(function () {
            /*
             var defaults = {
                 containerID: 'toTop', // fading element id
                 containerHoverID: 'toTopHover', // fading element hover id
                 scrollSpeed: 1200,
                 easingType: 'linear' 
             };
             */

            $().UItoTop({
                easingType: 'easeOutQuart'
            });

        });
    </script>
    <script src="{{ asset('js/home/SmoothScroll.min.js') }}"></script>
    <!-- //smooth-scrolling-of-move-up -->
    <!-- Bootstrap Core JavaScript -->
    <script src="{{ asset('js/home/bootstrap.js') }}">
    </script>
    </body>
</html>

