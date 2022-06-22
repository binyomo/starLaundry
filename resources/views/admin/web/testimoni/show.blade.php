@extends('/admin/main')

@section('container')

	<h1 class="h3 mb-2 text-gray-800">Testimoni Detail</h1>
	<p class="mb-4">Berisi Detail Sebuah Testimoni.</p>		

	<div class="mb-4">
		<div class="card border-left-primary shadow h-100 py-2">
        	<div class="card-body">

        		<div class="row pb-4">
	        		<div class="col-md-6 pb-md-0 pb-4">
	        			<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
	                       	Name
	                    </div>
	                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $testimoni->name }}</div>
	        		</div>

	        		<div class="col-md-6">
	        			<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
	                       	Position
	                    </div>
	                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $testimoni->position }}</div>
	        		</div>
	        	</div>

	        	<div class="row">
	        		<div class="col-md-12 pb-md-0">
	        			<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
	                       	Statement
	                    </div>
	                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $testimoni->statement }}</div>
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
					        @if($testimoni->created_by)
						    	{{ $testimoni->created_by }}
						    @else
						    	System
						    @endif - {{ $testimoni->created_at->diffForHumans() }}
					        <br>
					    <i class="fas fa-wrench" data-bs-toggle="tooltip" data-bs-html="true" title="Updated"></i>
					        @if($testimoni->updated_by)
						    	{{ $testimoni->updated_by }}
						    @else
						    	System
						    @endif - {{ $testimoni->updated_at->diffForHumans() }}
					</div>
	        	</div>

    		</div>
		</div>
	</div>

	<div class="button-detail mt-3">
		<a href="/admin/testimoni"><button type="button" class="btn btn-primary">Kembali</button></a>
		<form action="/admin/testimoni/{{ $testimoni->slug }}" method="post" class="d-inline px-1" id="actform">
            @method('delete')
            @csrf
            <button type="button" class="btn btn-danger act-btn">Hapus</button>
        </form>
	</div>

@endsection