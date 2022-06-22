@extends('/admin/main')

@section('container')

	<h1 class="h3 mb-2 text-gray-800">User Detail</h1>
	<p class="mb-4">Berisi Detail Sebuah User.</p>		

	<div class="mb-4">
		<div class="card border-left-primary shadow h-100 py-2">
        	<div class="card-body">

        		<div class="row pb-4">
	        		<div class="col-md-6 pb-md-0 pb-4">
	        			<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
	                       	Name
	                    </div>
	                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $user->name }}</div>
	        		</div>

	        		<div class="col-md-6">
	        			<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
	                       	Username
	                    </div>
	                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $user->username }}</div>
	        		</div>
	        	</div>

	        	<div class="row">
	        		<div class="col-md-6 pb-md-0 pb-4">
	        			<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
	                      	Email
	                    </div>
	                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $user->email }}</div>
	        		</div>

	        		<div class="col-md-6">
	        			<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
	                       	Type User
	                    </div>
	                    <div class="h5 mb-0 font-weight-bold text-gray-800">
	                    	@if($user->usertype_id == 1)
					       		Owner
					       	@elseif($user->usertype_id == 2)
					       		Staf
					       	@else
					       		Admin
					       	@endif
	                    </div>
	        		</div>
	        	</div>

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
		        		<i class="fas fa-plus-circle" data-bs-toggle="tooltip" data-bs-html="true" title="Created"></i> 
					        @if($user->created_by)
						    	{{ $user->created_by }}
						    @else
						    	System
						    @endif - {{ $user->created_at->diffForHumans() }}
					        <br>
					    <i class="fas fa-wrench" data-bs-toggle="tooltip" data-bs-html="true" title="Updated"></i>
					        @if($user->updated_by)
						    	{{ $user->updated_by }}
						    @else
						    	System
						    @endif - {{ $user->updated_at->diffForHumans() }}
					</div>
	        	</div>

    		</div>
		</div>
	</div>

	<div class="button-detail mt-3">
		<a href="/admin/user"><button type="button" class="btn btn-primary">Kembali</button></a>
		<form action="/admin/user/{{ $user->username }}" method="post" class="d-inline px-1" id="actform">
            @method('delete')
            @csrf
            <button type="button" class="btn btn-danger act-btn">Hapus</button>
        </form>
	</div>

@endsection