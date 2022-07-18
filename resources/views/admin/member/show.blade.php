@extends('/admin/main')

@section('container')

	<h1 class="h3 mb-2 text-gray-800">Member Detail</h1>
	<p class="mb-4">Berisi Detail Sebuah Member.</p>		

	<div class="mb-4">
		<div class="card border-left-primary shadow h-100 py-2">
        	<div class="card-body">

        		<div class="row pb-4">
	        		<div class="col-md-6 pb-md-0 pb-4">
	        			<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
	                       	Name
	                    </div>
	                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $member->name }}</div>
	        		</div>

	        		<div class="col-md-6">
	        			<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
	                       	Nickname
	                    </div>
	                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $member->nickname }}</div>
	        		</div>
	        	</div>

	        	<div class="row">
	        		<div class="col-md-6 pb-md-0 pb-4">
	        			<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
	                       	No Telepon
	                    </div>
	                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $member->number }}</div>
	        		</div>
	        		<div class="col-md-6">
	        			<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
	                       	Total Order
	                    </div>
	                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $orders->count() }}</div>
	        		</div>
	        	</div>

			</div>
		</div>
	</div>

	<div class="mb-4">
		<div class="card border-left-primary shadow h-100">

			<div class="card-header py-3">
	            <h6 class="m-0 font-weight-bold text-primary">Daftar Orders</h6>
	        </div>
        	<div class="card-body">
        		@if($orders->count())
        		<div class="table-responsive">
	        		<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
	                    <thead>
	                        <tr>
	                            <th>No</th>
	                            <th>Customer</th>
	                            <th>Code</th>
	                            <th>Pembayaran</th>
	                            <th>Taruh Barang</th>
	                            <th>Action</th>
	                        </tr>
	                    </thead>
	                    <tbody>
	                    	@foreach ($orders as $order)
	                        <tr>
	                            <td>{{ $loop->iteration }}</td>
	                            <td>{{ $order->customer }}</td>
	                            <td><div class="
		                            	@if ( $order->status == 1 )
				                    		bg-warning text-dark
				                    	@elseif ( $order->status == 2 )
				                    		bg-primary text-light
				                    	@elseif ( $order->status == 3 )
				                    		bg-success text-light
				                    	@elseif ( $order->status == 4 )
				                    		bg-secondary text-light
				                    	@else
				                    		bg-danger text-light
				                    	@endif
		                            	
		                            	p-1 text-center rounded fw-bold">
		                            	{{ $order->code }}
	                            	</div>
	                            </td>
	                            <td>
	                                @if($order->payment == 0)
	                                    <div class="bg-danger p-1 text-center text-light rounded fw-bold">
	                                        Belum Bayar
	                                    </div>        
	                                @else
	                                    <div class="bg-success p-1 text-center text-light rounded fw-bold">
	                                        Sudah Bayar
	                                    </div>        
	                                @endif
	                            </td>
	                            <td>{{ $order->created_at->format('d/m/Y') }}</td>
	                            <td>
	                            	<a href="/admin/order/{{ $order->code }}"><i class="fas fa-eye px-1" data-bs-toggle="tooltip" data-bs-html="true" title="Detail"></i></a>
	                            </td>
	                        </tr>
	                       	@endforeach
	                    </tbody>
	                </table>
	            </div>
	            <div class="d-flex justify-content-end">
			        {{ $orders->links() }}
			    </div>
	            @else
	            <div class="text-center text-primary fw-bold py-3">Tidak Ada Data Order Yang Dilakukan Pada Member Ini</div>
	            @endif
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
					        @if($member->created_by)
						    	{{ $member->created_by }}
						    @else
						    	System
						    @endif - {{ $member->created_at->diffForHumans() }}
					        <br>
					    <i class="fas fa-wrench" data-bs-toggle="tooltip" data-bs-html="true" title="Updated"></i>
					        @if($member->updated_by)
						    	{{ $member->updated_by }}
						    @else
						    	System
						    @endif - {{ $member->updated_at->diffForHumans() }}
					</div>
	        	</div>

    		</div>
		</div>
	</div>

	<div class="button-detail mt-3">
		<a href="/admin/member"><button type="button" class="btn btn-primary">Kembali</button></a>
		<form action="/admin/member/{{ $member->slug }}" method="post" class="d-inline px-1" id="actform">
            @method('delete')
            @csrf
            <button type="button" class="btn btn-danger act-btn">Hapus</button>
        </form>
	</div>

@endsection