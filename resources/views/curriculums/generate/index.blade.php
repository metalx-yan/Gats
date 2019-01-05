@extends('main')

@section('title', 'Keahlian Jurusan')

@section('links')
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">  
@endsection

@section('content')

<h1 class="section-header">
  <div>Generate Jadwal Jurusan Kelas </div>
</h1>

@php
	$no = 1;
@endphp

<div class="row">
	<div class="col-lg-12">
		<div class="card">
			<div class="card-body">
				@foreach ($mixmajor->expertises as $indexs)
					<a href="" class="btn btn-primary">{{ $indexs->name }}</a>
				@endforeach
				{{-- <table class="table">
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
				  	@foreach ($mixmajor->expertises as $indexs)
				    <tr>
				      <th scope="row">{{ $no }}</th>
						@php
							$no++;	
						@endphp
				      <td>{{ $indexs->code }}</td>
				      <td>{{ $indexs->name }}</td>
				      <td>{{ $indexs->major->major }}</td>
				      <td>{{ $indexs->part }}</td>
				    </tr>
				  	@endforeach
				  </tbody>
				</table> --}}
			</div>
		</div>
	</div>

	
</div>
@endsection

