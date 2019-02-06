<div class="card-body">
<div class="form-group">
	<div class="row">
		<div class="col-lg-12">
			<label for="">Nama</label>
			<input type="text" name="name" value="{{ old('name') }}" class="form-control {{ $errors->has('name') ? 'is-invalid' : ''}}" autocomplete="off">
			{!! $errors->first('name', '<span class="invalid-feedback">:message</span>') !!}
		</div>
	</div>
</div>

<div class="form-group">
	<div class="row">
		<div class="col-lg-12">
			<label for="">Username</label>
			<input type="text" name="username" value="{{ old('username')  }}" class="form-control {{ $errors->has('username') ? 'is-invalid' : ''}}" autocomplete="off">
			{!! $errors->first('username', '<span class="invalid-feedback">:message</span>') !!}
		</div>
	</div>
</div>

<div class="form-group">
	<div class="row">
		<div class="col-lg-12">
			<label for="">Password</label>
			<input type="password" name="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : ''}}" autocomplete="off">
			{!! $errors->first('password', '<span class="invalid-feedback">:message</span>') !!}
		</div>
	</div>
</div>

<div class="form-group row">
	<div class="col-md-12">
	    <label for="password-confirm" class="">Konfirmasi Password</label>
        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
	</div>
</div>

<div class="form-group">
	<div class="row">
		<div class="col-lg-12">
			<label for="">Hak Akses</label>
			<select name="role_id" id="" class="form-control">
				@foreach (App\Models\Role::all() as $role)
					<option value="{{ $role->id }}">{{ ucwords($role->name) }}</option>
				@endforeach
			</select>
			{!! $errors->first('role_id', '<span class="invalid-feedback">:message</span>') !!}
		</div>
	</div>
</div>

<button type="submit" class="form-control btn-success fontsopher">{{ $submit_button }}</button><p></p>
