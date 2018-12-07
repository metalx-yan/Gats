<div class="card-body">
<div class="form-group">
	{{-- @include('partials._alert') --}}
	<div class="row">
		<div class="col-lg-12">
			<label for="">Kode</label>
			<input type="text" name="code" value="{{ old('code') ?? $lesson->code }}" class="form-control {{ $errors->has('code') ? 'is-invalid' : ''}}">
			{!! $errors->first('code', '<span class="invalid-feedback">:message</span>') !!}
		</div>
	</div>
</div>

<div class="form-group">
	<div class="row">
		<div class="col-lg-12">
			<label for="">Nama</label>
			<input type="text" name="name" value="{{ old('name') ?? $lesson->name }}" class="form-control {{ $errors->has('name') ? 'is-invalid' : ''}}">
			{!! $errors->first('name', '<span class="invalid-feedback">:message</span>') !!}
		</div>
	</div>
</div>

<div class="form-group">
	<div class="row">
		<div class="col-lg-12">
			<label for="">Total Jam</label>
			<input type="text" name="total_hours" value="{{ old('total_hours') ?? $lesson->total_hours }}" class="form-control {{ $errors->has('total_hours') ? 'is-invalid' : ''}}">
			{!! $errors->first('total_hours', '<span class="invalid-feedback">:message</span>') !!}
		</div>
	</div>
</div>

<div class="form-group">
	<div class="row">
		<div class="col-lg-12">
			<label for="">Semester</label>
			<input type="text" name="semester" value="{{ old('semester') ?? $lesson->semester }}" class="form-control {{ $errors->has('semester') ? 'is-invalid' : ''}}">
			{!! $errors->first('semester', '<span class="invalid-feedback">:message</span>') !!}
		</div>
	</div>
</div>

<div class="form-group">
	<div class="row">
		<div class="col-lg-12">
			<label for="">Tahun Ajaran Awal</label>
			<input type="text" name="beginning" value="{{ old('beginning') ?? $lesson->beginning }}" class="date-own form-control {{ $errors->has('beginning') ? 'is-invalid' : ''}}">
			{!! $errors->first('beginning', '<span class="invalid-feedback">:message</span>') !!}
		</div>
	</div>
</div>

<div class="form-group">
	<div class="row">
		<div class="col-lg-12">
			<label for="">Tahun Ajaran Akhir</label>
			<input type="text" name="end" value="{{ old('end') ?? $lesson->end }}" class="date-own form-control {{ $errors->has('end') ? 'is-invalid' : ''}}">
			{!! $errors->first('end', '<span class="invalid-feedback">:message</span>') !!}
		</div>
	</div>
</div>

{{-- <div class="form-group">
	<div class="row">
		<div class="col-lg-12">
			<label for="">Status</label>
			<select class="form-control" name="status">
				@foreach (["Aktif" => "Aktif", "Nonaktif" => "NonAktif"] as $key)
				  <option value="{{ $key }}"> {{ $key }}</option>
				@endforeach
			</select>
		</div>
	</div>
</div>
 --}}
<button type="submit" class="form-control btn-success fontsopher">{{ $submit_button }}</button><p></p>
