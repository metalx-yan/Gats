{{-- <html>
     <head>
         <title>PDF Gan</title>
         <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
          <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
     </head>
     <body>
            
            <div class="col-md-6">
                 <img src="https://pbs.twimg.com/profile_images/611776817645531137/yF_sL8eo.jpg" height="8%" width="8%" alt="">Penjadwalan Mata Pelajaran
            </div>

@php
  $no = 1;
@endphp
             <div class="row">
                 <div class="col-md-2">
                    <table class="table table-bordered">
                          <thead>
                            <tr>
                              <th scope="col">ID</th>
                              <th scope="col">Judul</th>
                              <th scope="col">Pengarang</th>
                              <th scope="col">Penerbit</th>
                              <th scope="col">Tahun</th>
                              <th scope="col">Jenis</th>
                              <th scope="col">Tahun</th>
                              <th scope="col">Tahun</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach ($generate as $element)
                              @if (!$element->read == 0)
                            <tr>
                              <th scope="row">{{ $no }}</th>
                              @php
                                $no++;
                              @endphp
                              <td>{{ $element }}</td>
                              <td>{{ $element }}</td>
                              <td>{{ $element }}</td>
                              <td>{{ $element }}</td>
                              <td>{{ $element }}</td>
                              <td>{{ $element }}</td>
                              <td>{{ $element }}</td>
                            </tr>
                              @endif
                            @endforeach
                          </tbody>
                        </table>
             </div>
     </body>

     <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>

 </html>
 --}}
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

            {{-- <td>{{ $gen->teacher->name }}</td> --}}
            {{-- <td>{{ $gen->room->name }}</td> --}}
          </tr>
        
        </tbody>
        @endif
    @endforeach
      </table>
     
  </body>
</html>