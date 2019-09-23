@extends('main')

@section('title', 'Mata Pelajaran')

@section('links')
	<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">

	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">  


	<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>	
	<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />

	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>
@endsection

@section('content')

<h1 class="section-header">
  <div>Mata Pelajaran {{ ucwords($typelesson->name) }}</div>
</h1>

@php
	$no = 1;
@endphp

<div class="row">
	<div class="col-lg-12">
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


<div class="row">
	<div class="col-lg-12">
		<div class="card">
			<div class="card-body">
				<table class="table">
				  <thead class="theadcolor-lesson fontsopher">
				    <tr>
				      <th>No</th>
				      <th>Kode</th>
				      <th>Nama</th>
				      <th>Semester</th>
				{{--       <th>Guru</th> --}}
				      <th>Akun Jurusan</th>
				      <th>Kelas Jurusan</th>
				      <th>Total Jam (menit)</th>
				      <th>Aksi</th>
				    </tr>
				  </thead>
				  <tbody class="fontsopher">
				  	@foreach ($typelesson->lessons as $indexs)
				    <tr>
				      <th scope="row">{{ $no }}</th>
						@php
							$no++;	
						@endphp
				      <td>{{ $indexs->code }}</td>
				      <td>{{ $indexs->name }}</td>
				      <td>{{ ucwords($indexs->semester) }}</td>
				{{-- 	  <td>@foreach ($indexs->teachers as $teacher)
					      {{ ucwords($teacher->name) }},<br>
				      @endforeach</td> --}}
					  <td>@foreach ($indexs->users as $user)
					      {{ ucwords($user->name) }},<br>
				      @endforeach</td>
				      <td>@foreach ($indexs->majors as $major)
					     {{ $major->level->class }} {{ ucwords($major->name) }},<br>
				      @endforeach</td>
		            <td>@foreach ($indexs->majors as $major)
		      	    {{ $indexs->time }}<br>
		            @endforeach</td>
				      <td>
				      	<div class="row">
              				<div class="col-xs-1">
                				<a href="{{ route('editmix.lesson', [$indexs->type_lesson->id, $indexs->id]) }}" class="btn btn-warning btn-sm">
									<i class="ion ion-edit"></i>
                				</a>
              				</div>
              				<div class="col-xs-1 offset-xs-1"></div>
              
              				<div class="col-xs-1">
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

</div>
@endsection


@section('scripts')
	<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>

	<script>
		$(document).ready(function() {
			$('#select2').select2();
			$('#select3').select2();
			$('#select4').select2();
		});
	</script>

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
	@endif

@endsection()

