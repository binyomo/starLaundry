@extends('/admin/main')

@section('container')

	<div class="row">
		<div class="col-6">
			<h1 class="h3 mb-2 text-gray-800">Order Detail</h1>
			<p class="mb-4">Berisi Detail Sebuah Order.</p>		
		</div>	
		<div class="col-6 text-end">
			<button class="mb-1 venobox btn btn-primary" data-vbtype="iframe" href="/admin/order/{{ $order->code }}/edit"><i class="fas fa-print"></i> Print</button>
			@if($order->payment == 0)
				<form method="post" action="/admin/order/{{ $order->code }}" id="actform" >
	            @method('put')
	            @csrf
	              	<input type="hidden" name="payment" value="1">
					<button type="button" class="act-btn btn btn-success"><i class="fas fa-money-bill-wave"></i> Bayar</button>
			@endif				
		</div>
	</div>
	

	<div class="mb-4">
		<div class="card border-left-primary shadow h-100 py-2">
        	<div class="card-body">

        		<div class="row pb-4">
	        		<div class="col-md-6 pb-md-0 pb-4">
	        			<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
	                       	Customer
	                    </div>
	                    <div class="h5 mb-0 font-weight-bold text-gray-800">
	                    	<i class="fa-solid fa-user-group"></i> {{ $order->customer }}
	                    </div>
	        		</div>

	        		<div class="col-md-6 pb-md-0">
	        			<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
	                       	Member
	                    </div>
	                    <div class="h5 mb-0 font-weight-bold text-gray-800">
	                    	<i class="fa-solid fa-users-rectangle"></i>
	                    	@if ( $order->member )
	                    		{{ $order->member->name }}
	                    	@else
	                    		-
	                    	@endif
	                    </div>
	        		</div>

	        	</div>

	        	<div class="row pb-4">	        		

	        		<div class="col-md-6 pb-md-0 pb-4">
	        			<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
	                       	Code
	                    </div>
	                    <div class="h5 mb-0 font-weight-bold text-gray-800">
	                    	<i class="fa-brands fa-codepen"></i> {{ $order->code }}
	                    </div>
	        		</div>

	        		<div class="col-md-6">
	        			<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
	                       	Outlet
	                    </div>
	                    <div class="h5 mb-0 font-weight-bold text-gray-800">
	                    	<i class="fas fa-landmark"></i> {{ $order->outlet->name }}
	                    </div>
	        		</div>
	        	</div>

	        	<div class="row pb-4">
	        		<div class="col-md-6 pb-md-0 pb-4">
	        			<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
	                       	Waktu Taruh
	                    </div>
	                    <div class="h5 mb-0 font-weight-bold text-gray-800">
	                    	<i class="fa-solid fa-notes-medical"></i> {{ $order->created_at->format('d/m/Y') }}
	                    </div>
	        		</div>

	        		<div class="col-md-6 pb-md-0">
	        			<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
	                       	Waktu Ambil
	                    </div>
	                    <div class="h5 mb-0 font-weight-bold text-gray-800">
	                    	<i class="fa-solid fa-hand-holding-medical"></i> {{ $order->ambil->format('d/m/Y') }}
	                    </div>
	        		</div>
	        	</div>

	        	<div class="row pb-4">
	        		<div class="col-md-6 pb-md-0 pb-4">
	        			<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
	                       	Status
	                    </div>
	                    <div class="h5 mb-0 font-weight-bold text-gray-800">
	                    	@if ( $order->status == 1 )
	                    		<i class="fas fa-dumpster"></i> List (Barang Masuk)
	                    	@elseif ( $order->status == 2 )
	                    		<i class="fas fa-cog"></i> Progress (Pengerjaan)
	                    	@elseif ( $order->status == 3 )
	                    		<i class="fas fa-hands-helping"></i> Ready (Siap Diambil)
	                    	@elseif ( $order->status == 4 )
	                    		<i class="fas fa-paperclip"></i> Done (Selesai)
	                    	@else
	                    		<i class="fas fa-calendar-times"></i> Cancel 
	                    	@endif
	                    </div>
	        		</div>

	        		<div class="col-md-6">
	        			<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
	                       	Pembayaran
	                    </div>
	                    <div class="h5 mb-0 font-weight-bold text-gray-800">
	                    	@if($order->payment == 1)
	                    		<i class="fa-solid fa-circle-check" data-bs-toggle="tooltip" data-bs-html="true" title="Staff Penerima"></i> Sudah Dibayar - {{ $order->payment_by }}
	                    	@else
	                    		<i class="fa-solid fa-circle-xmark"></i> Belum Bayar
	                    	@endif
	                    </div>
	        		</div>
	        	</div>

	        	<div class="row">
	        		<div class="col-md-6 pb-md-0 pb-4">
	        			<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
	                       	Staf
	                    </div>
	                    <div class="h5 mb-0 font-weight-bold text-gray-800">
	                    	<i class="fa-solid fa-user-gear"></i> {{ $order->created_by }}
	                    </div>
	        		</div>
	        		<div class="col-md-6">
	        			<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
	                       	Note
	                    </div>
	                    <div class="h5 mb-0 font-weight-bold text-gray-800">
	                    	<i class="fa-solid fa-note-sticky"></i> {{ $order->note }}
	                    </div>
	        		</div>
	        	</div>
			</div>
		</div>
	</div>

	<div class="mb-4">
		<div class="card border-left-primary shadow h-100">

			<div class="card-header py-3">
	            <h6 class="m-0 font-weight-bold text-primary">Daftar Barang</h6>
	        </div>
        	<div class="card-body">
        		<div class="table-responsive">
	        		<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
	                    <thead>
	                        <tr>
	                            <th colspan="2">Barang</th>
	                            <th colspan="2">Harga</th>
	                        </tr>
	                    </thead>
	                    <tbody>
	                    	@foreach ($order->barang as $barang)
	                        <tr>
	                            <td colspan="2">{{ $barang->name }} - {{ $barang->pivot->jumlah }} 
							    @if($barang->type == 0)
						       		Kg
						       	@else
						       		Pcs
						       	@endif
						       	</td>
	                            <td colspan="2" id="price">{{ $barang->harga*$barang->pivot->jumlah }}</td>
	                        </tr>
	                       	@endforeach
	                    </tbody>
	                    <tfoot>
	                    	<tr class="table-warning">
	                    		<th>Jumlah Harga</th>
	                    		<th id="sub-total">
	                    			{{ $total }}
	                    		</th>
	                    		<th>
	                    		Discount - 
	                    		@if ( $order->discount )
		                    		{{ $order->discount->name }}
		                    	@else
		                    		None
		                    	@endif
		                    	</th>
	                    		<th>
	                    		@if ( $order->discount )
	                    			@if ( $order->discount->type == 0 )
		                    			{{ $order->discount->discount }}
		                    		@else
		                    			{{ $order->discount->discount }} %
		                    		@endif
		                    	@else
		                    		0
		                    	@endif
	                    		</th>
	                    	</tr>
	                    	<tr class="table-primary text-light">
	                    		<td colspan="2">Total</td>
	                    		<td colspan="2">
	                    			@if ( $order->discount )
	                    				@if ( $order->discount->type == 0 )
			                    			{{ $total - $order->discount->discount }}
			                    		@else
			                    			{{ $total - $total * $order->discount->discount / 100 }}
			                    		@endif
			                    	@else
			                    		{{ $total }}
			                    	@endif
	                    		</td>
	                    	</tr>
	                    </tfoot>
	                </table>
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
					        @if($order->created_by)
						    	{{ $order->created_by }}
						    @else
						    	System
						    @endif - {{ $order->created_at->diffForHumans() }}
					        <br>
					    <i class="fas fa-wrench" data-bs-toggle="tooltip" data-bs-html="true" title="Updated"></i>
					        @if($order->updated_by)
						    	{{ $order->updated_by }}
						    @else
						    	System
						    @endif - {{ $order->updated_at->diffForHumans() }}
					</div>
	        	</div>

    		</div>
		</div>
	</div>
@endsection