@extends('/admin/main')

@section('container')

	<h1 class="h3 mb-2 text-gray-800">Outlet Tambah</h1>
	<p class="mb-4">Menambah Sebuah Data Outlet</p>		

	<div class="mb-4">
		<div class="card border-bottom-primary shadow h-100 py-2">
        	<div class="card-body">
	    	<form method="post" action="/admin/outlet" class="mb-5">
			@csrf
		    	<div class="row">
			       	<div class="input-box col-md-6 pb-lg-0">
			           	<div class="form-floating mb-3">
						  	<input type="text" name="name" id="name" required="" class="form-control @error('name') is-invalid @enderror border-left-primary" value="{{ old('name') }}" placeholder="name">
						  	<label for="name">Name</label>
						  	@error('name')
								<div class="invalid-feedback">
						  			{{ $message }}
								</div>
							@enderror
						</div>
			       	</div>
			      	<div class="input-box col-md-6">
			           	<div class="form-floating mb-3">
						  	<input type="text" name="alamat" id="alamat" required="" class="form-control @error('alamat') is-invalid @enderror border-left-primary" value="{{ old('alamat') }}" placeholder="alamat">
						  	<label for="alamat">Alamat</label>
						  	@error('alamat')
								<div class="invalid-feedback">
						  			{{ $message }}
								</div>
							@enderror
						</div>
			      	</div>
			    </div>			    

			    <div class="button-detail">
		        	<a href="/admin/outlet"><button type="button" class="btn btn-danger">View</button></a>
		        	<button type="submit" name="submit" class="btn btn-success" id="submit">Tambah</button>
		      	</div>

			</form>
        	</div>
		</div>
	</div>
	

@endsection