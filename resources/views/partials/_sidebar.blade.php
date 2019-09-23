<div class="main-sidebar">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="{{ route('curriculum') }}">SMKN 2</a>
          </div>
            <div class="sidebar-user-picture">
              <img alt="image" src="{{ asset('images/smkn2.png') }}">
            </div>
            <div class="sidebar-brand">
            <a href="{{ route('curriculum') }}">TANGERANG</a>
          </div> <br>
          <ul class="sidebar-menu">

            @if (Auth::user()->hasRole('major'))
            <li class="menu-header">Dashboard</li>
            <li class="active">
              <a href="{{ route('major') }}"><i class="ion ion-speedometer"></i><span>Dashboard</span></a>
            </li>
           <li class="menu-header">Components</li>
        
              <li><a href="#" class="has-dropdown"><i class="ion ion-document-text"></i>Data Kelas</a>
                <ul class="menu-dropdown">
                  @foreach (App\Models\Level::all() as $level)
                    <li><a href="#" class="has-dropdown"><i class="ion ion-ios-play"></i>{{ $level->class }}</a>
                      <ul class="menu-dropdown">
                        @foreach ($level->majors as $major)
                          <li><a href="{{ route('expertise.view', [$major->level->id, $major->id]) }}"><i class="ion ion-ios-play-outline"></i>{{ ucwords($major->name) }}</a>
                          </li>
                        @endforeach
                      </ul>
                    </li>
                  @endforeach
                </ul>
              </li>
              
              <li><a href="#" class="has-dropdown"><i class="ion ion-document-text"></i>Data Mata Pelajaran</a>
                <ul class="menu-dropdown">
                  @foreach (App\Models\TypeLesson::all() as $typelesson)
                    @if ($typelesson->id === 1)
                      <li><a href="{{ route('lesson.view', $typelesson->id) }}"><i class="ion ion-ios-play-outline"></i>{{ ucwords($typelesson->name) }}</a></li>
                    @endif
                  @endforeach
                </ul>
              </li>

              <li><a href="#" class="has-dropdown"><i class="ion ion-document-text"></i>Data Guru</a>
                <ul class="menu-dropdown">
                  @foreach (App\Models\TypeTeacher::all() as $typeteacher)
                    @if ($typeteacher->id === 1)
                      <li><a href="{{ route('teacher.view', $typeteacher->id) }}"><i class="ion ion-ios-play-outline"></i>{{ ucwords($typeteacher->name) }}</a></li>
                    @endif
                  @endforeach
                </ul>
              </li>


              <li><a href="#" class="has-dropdown"><i class="ion ion-document-text"></i>Data Ruang</a>
                <ul class="menu-dropdown">
                  @foreach (App\Models\TypeRoom::all() as $typeroom)
                    @if ($typeroom->id === 1)
                      <li><a href="{{ route('room.view', $typeroom->id) }}"><i class="ion ion-ios-play-outline"></i>{{ ucwords($typeroom->name) }}</a></li>
                    @endif
                  @endforeach
                </ul>
              </li>

           <li class="menu-header">Ex</li>
            
            <li>
              <a href="" class="has-dropdown"><i class="ion ion-ios-information-outline"></i>Atur Jadwal</a>
                <ul class="menu-dropdown">
                  @foreach (App\Models\Level::all() as $level)
                    <li>
                      <a href="#" class="has-dropdown">
                        <i class="ion ion-ios-play"></i>{{ $level->class }}
                      </a>
                      <ul class="menu-dropdown">
                        @foreach ($level->majors as $major)
                          <li>
                            <a href="{{ route('showmix.generate', [Auth::user()->role->name, $major->level->id, $major->id]) }}">
                           
                              <i class="ion ion-ios-play-outline"></i>{{ ucwords($major->name) }}
                            </a>
                          </li>
                        @endforeach
                      </ul>
                    </li>
                  @endforeach
                </ul>
            </li>          

            <li>
              <a href="#" class="has-dropdown"><i class="ion ion-calendar"></i><span>Jadwal Telah Disetujui</span></a>
               <ul class="menu-dropdown">
                    @foreach (App\Models\Level::all() as $level)
                      <li>
                        <a href="#" class="has-dropdown">
                          <i class="ion ion-android-contact"></i>{{ $level->class }}                          
                        </a>
                        <ul class="menu-dropdown">
                            @foreach ($level->majors as $major)
                              <li><a href="{{ route('showmajor.approval', [Auth::user()->role->name, $major->level->id, $major->id]) }}"><i class="ion ion-plus-circled"></i>{{ ucwords($major->name) }}
                           
                              </a>
                              </li>
                            @endforeach
                        </ul>
                      </li>
                    @endforeach
                </ul>
            </li>

            @endif

            @if (Auth::user()->hasRole('curriculum'))
            <li class="menu-header">Dashboard</li>
            <li class="active">
              <a href="{{ route('curriculum') }}"><i class="ion ion-speedometer"></i><span>Dashboard</span></a>
            </li>

           <li class="menu-header">Components</li>
          
               <li><a href="#" class="has-dropdown"><i class="ion ion-document-text"></i> Data Kelas</a>
                  <ul class="menu-dropdown">
                      @foreach (App\Models\Level::all() as $level)
                        <li><a href="#" class="has-dropdown"><i class="ion ion-android-contact"></i>{{ $level->class }}</a>
                          <ul class="menu-dropdown">
                              @foreach ($level->majors as $major)
                                <li><a href="{{ route('mix.expertise', [$major->level->id, $major->id]) }}"><i class="ion ion-plus-circled"></i>{{ ucwords($major->name) }}</a>
                                </li>
                              @endforeach
                          </ul>
                        </li>
                      @endforeach
                  </ul>
                </li>

                <li><a href="#"  class="has-dropdown"><i class="ion ion-document-text"></i>Data Guru</a>
                    <ul class="menu-dropdown">
                        @foreach (App\Models\TypeTeacher::all() as $type)
                          <li><a href="{{ route('mix.teacher', $type->id) }}"><i class="ion ion-plus-circled"></i>{{ ucwords($type->name) }}</a></li>
                        @endforeach
                    </ul>
                </li>

                <li><a href="#" class="has-dropdown"><i class="ion ion-document-text"></i>Data Mata Pelajaran</a>
                    <ul class="menu-dropdown">
                      @foreach (App\Models\TypeLesson::all() as $typelesson)
                        @if ($typelesson->id != 3)
                          <li><a href="{{ route('mix.lesson', $typelesson->id) }}"><i class="ion ion-plus-circled"></i>{{ ucwords($typelesson->name) }}</a></li>
                        @endif
                      @endforeach
                    </ul>
                </li>

                <li><a href="#"  class="has-dropdown"><i class="ion ion-document-text"></i>Data Ruang</a>
                    <ul class="menu-dropdown">
                        @foreach (App\Models\TypeRoom::all() as $type)
                          <li><a href="{{ route('mix.room', $type->id) }}"><i class="ion ion-plus-circled"></i>{{ ucwords($type->name) }}</a></li>
                        @endforeach
                    </ul>
                </li>

          <li class="menu-header">Ex</li>

            <li>
              <a href="#" class="has-dropdown"><i class="ion ion-calendar"></i><span>Atur Jadwal</span></a>
               <ul class="menu-dropdown">
                    @foreach (App\Models\Level::all() as $level)
                      <li>
                        <a href="#" class="has-dropdown">
                          <i class="ion ion-android-contact"></i>{{ $level->class }}                          
                        </a>
                        <ul class="menu-dropdown">
                            @foreach ($level->majors as $major)
                              <li><a href="{{ route('showmix.generate', [Auth::user()->role->name, $major->level->id, $major->id]) }}"><i class="ion ion-plus-circled"></i>{{ ucwords($major->name) }}
                            @if (App\Models\Generate::where('major_id', $major->id)->where('role_id', 2)->where('read', 0)->count() != 0)
                              <span class="badge badge-primary">{{ App\Models\Generate::where('role_id', 2)->where('read', 0)->count() }}</span>
                              @else
                              <span></span> 
                            @endif
                              </a>
                              </li>
                            @endforeach
                        </ul>
                      </li>
                    @endforeach
                </ul>
            </li>
            
           {{--  <li>
              <a href="{{ route('submission.index') }}"><i class="ion ion-merge"></i>Permintaan Jadwal Honorer</a>
            </li> --}}

            <li>
              <a href="{{ route('approval.create') }}"><i class="ion ion-merge"></i>Pengelompokan Jadwal </a>
            </li>

            <li>
              <a href="#" class="has-dropdown"><i class="ion ion-calendar"></i><span>Jadwal Telah Disetujui</span></a>
               <ul class="menu-dropdown">
                  @foreach (App\Models\Approval::all() as $year)
                    <li>
                      <a href="#" class="has-dropdown">
                         <i class="ion ion-android-contact"></i>{{ $year->beginning }}/{{ $year->end }}
                      </a>

                      <ul class="menu-dropdown">
                        @php
                            $dup = [];
                        @endphp
                        @foreach ($year->generates as $element)
                        @if (!in_array($element->major->level->class, $dup))
                           <li>
                             <a class="has-dropdown" href="{{ route('majorin') }}"><i class="ion ion-plus-circled"></i>{{ $element->major->level->class }}
                              </a>
                           </li>
                        @endif
                        @php
                          array_push($dup, $element->major->level->class)
                        @endphp
                            <ol>
                              <li><a href="{{ route('showmajor.approval', [Auth::user()->role->name, $element->major->level->id, $element->major->id]) }}" class="ion ion-eject">{{ $element->major->name }}</a></li>
                            </ol>
                        @endforeach
                      </ul>
                    </li>
                  @endforeach

            {{--         @foreach (App\Models\Level::all() as $level)
                      <li>
                        <a href="#" class="has-dropdown">
                          <i class="ion ion-android-contact"></i>{{ $level->class }}                          
                        </a>
                        <ul class="menu-dropdown">
                            @foreach ($level->majors as $major)
                              <li><a href="{{ route('showmajor.approval', [Auth::user()->role->name, $major->level->id, $major->id]) }}"><i class="ion ion-plus-circled"></i>{{ ucwords($major->name) }}
                           
                              </a>
                              </li>
                            @endforeach
                        </ul>
                      </li>
                    @endforeach --}}
                </ul>
            </li>

            @endif

            @if (Auth::user()->hasRole('headmaster'))
              <li class="menu-header">Dashboard</li>
              <li class="active">
                <a href="{{ route('headmaster') }}"><i class="ion ion-speedometer"></i><span>Dashboard</span></a>
              </li>

              <li class="menu-header">Ex</li>

              <li>
                <a href="{{ route('appr.create') }}"><i class="ion ion-ios-eye"></i><span>Persetujuan Jadwal</span></a>
                {{-- <a href=""><i class="ion ion-ios-eye"></i><span>Lihat Jadwal</span></a> --}}
              </li>

              <li>
              <a href="#" class="has-dropdown"><i class="ion ion-calendar"></i><span>Jadwal Telah Disetujui</span></a>
               <ul class="menu-dropdown">
                    @foreach (App\Models\Level::all() as $level)
                      <li>
                        <a href="#" class="has-dropdown">
                          <i class="ion ion-android-contact"></i>{{ $level->class }}                          
                        </a>
                        <ul class="menu-dropdown">
                            @foreach ($level->majors as $major)
                              <li><a href="{{ route('showmajor.approval', [Auth::user()->role->name, $major->level->id, $major->id]) }}"><i class="ion ion-plus-circled"></i>{{ ucwords($major->name) }}
                           
                              </a>
                              </li>
                            @endforeach
                        </ul>
                      </li>
                    @endforeach
                </ul>
            </li>

            @endif

          </ul>
        </aside>
      </div>  