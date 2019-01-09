<div class="card-body">
<div class="form-group">
	{{-- @include('partials._alert') --}}
	<div class="row">
		<div class="col-lg-12">
			<label for="">NIP</label>
			<input type="text" name="nip" value="{{ $teacher->nip }}" class="form-control {{ $errors->has('nip') ? 'is-invalid' : ''}}" autocomplete="off">
			{!! $errors->first('nip', '<span class="invalid-feedback">:message</span>') !!}
		</div>
	</div>
</div>

<div class="form-group">
	<div class="row">
		<div class="col-lg-12">
			<label for="">Kode</label>
			<input type="text" name="code" value="{{ $teacher->code }}" class="form-control {{ $errors->has('code') ? 'is-invalid' : ''}}" autocomplete="off">
			{!! $errors->first('code', '<span class="invalid-feedback">:message</span>') !!}
		</div>
	</div>
</div>

<div class="form-group">
	<div class="row">
		<div class="col-lg-12">
			<label for="">Nama</label>
			<input type="text" name="name" value="{{ $teacher->name }}" class="form-control {{ $errors->has('name') ? 'is-invalid' : ''}}" autocomplete="off">
			{!! $errors->first('name', '<span class="invalid-feedback">:message</span>') !!}
		</div>
	</div>
</div>

<div class="form-group">
	<div class="row">
		<div class="col-lg-12">
			<label for="">Status</label>
			<select class="form-control {{ $errors->has('status') ? 'is-invalid' : ''}}" name="status">
				@foreach (["Aktif" => "status", "Non Aktif" => "status"] as $key => $value)
				  <option value="{{ $key }}" {{ old("status", $teacher->status) == $key ? "selected" : "" }}> {{ $key }}</option>
				@endforeach
			</select>
			{!! $errors->first('status', '<span class="invalid-feedback">:message</span>') !!}
		</div>
	</div>
</div>

<div class="form-group">
	<div class="row">
		<div class="col-lg-12">
			<label for="">Tipe Mengajar</label>
			<input type="text" value="{{ ucwords($teacher->type_teacher->name) }}" disabled class="form-control">
			<input type="hidden" name="type_teacher_id" value="{{ $teacher->type_teacher->id }}" class="form-control">
			{!! $errors->first('type_teacher_id', '<span class="invalid-feedback">:message</span>') !!}
		</div>
	</div>
</div>

<button type="submit" class="form-control btn-success fontsopher">{{ $submit_button }}</button><p></p>
