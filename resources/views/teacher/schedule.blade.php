<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
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
        <img src="images/smkn2.png" height="8%" width="8%" align="left">
      </div>
      <div id="company" align="center">
        <h2 class="name">PENJADWALAN MATA PELAJARAN</h2>
        <h4>Tahun Ajaran 2018/2019</h4>
        <h4>Nama Pengajar:  {{ $teacher->name }}</h4>

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
            <th>kelas</th>
            <th>Ruang</th>
          </tr>
        </thead>
        </thead>
        <tbody>
          @php
          $i = 1;
          @endphp
          @foreach($teacher->generates as $generate)
            <tr>
              <td>{{ $i }}</td>
              <td>{{ $generate->day }}</td>
              <td>{{ $generate->start }}</td>
              <td>{{ $generate->lesson->name }}</td>
              <td>{{ $generate->expertise->major->level->class }} {{ $generate->expertise->name }} {{ $generate->expertise->part }}</td>
              <td>{{ $generate->room->name }}</td>
            </tr>
            @php
            $i++;
            @endphp
          @endforeach
        </tbody>
      </table>
     <hr>
     <div align="center">
     </div>
</body>
</html>