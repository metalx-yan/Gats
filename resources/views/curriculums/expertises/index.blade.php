@extends('main')

@section('title', 'Keahlian Jurusan')

@section('links')
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">  
@endsection

@section('content')

<h1 class="section-header">
  <div>Keahlian Jurusan Kelas {{ $major->level->class }} {{ $major->major }} </div>
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
				      <th>Aksi</th>
				    </tr>
				  </thead>
				  <tbody class="fontsopher">

				  	@foreach ($major->expertises as $indexs)
				    <tr>
				      <th scope="row">{{ $no }}</th>
						@php
							$no++;	
						@endphp
							{{-- expr --}}
				      <td>{{ $indexs->code }}</td>
				      <td>{{ $indexs->name }}</td>
				      <td>{{ $indexs->where('id', $indexs->id)->first()->major->major }}</td>
				      <td>{{ $indexs->major->level->class }} {{ $indexs->name }} <b> {{ $indexs->part }}</b></td>
				     
				      <td>
				      	<div class="row">
              				<div class="col-xs-4">
                				<a href="{{ route('editmix.expertise', [$indexs->major->level->id,$indexs->major->id,$indexs->id]) }}" class="btn btn-warning btn-sm">
									<i class="ion ion-edit"></i>
                				</a>
              				</div>
              				<div class="col-xs-1 offset-sm-1"></div>
              
              				<div class="col-xs-4">
                				<form class="" action="{{ route('expertise.destroy', $indexs->id) }}" method="POST">
                      				@csrf
                      				@method('DELETE')
									<button class="ion ion-android-delete btn btn-danger btn-sm" name="delete" type="submit"></button>
                  				</form>
                  			</div>
				      	</div>
				      </td>
				    </tr>
				  	@endforeach
				  	{{-- @endif --}}
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
				<form action="{{ route('expertise.store') }}" method="POST">
				@csrf
					@include('curriculums.expertises.form', [
							'expertise' => new App\Models\Expertise,
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

		@if(Session::has('sweetalert'))
		  <script>
		      swal('Success!!', '{{ Session::get('sweetalert') }}', 'success');
		  </script>
		  {{-- <?php Session::forget('sweetalert'); ?> --}}
		@endif
	
@endsection()

