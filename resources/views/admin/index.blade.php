@extends('/admin/main')

@section('container')
	<div class="d-sm-flex align-items-center justify-content-center py-5 text-center">
		<h1 class="h1 mb-0 text-gray-800"><i class="fab fa-squarespace"></i> <br> Dashboard <br> <strong>{{ auth()->user()->username }}</strong></h1>
	</div>
@endsection