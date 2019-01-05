@extends('main')

@section('title', 'Keahlian Jurusan')

@section('content')

<h1 class="section-header">
  <div>Generate Jadwal Jurusan {{ $mixmajor->major }} Kelas {{ $mixmajor->level->class }}</div>
</h1>

@php
	$no = 1;
@endphp

<div class="row">
	<div class="col-lg-12">
		<div class="card">
			<h5 class="card-header head">Pilih Konsentrasi</h5>
			<div class="card-body">
				<div class="row">
					@foreach ($mixmajor->expertises as $indexs)
						<div class="col-md-4">
							<h6>{{ $indexs->major->level->class }} {{ $indexs->name }} {{ $indexs->part }}</h6>
							<hr>
							<center>
								
							<a href="" class="btn btn-info">Atur Jadwal</a>
							<a href="" class="btn btn-warning">Lihat Jadwal</a>
							</center>
						<hr>
						</div>
					@endforeach
				
				</div>

				
			</div>
		</div>
	</div>

</div>
@endsection

