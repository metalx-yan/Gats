
<div class="card-body">
	<div class="form-group">
		{{-- @include('partials._alert') --}}
		<div class="row">
			<div class="col-lg-3">
				<label for="">Kode</label>
				<input type="text" name="code" value="{{ old('code') }}" class="form-control {{ $errors->has('code') ? 'is-invalid' : ''}}" autocomplete="off">
				{!! $errors->first('code', '<span class="invalid-feedback">:message</span>') !!}
			</div>

			<div class="col-lg-3">
				<label for="">Nama</label>
				<input type="text" name="name" value="{{ old('name') }}" class="form-control {{ $errors->has('name') ? 'is-invalid' : ''}}" autocomplete="off">
				{!! $errors->first('name', '<span class="invalid-feedback">:message</span>') !!}
			</div>

			<div class="col-lg-3">
				<label for="">Akun Jurusan</label>
				<select class="form-control {{ $errors->has('users') ? 'is-invalid' : ''}}" name="users[]" id="select2" multiple="multiple">
					@if ($typelesson->id == 1)
						@foreach ($users as $key)
							@if ($key->role_id == 2)
						  		<option value="{{ $key->id }}"> {{ $key->name }}</option>
							@endif
						@endforeach

					@elseif($typelesson->id == 2)
						@foreach ($users as $key)
							@if ($key->role_id == 1)
						  		<option value="{{ $key->id }}"> {{ $key->name }}</option>
							@endif
						@endforeach
					@endif
				</select>
				{!! $errors->first('users', '<span class="invalid-feedback">:message</span>') !!}
			</div>
			
			<div class="col-lg-3">
				<label for="">Kelas Jurusan</label>
				<select class="form-control {{ $errors->has('majors') ? 'is-invalid' : ''}}" id="select3" name="majors[]" multiple="multiple">
					@foreach ($majors as $key)
				  		<option value="{{ $key->id }}">{{ $key->level->class }} {{ ucwords($key->name) }}</option>
					@endforeach
				</select>
				{!! $errors->first('majors', '<span class="invalid-feedback">:message</span>') !!}
			</div>
		</div>
	</div>


	<div class="form-group">
		<div class="row">

			<div class="col-lg-3">
				<label for="">Guru</label>
				<select class="form-control {{ $errors->has('teachers') ? 'is-invalid' : ''}}" id="select4" name="teachers[]" multiple="multiple">
					@if ($typelesson->id == 1)
						@foreach ($teachers as $key)
							@if ($key->type_teacher_id == 1 && $key->status == "aktif")
						  		<option value="{{ $key->id }}"> {{ $key->name }}</option>
							@endif
						@endforeach

					@elseif($typelesson->id == 2)
						@foreach ($teachers as $key)
							@if ($key->type_teacher_id == 2 && $key->status == "aktif")
						  		<option value="{{ $key->id }}"> {{ $key->name }}</option>
							@endif
						@endforeach
					@endif
				</select>
				{!! $errors->first('teachers', '<span class="invalid-feedback">:message</span>') !!}
			</div>

			<div class="col-lg-3">
				<label for="">Semester</label>
				<select class="form-control {{ $errors->has('semester') ? 'is-invalid' : ''}}" name="semester">
					@foreach (App\Models\Lesson::semester() as $key)
					  <option value="{{ $key }}"> {{ ucwords($key) }}</option>
					@endforeach
				</select>
				{!! $errors->first('semester', '<span class="invalid-feedback">:message</span>') !!}
			</div>
			
		</div>
	</div>

<div class="form-group">
	<div class="row">
		<div class="col-lg-12">
			<label for="">Tipe Mata Pelajaran</label>
			<input type="text" value="{{ ucwords($typelesson->name) }}" disabled class="form-control">
			<input type="hidden" name="type_lesson_id" value="{{ $typelesson->id}}" class="form-control">
			{!! $errors->first('type_lesson_id', '<span class="invalid-feedback">:message</span>') !!}
		</div>
	</div>
</div>

<button type="submit" class="form-control btn-success fontsopher">{{ $submit_button }}</button><p></p>
