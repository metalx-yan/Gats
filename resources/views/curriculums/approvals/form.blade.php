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
		<div class="col-md-12">
			<label for="">Kelas Jurusan yang sudah di Generate</label>
			<select class="form-control {{ $errors->has('generates') ? 'is-invalid' : ''}}" name="generates[]" id="select2" multiple="multiple">
				@foreach ($gene as $gen)

					<option value="{{ $gen->first()->first()->id }}">{{ $gen->first()->first()->major->level->class }} {{ $gen->first()->first()->major->name }} {{ $gen->first()->first() }} </option>
				@endforeach
				
			</select>	
			{!! $errors->first('beginning', '<span class="invalid-feedback">:message</span>') !!}
		</div>
	</div>
</div>

<button type="submit" class="form-control btn-success fontsopher">{{ $submit_button }}</button><p></p>
</div>