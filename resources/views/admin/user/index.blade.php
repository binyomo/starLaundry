@extends('/admin/main')

@section('container')

	<h1 class="h3 mb-2 text-gray-800">Users Tabel</h1>
	<p class="mb-4">Digunakan Untuk Mengolah Data User Yang Dipakai Aplikasi Web Ini.</p>		
		
	<div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data User</h6>
        </div>
        <div class="card-body">
            @if($users->count())
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Username</th>
                            <th>Outlet</th>
                            <th>Type</th>
                            <th>Activity</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    	@foreach ($users as $user)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $user->username }}</td>
                            <td>{{ $user->outlet->name }}</td>
                            <td>
                            	@if($user->usertype_id == 1)
					       			Owner
					       		@elseif($user->usertype_id == 2)
					       			Staf
					       		@else
					       			Admin
					       		@endif
				       		</td>
                            <td class="lh-base">
                            	<i class="fas fa-plus-circle" data-bs-toggle="tooltip" data-bs-html="true" title="Created"></i> 
				          		@if($user->created_by)
					       			{{ $user->created_by }}
					       		@else
					        			System
					       		@endif - {{ $user->created_at->diffForHumans() }}
				          		<br>
				          		<i class="fas fa-wrench" data-bs-toggle="tooltip" data-bs-html="true" title="Updated"></i>
				          		@if($user->updated_by)
					       			{{ $user->updated_by }}
					       		@else
					       			System
					       		@endif - {{ $user->updated_at->diffForHumans() }}
                            </td>
                            <td>
                            	<a href="/admin/user/{{ $user->username }}"><i class="fas fa-eye px-1" data-bs-toggle="tooltip" data-bs-html="true" title="Detail"></i></a>
				          		<a href="/admin/user/{{ $user->username }}/edit"><i class="fas fa-edit px-1" data-bs-toggle="tooltip" data-bs-html="true" title="Edit"></i></a>
                                <form action="/admin/user/{{ $user->username }}" method="post" class="d-inline px-1" id="actform">
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
        </div>
	</div>
    <div class="d-flex justify-content-end">
        {{ $users->links() }}
    </div>
@endsection