<!--
author: W3layouts
author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html lang="en">
<head>
<title>Penjadwalan SMKN 2 Kota Tangerang</title>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Child Learn Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />

    <script>
        addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
	
	<!-- css files -->
      <!-- Bootstrap Core CSS -->
        <link href="{{ asset('css/new/bootstrap.css') }}" rel="stylesheet" type="text/css">
        <!-- login icon animation -->
        <link href="{{ asset('css/new/css_slider.css') }}" rel="stylesheet" type="text/css" media="all">
        <!-- Custom CSS -->
        <link href="{{ asset('css/new/style.css') }}" rel="stylesheet" type="text/css">
        <!-- font-awesome icons -->
        {{-- <link href="{{ asset('css/new/font-awesome.min.css') }}" rel="stylesheet" type="text/css"> --}}
	<!-- //css files -->
	
	<!-- google fonts -->
		<link href="//fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
       	<link href="//fonts.googleapis.com/css?family=Gentium+Book+Basic:400,400i,700i" rel="stylesheet">
	<!-- //google fonts -->
	
</head>
<body>

<!-- header -->
  <header>
        <div class="header-top">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <ul class="d-flex agileh col-sm-12">
                            <li>
                                <h3>
                                    <a href="{{ route('home') }}"><img src="{{ asset('/images/smkn2.png') }}" alt="" height="55%" width="55%"></a> &nbsp
                                    <a href="{{ route('home') }}" class="text-white"> </a>
                                </h3>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-3 hearder-right-agile agile">
                        <div class="d-flex">
                            <!-- Multiple select filter  -->
                                <label for=""><br><br></label>
                            <div class="login-wthree my-auto">
                               <button class="btn btn-primary"><a href="{{ route('pengajuan')}}" class="text-white text-capitalize">Pengajuan Jadwal <span class="fas fa-sign-in-alt flash animated infinite"></span></a></button> 
                            </div>
                        </div>
                    </div>
                    <div class="col-md-1 hearder-right-agile agile">
                        <div class="d-flex">
                            <!-- Multiple select filter  -->
                                <label for=""><br><br></label>
                            <div class="login-wthree my-auto">
                               <button class="btn btn-danger navbar-btn"><a href="{{ route('login') }}" class="text-white text-capitalize">login <span class="fas fa-sign-in-alt flash animated infinite"></span></a></button> 
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
<!-- //header -->

<!-- banner -->
<div class="banner" id="home">
	<div class="layer">
		<div class="container">
			<div class="row">
				<div class="col-lg-7 banner-text-w3pvt">
					<!-- banner slider-->
					<div class="csslider infinity" id="slider1">
						<input type="radio" name="slides" checked="checked" id="slides_1" />
						<input type="radio" name="slides" id="slides_2" />
						<input type="radio" name="slides" id="slides_3" />
						<!-- <ul class="banner_slide_bg"> -->
						
								<div class="container-fluid">
									<div class="w3ls_banner_txt">
										<h3 class="b-w3ltxt text-capitalize mt-md-4">Education Courses.</h3>
										<h4 class="b-w3ltxt text-capitalize mt-md-2">Study For Better Future</h4>
										<p class="w3ls_pvt-title my-3"> </p>
										<!-- <a href="#about" class="btn btn-banner my-3">Read More</a> -->
									</div>
								</div>
							</li>
							
						<!-- </ul> -->
						<div class="navigation">
						<!-- 	<div>
								<label for="slides_1"></label>
								<label for="slides_2"></label>
								<label for="slides_3"></label>
							</div> -->
						</div>
					</div>
					<!-- //banner slider-->
				</div>
				<div class="col-lg-5 col-md-8 px-lg-3 px-0">
					<div class="banner-form-w3 ml-lg-5">
						<div class="padding">
							<!-- banner form -->
							<form action="#" method="post">
								<h5 class="mb-3">Pilih Jadwal Kelas</h5>
					<label class="radio-inline"><input checked="true" type="radio" name="type"> Siswa</label>&nbsp;
                	<label class="radio-inline"><input type="radio" name="type"> Guru</label>
                <form action="home.html" method="get" class="register-wthree">
                    <div class="form-group">
                        <div class="row">
                           
                        </div>
                    </div>

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
							</form>
							<!-- //banner form -->
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

  {{-- <a href="{{ route('pdf', $major->id) }}" target="_blank" class="btn btn-info btn-sm form-control"><i class="icon ion-printer"></i>Download Jadwal</a> --}}

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
<!-- //banner -->