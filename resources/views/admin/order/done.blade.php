@extends('/admin/main')

@section('container')

	<h1 class="h3 mb-2 text-gray-800">Order Done</h1>
	<p class="mb-4">Digunakan Untuk Mengolah Data Order Yang Sudah Selesai Dikerjakan (Tahap Keempat).</p>		
		
	<div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Order Done</h6>
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
                            <th>Ambil Barang</th>
                            <th>Activity</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    	@foreach ($orders as $order)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $order->customer }}</td>
                            <td><div class="bg-secondary p-1 text-center text-light rounded">{{ $order->code }}</div></td>
                            <td>{{ $order->ambil->format('d/m/Y') }}</td>
                            <td class="lh-base">
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
                            </td>
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
            <div class="text-center text-primary fw-bold py-3">Tidak Ada Data Yang Masuk Untuk Sekarang</div>
            @endif

            <div>
                <a href="/admin/order/" class="btn btn-primary">Order</a>
            </div>  
        </div>        
	</div>
@endsection