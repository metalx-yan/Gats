@extends('main')

@section('title', 'Keahlian Jurusan')

@section('links')
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">  
@endsection

@section('content')

<h1 class="section-header">
  <div>Atur Jadwal Kelas {{ $mixmajor->major->level->class }} {{ $mixmajor->name }} {{ $mixmajor->part }}</div>
</h1>


<div class="row">
	<div class="col-md-12">
		<div class="card">
			<h5 class="card-header head" align="center">Generate</h5>
			<div class="card-body">
				<form action="" method="">
					<label for="">Hari</label>
					<select name="day" id="day">
						<option value="">-- select --</option>
						@foreach (App\Models\Generate::days() as $day)
							<option value="{{ $day }}">{{ ucwords($day) }}</option>
						@endforeach
					</select>

					<div id="hour-cont"></div>
					<div id="sesi-cont"></div>
					<div id="type-cont"></div>
					<div id="room-cont"></div>

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
							<select name="" id="hour">
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
						<select name="day" id="sesi">
							<option value="1">1</option>
							<option value="2">2</option>
						</select>
						`);

					type_cont.html(`
							<label for="">Tipe Ruang</label>
							<select name="room" id="type">
								<option value="">-- select --</option>
								@if (Auth::user()->role->name == 'curriculum')
									<option value="teori">Teori</option>
								@endif
							</select>
						`);

					room_cont.html(`
						<label for="">Ruang</label>
						<select name="room" id="room">
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

