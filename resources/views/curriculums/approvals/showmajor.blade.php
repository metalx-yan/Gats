@extends('main')

@section('title', ' Jadwal Fix')

@section('content')

<h1 class="section-header">
  <div>Jadwal Fix Kelas {{ $mixcurriculum->level->class }} Jurusan {{ ucwords($mixcurriculum->name) }} </div>
</h1>

<div class="row">
	<div class="col-lg-12">
		<div class="card">
			<h5 class="card-header head">Pilih Konsentrasi</h5>
			<div class="card-body">
				<div class="row">
					@foreach ($mixcurriculum->expertises as $indexs)
						<div class="col-md-4">
							<h6>{{ $indexs->major->level->class }} {{ $indexs->name }} {{ $indexs->part }}</h6>
							<hr>
							<center>
							<a href="{{ route('approved', [$indexs->major->level->id, $indexs->major->id, $indexs->id]) }}" class="btn btn-warning">Lihat Jadwal</a>
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

