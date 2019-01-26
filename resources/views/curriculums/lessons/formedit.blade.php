<div class="card-body">

	<div class="form-group">
		{{-- @include('partials._alert') --}}
		<div class="row">
			<div class="col-lg-3">
				<label for="">Kode</label>
				<input type="text" name="code" value="{{ $lesson->code }}" class="form-control {{ $errors->has('code') ? 'is-invalid' : ''}}" autocomplete="off">
				{!! $errors->first('code', '<span class="invalid-feedback">:message</span>') !!}
			</div>

			<div class="col-lg-3">
				<label for="">Nama</label>
				<input type="text" name="name" value="{{ $lesson->name }}" class="form-control {{ $errors->has('name') ? 'is-invalid' : ''}}" autocomplete="off">
				{!! $errors->first('name', '<span class="invalid-feedback">:message</span>') !!}
			</div>

			<div class="col-lg-3">
				<label for="">Semester</label>
				<select class="form-control {{ $errors->has('semester') ? 'is-invalid' : ''}}" name="semester">
					@foreach (App\Models\Lesson::semester() as $key)
					  <option value="{{ $key }}" {{ old("semester", $lesson->semester) == $key ? "selected" : "" }}> {{ ucwords($key) }}</option>
					@endforeach
				</select>
				{!! $errors->first('semester', '<span class="invalid-feedback">:message</span>') !!}
			</div>

			<div class="col-lg-3">
				<label for="">Akun Jurusan</label>
				<select class="form-control {{ $errors->has('users') ? 'is-invalid' : ''}}" id="select3" $users name="users[]" multiple="multiple">
					@foreach ($users as $key)
						@if ($key->role_id == 1)
					  		<option value="{{ $key->id }}">{{ ucwords($key->name) }}</option>
						@endif
					@endforeach
				</select>
				{!! $errors->first('users', '<span class="invalid-feedback">:message</span>') !!}
			</div>
		</div>
	</div>

	<div class="form-group">
		<div class="row">

			<div class="col-lg-3">
				<label for="">Guru</label>
				<select class="form-control {{ $errors->has('teachers') ? 'is-invalid' : ''}}" id="select4" $teachers name="teachers[]" multiple="multiple">
					@foreach ($teachers as $key)
						@if ($key->type_teacher_id == 2)
					  		<option value="{{ $key->id }}">{{ ucwords($key->name) }}</option>
						@endif
					@endforeach
				</select>
				{!! $errors->first('teachers', '<span class="invalid-feedback">:message</span>') !!}
			</div>

			<div class="col-lg-3">
				<label for="">Kelas Jurusan</label>
				<select class="form-control {{ $errors->has('majors') ? 'is-invalid' : ''}}" id="select2" $majors name="majors[]" multiple="multiple">
					@foreach ($majors as $key)
				  		<option value="{{ $key->id }}">{{ $key->level->class }} {{ ucwords($key->name) }}</option>
					@endforeach
				</select>
				{!! $errors->first('majors', '<span class="invalid-feedback">:message</span>') !!}
			</div>

			{{-- <div class="col-lg-3">
				<label for="">Tahun Ajaran Awal</label>
				<input type="text" name="beginning" value="{{ old('beginning') ?? $lesson->beginning }}" class="date-own form-control {{ $errors->has('beginning') ? 'is-invalid' : ''}}" autocomplete="off">
				{!! $errors->first('beginning', '<span class="invalid-feedback">:message</span>') !!}
			</div>

			<div class="col-lg-3">
				<label for="">Tahun Ajaran Akhir</label>
				<input type="text" name="end" value="{{ old('end') ?? $lesson->end }}" class="date-own form-control {{ $errors->has('end') ? 'is-invalid' : ''}}" autocomplete="off">
				{!! $errors->first('end', '<span class="invalid-feedback">:message</span>') !!}
			</div> --}}

			
		</div>
	</div>

	<div class="form-group">
		<div class="row">
			<div class="col-lg-12">
				<label for="">Tipe Mata Pelajaran</label>
				<input type="text" value="{{ ucwords($lesson->type_lesson->name) }}" disabled class="form-control">
				<input type="hidden" name="type_lesson_id" value="{{ $lesson->type_lesson->id}}" class="form-control">
				{!! $errors->first('type_lesson_id', '<span class="invalid-feedback">:message</span>') !!}
			</div>
		</div>
	</div>

<button type="submit" class="form-control btn-success fontsopher">{{ $submit_button }}</button><p></p>

