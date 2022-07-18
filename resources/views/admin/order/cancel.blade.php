@extends('/admin/main')

@section('container')

	<h1 class="h3 mb-2 text-gray-800">Order Cancel</h1>
	<p class="mb-4">Digunakan Untuk Mengolah Data Order Yang Sudah Di Cancel.</p>		
		
	<div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Order Cancel</h6>
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
                                <div class="bg-danger p-1 text-center text-light rounded fw-bold" data-bs-toggle="tooltip" data-bs-html="true" title="List (Barang Masuk)">
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
                                <form action="/admin/order/{{ $order->code }}" method="post" class="d-inline px-1" id="actform">
                                    @method('delete')
                                    @csrf
                                    <button type="button" class="act-btn fas fa-trash px-1 text-primary bg-transparent border-0" data-bs-toggle="tooltip" data-bs-html="true" title="Delete"></button>
                                </form>
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