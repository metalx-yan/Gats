@extends('main')

@section('title', 'Kelas')

@section('content')

<h1 class="section-header">
  <div>Daftar Kelas {{ $view->level->class }} Jurusan {{ $view->major }} </div>
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
				      <th>Jurusan</th>
				      <th>Bagian</th>
				    </tr>
				  </thead>
				  <tbody class="fontsopher">
				  	@foreach ($view->expertises as $views)
				    <tr>
				      <th scope="row">{{ $no }}</th>
						@php
							$no++;	
						@endphp
				      <td>{{ $views->code }}</td>
				      <td>{{ $views->name }}</td>
				      <td>{{ $views->major->major }}</td>
				      <td>{{ $views->major->level->class }} {{ $views->name }} {{ $views->part }}</td>
				    </tr>
				  	@endforeach
				  </tbody>
				</table>
			</div>
		</div>
	</div>

</div>
@endsection


