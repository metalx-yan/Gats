@extends('main')

@section('title', 'Edit Data Ruang')

@section('links')
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">  
@endsection

@section('content')
	<h1 class="section-header">
	  <div>Edit Data Ruang</div>
	</h1>

@php
	$no = 1;
@endphp

	<div class="row">
	<div class="col-lg-8">
		<div class="card">
			<div class="card-body">
				<table class="table">
				  <thead class="theadcolor-teacher fontsopher">
				    <tr>
				      <th>No</th>
				      <th>Kode</th>
				      <th>Nama</th>
				      <th>Kapasitas</th>
				    </tr>
				  </thead>
				  <tbody class="fontsopher">
				    <tr>
				      <th scope="row">{{ $no }}</th>
						@php
							$no++;	
						@endphp
				      <td>{{ $room->code }}</td>
				      <td>{{ $room->name }}</td>
				      <td>{{ $room->capacity }}</td>
				      
				    </tr>
				  </tbody>
				</table>
			</div>
		</div>
	</div>

	<div class="col-lg-4">
		<div class="card">
			<div class="card-header headercolorincurrent fontsopher">
				Tambah Ruang
			</div>
				<form action="{{ route('room.update', $room->id) }}" method="POST">
				@csrf
				@method('PUT')
					@include('curriculums.rooms.form', [
							'submit_button' => 'Update'
						])
					
					<a href="{{ route('room.index') }}" type="text" class="form-control btn-danger fontsopher style">Back</a>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection

@section('scripts')
  		
  		<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>

		@if(Session::has('sweetalert'))
		  <script>
		      swal('Success!!', '{{ Session::get('sweetalert') }}', 'success');
		  </script>
		  {{-- <?php Session::forget('sweetalert'); ?> --}}
		@endif
	
@endsection()