@extends('/admin/main')

@section('container')

	<h1 class="h3 mb-2 text-gray-800">Testimonis Tabel</h1>
	<p class="mb-4">Digunakan Untuk Mengolah Data Testimoni Yang Dipakai Aplikasi Web Ini.</p>		
		
	<div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Testimoni</h6>
        </div>
        <div class="card-body">
            @if($testimonis->count())
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Position</th>
                            <th>Activity</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    	@foreach ($testimonis as $testimoni)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $testimoni->name }}</td>
                            <td>{{ $testimoni->position }}</td>
                            <td class="lh-base">
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
                            </td>
                            <td>
                            	<a href="/admin/testimoni/{{ $testimoni->slug }}"><i class="fas fa-eye px-1" data-bs-toggle="tooltip" data-bs-html="true" title="Detail"></i></a>
				          		<a href="/admin/testimoni/{{ $testimoni->slug }}/edit"><i class="fas fa-edit px-1" data-bs-toggle="tooltip" data-bs-html="true" title="Edit"></i></a>
                                <form action="/admin/testimoni/{{ $testimoni->slug }}" method="post" class="d-inline px-1" id="actform">
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
            @else
            <div class="text-center text-primary fw-bold py-3">Tidak Ada Data Yang Masuk Untuk Sekarang</div>
            @endif
            <a href="/admin/testimoni/create" class="btn btn-primary">Create</a>
        </div>
	</div>

    <div class="d-flex justify-content-end">
        {{ $testimonis->links() }}
    </div>
    
@endsection