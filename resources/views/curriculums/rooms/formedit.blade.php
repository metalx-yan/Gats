<div class="card-body">
<div class="form-group">
	<div class="row">
		<div class="col-lg-12">
			<label for="">Kode</label>
			<input type="text" name="code" value="{{ $room->code }}" class="form-control {{ $errors->has('code') ? 'is-invalid' : ''}}" autocomplete="off">
			{!! $errors->first('code', '<span class="invalid-feedback">:message</span>') !!}
		</div>
	</div>
</div>
{{-- 
<div class="form-group">
	<div class="row">
		<div class="col-lg-12">
			<label for="">Nama</label>
			<input type="text" name="name" value="{{ $room->name }}" class="form-control {{ $errors->has('name') ? 'is-invalid' : ''}}" autocomplete="off">
			{!! $errors->first('name', '<span class="invalid-feedback">:message</span>') !!}
		</div>
	</div>
</div> --}}

<div class="form-group">
	<div class="row">
		<div class="col-lg-12">
			<label for="">Kapasitas</label>
			<input type="text" name="capacity" value="{{ $room->capacity }}" class="form-control {{ $errors->has('capacity') ? 'is-invalid' : ''}}" autocomplete="off">
			{!! $errors->first('capacity', '<span class="invalid-feedback">:message</span>') !!}
		</div>
	</div>
</div>

<div class="form-group">
	<div class="row">
		<div class="col-lg-12">
			<label for="">Tipe Ruang</label>
			<input type="text" value="{{ ucwords($room->type_room->name) }}" disabled class="form-control">
			<input type="hidden" name="type_room_id" value="{{ $room->type_room->id}}" class="form-control">
			{!! $errors->first('type_room_id', '<span class="invalid-feedback">:message</span>') !!}
		</div>
	</div>
</div>

<button type="submit" class="form-control btn-success fontsopher">{{ $submit_button }}</button><p></p>
