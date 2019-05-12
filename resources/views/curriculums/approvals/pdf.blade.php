
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Example 2</title>
    <link rel="stylesheet" href="{{ storage_path('css\pdf\style.css') }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

  </head>
  <body>
    @php
      $no = 1;
    @endphp
      {{-- expr --}}
    <header class="clearfix">
      <div id="logo">
        <img src="https://pbs.twimg.com/profile_images/611776817645531137/yF_sL8eo.jpg" height="8%" width="8%" align="left">
      </div>
      <div id="company" align="center">
        <h2 class="name">PENJADWALAN MATA PELAJARAN</h2>
        <h4>Tahun Ajaran 2018/2019</h4>
        {{-- <div><b>{{ ucwords($generate->groupBy('major_id')->first()->first()->major->name) }}</b></div> --}}
        {{-- <div>{{ ucwords($generate->groupBy('major_id')->first()->first()->major->level->class) }} {{ ucwords($generate->groupBy('major_id')->first()->first()->expertise->name) }} {{ ucwords($generate->groupBy('major_id')->first()->first()->expertise->part) }}</div> --}}
        {{-- <div>INVOICE TO:</div> --}}
      </div>
      </div>
      <br>
      <br>
    </header>
    <hr>
    <main>
      <table border="0" cellspacing="0" cellpadding="0" class="table table-bordered">
        <thead>
          <tr>
            <th>No</th>
            <th>Hari</th>
            <th>Jam</th>
            <th>Mata Pelajaran</th>
            <th>Guru</th>
            <th>Ruang</th>
            {{-- <th>Ruang</th> --}}
          </tr>
        </thead>
        <tbody>
    @foreach ($generate as $gen)
        @if (!$gen->read == 0)

          <tr>
            <td class="no">{{ $no }}</td>
            @php
              $no++;
            @endphp
            <td>{{ $gen->day }}</td>
            <td>{{ $gen->start }} - {{ $gen->end }}</td>
            
            <td>@if (!is_null($gen->lesson_id))
              {{ $gen->lesson->name }}
              @else
              Istirahat
            @endif
            </td>
            <td>@if (!is_null($gen->teacher_id))
              {{ $gen->teacher->name }}
              {{-- Istirahat --}}
            @endif
            </td>

            <td>@if (!is_null($gen->room_id))
              {{ $gen->room->name }}
              {{-- @else --}}
              {{-- Istirahat --}}
            @endif
            </td>

          </tr>
        
        </tbody>
        @endif
    @endforeach
      </table>
     <hr>
     <div align="center">
      <h4>Jurusan <b>{{ ucwords($gen->major->name) }}</b></h4>
      <h4>Kelas <b>{{ $gen->major->level->class }} {{ ucwords($gen->expertise->name) }} {{ $gen->expertise->part }}</b></h4>
     </div>
  </body>
</html>