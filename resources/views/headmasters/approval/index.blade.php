@extends('main')

@section('title', 'Persetujuan Jadwal')

@section('links')

@endsection

@section('content')

<h1 class="section-header">
  <div>Persetujuan Jadwal</div>
</h1>

	
<form action="{{ route('showexpert') }}" method="post">
@csrf
<div class="row">
	<div class="col-lg-8">
		<div class="card">
			<h5 class="card-header head5">Pilih Jadwal</h5>
			<div class="card-body">
				<div class="row">
					<div class="col-md-3">
						<div class="form-group">
							<label>Tahun Ajaran</label>
							<select name="tahun" id="" class="form-control">
								@foreach ($approve as $app)
									<option value="{{ $app->id }}">{{ $app->beginning }} / {{ $app->end }}</option>
								@endforeach
							</select>
						</div>
					</div>

					<div class="col-md-3">
						<div class="form-group">
							<label>Kelas Jurusan</label>
							<select name="expertise" id="" class="form-control">
								@foreach ($approve as $app)
									@foreach ($app->generates as $element)
										<option value="{{ $element->id }}">{{ $element->major->level->class }} {{ ucwords($element->expertise->name) }} {{ $element->expertise->part }}</option>
									@endforeach
								@endforeach
							</select>
						</div>
					</div>
					
					<div class="col-md-3">
						<div class="form-group">
							<label><br></label>
								<button type="submit" href="{{ route('showexpert') }}" class="btn btn-primary btn-sm form-control">Lihat Jadwal</button>
						</div>
					</div>

					<div class="col-md-3">
						<div class="form-group">
							<label><br></label>
							<a href="" class="btn btn-info btn-sm form-control"><i class="icon ion-checkmark"></i></a>
							{{-- <div style="font-size: 10px;"><i>*Persetujuan Jadwal Kelas Setelah Itu Akan Melewati Proses Fix Jadwal</i></div> --}}
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
					</form>

	<div class="col-lg-4">
		<div class="card">
			<h5 class="card-header head4">Kelas</h5>
			<div class="card-body">
				<div class="row">
					<div class="col-md-12">
						@foreach ($approve as $app)
							@foreach ($app->generates as $element)
								<hr><center>
								<option value="{{ $element->id }}">{{ $element->major->level->class }} {{ ucwords($element->expertise->name) }} {{ $element->expertise->part }}</option>
								</center>
								<hr>
							@endforeach
						@endforeach
					</div>
					<button class="btn btn-success form-control">Fix Jadwal </button>
				</div>
			</div>
		</div>
	</div>
</div>

@if (app('request')->input('expertise'))

<div class="row">
	<div class="col-md-8">
		<div class="card">
			<div class="card-body">
				<table class="table">
			  		<thead class="theadcolor-room fontsopher">
			  			<tr>
			  				<th>No</th>
			  				<th>Lor</th>
			  				<th>Lor</th>
			  				<th>Lor</th>
			  				<th>Lor</th>
			  				<th>Lor</th>
			  			</tr>
			  		</thead>
			  		<tbody>
			  			@foreach ($generates as $gens)
							@if ($gens->expertise->id)
								{{-- expr --}}
			  			<tr>
			  				<th>{{ $gens->id }}</th>
			  				<td>2</td>
			  				<td>3</td>
			  				<td>4</td>
			  				<td>5</td>
			  				<td>6</td>
			  			</tr>
							@endif
			  			@endforeach
			  		</tbody>
			  	</table>
			</div>
		</div>
	</div>
</div>

@endif

@endsection