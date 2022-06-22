@extends('/admin/main')

@section('container')

	<h1 class="h3 mb-2 text-gray-800">Barang Tambah</h1>
	<p class="mb-4">Menambah Sebuah Data Barang</p>		

	<div class="mb-4">
		<div class="card border-bottom-primary shadow h-100 py-2">
        	<div class="card-body">
	    	<form method="post" action="/admin/barang" class="mb-5">
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
						  	<input type="number" name="harga" id="harga" required="" class="form-control @error('harga') is-invalid @enderror border-left-primary" value="{{ old('harga') }}" placeholder="harga">
						  	<label for="harga">Harga</label>
						  	@error('harga')
								<div class="invalid-feedback">
						  			{{ $message }}
								</div>
							@enderror
						</div>
			      	</div>
			    </div>

			    <div class="row">
			       	<div class="input-box col-md-6 pb-lg-0">
			           	<div class="form-floating mb-3">
						  	<input type="number" name="jumlah" id="jumlah" required="" class="form-control @error('jumlah') is-invalid @enderror border-left-primary" value="{{ old('jumlah') }}" placeholder="jumlah">
						  	<label for="jumlah">Jumlah</label>
						  	@error('jumlah')
								<div class="invalid-feedback">
						  			{{ $message }}
								</div>
							@enderror
						</div>
			       	</div>
			      	<div class="input-box col-md-6">
			      		<div class="form-floating">
			      			<select class="form-select border-left-primary" name="type" id="type">
							    @if(old('type') == 1)
					    			<option value="1" selected>Pcs</option>
					    			<option value="0">Kg</option>
					    		@else
					    			<option value="0" selected>Kg</option>
					    			<option value="1">Pcs</option>
					    		@endif
							</select>
						  <label for="type">Type</label>
						</div>
			      	</div>
			    </div>

			    <div class="button-detail">
		        	<a href="/admin/barang"><button type="button" class="btn btn-danger">View</button></a>
		        	<button type="submit" name="submit" class="btn btn-success" id="submit">Tambah</button>
		      	</div>

			</form>
        	</div>
		</div>
	</div>
	

@endsection