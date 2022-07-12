@extends('/admin/main')

@section('container')

	<h1 class="h3 mb-2 text-gray-800">Order Tambah</h1>
	<p class="mb-4">Menambah Sebuah Data Order</p>		

	<div class="mb-4">
		<div class="card border-bottom-primary shadow h-100 py-2">
        	<div class="card-body">
	    	<form method="post" action="/admin/order" class="mb-5">
			@csrf
		    	<div class="row">
			       	<div class="input-box col-md-12 pb-lg-0">
			           	<div class="form-floating mb-3">
						  	<input type="text" name="customer" id="customer" required="" class="form-control @error('customer') is-invalid @enderror border-left-primary" value="{{ old('customer') }}" placeholder="customer">
						  	<label for="customer">Customer</label>
						  	@error('customer')
								<div class="invalid-feedback">
						  			{{ $message }}
								</div>
							@enderror
						</div>
			       	</div>
			    </div>

			    <div class="row">
			      	<div class="input-box col-md-6">
			           	<div class="form-floating mb-3">
						  	<input type="date" name="ambil" id="ambil" required="" class="form-control @error('ambil') is-invalid @enderror border-left-primary" value="{{ old('ambil') }}" placeholder="ambil">
						  	<label for="ambil">Tanggal Ambil</label>
						  	@error('ambil')
								<div class="invalid-feedback">
						  			{{ $message }}
								</div>
							@enderror
						</div>
			      	</div>
			      	<div class="input-box col-md-6">
			      		<div class="form-floating mb-3">
			      			<select class="form-select border-left-primary" name="outlet_id">
						    	@foreach ($outlets as $outlet)
						    		@if(old('outlet_id') == $outlet->id)
						    			<option value="{{ $outlet->id }}" selected="">{{ $outlet->name }}</option>
						    		@else
						    			<option value="{{ $outlet->id }}">{{ $outlet->name }}</option>
						    		@endif
						    	@endforeach
						    </select>
						  <label for="type">Outlet</label>
						</div>
			      	</div>
			    </div>

			    <div class="row">
			    	<div class="input-box col-md-6 pb-lg-0">
			           	<div class="form-floating mb-3">
						  	<select class="form-select border-left-primary" name="member_id">
								<option value="0">None</option>
						    	@foreach ($members as $member)
						    		@if(old('member_id') == $member->id)
						    			<option value="{{ $member->id }}" selected="">{{ $member->nickname }}</option>
						    		@else
						    			<option value="{{ $member->id }}">{{ $member->nickname }}</option>
						    		@endif
						    	@endforeach
						    </select>
						    <label for="type">Member</label>
						</div>
			       	</div>
			       	<div class="input-box col-md-6">
			      		<div class="form-floating mb-3">
			      			<select class="form-select border-left-primary" name="discount_id">
								<option value="0">None</option>
						    	@foreach ($discounts as $discount)
						    		@if(old('discount_id') == $discount->id)
						    			<option value="{{ $discount->id }}" selected="">{{ $discount->name }}</option>
						    		@else
						    			<option value="{{ $discount->id }}">{{ $discount->name }}</option>
						    		@endif
						    	@endforeach
						    </select>
						  <label for="type">Discount</label>
						</div>
			      	</div>
			    </div>

			    <div class="card border-left-primary mb-3">
			    	<div class="row container py-3">

			    		@foreach ($barangs as $barang)
			    		<div class="form-check col-md-3">
						  	<input class="form-check-input" type="checkbox" value="{{ $barang->id }}" id="{{ $barang->id }}" name="barang[]">
						  	<label class="form-check-label" for="{{ $barang->id }}">
						    {{ $barang->name }} - {{ $barang->jumlah }} 
						    @if($barang->type == 0)
					       		Kg
					       	@else
					       		Pcs
					       	@endif
						  	</label>
						</div>
						@endforeach

			    	</div>
			    </div>

			    <div class="row">
			    	<div class="input-box col-md-12 pb-lg-0">
			           	<div class="form-floating mb-3">
			           		<textarea class="form-control border-left-primary" placeholder="Leave a comment here" id="note" name="note" style="height: 100px;"></textarea>
  							<label for="floatingTextarea">Note</label>
						</div>
			       	</div>
			    </div>

			    <div class="button-detail">
		        	<button type="submit" name="submit" class="btn btn-success" id="submit">Tambah</button>
		      	</div>

			</form>
        	</div>
		</div>
	</div>
@endsection