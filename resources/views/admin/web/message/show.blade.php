@extends('/admin/main')

@section('container')

	<h1 class="h3 mb-2 text-gray-800">Message Detail</h1>
	<p class="mb-4">Berisi Detail Sebuah Message.</p>		

	<div class="mb-4">
		<div class="card border-left-primary shadow h-100 py-2">
        	<div class="card-body">

        		<div class="row pb-4">
	        		<div class="col-md-6 pb-md-0 pb-4">
	        			<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
	                       	Name
	                    </div>
	                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $message->name }}</div>
	        		</div>

	        		<div class="col-md-6">
	        			<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
	                       	Email
	                    </div>
	                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $message->email }}</div>
	        		</div>
	        	</div>

	        	<div class="row pb-4">
	        		<div class="col-md-12 pb-md-0">
	        			<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
	                       	Subject
	                    </div>
	                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $message->subject }}</div>
	        		</div>
	        	</div>

	        	<div class="row">
	        		<div class="col-md-12 pb-md-0">
	        			<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
	                       	Message
	                    </div>
	                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $message->message }}</div>
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
						{{ $message->created_at->diffForHumans() }}
					</div>
	        	</div>

    		</div>
		</div>
	</div>

	<div class="button-detail mt-3">
		<a href="/admin/message"><button type="button" class="btn btn-primary">Kembali</button></a>
		<form action="/admin/message/{{ $message->id }}" method="post" class="d-inline px-1" id="actform">
            @method('delete')
            @csrf
            <button type="button" class="btn btn-danger act-btn">Hapus</button>
        </form>
	</div>

@endsection