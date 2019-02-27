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

                <label class="radio-inline"><input checked="true" type="radio" name="type"> Siswa</label>&nbsp;
                <label class="radio-inline"><input type="radio" name="type"> Guru</label>
                <form action="home.html" method="get" class="register-wthree">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-12">
                                <span class="fas fa-envelope-open"></span>
                                <label>
                                    Tahun Ajaran
                                </label>
                                <select name="approval_id" id="approval" class="form-control">
                                    <option value="">---Select---</option>
                                    @foreach (App\Models\Approval::where('status', 1)->get() as $gen)
                                        <option value="{{ $gen->id }}">{{ $gen->beginning }}/{{ $gen->end }}</option>
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
                                    Kelas Jurusan   
                                </label>
                                <select name="major_id" id="major" class="form-control">
                                    <option value="">---Select---</option>
                                    @foreach (App\Models\Major::all() as $major)
                                        <option value="{{ $major->id }}">{{ $major->level->class }} {{ ucwords($major->name) }}</option>
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
                                    Konsentrasi
                                </label>
                                <select id="expertise" name="expertise" class="form-control">
                                    <option value="">---Select---</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="mt-4">
                        <button type="button" class="btn btn-agile btn-block w-100" onclick="show()">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <table class="table">
                    <thead class="theadcolor-expertise fontsopher">
                        <tr>
                            <th>No</th>
                            <th>Hari</th>
                            <th>Jam Masuk</th>
                            <th>Jam Keluar</th>
                            <th>Guru</th>
                            <th>Ruang</th>
                            <th>Mata Pelajaran</th>
                            <th>Kelas Jurusan</th>
                        </tr>
                    </thead>
                    <tbody class="fontsopher" id="table">
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
    {{--     <div class="container pt-lg-5">
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
        </div> --}}
    {{-- </section> --}}

    <!-- //footer top -->
    <!-- footer -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
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

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
    <script src="{{ asset('js/home/jquery-2.2.3.min.js') }}"></script>
    <script src="{{ asset('js/home/modernizr.js') }}"></script>
    <script>
        $(window).load(function () {
            $(".se-pre-con").fadeOut("slow");;
        });
    </script>
    <script src="{{ asset('js/home/custom-select.js') }}"></script>
    <script src="{{ asset('js/home/counter.js') }}"></script>
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
    <script>
        $(document).ready(function () {
            $().UItoTop({
                easingType: 'easeOutQuart'
            });

        });
    </script>
    <script src="{{ asset('js/home/SmoothScroll.min.js') }}"></script>
    <script src="{{ asset('js/home/bootstrap.js') }}"></script>
    <script>
        $('#major').on('change', function(e){
           var c = e.target.value;
           jQuery.get('/api/major/' + c, function(data) {
            console.log(data);
               $('#expertise').empty();
               jQuery.each(data, function(index, val){
                   $('#expertise').append('<option value="'+val.id+'">'+val.name+'</option>');
               });
           });
       });

    function show() {
        if (valid()) {
        var major = $('#major').val();
        var expertise = $('#expertise').val();
          jQuery.get('/api/generates/major/' + major + '/expertise/' + expertise, function(data) {
            $('#table').empty();
            jQuery.each(data, function(index, val){
                $('#table').append('<tr><td>'+ (index + 1) +'</td><td>'+ val.day +'</td><td>'+ val.start +'</td><td>'+ val.end +'</td><td>'+ val.teacher.name +'</td><td>'+ val.room.name +'</td><td>'+ val.lesson.name +'</td><td>'+ val.major.name +'</td></tr>');
            });
          });
        }
    }

    function valid() {
        var a = $('#major').val() != '';
        var b = $('#expertise').val() != '';
        var c = $('#approval').val() != '';
        return (c && b) && a;
    }
    </script>
    </body>
</html>