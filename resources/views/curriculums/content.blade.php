@extends('main')

@section('title', 'Kurikulum')

@section('content')

<h1 class="section-header">
  <div>Dashboard</div>
</h1>

<div class="row">
<div class="col-lg-2 col-md-6">
  <div class="card card-sm-3 col-12">
    <div class="card-icon bg-primary" >
      <i class="ion ion-person"></i>
    </div>
    <div class="card-wrap">
      <div class="card-header header">
        <h4>Total Admin</h4>
      </div>
      <div class="card-body header">
        10
      </div>
    </div>
  </div>
</div>
<div class="col-lg-2 col-md-6">
  <div class="card card-sm-3 col-12">
    <div class="card-icon bg-primary" >
      <i class="ion ion-person"></i>
    </div>
    <div class="card-wrap">
      <div class="card-header header">
        <h4>Total Admin</h4>
      </div>
      <div class="card-body header">
        10
      </div>
    </div>
  </div>
</div>
<div class="col-lg-2 col-md-6">
  <div class="card card-sm-3 col-12">
    <div class="card-icon bg-primary" >
      <i class="ion ion-person"></i>
    </div>
    <div class="card-wrap">
      <div class="card-header header">
        <h4>Total Admin</h4>
      </div>
      <div class="card-body header">
        10
      </div>
    </div>
  </div>
</div>
<div class="col-lg-2 col-md-6">
  <div class="card card-sm-3 col-12">
    <div class="card-icon bg-danger">
   		<i class="ion ion-ios-paper-outline"></i>
    </div>
    <div class="card-wrap">
      <div class="card-header header">
        <h4>News</h4>
      </div>
      <div class="card-body header">
        42
      </div>
    </div>
  </div>
</div>
<div class="col-lg-2 col-md-6">
  <div class="card card-sm-3 col-12">
    <div class="card-icon bg-warning">
      <i class="ion ion-paper-airplane"></i>
    </div>
    <div class="card-wrap">
      <div class="card-header header">
        <h4>Reports</h4>
      </div>
      <div class="card-body header">
        1,201
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
        <h4>Online Users</h4>
      </div>
      <div class="card-body header">
        47
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
					<input class="form-control" type="text" value="....">
        </div>

			</div>
		
		</div>		
	</div>
</div>

@endsection
