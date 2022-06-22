@extends('/admin/main')

@section('container')

	<h1 class="h3 mb-2 text-gray-800">Messages Tabel</h1>
	<p class="mb-4">Digunakan Untuk Mengolah Data Message Yang Dipakai Aplikasi Web Ini.</p>		
		
	<div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Message</h6>
        </div>
        <div class="card-body">
            @if($messages->count())
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Activity</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    	@foreach ($messages as $message)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $message->name }}</td>
                            <td>{{ $message->email }}</td>
                            <td class="lh-base">
                            	<i class="fas fa-plus-circle" data-bs-toggle="tooltip" data-bs-html="true" title="Created"></i> 
					       		{{ $message->created_at->diffForHumans() }}
                            </td>
                            <td>
                            	<a href="/admin/message/{{ $message->id }}"><i class="fas fa-eye px-1" data-bs-toggle="tooltip" data-bs-html="true" title="Detail"></i></a>
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
        {{ $messages->links() }}
    </div>
    
@endsection