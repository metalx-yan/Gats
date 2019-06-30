@extends('main')

@section('title', 'Data JOS')

@section('content')

<h1 class="section-header">
  <div>Kumpul Sapi</div>
</h1>

@php
	$no = 1;
@endphp

<div class="row">
	<div class="col-lg-12">
		<div class="card">
			<div class="card-body">
				<table class="table">
				  <thead class="theadcolor-room fontsopher">
					<tr>
						<th>No</th>
						<th>Kode Guru</th>
		                <th>Nama Guru</th>
		                <th>Mata Pelajaran</th>
		                <th>Hari</th>
		                <th>Jam</th>
						<th>Aksi</th>
					</tr>
				  </thead>

				  <tbody class="fontsopher">
					  	<tr>
					  		<th></th>
					  		@php
					  			$no++;
					  		@endphp
					  		<td></td>
					  		<td></td>
					  		<td></td>
					  		<td></td>
					  		<td></td>
	
					  		<td>
					  			
					  		</td>
					  	</tr>
				  </tbody>
				</table>
			</div>
		</div>
	</div>

@endsection