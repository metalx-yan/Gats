@extends('main')

@section('title',  ucwords(Auth::user()->role->name) . ' (Generate Jadwal)') 

@section('links')
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">  
@endsection

@section('content')

<h1 class="section-header">
  <div>Atur Jadwal Kelas {{ $showexpert->major->level->class }} {{ ucwords($showexpert->major->name) }} ({{ $showexpert->major->level->class }} {{ ucwords($showexpert->name) }} {{ $showexpert->part }})</div>
</h1>

@php
	$no = 1;
@endphp

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


<div class="row">
	<div class="col-md-12">
		<div class="card">
			<h5 class="card-header head" align="center">Atur Jadwal</h5>
			<div class="card-body">
				<form action="{{ route('generate.store') }}" method="POST">
					@csrf
						<div class="row">
							<div class="col-lg-3">
								<div class="form-group">
									<label for="">Hari</label>
									<select name="day" id="day" class="form-control {{ $errors->has('day') ? 'is-invalid' : ''}}">
										<option value="">-- Select --</option>
										@foreach (App\Models\Generate::day() as $day)
											<option value="{{ $day }}">{{ ucwords($day) }}</option>
										@endforeach
									</select>
									{!! $errors->first('day', '<span class="invalid-feedback">:message</span>') !!}
								</div>
							</div>

							<div class="col-lg-3">
								<div class="form-group">
									<div id="hour-cont"></div>
								</div>
							</div>

							<div class="col-lg-3">
								<div class="form-group">
									<div id="sesi-cont"></div>
								</div>
							</div>

							<div class="col-lg-3">
								<div class="form-group">
									<div id="type-cont"></div>
								</div>
							</div>
						</div>
						
						<div class="row">
							<div class="col-lg-3">
								<div class="form-group">
									<div id="room-cont"></div>
								</div>
							</div>

							<div class="col-lg-3">
								<div class="form-group">
									<div id="type-lesson-cont"></div>
								</div>
							</div>

							<div class="col-lg-3">
								<div class="form-group">
									<div id="lesson-major-cont"></div>
								</div>
							</div>

							<div class="col-lg-3">
								<div class="form-group">
									<div id="lesson-cont"></div>
								</div>
							</div>							

						</div>

						<div class="row">

							<div class="col-lg-3">
								<div class="form-group">
									<div id="type-teacher-cont"></div>
								</div>
							</div>		

							<div class="col-lg-3">
								<div class="form-group">
									<div id="teacher-cont"></div>
								</div>
							</div>

						</div>	
					
					<button type="submit" class="form-control btn-success fontsopher">Generate</button><p></p>
				</form>
			</div>
		</div>
	</div>
</div>


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
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody class="fontsopher" id="color">

							<tr>
						@foreach ($gens as $gen)
								@if ($gen->id == $showexpert->id)
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
									<td>
										<div class="row">
				              				<div class="col-xs-4">
				                				<a href="{{ route('edit.generate', [Auth::user()->role->name, 0, 0, $gen->id]) }}" class="btn btn-warning btn-sm">
													<i class="ion ion-edit"></i>
				                				</a>
				              				</div>
				              				<div class="col-xs-1 offset-sm-1"></div>
				              
				              				<div class="col-xs-4">
				                				<form class="" action="{{ route('generate.destroy', $gen->id) }}" method="POST">
				                      				@csrf
				                      				@method('DELETE')
													<button class="ion ion-android-delete btn btn-danger btn-sm" name="" type="submit"></button>
				                  				</form>
				                  			</div>
								      	</div>
									</td>
									@else
									<td>{{ ucwords($gen->day) }}</td>
									<td>{{ $gen->start }}</td>
									<td>{{ $gen->end }}</td>
									<td>{{ ucwords($gen->teacher->name) }} - {{ $gen->user->role->name }}</td>
									<td>{{ $gen->room->code }} - {{ $gen->room->name }}</td>
									<td>{{ $gen->lesson->name }}</td>
									<td>{{ $gen->major->level->class }} {{ $gen->major->name }}</td>
									@if (!$gen->generate_id)
									<td>
										<div class="row">
				              				<div class="col-xs-4">
				                				<a href="{{ route('edit.generate', [Auth::user()->role->name, $gen->major->level->id, $gen->major->id, $gen->id]) }}" class="btn btn-warning btn-sm">
													<i class="ion ion-edit"></i>
				                				</a>
				              				</div>
				              				<div class="col-xs-1 offset-sm-1"></div>
				              
				              				<div class="col-xs-4">
				                				<form class="" action="{{ route('generate.destroy', $gen->id) }}" method="POST">
				                      				@csrf
				                      				@method('DELETE')
													<button class="ion ion-android-delete btn btn-danger btn-sm" name="" type="submit"></button>
				                  				</form>
				                  			</div>
								      	</div>
									</td>
									@else	
									<td>
										<div class="row">
											<div class="col-xs-4">
				                				<form class="" action="{{ route('expl.generate', [Auth::user()->role->name, $gen->id]) }}" method="POST">
				                      				@csrf
				                      				@method('PUT')
													<button class=" btn btn-primary btn-sm" name="" type="submit">Pisahkan</button>
				                  				</form>
				                  			</div>
								      	</div>
									</td>
									@endif
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


@section('scripts')
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>

		@if(Session::has('sweetalert'))

		  <script>
		      swal('Success!!', '{{ Session::get('sweetalert') }}', 'success');
		  </script>

		  @elseif(Session::has('sweetalerterror'))
		  <script>
		      swal('Error!!', '{{ Session::get('sweetalerterror') }}', 'error');
		  </script>
		@endif

	<script>
		$(document).ready(function () {
			console.log('Start');
			var day = $('#day');
			var hour_cont = $('#hour-cont');
			var sesi_cont = $('#sesi-cont');
			var type_cont = $('#type-cont');
			var room_cont = $('#room-cont');

			day.on('change', function () {
				if (day.val() != '') {
					hour_cont.html(`
							<label for="">Jam Masuk</label>
							<select name="start" id="hour" class="form-control">
							</select>
						`);
					$.ajax({
						url: 'http://jadwal.test/api/hours/' + day.val() + '/' + {{ $showexpert->id }}
					}).done(function (data) {
						$('#hour').html('');
						data.map(function (map) {
							if (map.includes('istirahat')) {
								$('#hour').append('<option value="' + map + '">' + map.substr(0, 5) + ' (istirahat)' + '</option>');
							} else if (map.includes('jam kosong')) {
								$('#hour').append('<option value="' + map + '">' + map.substr(0, 5) + ' (jam kosong)' + '</option>');
							} else {
								$('#hour').append('<option value="' + map + '">' + map.substr(0, 5) + '</option>');
							}
						});
					});
					sesi_cont.html(`
						<label for="">Sesi</label>
						<select name="sesi" id="sesi" class="form-control">
							<option value="1">1</option>
							<option value="2">2</option>
						</select>
						`);

					type_cont.html(`
							<label for="">Tipe Ruang</label>
							<select name="room_id" id="type" class="form-control">
								<option value="">-- Select --</option>
								@if (Auth::user()->role->id == 1)
									<option value="teori">Teori</option>
								@elseif(Auth::user()->role->id == 2)
									<option value="praktek">Praktek</option>
								@endif
							</select>
						`);

					room_cont.html(`
						<label for="">Ruang</label>
						<select name="room_id" id="room" class="form-control">
							<option value="">-- select --</option>
						</select>
						`);

					$('#type').on('change', function () {
						if ($('#type').val() != '') {
							$.ajax({
								url: 'http://jadwal.test/api/rooms/'
									+ $('#type').val()
									+ '/' + day.val()
									+ '/' + $('#hour').val()
									+ '/' + $('#sesi').val()
							}).done(function (data) {
								$('#room').html('');
								data.map(function (map) {
									$('#room').append('<option value="' + map.id + '">' + map.code + '</option>');
								});
								console.log(data);
								if (data.length == 0) {
									$('#room').append('<option value="">Ruangan kosong</option>');
								}
							});
						} else {
							$('#room').html('');
						}
					});

					$('#hour').on('change', function () {
						$('#sesi').val('1');
						$('#type').val('');
						$('#room').html('');
					});
					$('#sesi').on('change', function () {
						$('#type').val('');
						$('#room').html('');
					});

					$('#type-lesson-cont').html(`
						<label for="">Tipe Mata Pelajaran</label>
						<select name="lesson_id" id="type_lesson" class="form-control">
							@php
							if (Auth::user()->role->id == 1) {
								$typelesson = App\Models\TypeLesson::where('slug', 'umum')->first();
								$types = App\Models\TypeLesson::whereNotIn('slug', ['jurusan'])->get();
							}
							elseif(Auth::user()->role->id == 2){
								$typelesson = App\Models\TypeLesson::where('slug', 'jurusan')->first();
							}
							@endphp
							@if (Auth::user()->role->id == 1)
								@foreach ($types as $type)
									<option value="{{ $type->id }}">{{ ucwords($type->name)}}</option>
								@endforeach
							@else
								<option value="{{ $typelesson->id }}">{{ ucwords($typelesson->name)}}</option>
							@endif
						</select>
						`);

					$('#lesson-major-cont').html(`
							<label for="">Pilih Jurusan</label>
							<select name="major_id" id="major" class="form-control">
								@php
									$dup = [];
								@endphp
								@foreach ($typelesson->lessons as $lesson)
									@foreach ($lesson->majors->where('id', $showexpert->major->id) as $major)
										@if (!in_array($major->id, $dup))
											<option value="{{ $major->id }}">{{ $major->level->class }} {{ $major->name }} </option>
										@endif
										@php
											array_push($dup, $major->id);
										@endphp
									@endforeach
								@endforeach
							</select>
						`);

					$('#lesson-cont').html(`
						<label for="">Mata Pelajaran</label>
						<select name="lesson_id" id="lesson" class="form-control">
							<option value="">-- Select --</option>
							@foreach ($showexpert->major->lessons as $lesson)
								@if ($lesson->type_lesson->id == $typelesson->id)
									<option value="{{ $lesson->id }}">{{ ucwords($lesson->name)}}</option>
								@endif
							@endforeach
						</select>
					`);

					$('#type-teacher-cont').html(`
						<label for="">Tipe Guru</label>
						<select name="teacher_id" id="type_teacher" class="form-control">
							<option value="">-- Select --</option>
							@php
							if (Auth::user()->role->id == 1) {
								$typeteacher = App\Models\TypeTeacher::where('slug', 'umum')->first();
							}
							elseif(Auth::user()->role->id == 2){
								$typeteacher = App\Models\TypeTeacher::where('slug', 'jurusan')->first();
							}
							@endphp
							<option value="{{ $typeteacher->id }}">{{ ucwords($typeteacher->name)}}</option>
						</select>
					`);

					$('#teacher-cont').html(`
						<label for="">Guru</label>
						<select name="teacher_id" id="teacher" class="form-control">
							<option value="">-- Select --</option>
						</select>
					`);

					$('#type_teacher').on('change', function () {
						if ($('#type_teacher').val() != '') {
						$.ajax({
							url: 'http://jadwal.test/api/type-teacher/'
								+ $('#type_teacher').val()
						}).done(function (data) {
							$('#teacher').html('');
							data.map(function (map) {
								$('#teacher').append('<option value="' + map.id + '">' + map.name + '</option>');
							});
							console.log(data);
							if (data.length == 0) {
								$('#teacher').append('<option value="">Guru Lagi Di Pake</option>');
							}
						});
					} else
					{
						$('#teacher').html('');
					}
					});

					$('#type_lesson').on('change', function () {
						if ($('#type_lesson').val() == 3) {
							// $('#major').attr('disabled', true);
							$('#lesson').attr('disabled', true);
							$('#type_teacher').attr('disabled', true);
							$('#teacher').attr('disabled', true);
							$('#sesi').attr('disabled', true);
							$('#type').attr('disabled', true);
							$('#room').attr('disabled', true);
						} else {
							$('#major').attr('disabled', false);
							$('#lesson').attr('disabled', false);
							$('#type_teacher').attr('disabled', false);
							$('#teacher').attr('disabled', false);
							$('#sesi').attr('disabled', false);
							$('#type').attr('disabled', false);
							$('#room').attr('disabled', false);
						}
					});


				} else {
					hour_cont.html('');
				}
			})

		});
	</script>
@endsection()

