<div class="main-sidebar">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="{{ route('curriculum') }}">Penjadwalan</a>
          </div>
            <div class="sidebar-user-picture">
              <img alt="image" src="{{ asset('images/logosekolah.png') }}">
            </div> <br>
          <ul class="sidebar-menu">

            @if (Auth::user()->hasRole('major'))
            <li class="menu-header">Dashboard</li>
            <li class="active">
              <a href="{{ route('major') }}"><i class="ion ion-speedometer"></i><span>Dashboard</span></a>
            </li>
           <li class="menu-header">Components</li>
            <li>
              <a href="#" class="has-dropdown"><i class="ion ion-ios-albums-outline"></i><span>Master Data
              </span></a>
              <ul class="menu-dropdown">
                <li><a href="general.html"><i class="ion ion-ios-circle-outline"></i>Data Ruang</a></li>
                <li><a href="components.html"><i class="ion ion-ios-circle-outline"></i>Data Kelas</a></li>
                <li><a href="buttons.html"><i class="ion ion-ios-circle-outline"></i>Data Guru</a></li>
                <li><a href="toastr.html"><i class="ion ion-ios-circle-outline"></i>Data Mata Pelajaran</a></li>
              </ul>
            </li>

            <li>
              <a href="#" class="has-dropdown"><i class="ion ion-ios-nutrition"></i>Lihat Kelas</a>
              <ul class="menu-dropdown">
                <li><a href="#" class="has-dropdown"><i class="ion ion-ios-circle-outline"></i> Kelas 10</a>
                  <ul class="menu-dropdown">
                    <li><a href="#"><i class="ion ion-ios-circle-outline"></i>X Mesin 1</a></li>
                    <li><a href="#"><i class="ion ion-ios-circle-outline"></i>X Mesin 2</a></li>
                    <li><a href="#"><i class="ion ion-ios-circle-outline"></i>X Mesin 3</a></li>
                    <li><a href="#"><i class="ion ion-ios-circle-outline"></i>X TMI</a></li>
                    <li><a href="#"><i class="ion ion-ios-circle-outline"></i>X TPGM</a></li>
                  </ul>
                </li>

                <li><a href="#" class="has-dropdown"><i class="ion ion-ios-circle-outline"></i> Kelas 11</a>
                  <ul class="menu-dropdown">
                    <li><a href="#"><i class="ion ion-ios-circle-outline"></i>XI Mesin 1</a></li>
                    <li><a href="#"><i class="ion ion-ios-circle-outline"></i>XI Mesin 2</a></li>
                    <li><a href="#"><i class="ion ion-ios-circle-outline"></i>XI Mesin 3</a></li>
                    <li><a href="#"><i class="ion ion-ios-circle-outline"></i>XI TMI</a></li>
                    <li><a href="#"><i class="ion ion-ios-circle-outline"></i>XI TPGM</a></li>
                  </ul>
                </li>

                <li><a href="#" class="has-dropdown"><i class="ion ion-ios-circle-outline"></i> Kelas 12</a>
                  <ul class="menu-dropdown">
                    <li><a href="#"><i class="ion ion-ios-circle-outline"></i>XII Mesin 1</a></li>
                    <li><a href="#"><i class="ion ion-ios-circle-outline"></i>XII Mesin 2</a></li>
                    <li><a href="#"><i class="ion ion-ios-circle-outline"></i>XII Mesin 3</a></li>
                    <li><a href="#"><i class="ion ion-ios-circle-outline"></i>XII Mesin 4</a></li>
                    <li><a href="#"><i class="ion ion-ios-circle-outline"></i>XII TPMI</a></li>
                    <li><a href="#"><i class="ion ion-ios-circle-outline"></i>XII TGM</a></li>
                  </ul>
                </li>
              </ul>
              <li><a href="#" class="has-dropdown"><i class="ion ion-ios-circle-outline"></i>Generate Jadwal</a>
                <ul class="menu-dropdown">
                  <li><a href=""><i class="ion ion-ios-circle-outline"></i>Kelas X</a></li>
                  <li><a href="#"><i class="ion ion-ios-circle-outline"></i>Kelas XI</a></li>
                  <li><a href="#"><i class="ion ion-ios-circle-outline"></i>Kelas XII</a></li>
                </ul>
              </li>
            </li>

            <li>
              <a href="credits.html"><i class="ion ion-ios-information-outline"></i> Credits</a>
            </li>          
            @endif


            @if (Auth::user()->hasRole('curriculum'))
            <li class="menu-header">Dashboard</li>
            <li class="active">
              <a href="{{ route('curriculum') }}"><i class="ion ion-speedometer"></i><span>Dashboard</span></a>
            </li>

           <li class="menu-header">Components</li>
            <li>
              <a href="#" class="has-dropdown"><i class="ion ion-flag"></i><span>Master Data</span></a>
              <ul class="menu-dropdown">
                <li><a href="{{ route('teacher.index') }}"><i class="ion ion-ios-circle-outline"></i>Data Guru</a></li>
                <li><a href=""><i class="ion ion-ios-circle-outline"></i>Data Ruang</a></li>
                <li><a href="flag.html"><i class="ion ion-ios-circle-outline"></i>Data Mata Pelajaran</a></li>
                <li><a href="flag.html"><i class="ion ion-ios-circle-outline"></i>Data Program Studi</a></li>
                <li><a href="flag.html"><i class="ion ion-ios-circle-outline"></i>Data Kelas</a></li>
              </ul>
            </li>
            <li>
              <a href="table.html"><i class="ion ion-clipboard"></i><span>Tables</span></a>
            </li>
            <li>
              <a href="chartjs.html"><i class="ion ion-stats-bars"></i><span>Chart.js</span></a>
            </li>
            <li>
              <a href="simple.html"><i class="ion ion-ios-location-outline"></i><span>Google Maps</span></a>
            </li>
            <li>
              <a href="#" class="has-dropdown"><i class="ion ion-ios-copy-outline"></i><span>Examples</span></a>
              <ul class="menu-dropdown">
                <li><a href="login.html"><i class="ion ion-ios-circle-outline"></i> Login</a></li>
                <li><a href="register.html"><i class="ion ion-ios-circle-outline"></i> Register</a></li>
                <li><a href="forgot.html"><i class="ion ion-ios-circle-outline"></i> Forgot Password</a></li>
                <li><a href="reset.html"><i class="ion ion-ios-circle-outline"></i> Reset Password</a></li>
                <li><a href="404.html"><i class="ion ion-ios-circle-outline"></i> 404</a></li>
              </ul>
            </li>
            @endif
          
          </ul>
        </aside>
      </div>