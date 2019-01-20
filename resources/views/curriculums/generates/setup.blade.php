@extends('main')

@section('title', 'Keahlian Jurusan')

@section('links')
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">  
@endsection

@section('content')

<h1 class="section-header">
  <div>Atur Jadwal Kelas {{ ucwords($showexpert->major->level->class) }} {{ ucwords($showexpert->major->name) }} {{ ucwords($showexpert->part) }} </div>
</h1>

@php
	$no = 1;
@endphp

<div class="row">
	<div class="col-md-12">
		<div class="card">
			<h5 class="card-header head" align="center">----====----</h5>
			<div class="card-body">
				<form action="{{ route('generate.store') }}" method="POST">
					@csrf
						<div class="row">
							<div class="col-lg-3">
								<div class="form-group">
									<label for="">Hari</label>
									<select name="day" id="day" class="form-control">
										<option value="">-- Select --</option>
										@foreach (App\Models\Generate::day() as $day)
											<option value="{{ $day }}">{{ ucwords($day) }}</option>
										@endforeach
									</select>
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
						</tr>
					</thead>
					<tbody class="fontsopher">
						@foreach ($gens as $gen)
						<tr>
							<td>{{ $no }}</td>
							@php
								$no++;	
							@endphp
							<td>{{ ucwords($gen->day) }}</td>
							<td>{{ $gen->start }}</td>
							<td>{{ $gen->end }}</td>
							<td>{{ ucwords($gen->teacher->name) }}</td>
							<td>{{ $gen->room->code }} - {{ $gen->room->name }}</td>
							<td>{{ $gen->lesson->name }}</td>
							<td>{{ $gen->major->level->class }} {{ $gen->major->name }}</td>
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
		  {{-- <?php Session::forget('sweetalert'); ?> --}}
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
						url: 'http://jadwal.test/api/hours/' + day.val()
					}).done(function (data) {
						$('#hour').html('');
						data.map(function (map) {
							if (map.substr(0, 5) == '10:00') {
								$('#hour').append('<option value="' + map + '">' + map.substr(0, 5) + '</option>');
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
								@if (Auth::user()->role->name == 'curriculum')
									<option value="teori">Teori</option>
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
						<select name="lesson_id" id="" class="form-control">
							@php
								$typelesson = App\Models\TypeLesson::where('slug', 'umum')->first();
							@endphp
							<option value="{{ $typelesson->id }}">{{ ucwords($typelesson->name)}}</option>
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
						<select name="lesson_id" id="" class="form-control">
							<option value="">-- Select --</option>
							@foreach ($showexpert->major->lessons as $lesson)
								@if ($lesson->type_lesson->name == 'umum')
									<option value="{{ $lesson->id }}">{{ ucwords($lesson->name)}}</option>
								@endif
							@endforeach
						</select>
					`);

					$('#type-teacher-cont').html(`
						<label for="">Tipe Guru</label>
						<select name="teacher_id" id="type_teacher" class="form-control">
							<option value="">-- Select --</option>
							@foreach (App\Models\TypeTeacher::all() as $typeteacher)
								@if ($typeteacher->name == 'umum')
									<option value="{{ $typeteacher->id }}">{{ ucwords($typeteacher->name)}}</option>
								@endif
							@endforeach
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



				} else {
					hour_cont.html('');
				}
			})

		});
	</script>
@endsection()

