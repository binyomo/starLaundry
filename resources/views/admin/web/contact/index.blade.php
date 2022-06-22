@extends('/admin/main')

@section('container')

	<h1 class="h3 mb-2 text-gray-800">Contact Edit</h1>
	<p class="mb-4">Mengubah Sebuah Data Contact</p>		

	<div class="mb-4">
		<div class="card border-bottom-primary shadow h-100 py-2">
        	<div class="card-body">
        	<form method="post" action="/admin/contact/{{ $contact[0]->id }}" class="mb-5" id="actform">
			@method('put')
			@csrf
			    <div class="row">
			    	<div class="input-box col-md-12 pb-lg-0">
			           	<div class="form-floating mb-3">
			           		<textarea class="form-control border-left-primary" placeholder="Leave a comment here" id="desc" name="desc" style="height: 100px;">{{ old('desc', $contact[0]->desc) }}</textarea>
  							<label for="floatingTextarea">Deskripsi</label>
						</div>
			       	</div>
			    </div>

			    <div class="row">
			       	<div class="input-box col-md-12 pb-lg-0">
			           	<div class="form-floating mb-3">
						  	<input type="text" name="address" id="address" required="" class="form-control @error('address') is-invalid @enderror border-left-primary" value="{{ old('address', $contact[0]->address) }}" placeholder="address">
						  	<label for="address">Alamat</label>
						  	@error('address')
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
						  	<input type="text" name="email" id="email" required="" class="form-control @error('email') is-invalid @enderror border-left-primary" value="{{ old('email', $contact[0]->email) }}" placeholder="email">
						  	<label for="email">Email</label>
						  	@error('email')
								<div class="invalid-feedback">
						  			{{ $message }}
								</div>
							@enderror
						</div>
			       	</div> 
			       	<div class="input-box col-md-6 pb-lg-0">
			           	<div class="form-floating mb-3">
						  	<input type="text" name="call" id="call" required="" class="form-control @error('call') is-invalid @enderror border-left-primary" value="{{ old('call', $contact[0]->call) }}" placeholder="call">
						  	<label for="call">Telepon</label>
						  	@error('call')
								<div class="invalid-feedback">
						  			{{ $message }}
								</div>
							@enderror
						</div>
			       	</div> 
			    </div>

			    <div class="button-detail">
		        	<button type="button" class="btn btn-success act-btn">Simpan</button>
		      	</div>

			</form>
        	</div>
		</div>
	</div>
	
	<div class="mb-4">
		<div class="card border-left-primary shadow h-100 py-2">
        	<div class="card-body">

        		<div class="col-md-12 text-center">
	        		<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
	                   	Activity
	                </div>
	        		<div class="h5 mb-0 font-weight-bold text-gray-800 lh-base">
					    <i class="fas fa-wrench" data-bs-toggle="tooltip" data-bs-html="true" title="Updated"></i>
					        @if($contact[0]->updated_by)
						    	{{ $contact[0]->updated_by }}
						    @else
						    	System
						    @endif - {{ $contact[0]->updated_at->diffForHumans() }}
					</div>
	        	</div>

    		</div>
		</div>
	</div>

@endsection