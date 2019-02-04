@extends('main')

@section('title', 'Tahun Ajaran')

@section('links')
	<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">
	
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">  

	<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />

@endsection

@section('content')
<h1 class="section-header">
  <div>Tahun Ajaran </div>
</h1>

@php
	$no = 1;
@endphp

<div class="row">
	<div class="col-lg-8">
		<div class="card">
			<div class="card-body">
				<table class="table">
				  <thead class="theadcolor-room fontsopher">
					<tr>
						<th>No</th>
						<th>Tahun Ajaran</th>
						<th>Data Generate</th>
					</tr>
				  </thead>

				  <tbody class="fontsopher">
					  	<tr>
					  		<th>{{ $no }}</th>
					  		@php
					  			$no++;
					  		@endphp
					  		<td>{{ $edit->beginning }}/{{ $edit->end }}</td>
					  		<td>@foreach ($edit->generates as $generate)
					  				@foreach ($expertise as $exp)
									{{ $generate->major->level->class }} {{ ucwords($generate->major->name) }} {{ $exp->part }},
					  				@endforeach
						  		@endforeach
					  		</td>
					  	</tr>
				  </tbody>
				</table>
			</div>
		</div>
	</div>
	
	<div class="col-md-4">
		<div class="card">
			<div class="card-header headercolorincurrent fontsopher">Edit Tahun Ajaran</div>
				<form action="{{ route('approval.update', $edit->id) }}" method="POST">
					@csrf
					@method('PUT')
					@include('curriculums.approvals.formedit', [
							'submit_button' => 'Update'
						])
				</form>
			</div>
		</div>
	</div>
</div>

@endsection

@section('scripts')
	<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

	<script>
		$(document).ready(function() {
			$('#select2').select2();
			$('#select2').select2().val({!! json_encode($edit->generates()->allRelatedIds()) !!}).trigger('change');	
		});
	</script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>

	<script type="text/javascript">
      $('.date-own').datepicker({
         minViewMode: 2,
         format: 'yyyy'
       });
  	</script>
  	
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
	
  	@if(Session::has('sweetalert'))
	  <script>
	      swal('Success!!', '{{ Session::get('sweetalert') }}', 'success');
	  </script>
	@endif
@endsection