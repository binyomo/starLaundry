@extends('/admin/main')

@section('container')

	<h1 class="h3 mb-2 text-gray-800">Order List</h1>
	<p class="mb-4">Digunakan Untuk Mengolah Data Order Yang Baru Saja Masuk (Tahap Pertama).</p>		
		
	<div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Order List</h6>
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
                            <td>
                                <div class="bg-warning p-1 text-center text-dark rounded fw-bold" data-bs-toggle="tooltip" data-bs-html="true" title="List (Barang Masuk)">
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
                                <form method="post" action="/admin/order/{{ $order->code }}" class="d-inline" id="actform">
                                    @method('put')
                                    @csrf
                                    <input type="hidden" name="status" value="2">
                                    <button type="button" class="act-btn fas fa-sign-in-alt px-1 text-primary bg-transparent border-0" data-bs-toggle="tooltip" data-bs-html="true" title="Update Status"></button>
                                </form>
                                <form method="post" action="/admin/order/{{ $order->code }}" class="d-inline" id="actform">
                                    @method('put')
                                    @csrf
                                    <input type="hidden" name="status" value="5">
                                    <button type="button" class="act-btn fas fa-calendar-times px-1 text-primary bg-transparent border-0" data-bs-toggle="tooltip" data-bs-html="true" title="Cancel"></button>
                                </form>
                                @if($order->payment == 0)
                                    <form method="post" action="/admin/order/{{ $order->code }}" class="d-inline" id="actform">
                                        @method('put')
                                        @csrf
                                        <input type="hidden" name="payment" value="1">
                                        <button type="button" class="act-btn fas fa-money-bill-wave px-1 text-primary bg-transparent border-0" data-bs-toggle="tooltip" data-bs-html="true" title="Bayar"></button>
                                    </form>
                                @endif
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