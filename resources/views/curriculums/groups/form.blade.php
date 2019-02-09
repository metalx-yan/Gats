<div class="card-body">

<div class="form-group">
	<div class="row">
		<div class="col-md-12">
			<label for="">Kelas Jurusan</label>
			<select class="form-control {{ $errors->has('generates') ? 'is-invalid' : ''}}" name="generates[]" id="select2" multiple="multiple">
				@php
					$b = [];
				@endphp
				@foreach ($a as $gen)
					@if (!in_array($gen->major->id, $b))
						<option value="{{ $gen->id }}">{{ $gen->major->name }}</option>
					@endif
				@php
					array_push($b, $gen->major->id);
				@endphp
				@endforeach
				
			</select>	
			{!! $errors->first('beginning', '<span class="invalid-feedback">:message</span>') !!}
		</div>
	</div>
</div>

<button type="submit" class="form-control btn-success fontsopher">{{ $submit_button }}</button><p></p>
</div>