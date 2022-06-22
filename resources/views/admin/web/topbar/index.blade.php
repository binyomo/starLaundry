@extends('/admin/main')

@section('container')

	<h1 class="h3 mb-2 text-gray-800">Topbar Edit</h1>
	<p class="mb-4">Mengubah Sebuah Data Topbar</p>		

	<div class="mb-4">
		<div class="card border-bottom-primary shadow h-100 py-2">
        	<div class="card-body">
        	<form method="post" action="/admin/topbar/{{ $topbar[0]->id }}" class="mb-5" id="actform">
			@method('put')
			@csrf
		    	<div class="row">
			       	<div class="input-box col-md-6 pb-lg-0">
			           	<div class="form-floating mb-3">
						  	<input type="text" name="text_1" id="text_1" required="" class="form-control @error('text_1') is-invalid @enderror border-left-primary" value="{{ old('text_1', $topbar[0]->text_1) }}" placeholder="text_1">
						  	<label for="text_1">Text 1</label>
						  	@error('text_1')
								<div class="invalid-feedback">
						  			{{ $message }}
								</div>
							@enderror
						</div>
			       	</div>
			       	<div class="input-box col-md-6 pb-lg-0">
			           	<div class="form-floating mb-3">
						  	<input type="text" name="icon_1" id="icon_1" required="" class="form-control @error('icon_1') is-invalid @enderror border-left-primary" value="{{ old('icon_1', $topbar[0]->icon_1) }}" placeholder="icon_1">
						  	<label for="icon_1">Icon 1</label>
						  	@error('icon_1')
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
						  	<input type="text" name="text_2" id="text_2" required="" class="form-control @error('text_2') is-invalid @enderror border-left-primary" value="{{ old('text_2', $topbar[0]->text_2) }}" placeholder="text_2">
						  	<label for="text_2">Text 2</label>
						  	@error('text_2')
								<div class="invalid-feedback">
						  			{{ $message }}
								</div>
							@enderror
						</div>
			       	</div>
			       	<div class="input-box col-md-6 pb-lg-0">
			           	<div class="form-floating mb-3">
						  	<input type="text" name="icon_2" id="icon_2" required="" class="form-control @error('icon_2') is-invalid @enderror border-left-primary" value="{{ old('icon_2', $topbar[0]->icon_2) }}" placeholder="icon_2">
						  	<label for="icon_2">Icon 2</label>
						  	@error('icon_2')
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
						  	<input type="text" name="text_3" id="text_3" required="" class="form-control @error('text_3') is-invalid @enderror border-left-primary" value="{{ old('text_3', $topbar[0]->text_3) }}" placeholder="text_3">
						  	<label for="text_3">Text 3</label>
						  	@error('text_3')
								<div class="invalid-feedback">
						  			{{ $message }}
								</div>
							@enderror
						</div>
			       	</div>
			       	<div class="input-box col-md-6 pb-lg-0">
			           	<div class="form-floating mb-3">
						  	<input type="text" name="icon_3" id="icon_3" required="" class="form-control @error('icon_3') is-invalid @enderror border-left-primary" value="{{ old('icon_3', $topbar[0]->icon_3) }}" placeholder="icon_3">
						  	<label for="icon_3">Icon 3</label>
						  	@error('icon_3')
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
					        @if($topbar[0]->updated_by)
						    	{{ $topbar[0]->updated_by }}
						    @else
						    	System
						    @endif - {{ $topbar[0]->updated_at->diffForHumans() }}
					</div>
	        	</div>

    		</div>
		</div>
	</div>

@endsection