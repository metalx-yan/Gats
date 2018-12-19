@extends('main')

@section('title', 'Ruang')

@section('content')

<h1 class="section-header">
  <div>Ruang</div>
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
				      <th>Kode</th>
				      <th>Nama</th>
				      <th>Kapasitas</th>
				    </tr>
				  </thead>
				  <tbody class="fontsopher">
				  	@foreach ($view as $views)
				    <tr>
				      <th scope="row">{{ $no }}</th>
						@php
							$no++;	
						@endphp
				      <td>{{ $views->code }}</td>
				      <td>{{ $views->name }}</td>
				      <td>{{ $views->capacity }}</td>
				    </tr>
				  	@endforeach
				  </tbody>
				</table>
			</div>
		</div>
	</div>

</div>
@endsection


