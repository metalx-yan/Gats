@extends('main')

@section('title', 'Persetujuan Jadwal')

@section('links')

@endsection

@section('content')

<h1 class="section-header">
  <div>Persetujuan Jadwal</div>
</h1>

	
<div class="row">
	<div class="col-lg-8">
		<div class="card">
			<h5 class="card-header head">+_+</h5>
			<div class="card-body">
				<div class="row">
					<div class="col-md-4">
						<div class="form-group">
							<label>Tahun Ajaran</label>
							<select name="" id="" class="form-control">
								@foreach ($approve as $app)
									<option value="{{ $app->id }}">{{ $app->beginning }} / {{ $app->end }}</option>
								@endforeach
							</select>
						</div>
					</div>

					<div class="col-md-4">
						<div class="form-group">
							<label>Kelas Jurusan</label>
							<select name="" id="" class="form-control">
								@foreach ($approve as $app)
									@foreach ($app->generates as $gen)
										<option value="{{ $gen->id }}">{{ $gen->major->level->class }} {{ ucwords($gen->major->name) }}</option>
									@endforeach
								@endforeach
							</select>
						</div>
					</div>

					<a href="">Enter</a>
				</div>
			</div>
		</div>
	</div>

	<div class="col-lg-4">
		<div class="card">
			<h5 class="card-header head4">Kelas</h5>
			<div class="card-body">
				<div class="row">
					<div class="col-md-12">
						@foreach ($approve as $app)
							@foreach ($app->generates as $element)
								<hr>
									<div>{{ $element->major->level->class }} {{ ucwords($element->major->name) }}</div>
								<hr>
							@endforeach
						@endforeach
					</div>

				</div>
			</div>
		</div>
	</div>
</div>

@endsection