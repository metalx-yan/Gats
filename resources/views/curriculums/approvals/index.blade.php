@extends('main')

@section('title', 'Tahun Ajaran')

@section('links')
	<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">
	
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">  

	<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />

@endsection

@section('content')
<h1 class="section-header">
  <div>Tahun Ajaran </div>
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
						<th>Tahun Ajaran</th>
		                <th>Kelas Jurusan</th>
						<th>Aksi</th>
					</tr>
				  </thead>

				  <tbody class="fontsopher">
				  	@foreach ($approve as $app)
					  	<tr>
					  		<th>{{ $no }}</th>
					  		@php
					  			$no++;
					  		@endphp
					  		<td>{{ $app->beginning }}/{{ $app->end }}</td>
					  		<td>
					  			@foreach ($approve as $app)
					  				@foreach ($app->generates as $gen)
										{{ $gen->major->level->class }} {{ $gen->expertise->name }} {{ $gen->expertise->part }}, <br>
					  				@endforeach
					  			@endforeach
					  		</td>
	
					  		<td>
					  			<div class="row">
		              				<div class="col-md-2">
		                				<a href="{{ route('approval.edit', $app->id) }}" class="btn btn-warning btn-sm">
											<i class="ion ion-edit"></i>
		                				</a>
		              				</div>
		              				<div class="col-md-1"></div>
		              
		              				<div class="col-md-1">
		                				<form class="" action="{{ route('approval.destroy', $app->id) }}" method="POST">
		                      				@csrf
		                      				@method('DELETE')
											<button class="ion ion-android-delete btn btn-danger btn-sm" name="delete" type="submit"></button>
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
	
	<div class="col-md-4">
		<div class="card">
			<div class="card-header headercolorincurrent fontsopher">Tambah Tahun Ajaran</div>
				<form action="{{ route('approval.store') }}" method="POST">
					@csrf
					@include('curriculums.approvals.form', [
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

	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>

	<script type="text/javascript">
      $('.date-own').datepicker({
         minViewMode: 2,
         format: 'yyyy'
       });
  	</script>
  	
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
	
  	@if(Session::has('sweetalert'))
	  <script>
	      swal('Success!!', '{{ Session::get('sweetalert') }}', 'success');
	  </script>
	@endif
@endsection