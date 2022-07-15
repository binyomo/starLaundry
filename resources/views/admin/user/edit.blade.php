@extends('/admin/main')

@section('container')

	<h1 class="h3 mb-2 text-gray-800">User Edit</h1>
	<p class="mb-4">Mengubah Sebuah Data User</p>		

	<div class="mb-4">
		<div class="card border-bottom-primary shadow h-100 py-2">
        	<div class="card-body">
        	<form method="post" action="/admin/user/{{ $user->username }}" class="mb-5" id="actform">
			@method('put')
			@csrf
		    	<div class="row">
			       	<div class="input-box col-md-6 pb-lg-0">
			           	<div class="form-floating mb-3">
						  	<input type="name" name="name" id="name" required="" class="form-control @error('name') is-invalid @enderror border-left-primary" value="{{ old('name', $user->name) }}" placeholder="name">
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
						  	<input type="text" name="username" id="username" required="" class="form-control @error('username') is-invalid @enderror border-left-primary" value="{{ old('username', $user->username) }}" placeholder="username">
						  	<label for="username">Username</label>
						  	@error('username')
								<div class="invalid-feedback">
						  			{{ $message }}
								</div>
							@enderror
						</div>
			      	</div>
			    </div>

			    <div class="row">
			    	<div class="input-box col-md-12">
				    	<div class="form-floating mb-3">
						  	<input type="email" name="email" id="email" required="" class="form-control @error('email') is-invalid @enderror border-left-primary" value="{{ old('email', $user->email) }}" placeholder="name@example.com">
							<label for="email">Email address</label>
							@error('email')
								<div class="invalid-feedback">
						  			{{ $message }}
								</div>
							@enderror
						</div>
					</div>
				</div>
				<div class="row">
					<div class="input-box col-md-6">
			           	<div class="form-floating mb-3">
						  	<select class="form-select border-left-primary" name="outlet" id="outlet">
						  		<option class="border-bottom" value="{{ $user->outlet }}" selected="">{{ $user->outlet }}</option>
							    @foreach ($outlets as $outlet)
						    		<option value="{{ $outlet->name }}">{{ $outlet->name }}</option>
						    	@endforeach
							</select>
						  	<label for="outlet">Outlet</label>
						</div>
			      	</div>
			      	<div class="input-box col-md-6">
			           	<div class="form-floating mb-3">
						  	<select class="form-select border-left-primary" name="usertype_id" id="usertype_id">
							    @if(old('usertype_id', $user->usertype_id) == 1)
					    			<option value="1" selected>Owner</option>
					    			<option value="2">Staf</option>
					    			<option value="3">Admin</option>
					    		@elseif(old('usertype_id', $user->usertype_id) == 2)
					    			<option value="1">Owner</option>
					    			<option value="2" selected>Staf</option>
					    			<option value="3">Admin</option>
					    		@else
					    			<option value="1">Owner</option>
					    			<option value="2">Staf</option>
					    			<option value="3" selected="">Admin</option>
					    		@endif
							</select>
						  	<label for="usertype_id">Type User</label>
						</div>
			      	</div>
			    </div>

			    <div class="button-detail">
		        	<a href="/admin/user"><button type="button" class="btn btn-primary">Kembali</button></a>
		        	<button type="button" class="btn btn-success act-btn">Simpan</button>
		      	</div>

			</form>
        	</div>
		</div>
	</div>
	

@endsection