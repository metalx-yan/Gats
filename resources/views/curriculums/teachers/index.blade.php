@extends('main')

@section('title', 'Guru')

@section('content')

<h1 class="section-header">
  <div>Guru</div>
</h1>

<div class="row">
	<div class="col-lg-8">
		<div class="card">
			<div class="card-body">
				<table class="table">
				  <thead class="theadcolor fontsopher">
				    <tr>
				      <th>No</th>
				      <th>Kode Guru</th>
				      <th>Nama</th>
				      <th>Keterangan</th>
				      <th>Aksi</th>
				    </tr>
				  </thead>
				  <tbody class="fontsopher">
				    <tr>
				      <th scope="row">1</th>
				      <td>Mark</td>
				      <td>Otto</td>
				      <td>@mdo</td>
				      <td>
				      	<div class="row">
				      			<div class="col-sm-2">
                    				<a href="" class="btn btn-primary btn-sm">View</a>
                  				</div>
                  
                  				<div class="col-sm-2 offset-sm-1">
                    				<a href="" class="btn btn-warning btn-sm">Edit</a>
                  				</div>
                  
                  				<div class="col-sm-2 offset-sm-1">
                    				<form class="" action="" method="post">
	                      				{{ csrf_field() }}
	                      				{{ method_field('DELETE') }}
	                      				<input type="submit" name="delete" value="Delete" class="btn btn-danger btn-sm">
                      				</form>
                      			</div>
				      	</div>
				      </td>
				    </tr>
				    
				    <tr>
				      <th scope="row">2</th>
				      <td>Mark</td>
				      <td>Otto</td>
				      <td>@mdo</td>
				      <td>
				      	<div class="row">
				      			<div class="col-sm-2">
                    				<a href="" class="btn btn-primary btn-sm">View</a>
                  				</div>
                  
                  				<div class="col-sm-2 offset-sm-1">
                    				<a href="" class="btn btn-warning btn-sm">Edit</a>
                  				</div>
                  
                  				<div class="col-sm-2 offset-sm-1">
                    				<form class="" action="" method="post">
	                      				{{ csrf_field() }}
	                      				{{ method_field('DELETE') }}
	                      				<input type="submit" name="delete" value="Delete" class="btn btn-danger btn-sm">
                      				</form>
                      			</div>
				      	</div>
				      </td>
				    </tr>
				  </tbody>
				</table>
			</div>
		</div>
	</div>

	<div class="col-lg-4">
		<div class="card">
			<div class="card-header headercolorincurrent fontsopher">
				Tambah Guru
			</div>
			
				<form action="">
				{{ csrf_field() }}				
					<div class="card-body">
						<div class="row">
							<div class="col-lg-12">
								<label for="">Kode Guru</label>
								<input type="text" name="" value="" class="form-control">
							</div>
						</div>
			<br>
						<div class="row">
							<div class="col-lg-12">
								<label for="">Nama</label>
								<input type="text" name="" value="" class="form-control">
							</div>
						</div>
			<br>
						<div class="row">
							<div class="col-lg-12">
								<label for="">Keterangan</label>
								<textarea name="" class="form-control"></textarea>
							</div>
						</div>
			<br>
						<button type="" class="form-control btn-success fontsopher">Buat</button>
				</form>		

			</div>
		</div>
	</div>
</div>
@endsection




