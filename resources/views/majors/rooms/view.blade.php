@extends('main')

@section('title', 'Ruang')

@section('content')

<h1 class="section-header">
  <div>Daftar Semua Ruang {{ ucwords($view->name) }}</div>
</h1>

@php
	$no = 1;
@endphp

<div class="row">
	<div class="col-lg-12">
		<div class="card">
			<div class="card-body">
				<table class="table">
				  <thead class="theadcolor-room fontsopher">
				    <tr>
				      <th>No</th>
				      <th>Kode</th>
				      <th>Nama</th>
				    </tr>
				  </thead>
				  <tbody class="fontsopher">
				  	@foreach ($viewroom as $views)
				  	@if ($views->type_room->name == 'praktek')
					    <tr>
					      <th scope="row">{{ $no }}</th>
							@php
								$no++;	
							@endphp
					      <td>{{ $views->code }}</td>
					      <td>{{ $views->name }}</td>
					    </tr>	
				  	@endif
				  	@endforeach
				  </tbody>
				</table>
			</div>
		</div>
	</div>

</div>
@endsection


