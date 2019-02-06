@extends('main')

@section('title', 'Edit Akun')

@section('links')
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">  
@endsection

@section('content')
	
<h1 class="section-header">
  <div>Ubah Data Akun</div>
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
				    </tr>
				  </thead>
				  <tbody class="fontsopher">
				    <tr>
				      <th scope="row">{{ $no }}</th>
						@php
							$no++;	
						@endphp
				      <td>{{ ucwords($edit->name) }}</td>
				      <td>{{ $edit->username }}</td>
				      <td>{{ ucwords($edit->role->name)  }}</td>
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
				<form action="{{ route('user.update', $edit->id) }}" method="POST">
				@csrf
				@method('PUT')
					@include('curriculums.accounts.formedit', [
							'user' => new App\Models\User,
							'submit_button' => 'Update'
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