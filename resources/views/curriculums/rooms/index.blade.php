@extends('main')

@section('title', 'Ruang')

@section('links')
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">  
@endsection

@section('content')

<h1 class="section-header">
  <div>Ruang {{ ucwords($typeroom->name) }}</div>
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
				      <th>Kode</th>
				      <th>Nama</th>
				  	{{-- @foreach ($typeroom->rooms as $index) --}}
		      			  @if ($typeroom->id === 1)
					      <th>Jurusan</th>
						  @endif
					 {{-- @endforeach --}}
				      <th>Aksi</th>
				    </tr>
				  </thead>
				  <tbody class="fontsopher">
				  	@foreach ($typeroom->rooms as $indexs)
				    <tr>
				      <th scope="row">{{ $no }}</th>
						@php
							$no++;	
						@endphp
				      <td>{{ $indexs->code }}</td>
				      <td>{{ $indexs->name }}</td>
				      
	      				@if ($indexs->major_id === 1)
					      <td>
				      		{{ $indexs->major->level->class }} {{ ucwords($indexs->major->name) }}
					      </td>
	      				@endif
				      
				     
				      <td>
				      	<div class="row">
              				<div class="col-xs-4">
                				<a href="{{ route('editmix.room', [$indexs->type_room->id, $indexs->id]) }}" class="btn btn-warning btn-sm">
									<i class="ion ion-edit"></i>
                				</a>
              				</div>
              				<div class="col-xs-1 offset-sm-1"></div>
              
              				<div class="col-xs-4">
                				<form class="delete" action="{{ route('room.destroy', $indexs->id) }}" method="POST">
                      				@csrf
                      				@method('DELETE')
									<button class="ion ion-android-delete btn btn-danger btn-sm" name="delete" title="hapus" type="submit"></button>
                  				</form>
                  			</div>
				      	</div>
				      </td>
				    </tr>
				  	@endforeach
				  </tbody>
				</table>
			</div>
		</div>
	</div>

	<div class="col-lg-4">
		<div class="card">
			<div class="card-header headercolorincurrent fontsopher">
				Tambah Ruang
			</div>
				<form action="{{ route('room.store') }}" method="POST">
				@csrf
					@include('curriculums.rooms.form', [
							'room' => new App\Models\Room,
							'submit_button' => 'Save'
						])
				</form>
			</div>
		</div>
	</div>
</div>
@endsection


@section('scripts')
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>

		@if(Session::has('sweetalert'))
		  <script>
		      swal('Success!!', '{{ Session::get('sweetalert') }}', 'success');
		  </script>
		  {{-- <?php Session::forget('sweetalert'); ?> --}}
		@endif
		

		<script>
        $(".delete").on("submit", function(){
		        return confirm("Ingin Menghapus Data Ruang?");
		    });
    </script>
		 
	
@endsection()

