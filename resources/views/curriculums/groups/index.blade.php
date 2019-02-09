@extends('main')

@section('title', 'Pengelompokan Jadwal')

@section('links')
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">  

  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
  
@endsection

@section('content')

<h1 class="section-header">
  <div>Pengelompokan Jadwal</div>
</h1>

@php
	$no = 1;
@endphp

<div class="row">
	<div class="col-lg-8">
		<div class="card">
			<div class="card-body">
				<table class="table">
				  <thead class="theadcolor-room fontsopher">
				    <tr>
				      <th>No</th>
				      <th>Kelas Jurusan</th>
				      <th>Aksi</th>
				    </tr>
				  </thead>
				  <tbody class="fontsopher">
				  	@foreach ($approval as $app)
						    <tr>
						      <th scope="row">{{ $no }}</th>
								@php
									$no++;	
								@endphp
						      <td>{{ $app->id }}</td>
						      <td>
						      	<div class="row">
		              				<div class="col-md-2">
		                				<a href="" class="btn btn-warning btn-sm">
											<i class="ion ion-edit"></i>
		                				</a>
		              				</div>
		              				{{-- <div class="col-md-1 offset-sm-1"></div> <br><br> --}}
		              
		              				<div class="col-md-2">
		                				<form class="delete" action="" method="POST">
		                      				@csrf
		                      				@method('DELETE')
											<button class="ion ion-android-delete btn btn-danger btn-sm" name="delete" title="hapus" type="submit"></button>
		                  				</form>
		                  			</div>
						      	</div>
						      </td>
						    </tr>
				  	@endforeach
				  </tbody>
				</table>
			</div>
		</div>
	</div>

	<div class="col-lg-4">
		<div class="card">
			<div class="card-header headercolorincurrent fontsopher">
				Tambah Akun
			</div>
				<form action="{{ route('process.create') }}" method="POST">
				@csrf
					@include('curriculums.groups.form', [
							'approval' => new App\Models\Approval,
							'submit_button' => 'Save'
						])
				</form>
			</div>
		</div>
	</div>
</div>

@endsection

@section('scripts')
	<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

	<script>
		$(document).ready(function() {
			$('#select2').select2();
		})
	</script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>

			@if(Session::has('sweetalert'))
			  <script>
			      swal('Success!!', '{{ Session::get('sweetalert') }}', 'success');
			  </script>
			@endif
@endsection

