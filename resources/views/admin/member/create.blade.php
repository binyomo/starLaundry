@extends('/admin/main')

@section('container')

	<h1 class="h3 mb-2 text-gray-800">Member Tambah</h1>
	<p class="mb-4">Menambah Sebuah Data Member</p>		

	<div class="mb-4">
		<div class="card border-bottom-primary shadow h-100 py-2">
        	<div class="card-body">
	    	<form method="post" action="/admin/member" class="mb-5">
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
						  	<input type="text" name="nickname" id="nickname" required="" class="form-control @error('nickname') is-invalid @enderror border-left-primary" value="{{ old('nickname') }}" placeholder="nickname">
						  	<label for="nickname">Nickname</label>
						  	@error('nickname')
								<div class="invalid-feedback">
						  			{{ $message }}
								</div>
							@enderror
						</div>
			      	</div>
			    </div>			    

			    <div class="row">
			       	<div class="input-box col-md-12 pb-lg-0">
			           	<div class="form-floating mb-3">
						  	<input type="number" name="number" id="number" required="" class="form-control @error('number') is-invalid @enderror border-left-primary" value="{{ old('number') }}" placeholder="number">
						  	<label for="number">No Telepon</label>
						  	@error('number')
								<div class="invalid-feedback">
						  			{{ $message }}
								</div>
							@enderror
						</div>
			       	</div>
			    </div>

			    <div class="button-detail">
		        	<a href="/admin/member"><button type="button" class="btn btn-danger">View</button></a>
		        	<button type="submit" name="submit" class="btn btn-success" id="submit">Tambah</button>
		      	</div>

			</form>
        	</div>
		</div>
	</div>
	

@endsection