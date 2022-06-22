@extends('/admin/main')

@section('container')

	<h1 class="h3 mb-2 text-gray-800">Outlets Tabel</h1>
	<p class="mb-4">Digunakan Untuk Mengolah Data Outlet Yang Dipakai Aplikasi Web Ini.</p>		
		
	<div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Outlet</h6>
        </div>
        <div class="card-body">
            @if($outlets->count())
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Alamat</th>
                            <th>Activity</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    	@foreach ($outlets as $outlet)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $outlet->name }}</td>
                            <td>
                            	@if($outlet->outlettype_id == 1)
					       			Owner
					       		@elseif($outlet->outlettype_id == 2)
					       			Staf
					       		@else
					       			Admin
					       		@endif
				       		</td>
                            <td class="lh-base">
                            	<i class="fas fa-plus-circle" data-bs-toggle="tooltip" data-bs-html="true" title="Created"></i> 
				          		@if($outlet->created_by)
					       			{{ $outlet->created_by }}
					       		@else
					        			System
					       		@endif - {{ $outlet->created_at->diffForHumans() }}
				          		<br>
				          		<i class="fas fa-wrench" data-bs-toggle="tooltip" data-bs-html="true" title="Updated"></i>
				          		@if($outlet->updated_by)
					       			{{ $outlet->updated_by }}
					       		@else
					       			System
					       		@endif - {{ $outlet->updated_at->diffForHumans() }}
                            </td>
                            <td>
                            	<a href="/admin/outlet/{{ $outlet->slug }}"><i class="fas fa-eye px-1" data-bs-toggle="tooltip" data-bs-html="true" title="Detail"></i></a>
				          		<a href="/admin/outlet/{{ $outlet->slug }}/edit"><i class="fas fa-edit px-1" data-bs-toggle="tooltip" data-bs-html="true" title="Edit"></i></a>
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
        {{ $outlets->links() }}
    </div>
    
@endsection