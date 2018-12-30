@extends('main')

@section('title', 'Keahlian Jurusan')

@section('links')
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">  
@endsection

@section('content')

<h1 class="section-header">
  <div>Keahlian Jurusan Kelas {{ $expertise->major->level->class }} Jurusan {{ $expertise->major->name }} </div>
</h1>

@php
	$no = 1;
@endphp

<div class="row">
	<div class="col-lg-8">
		<div class="card">
			<div class="card-body">
				<table class="table">
				  <thead class="theadcolor-expertise fontsopher">
				    <tr>
				      <th>No</th>
				      <th>Kode</th>
				      <th>Nama</th>
				      <th>Jurusan</th>
				      <th>Bagian</th>
				    </tr>
				  </thead>
				  <tbody class="fontsopher">
					
				    <tr>
				      <th scope="row">{{ $no }}</th>
						@php
							$no++;	
						@endphp
				      <td>{{ $expertise->code }}</td>
				      <td>{{ $expertise->name }}</td>
				      <td>{{ $expertise->where('id', $expertise->id)->first()->major->major }}</td>
				      <td>{{ $expertise->major->level->class }} {{ $expertise->name }} {{ $expertise->part }}</td>
				     
				    </tr>
				  </tbody>
				</table>
			</div>
		</div>
	</div>

	<div class="col-lg-4">
		<div class="card">
			<div class="card-header headercolorincurrent fontsopher">
				Tambah Keahlian Jurusan
			</div>
				<form action="{{ route('expertise.update', [$expertise->id]) }}" method="POST">
				@csrf
                @method('PUT')
					@include('curriculums.expertises.formedit', [
							'submit_button' => 'Update'
						])

					<a href="{{ route('mix.expertise', [$expertise->major->level->id, $expertise->major->id]) }}" type="text" class="form-control btn-danger fontsopher style">Back</a>
						
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

