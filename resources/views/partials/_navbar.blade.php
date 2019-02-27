<div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar" style="top: 0px; position: absolute;">
        <form class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="ion ion-navicon-round"></i></a></li>
            <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="ion ion-search"></i></a></li>
          </ul>
        {{--   <div class="search-element">
            <input class="form-control" type="search" placeholder="Search" aria-label="Search">
            <button class="btn" type="submit"><i class="ion ion-search"></i></button>
          </div> --}}
          {{-- expr --}}
        </form>
        <ul class="navbar-nav navbar-right">
        @if (Auth::user()->role->id != 2)
          <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown" class="nav-link notification-toggle nav-link-lg 
                @if (Auth::user()->role->id == 1)
                    @if (App\Models\Generate::where('role_id', 2)->where('read', 0)->count() != 0)
                      beep
                      @else
                      ''
                  @endif
                @endif
            "><i class="ion ion-ios-bell-outline"></i></a>
            <div class="dropdown-menu dropdown-list dropdown-menu-right">
              <div class="dropdown-header">Notifications 
                @if (Auth::user()->role->id == 1)
                  ({{ App\Models\Generate::where('role_id', 2)->count() }})
                @endif
                {{-- <div class="float-right">
                  <a href="#">View All</a>
                </div> --}}
              </div>
              <div class="dropdown-list-content">
                    @foreach (App\Models\Generate::all() as $get)
                      @if ($get->role_id == 2)
                        @if (Auth::user()->role->id == 1)
                          <a href="#" class="dropdown-item dropdown-item-unread">
                            <img alt="image" src="{{ asset('images/default_account.png') }}" class="rounded-circle dropdown-item-img">
                            <div class="dropdown-item-desc">
                              <b>{{ ucwords($get->user->name) }}</b> telah mengirim jadwal jurusan untuk kelas <b>{{ $get->major->level->class }} {{ ucwords($get->major->name) }}</b> 
                              <div class="time">{{ substr(Carbon\Carbon::parse($get->created_at), 0, 10) }} ({{ $get->created_at->diffForHumans() }})</div>
                            </div>
                          </a>
                        @endif
                      @endif
                    @endforeach
              </div>
            </div>
          </li>
        @endif
          <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg">
            <i class="ion ion-android-person d-lg-none"></i>
            <div class="d-sm-none d-lg-inline-block">{{ ucwords(Auth::user()->name) }} </div></a>
            <div class="dropdown-menu dropdown-menu-right">
              @if (Auth::user()->role->id == 1)
                <a href="{{ route('user.create') }}" class="dropdown-item has-icon">
                  <i class="ion ion-android-person"></i> Kelola Akun
                </a>
              @endif
              <a class="dropdown-item" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                <i class="ion ion-log-out">&nbsp;&nbsp;&nbsp;&nbsp;</i> Logout
              </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
            </a>
             {{--  <a href="" class="dropdown-item has-icon">
                <i class="ion ion-log-out"></i> Logout
              </a> --}}
            </div>
          </li>
        </ul>
      </nav>

