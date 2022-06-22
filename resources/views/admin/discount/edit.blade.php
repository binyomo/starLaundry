@extends('/admin/main')

@section('container')

	<h1 class="h3 mb-2 text-gray-800">Discount Edit</h1>
	<p class="mb-4">Mengubah Sebuah Data Discount</p>		

	<div class="mb-4">
		<div class="card border-bottom-primary shadow h-100 py-2">
        	<div class="card-body">
        	<form method="post" action="/admin/discount/{{ $discount->slug }}" class="mb-5" id="actform">
			@method('put')
			@csrf
		    	<div class="row">
			       	<div class="input-box col-md-12 pb-lg-0">
			           	<div class="form-floating mb-3">
						  	<input type="name" name="name" id="name" required="" class="form-control @error('name') is-invalid @enderror border-left-primary" value="{{ old('name', $discount->name) }}" placeholder="name">
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
						  	<input type="number" name="discount" id="discount" required="" class="form-control @error('discount') is-invalid @enderror border-left-primary" value="{{ old('discount', $discount->discount) }}" placeholder="discount">
						  	<label for="discount">Discount</label>
						  	@error('discount')
								<div class="invalid-feedback">
						  			{{ $message }}
								</div>
							@enderror
						</div>
			       	</div>
			       	<div class="input-box col-md-6 pb-lg-0">
			           	<div class="form-floating mb-3">
						  	<select class="form-select border-left-primary" name="type" id="type">
							    @if(old('type', $discount->type) == 1)
					    			<option value="1" selected>Persen (%)</option>
					    			<option value="0">Rupiah</option>
					    		@else
					    			<option value="0" selected>Rupiah</option>
					    			<option value="1">Persen (%)</option>
					    		@endif
							</select>
						  	<label for="type">Type User</label>
						</div>
			       	</div>
			    </div>

			    <div class="button-detail">
		        	<a href="/admin/discount"><button type="button" class="btn btn-primary">Kembali</button></a>
		        	<button type="button" class="btn btn-success act-btn">Simpan</button>
		      	</div>

			</form>
        	</div>
		</div>
	</div>
	

@endsection