@extends('main')

@section('title', 'Keahlian Jurusan')

@section('links')
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">  
@endsection

@section('content')

<h1 class="section-header">
  <div>Atur Jadwal Kelas {{ $showmajor->major->level->class }} {{ $showmajor->name }} {{ $showmajor->part }}</div>
</h1>


<div class="row">
	<div class="col-md-12">
		<div class="card">
			<h5 class="card-header head" align="center">Generate</h5>
			<div class="card-body">
				<form action="" method="">
						<div class="row">
							<div class="col-lg-3">
								<div class="form-group">
									<label for="">Hari</label>
									<select name="day" id="day" class="form-control">
										<option value="">-- Select --</option>
										@foreach (App\Models\Generate::days() as $day)
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
									<label for="">Tipe Mata Pelajaran</label>
									<select name="lesson_id" id="" class="form-control">
										<option value="">-- Select --</option>
										@foreach (App\Models\TypeLesson::all() as $typelesson)
											@if ($typelesson->name == 'jurusan')
												<option value="{{ $typelesson->id }}">{{ ucwords($typelesson->name)}}</option>
											@endif
										@endforeach
									</select>
								</div>
							</div>

							<div class="col-lg-3">
								<div class="form-group">
									<label for="">Pilih Jurusan</label>
									<select name="lesson_id" id="" class="form-control">
										<option value="">-- Select --</option>
										@foreach ($typelesson->lessons as $lesson)
											@foreach ($lesson->majors as $major)
													@if ( $major->id )
														<option value="{{ $major->id }}">{{ $major->level->class}} {{ ucwords($major->name) }} </option>
													@endif
											@endforeach
										@endforeach
									</select>
								</div>
							</div>

							<div class="col-lg-3">
								<div class="form-group">
									<label for="">Mata Pelajaran</label>
									<select name="lesson_id" id="" class="form-control">
										<option value="">-- Select --</option>
										@foreach ($major->lessons as $lesson)
											@if ($lesson->type_lesson->name == 'jurusan')
												<option value="{{ $lesson->id }}">{{ ucwords($lesson->name)}}</option>
											@endif
										@endforeach
									</select>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-lg-3">
								<div class="form-group">
									<label for="">Tipe Guru</label>
									<select name="lesson_id" id="" class="form-control">
										<option value="">-- Select --</option>
										@foreach (App\Models\TypeTeacher::all() as $typeteacher)
											@if ($typeteacher->name == 'jurusan')
												<option value="{{ $typeteacher->id }}">{{ ucwords($typeteacher->name)}}</option>
											@endif
										@endforeach
									</select>
								</div>
							</div>

							<div class="col-lg-3">
								<div class="form-group">
									<label for="">Guru</label>
									<select name="lesson_id" id="" class="form-control">
										<option value="">-- Select --</option>
										@foreach ($typeteacher->teachers as $teacher)
											@if ($teacher->type_teacher->name == 'jurusan')
												<option value="{{ $teacher->id }}">{{ ucwords($teacher->name)}}</option>
											@endif
										@endforeach
									</select>
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
							<th>A</th>
							<th>B</th>
							<th>C</th>
							<th>D</th>
							<th>E</th>
						</tr>
					</thead>
					<tbody class="fontsopher">
						<tr>
							<td>1</td>
							<td>2</td>
							<td>3</td>
							<td>4</td>
							<td>5</td>
							<td>6</td>
						</tr>
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
							<select name="" id="hour" class="form-control">
							</select>
						`);
					$.ajax({
						url: 'http://jadwal.test/api/hours/' + day.val()
					}).done(function (data) {
						$('#hour').html('');
						data.map(function (map) {
							$('#hour').append('<option value="' + map + '">' + map.substr(0, 5) + '</option>');
						});
					});
					sesi_cont.html(`
						<label for="">Sesi</label>
						<select name="day" id="sesi" class="form-control">
							<option value="1">1</option>
							<option value="2">2</option>
						</select>
						`);

					type_cont.html(`
							<label for="">Tipe Ruang</label>
							<select name="room" id="type" class="form-control">
								<option value="">-- Select --</option>
								@if (Auth::user()->role->name == 'curriculum')
									<option value="teori">Teori</option>
								@endif
							</select>
						`);

					room_cont.html(`
						<label for="">Ruang</label>
						<select name="room" id="room" class="form-control">
							<option value="">-- select --</option>
						</select>
						`);

					$('#type').on('change', function () {
						$.ajax({
							url: 'http://jadwal.test/api/rooms/'
								+ $('#type').val()
								+ '/' + day.val()
								+ '/' + $('#hour').val()
								+ '/' + $('#sesi').val()
						}).done(function (data) {
							$('#room').html('');
							data.map(function (map) {
								$('#room').append('<option value="' + map.code + '">' + map.code + '</option>');
							});
						});
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

				} else {
					hour_cont.html('');
				}
			})

		});
	</script>
@endsection()

