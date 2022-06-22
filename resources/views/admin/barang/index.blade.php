@extends('/admin/main')

@section('container')

	<h1 class="h3 mb-2 text-gray-800">Barangs Tabel</h1>
	<p class="mb-4">Digunakan Untuk Mengolah Data Barang Yang Dipakai Aplikasi Web Ini.</p>		
		
	<div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Barang</h6>
        </div>
        <div class="card-body">
            @if($barangs->count())
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Harga</th>
                            <th>Jumlah</th>
                            <th>Activity</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    	@foreach ($barangs as $barang)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $barang->name }}</td>
                            <td>{{ $barang->harga }}</td>
                            <td>{{ $barang->jumlah }} 
                                @if($barang->type == 0)
                                    Kg
                                @else
                                    Pcs
                                @endif
                            </td>
                            <td class="lh-base">
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
                            </td>
                            <td>
                            	<a href="/admin/barang/{{ $barang->slug }}"><i class="fas fa-eye px-1" data-bs-toggle="tooltip" data-bs-html="true" title="Detail"></i></a>
				          		<a href="/admin/barang/{{ $barang->slug }}/edit"><i class="fas fa-edit px-1" data-bs-toggle="tooltip" data-bs-html="true" title="Edit"></i></a>
                            </td>
                        </tr>
                       	@endforeach
                    </tbody>
                </table>
            </div>
            @else
            <div class="text-center text-primary fw-bold py-3">Tidak Ada Data Yang Masuk Untuk Sekarang</div>
            @endif
        </div>
	</div>
    <div class="d-flex justify-content-end">
        {{ $barangs->links() }}
    </div>
@endsection