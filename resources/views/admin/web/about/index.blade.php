@extends('/admin/main')

@section('container')

	<h1 class="h3 mb-2 text-gray-800">About Edit</h1>
	<p class="mb-4">Mengubah Sebuah Data About</p>		

	<div class="mb-4">
		<div class="card border-bottom-primary shadow h-100 py-2">
        	<div class="card-body">
        	<form method="post" action="/admin/about/{{ $about->id }}" class="mb-5" id="actform">
			@method('put')
			@csrf
				<h6 class="m-0 font-weight-bold text-primary pb-3 px-2">Main Section</h6>
		    	<div class="row">
			       	<div class="input-box col-md-12 pb-lg-0">
			           	<div class="form-floating mb-3">
						  	<input type="text" name="m_title" id="m_title" required="" class="form-control @error('m_title') is-invalid @enderror border-left-primary" value="{{ old('m_title', $about->m_title) }}" placeholder="m_title">
						  	<label for="m_title">Judul Main Section</label>
						  	@error('m_title')
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
			           		<textarea class="form-control border-left-primary" placeholder="Leave a comment here" id="m_desc" name="m_desc" style="height: 100px;">{{ old('m_desc', $about->m_desc) }}</textarea>
  							<label for="floatingTextarea">Deskripsi Main Section</label>
						</div>
			       	</div>
			    </div>


			    <h6 class="m-0 font-weight-bold text-primary pb-3 px-2 pt-4">Section 1</h6>
			    <div class="row">
			       	<div class="input-box col-md-6 pb-lg-0">
			           	<div class="form-floating mb-3">
						  	<input type="text" name="icon_1" id="icon_1" required="" class="form-control @error('icon_1') is-invalid @enderror border-left-primary" value="{{ old('icon_1', $about->icon_1) }}" placeholder="icon_1">
						  	<label for="icon_1">Section 1 Icon</label>
						  	@error('icon_1')
								<div class="invalid-feedback">
						  			{{ $message }}
								</div>
							@enderror
						</div>
			       	</div>
			       	<div class="input-box col-md-6 pb-lg-0">
			           	<div class="form-floating mb-3">
						  	<input type="text" name="title_1" id="title_1" required="" class="form-control @error('title_1') is-invalid @enderror border-left-primary" value="{{ old('title_1', $about->title_1) }}" placeholder="title_1">
						  	<label for="title_1">Section 1 Judul</label>
						  	@error('title_1')
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
						  	<input type="text" name="desc_1" id="desc_1" required="" class="form-control @error('desc_1') is-invalid @enderror border-left-primary" value="{{ old('desc_1', $about->desc_1) }}" placeholder="desc_1">
						  	<label for="desc_1">Section 1 Deskripsi</label>
						  	@error('desc_1')
								<div class="invalid-feedback">
						  			{{ $message }}
								</div>
							@enderror
						</div>
			       	</div>
			    </div>

			    <h6 class="m-0 font-weight-bold text-primary pb-3 px-2 pt-4">Section 2</h6>
			    <div class="row">
			       	<div class="input-box col-md-6 pb-lg-0">
			           	<div class="form-floating mb-3">
						  	<input type="text" name="icon_2" id="icon_2" required="" class="form-control @error('icon_2') is-invalid @enderror border-left-primary" value="{{ old('icon_2', $about->icon_2) }}" placeholder="icon_2">
						  	<label for="icon_2">Section 2 Icon</label>
						  	@error('icon_2')
								<div class="invalid-feedback">
						  			{{ $message }}
								</div>
							@enderror
						</div>
			       	</div>
			       	<div class="input-box col-md-6 pb-lg-0">
			           	<div class="form-floating mb-3">
						  	<input type="text" name="title_2" id="title_2" required="" class="form-control @error('title_2') is-invalid @enderror border-left-primary" value="{{ old('title_2', $about->title_2) }}" placeholder="title_2">
						  	<label for="title_2">Section 2 Judul</label>
						  	@error('title_2')
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
						  	<input type="text" name="desc_2" id="desc_2" required="" class="form-control @error('desc_2') is-invalid @enderror border-left-primary" value="{{ old('desc_2', $about->desc_2) }}" placeholder="desc_2">
						  	<label for="desc_2">Section 2 Deskripsi</label>
						  	@error('desc_2')
								<div class="invalid-feedback">
						  			{{ $message }}
								</div>
							@enderror
						</div>
			       	</div>
			    </div>

			    <h6 class="m-0 font-weight-bold text-primary pb-3 px-2 pt-4">Section 3</h6>
			    <div class="row">
			       	<div class="input-box col-md-6 pb-lg-0">
			           	<div class="form-floating mb-3">
						  	<input type="text" name="icon_3" id="icon_3" required="" class="form-control @error('icon_3') is-invalid @enderror border-left-primary" value="{{ old('icon_3', $about->icon_3) }}" placeholder="icon_3">
						  	<label for="icon_3">Section 3 Icon</label>
						  	@error('icon_3')
								<div class="invalid-feedback">
						  			{{ $message }}
								</div>
							@enderror
						</div>
			       	</div>
			       	<div class="input-box col-md-6 pb-lg-0">
			           	<div class="form-floating mb-3">
						  	<input type="text" name="title_3" id="title_3" required="" class="form-control @error('title_3') is-invalid @enderror border-left-primary" value="{{ old('title_3', $about->title_3) }}" placeholder="title_3">
						  	<label for="title_3">Section 3 Judul</label>
						  	@error('title_3')
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
						  	<input type="text" name="desc_3" id="desc_3" required="" class="form-control @error('desc_3') is-invalid @enderror border-left-primary" value="{{ old('desc_3', $about->desc_3) }}" placeholder="desc_3">
						  	<label for="desc_3">Section 3 Deskripsi</label>
						  	@error('desc_3')
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
					        @if($about->updated_by)
						    	{{ $about->updated_by }}
						    @else
						    	System
						    @endif - {{ $about->updated_at->diffForHumans() }}
					</div>
	        	</div>

    		</div>
		</div>
	</div>

@endsection