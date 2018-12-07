@extends('main')

@section('title', 'Mata Pelajaran')

@section('links')
    	<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">
  		<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">  

   		<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>
@endsection

@section('content')

<h1 class="section-header">
  <div>Mata Pelajaran</div>
</h1>

@php
	$no = 1;
@endphp

<div class="row">
	<div class="col-lg-8">
		<div class="card">
			<div class="card-body">
				<table class="table">
				  <thead class="theadcolor-lesson fontsopher">
				    <tr>
				      <th>No</th>
				      <th>Kode</th>
				      <th>Nama</th>
				      <th>Total Jam</th>
				      <th>Semester</th>
				      <th>Tahun Ajaran</th>
				      <th>Aksi</th>
				    </tr>
				  </thead>
				  <tbody class="fontsopher">
				  	@foreach ($index as $indexs)
				    <tr>
				      <th scope="row">{{ $no }}</th>
						@php
							$no++;	
						@endphp
				      <td>{{ $indexs->code }}</td>
				      <td>{{ $indexs->name }}</td>
				      <td>{{ $indexs->total_hours }}</td>
				      <td>{{ $indexs->semester }}</td>
				      <td>{{ $indexs->beginning }}/{{ $indexs->end }}</td>
				     
				      <td>
				      	<div class="row">
              				<div class="col-sm-4">
                				<a href="{{ route('lesson.edit', $indexs->id) }}" class="btn btn-warning btn-sm">
									<i class="ion ion-edit"></i>
                				</a>
              				</div>
              				{{-- <div class="col-1"></div> --}}
              
              				<div class="col-sm-2">
                				<form class="" action="{{ route('lesson.destroy', $indexs->id) }}" method="POST">
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

	<div class="col-lg-4">
		<div class="card">
			<div class="card-header headercolorincurrent fontsopher">
				Tambah Mata Pelajaran
			</div>
				<form action="{{ route('lesson.store') }}" method="POST">
				@csrf
					@include('curriculums.lessons.form', [
							'lesson' => new App\Models\Lesson,
							'submit_button' => 'Save'
						])
				</form>
			</div>
		</div>
	</div>
</div>
@endsection


@section('scripts')
	<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>

	<script type="text/javascript">
      $('.date-own').datepicker({
         minViewMode: 2,
         format: 'yyyy'
       });
  	</script>

	@if(Session::has('sweetalert'))
	  <script>
	      swal('Success!!', '{{ Session::get('sweetalert') }}', 'success');
	  </script>
	  {{-- <?php Session::forget('sweetalert'); ?> --}}
	@endif

@endsection()

