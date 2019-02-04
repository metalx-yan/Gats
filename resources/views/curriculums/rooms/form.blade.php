<div class="card-body">
<div class="form-group">
	<div class="row">
		<div class="col-lg-12">
			<label for="">Kode</label>
			<input type="text" name="code" value="{{ old('code') }}" class="form-control {{ $errors->has('code') ? 'is-invalid' : ''}}" autocomplete="off">
			{!! $errors->first('code', '<span class="invalid-feedback">:message</span>') !!}
		</div>
	</div>
</div>

<div class="form-group">
	<div class="row">
		<div class="col-lg-12">
			<label for="">Nama</label>
			<input type="text" name="name" value="{{ old('name')  }}" class="form-control {{ $errors->has('name') ? 'is-invalid' : ''}}" autocomplete="off">
			{!! $errors->first('name', '<span class="invalid-feedback">:message</span>') !!}
		</div>
	</div>
</div>

@if ($typeroom->id == 1)
	{{-- expr --}}
<div class="form-group">
	<div class="row">
		<div class="col-lg-12">
			<label for="">Jurusan</label>
			<select name="major_id" id="" class="form-control">
				@foreach (App\Models\Major::all() as $value)
						<option value="{{ $value->id }}">{{ ucwords($value->level->class) }} {{ ucwords($value->name) }}</option>
				@endforeach
			</select>
			{!! $errors->first('major_id', '<span class="invalid-feedback">:message</span>') !!}
		</div>
	</div>
</div>
@endif

<div class="form-group">
	<div class="row">
		<div class="col-lg-12">
			<label for="">Tipe Ruang</label>
			<input type="text" value="{{ ucwords($typeroom->name) }}" disabled class="form-control">
			<input type="hidden" name="type_room_id" value="{{ $typeroom->id}}" class="form-control">
			{!! $errors->first('major_id', '<span class="invalid-feedback">:message</span>') !!}
		</div>
	</div>
</div>

<button type="submit" class="form-control btn-success fontsopher">{{ $submit_button }}</button><p></p>
