@extends('main')

@section('title', 'Edit Data Mata Pelajaran')

@section('links')
    	<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">
  		<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">  
		
		<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />

		<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>	
   	
   		<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>
@endsection

@section('content')
	<h1 class="section-header">
	  <div>Edit Data Mata Pelajaran {{ ucwords($lesson->type_lesson->name) }}</div>
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
				<form action="{{ route('lesson.update', $lesson->id) }}" method="POST">
				@csrf
				@method('PUT')
						
						@include('curriculums.lessons.formedit', [
								'submit_button' => 'Update'
							])
						
						<a href="{{ route('mix.lesson', $lesson->type_lesson->id) }}" type="text" class="form-control btn-danger fontsopher style">Back</a>
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
				      <th>Guru</th>
				      <th>Akun Jurusan</th>
				      <th>Kelas Jurusan</th>
				      <th>Tahun Ajaran</th>
				    </tr>
				  </thead>
				  <tbody class="fontsopher">
				    <tr>
				      <th scope="row">{{ $no }}</th>
						@php
							$no++;	
						@endphp
				      <td>{{ $lesson->code }}</td>
				      <td>{{ $lesson->name }}</td>
				      <td>{{ ucwords($lesson->semester) }}</td>
				      <td>@foreach ($lesson->teachers as $teacher)
					      {{ ucwords($teacher->name) }},<br>
				      @endforeach</td>
					  <td>@foreach ($lesson->users as $user)
					      {{ ucwords($user->name) }},<br>
				      @endforeach</td>
				      <td>@foreach ($lesson->majors as $major)
					      {{ ucwords($major->name) }},<br>
				      @endforeach</td>
				      <td>{{ $lesson->beginning }}/{{ $lesson->end }}</td>
				      {{-- <td>
				      	@if ($lesson->status == "Aktif")
				      		<span class="badge badge-success"><b>{{ $lesson->status }}</b></span>
						@else
				      		<span class="badge badge-danger"><b>{{ $lesson->status }}</b></span>
						
						@endif
				      </td> --}}
				    </tr>
				  </tbody>
				</table>
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

  	<script>
		$(document).ready(function() {
			$('#select2').select2();
			$('#select3').select2();
			$('#select4').select2();
			$('#select2').select2().val({!! json_encode($lesson->majors()->allRelatedIds()) !!}).trigger('change');	
			$('#select3').select2().val({!! json_encode($lesson->users()->allRelatedIds()) !!}).trigger('change');	
			$('#select4').select2().val({!! json_encode($lesson->teachers()->allRelatedIds()) !!}).trigger('change');	
		});
	</script>

	@if(Session::has('sweetalert'))
	  <script>
	      swal('Success!!', '{{ Session::get('sweetalert') }}', 'success');
	  </script>
	  {{-- <?php Session::forget('sweetalert'); ?> --}}
	@endif

@endsection()