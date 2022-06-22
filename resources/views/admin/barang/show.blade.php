@extends('/admin/main')

@section('container')

	<h1 class="h3 mb-2 text-gray-800">Barang Detail</h1>
	<p class="mb-4">Berisi Detail Sebuah Barang.</p>		

	<div class="mb-4">
		<div class="card border-left-primary shadow h-100 py-2">
        	<div class="card-body">

        		<div class="row pb-4">
	        		<div class="col-md-6 pb-md-0 pb-4">
	        			<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
	                       	Name
	                    </div>
	                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $barang->name }}</div>
	        		</div>

	        		<div class="col-md-6">
	        			<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
	                       	Harga
	                    </div>
	                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $barang->harga }}</div>
	        		</div>
	        	</div>

	        	<div class="row">
	        		<div class="col-md-6 pb-md-0 pb-4">
	        			<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
	                       	Jumlah
	                    </div>
	                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $barang->jumlah }}</div>
	        		</div>

	        		<div class="col-md-6 pb-md-0 pb-4">
	        			<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
	                       	Type
	                    </div>
	                    <div class="h5 mb-0 font-weight-bold text-gray-800">
	                    	@if($barang->type == 0)
					       		Kg
					       	@else
					       		Pcs
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
					        @if($barang->created_by)
						    	{{ $barang->created_by }}
						    @else
						    	System
						    @endif - {{ $barang->created_at->diffForHumans() }}
					        <br>
					    <i class="fas fa-wrench" data-bs-toggle="tooltip" data-bs-html="true" title="Updated"></i>
					        @if($barang->updated_by)
						    	{{ $barang->updated_by }}
						    @else
						    	System
						    @endif - {{ $barang->updated_at->diffForHumans() }}
					</div>
	        	</div>

    		</div>
		</div>
	</div>

	<div class="button-detail mt-3">
		<a href="/admin/barang"><button type="button" class="btn btn-primary">Kembali</button></a>
		<form action="/admin/barang/{{ $barang->slug }}" method="post" class="d-inline px-1" id="actform">
            @method('delete')
            @csrf
            <button type="button" class="btn btn-danger act-btn">Hapus</button>
        </form>
	</div>

@endsection