@extends('/admin/main')

@section('container')

	<h1 class="h3 mb-2 text-gray-800">Discounts Tabel</h1>
	<p class="mb-4">Digunakan Untuk Mengolah Data Discount Yang Dipakai Aplikasi Web Ini.</p>		
		
	<div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Discount</h6>
        </div>
        <div class="card-body">
            @if($discounts->count())
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Discount</th>
                            <th>Type</th>
                            <th>Activity</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    	@foreach ($discounts as $discount)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $discount->name }}</td>
                            <td>
                                @if($discount->type == 0)
                                    @currency($discount->discount)
                                @else
                                    {{ $discount->discount }}%
                                @endif
                            </td>
                            <td>
                            	@if($discount->type == 0)
					       			Rupiah
					       		@else
					       			Persen (%)
					       		@endif
				       		</td>
                            <td class="lh-base">
                            	<i class="fas fa-plus-circle" data-bs-toggle="tooltip" data-bs-html="true" title="Created"></i> 
				          		@if($discount->created_by)
					       			{{ $discount->created_by }}
					       		@else
					        			System
					       		@endif - {{ $discount->created_at->diffForHumans() }}
				          		<br>
				          		<i class="fas fa-wrench" data-bs-toggle="tooltip" data-bs-html="true" title="Updated"></i>
				          		@if($discount->updated_by)
					       			{{ $discount->updated_by }}
					       		@else
					       			System
					       		@endif - {{ $discount->updated_at->diffForHumans() }}
                            </td>
                            <td>
                            	<a href="/admin/discount/{{ $discount->slug }}"><i class="fas fa-eye px-1" data-bs-toggle="tooltip" data-bs-html="true" title="Detail"></i></a>
				          		<a href="/admin/discount/{{ $discount->slug }}/edit"><i class="fas fa-edit px-1" data-bs-toggle="tooltip" data-bs-html="true" title="Edit"></i></a>
                                <form action="/admin/discount/{{ $discount->slug }}" method="post" class="d-inline px-1" id="actform">
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
        {{ $discounts->links() }}
    </div>
@endsection