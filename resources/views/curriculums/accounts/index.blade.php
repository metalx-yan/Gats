@extends('main')

@section('title', 'Tambah Akun')

@section('links')
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">  
@endsection

@section('content')
	
<h1 class="section-header">
  <div>Tambah Akun</div>
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
				      <th>Nama</th>
				      <th>Username</th>
				      <th>Hak Akses</th>
				      <th>Aksi</th>
				    </tr>
				  </thead>
				  <tbody class="fontsopher">
				  	@foreach ($users as $user)
				    <tr>
				      <th scope="row">{{ $no }}</th>
						@php
							$no++;	
						@endphp
				      <td>{{ ucwords($user->name) }}</td>
				      <td>{{ $user->username }}</td>
				      <td>{{ ucwords($user->role->name)  }}</td>
				      <td>
				      	<div class="row">
              				<div class="col-md-3">
                				<a href="{{ route('user.edit', $user->id) }}" class="btn btn-warning btn-sm">
									{{-- <i class="ion ion-edit"></i> --}}Ubah Data Akun
                				</a>
              				</div>
              				<div class="col-md-1 offset-sm-1"></div> <br><br>
              
              				<div class="col-md-7">
                				<form class="delete" action="{{ route('user.destroy', $user->id) }}" method="POST">
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
				<form action="{{ route('user.store') }}" method="POST">
				@csrf
					@include('curriculums.accounts.form', [
							'user' => new App\Models\User,
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
			@endif
@endsection