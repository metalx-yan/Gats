@extends('main')

@section('title', 'Kurikulum')

@section('content')

<h1 class="section-header">
  <div>Dashboard</div>
</h1>

<div class="row">
<div class="col-lg-2 col-md-6">
  <div class="card card-sm-3 col-12">
    <div class="card-icon bg-primary-teacher">
      <i class="ion ion-person"></i>
    </div>
    <div class="card-wrap ">
      <div class="card-header header">
        <h4>Total Guru Aktif</h4>
      </div>
      <div class="card-body header">
        @if (Auth::check() || App\Models\Teacher::first()->status = "aktif")
            {{  App\Models\Teacher::all()->where('status', 'aktif')->count() }}
        @endif
      </div>
    </div>
  </div>
</div>
<div class="col-lg-2 col-md-6">
  <div class="card card-sm-3 col-12">
    <div class="card-icon bg-primary-room" >
      <i class="ion ion-home"></i>
    </div>
    <div class="card-wrap">
      <div class="card-header header">
        <h4>Total Ruang</h4>
      </div>
      <div class="card-body header">
        {{ App\Models\Room::all()->count() }}
      </div>
    </div>
  </div>
</div>
<div class="col-lg-2 col-md-6">
  <div class="card card-sm-3 col-12">
    <div class="card-icon bg-primary-lesson">
      <i class="ion ion-clipboard"></i>
    </div>
    <div class="card-wrap">
      <div class="card-header header">
        <h4>Total Mata Pelajaran</h4>
      </div>
      <div class="card-body header">
        {{ App\Models\Lesson::all()->count() }}
      </div>
    </div>
  </div>
</div>
<div class="col-lg-2 col-md-6">
  <div class="card card-sm-3 col-12">
    <div class="card-icon bg-danger">
   		<i class="ion ion-university"></i>
    </div>
    <div class="card-wrap">
      <div class="card-header header">
        <h4>Total Jurusan</h4>
      </div>
      <div class="card-body header">
        4
      </div>
    </div>
  </div>
</div>
<div class="col-lg-2 col-md-6">
  <div class="card card-sm-3 col-12">
    <div class="card-icon bg-warning">
      <i class="ion ion-ios-paper-outline"></i>
    </div>
    <div class="card-wrap">
      <div class="card-header header">
        <h4>Laporan</h4>
      </div>
      <div class="card-body header">
        2
      </div>
    </div>
  </div>
</div>
<div class="col-lg-2 col-md-6 ">
  <div class="card card-sm-3 col-12">
    <div class="card-icon bg-success">
      <i class="ion ion-record"></i>
    </div>
    <div class="card-wrap">
      <div class="card-header header">
        <h4>Pengguna</h4>
      </div>
      <div class="card-body header">
        10
      </div>
    </div>
  </div>
</div>                  
</div>
  
	
<div class="font">	
	<div class="card">
		<div class="card-header cardcolorin">
			Data Jadwal
		</div>

		<div class="card-body">
			<div class="row">
				<div class="col-md-3 font-label">
					    <label for="exampleFormControlSelect1">Tahun Ajaran</label>
						    <select class="form-control" id="exampleFormControlSelect1">
						      <option>==Pilih Tahun Ajaran==</option>
						      <option>2</option>
						      <option>3</option>
						      <option>4</option>
						      <option>5</option>
						    </select>
				</div>
			
			<div class="col-md-9"></div> 
			</div>
			<br>

			<div class="row">
				<div class="col-md-3">
					<label for="" class="font-label">Baris</label>
					<select class="form-control" id="exampleFormControlSelect1">
						      <option>Null</option>
						      <option>1</option>
						      <option>2</option>
						      <option>3</option>
						      <option>4</option>
						    </select>
        </div>
				
				<div class="col-md-3 offset-md-6">
					<label class="font-label">Search</label>
					<input class="form-control" type="text" placeholder="....">
        </div>

			</div>
		
		</div>		
	</div>
</div>

@endsection
