@extends('main')

@section('title', 'Lihat Jadwal')

@section('content')
	<h1 class="section-header">
	  <div>Jadwal {{ $showexpert->major->level->class }} {{ $showexpert->name }} {{ $showexpert->part }} </div>
	</h1>
@php
	$no = 1;
@endphp

<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-body">
				<table class="table">
					<thead class="theadcolor-expertise fontsopher">
						<tr>
							<th>No</th>
							<th>Hari</th>
							<th>Jam Masuk</th>
							<th>Jam Keluar</th>
							<th>Guru</th>
							<th>Ruang</th>
							<th>Mata Pelajaran</th>
							<th>Kelas Jurusan</th>
						</tr>
					</thead>
					<tbody class="fontsopher" id="color">
							<tr>
						@foreach ($gens as $gen)
							@if ($gen->expertise_id == $showexpert->id) 

								<td>{{ $no }}</td>
								@php
									$no++;	
								@endphp
								@if (is_null($gen->teacher_id)) 
									<td>{{ ucwords($gen->day) }}</td>
									<td>{{ $gen->start }}</td>
									<td>{{ $gen->end }}</td>
									<td>{{ $gen->istirahat() ? 'Istirahat' : 'Jam Kosong' }}</td>
									<td>-</td>
									<td>-</td>
									<td>-</td>
									
									@else
									<td>{{ ucwords($gen->day) }}</td>
									<td>{{ $gen->start }}</td>
									<td>{{ $gen->end }}</td>
									<td>{{ ucwords($gen->teacher->name) }} - {{ $gen->user->role->name }} {{ $gen->expertise_id }}</td>
									<td>{{ $gen->room->code }} - {{ $gen->room->name }}</td>
									<td>{{ $gen->lesson->name }}</td>
									<td>{{ $gen->major->level->class }} {{ $gen->major->name }}</td>
									@endif
							@endif
						</tr>					
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

@endsection