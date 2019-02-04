<div class="card-body">

<div class="form-group">
	<div class="row">
		<div class="col-lg-12">
			<label for="">Tahun Ajaran Awal</label>
			<input type="text" name="beginning" value="{{ old('beginning') }}" class="date-own form-control {{ $errors->has('beginning') ? 'is-invalid' : ''}}" autocomplete="off">
			{!! $errors->first('beginning', '<span class="invalid-feedback">:message</span>') !!}
		</div>
	</div>
</div>
	
<div class="form-group">
	<div class="row">
		<div class="col-lg-12">
			<label for="">Tahun Ajaran Akhir</label>
			<input type="text" name="end" value="{{ old('end')  }}" class="date-own form-control {{ $errors->has('end') ? 'is-invalid' : ''}}" autocomplete="off">
			{!! $errors->first('end', '<span class="invalid-feedback">:message</span>') !!}
		</div>
	</div>
</div>

<div class="form-group">
	<div class="row">
		<div class="col-lg-12">
			<label for="">Generate Sementara</label>
			<select class="form-control {{ $errors->has('generates') ? 'is-invalid' : ''}}" id="select2" name="generates[]" multiple="multiple">
				@foreach ($gene as $gen)
					{{-- @foreach ($expertise as $element) --}}
			  			<option value="{{ $gen->id }}">{{ $gen->major->level->class }} {{ ucwords($gen->major->name) }} </option>
					{{-- @endforeach --}}
				@endforeach
			</select>
			{!! $errors->first('generates', '<span class="invalid-feedback">:message</span>') !!}
		</div>
	</div>
</div>

<button type="submit" class="form-control btn-success fontsopher">{{ $submit_button }}</button><p></p>
</div>