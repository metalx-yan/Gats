<div class="card-body">
<div class="form-group">
	{{-- @include('partials._alert') --}}
	<div class="row">
		<div class="col-lg-12">
			<label for="">Kode</label>
			<input type="text" name="code" value="{{ $lesson->code }}" class="form-control {{ $errors->has('code') ? 'is-invalid' : ''}}" autocomplete="off">
			{!! $errors->first('code', '<span class="invalid-feedback">:message</span>') !!}
		</div>
	</div>
</div>

<div class="form-group">
	<div class="row">
		<div class="col-lg-12">
			<label for="">Nama</label>
			<input type="text" name="name" value="{{ $lesson->name }}" class="form-control {{ $errors->has('name') ? 'is-invalid' : ''}}" autocomplete="off">
			{!! $errors->first('name', '<span class="invalid-feedback">:message</span>') !!}
		</div>
	</div>
</div>

<div class="form-group">
	<div class="row">
		<div class="col-lg-12">
			<label for="">Total Jam</label>
			<input type="text" name="total_hours" value="{{ $lesson->total_hours }}" class="form-control {{ $errors->has('total_hours') ? 'is-invalid' : ''}}" autocomplete="off">
			{!! $errors->first('total_hours', '<span class="invalid-feedback">:message</span>') !!}
		</div>
	</div>
</div>

<div class="form-group">
	<div class="row">
		<div class="col-lg-12">
			<label for="">Semester</label>
			<select class="form-control" name="semester">
				@foreach (["Ganjil" => "Ganjil", "Genap" => "Genap"] as $key)
				  <option value="{{ $key }}"> {{ $key }}</option>
				@endforeach
			</select>
		</div>
	</div>
</div>

<div class="form-group">
	<div class="row">
		<div class="col-lg-12">
			<label for="">Tipe Mata Pelajaran</label>
			<input type="text" value="{{ $lesson->type_lesson->type}}" disabled class="form-control">
			<input type="hidden" name="type_lesson_id" value="{{ $lesson->type_lesson->id}}" class="form-control">
			{!! $errors->first('type_lesson_id', '<span class="invalid-feedback">:message</span>') !!}
		</div>
	</div>
</div>

<div class="form-group">
	<div class="row">
		<div class="col-lg-12">
			<label for="">Tahun Ajaran Awal</label>
			<input type="text" name="beginning" value="{{ old('beginning') ?? $lesson->beginning }}" class="date-own form-control {{ $errors->has('beginning') ? 'is-invalid' : ''}}" autocomplete="off">
			{!! $errors->first('beginning', '<span class="invalid-feedback">:message</span>') !!}
		</div>
	</div>
</div>

<div class="form-group">
	<div class="row">
		<div class="col-lg-12">
			<label for="">Tahun Ajaran Akhir</label>
			<input type="text" name="end" value="{{ old('end') ?? $lesson->end }}" class="date-own form-control {{ $errors->has('end') ? 'is-invalid' : ''}}" autocomplete="off">
			{!! $errors->first('end', '<span class="invalid-feedback">:message</span>') !!}
		</div>
	</div>
</div>

<button type="submit" class="form-control btn-success fontsopher">{{ $submit_button }}</button><p></p>
