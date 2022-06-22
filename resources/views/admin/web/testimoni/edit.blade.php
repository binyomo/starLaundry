@extends('/admin/main')

@section('container')

	<h1 class="h3 mb-2 text-gray-800">Testimoni Edit</h1>
	<p class="mb-4">Mengubah Sebuah Data Testimoni</p>		

	<div class="mb-4">
		<div class="card border-bottom-primary shadow h-100 py-2">
        	<div class="card-body">
        	<form method="post" action="/admin/testimoni/{{ $testimoni->slug }}" class="mb-5" id="actform">
			@method('put')
			@csrf
		    	<div class="row">
			       	<div class="input-box col-md-6 pb-lg-0">
			           	<div class="form-floating mb-3">
						  	<input type="name" name="name" id="name" required="" class="form-control @error('name') is-invalid @enderror border-left-primary" value="{{ old('name', $testimoni->name) }}" placeholder="name">
						  	<label for="name">Name</label>
						  	@error('name')
								<div class="invalid-feedback">
						  			{{ $message }}
								</div>
							@enderror
						</div>
			       	</div>
			       	<div class="input-box col-md-6 pb-lg-0">
			           	<div class="form-floating mb-3">
						  	<input type="text" name="position" id="position" required="" class="form-control @error('position') is-invalid @enderror border-left-primary" value="{{ old('position', $testimoni->position) }}" placeholder="position">
						  	<label for="position">Position</label>
						  	@error('position')
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
			           		<textarea class="form-control border-left-primary" placeholder="Leave a comment here" id="statement" name="statement" style="height: 100px;">{{ old('statement', $testimoni->statement) }}</textarea>
  							<label for="floatingTextarea">Statement</label>
						</div>
			       	</div>
			    </div>

			    <div class="button-detail">
		        	<a href="/admin/testimoni"><button type="button" class="btn btn-primary">Kembali</button></a>
		        	<button type="button" class="btn btn-success act-btn">Simpan</button>
		      	</div>

			</form>
        	</div>
		</div>
	</div>
	

@endsection