@extends('main')

@section('title', 'Mata Pelajaran')

@section('content')

<h1 class="section-header">
  <div>Daftar Mata Pelajaran {{ $view->type }}</div>
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
				      <th>Total Jam</th>
				      <th>Semester</th>
				      <th>Tahun Ajaran</th>
				    </tr>
				  </thead>
				  <tbody class="fontsopher">
				  	@foreach ($view->lessons as $views)
					  	@if (Auth::user()->name == $views->user->name)
						    <tr>
						      <th scope="row">{{ $no }}</th>
								@php
									$no++;	
								@endphp
						      <td>{{ $views->code }}</td>
						      <td>{{ $views->name }}</td>
						      <td>{{ $views->total_hours }}</td>
						      <td>{{ $views->semester }}</td>
						      <td>{{ $views->beginning }}/{{ $views->end }}</td>
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


