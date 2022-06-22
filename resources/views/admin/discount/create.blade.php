@extends('/admin/main')

@section('container')

	<h1 class="h3 mb-2 text-gray-800">Discount Tambah</h1>
	<p class="mb-4">Menambah Sebuah Data Discount</p>		

	<div class="mb-4">
		<div class="card border-bottom-primary shadow h-100 py-2">
        	<div class="card-body">
	    	<form method="post" action="/admin/discount" class="mb-5">
			@csrf
		    	<div class="row">
			       	<div class="input-box col-md-12 pb-lg-0">
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
			    </div>

			    <div class="row">
			       	<div class="input-box col-md-6 pb-lg-0">
			           	<div class="form-floating mb-3">
						  	<input type="number" name="discount" id="discount" required="" class="form-control @error('discount') is-invalid @enderror border-left-primary" value="{{ old('discount') }}" placeholder="discount">
						  	<label for="discount">Discount</label>
						  	@error('discount')
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
					    			<option value="1" selected>Persen (%)</option>
					    			<option value="0">Rupiah</option>
					    		@else
					    			<option value="0" selected>Rupiah</option>
					    			<option value="1">Persen (%)</option>
					    		@endif
							</select>
						  <label for="type">Type</label>
						</div>
			      	</div>
			    </div>

			    <div class="button-detail">
		        	<a href="/admin/discount"><button type="button" class="btn btn-danger">View</button></a>
		        	<button type="submit" name="submit" class="btn btn-success" id="submit">Tambah</button>
		      	</div>

			</form>
        	</div>
		</div>
	</div>
	

@endsection