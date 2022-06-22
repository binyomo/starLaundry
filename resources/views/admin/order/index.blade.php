@extends('/admin/main')

@section('container')
@can('staf')
<h1 class="h3 mb-2 text-gray-800">Order</h1>
<p class="mb-4">Digunakan Untuk Mengolah Data Order Yang Berjalan Di Aplikasi Ini</p>		

<div class="row pb-4">

	<div class="col-xl-4 col-md-6 mb-4">
    	<div class="card border-left-primary shadow h-100 py-2">
            @if($list == 0)
    		    
            @else
                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-warning p-2">{{ $list }}</span>
            @endif
        	<div class="card-body">
            	<div class="row no-gutters align-items-center">
                	<div class="col mr-2">
                    	<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                        	List Order (New)</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><a href="/admin/order/list" class="btn btn-primary">Check</a></div>
                    </div>
                    <div class="col-auto">
                    	<i class="fas fa-dumpster fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-4 col-md-6 mb-4">
    	<div class="card border-left-primary shadow h-100 py-2">
            @if($progress == 0)

            @else
    		    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-primary p-2">{{ $progress }}</span>
            @endif
        	<div class="card-body">
            	<div class="row no-gutters align-items-center">
                	<div class="col mr-2">
                    	<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                        	Progress Order (On Going)</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><a href="/admin/order/progress" class="btn btn-primary">Check</a></div>
                    </div>
                    <div class="col-auto">
                    	<i class="fas fa-cog fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-4 col-md-6 mb-4">
    	<div class="card border-left-primary shadow h-100 py-2">
        	<div class="card-body">
                @if($ready == 0)

                @else
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-success p-2">{{ $ready }}</span>
                @endif
            	<div class="row no-gutters align-items-center">
                	<div class="col mr-2">
                    	<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                        	Ready Order (Pick Up)</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><a href="/admin/order/ready" class="btn btn-primary">Check</a></div>
                    </div>
                    <div class="col-auto">
                    	<i class="fas fa-hands-helping fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endcan

<h1 class="h3 mb-2 text-gray-800">History</h1>
<p class="mb-4">Digunakan Untuk Data Order Yang Sudah Selesai Di Aplikasi Ini</p>       

<div class="row pb-4">

    <div class="col-xl-6 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            @if($done == 0)
                
            @else
                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-secondary p-2">{{ $done }}</span>
            @endif
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Order Done</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><a href="/admin/order/done" class="btn btn-primary">Check</a></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-paperclip fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-6 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            @if($cancel == 0)

            @else
                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger p-2">{{ $cancel }}</span>
            @endif
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Order Cancel</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><a href="/admin/order/cancel" class="btn btn-primary">Check</a></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-calendar-times fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<h1 class="h3 mb-2 text-gray-800">Search Order</h1>
<p class="mb-4">Digunakan Untuk Mencari Data Order Menggunakan Code Dari Sebuah Order</p>       

<div class="row">

    <div class="col-xl-12 col-md-12 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col-12">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Check Order</div>
                        <form class="input-group mb-3" action="/admin/order">
                            <input type="text" class="form-control" placeholder="Search..." name="search" value="{{ request('search') }}">
                            <button class="btn btn-primary" type="submit">Search</button>
                        </form>
                    </div>
                    @if($orders == 'none')
                        <p class="text-center"><strong>Masukkan Code Dari Order Yang Terdiri Dari 8 Kombinasi Contoh( 3FI82t0d )</strong></p>
                    @elseif($orders->count())
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Customer</th>
                                        <th>Code</th>
                                        <th>Ambil Barang</th>
                                        <th>Activity</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orders as $order)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $order->customer }}</td>
                                        <td><div class="
                                            @if ( $order->status == 1 )
                                                bg-warning text-dark
                                            @elseif ( $order->status == 2 )
                                                bg-primary text-light
                                            @elseif ( $order->status == 3 )
                                                bg-success text-light
                                            @elseif ( $order->status == 4 )
                                                bg-secondary text-light
                                            @else
                                                bg-danger text-light
                                            @endif
                                            
                                            p-1 text-center rounded">{{ $order->code }}</div></td>
                                        <td>{{ $order->ambil->format('d/m/Y') }}</td>
                                        <td class="lh-base">
                                            <i class="fas fa-plus-circle" data-bs-toggle="tooltip" data-bs-html="true" title="Created"></i> 
                                            @if($order->created_by)
                                                {{ $order->created_by }}
                                            @else
                                                System
                                            @endif - {{ $order->created_at->diffForHumans() }}
                                            <br>
                                            <i class="fas fa-wrench" data-bs-toggle="tooltip" data-bs-html="true" title="Updated"></i>
                                            @if($order->updated_by)
                                                {{ $order->updated_by }}
                                            @else
                                                System
                                            @endif - {{ $order->updated_at->diffForHumans() }}
                                        </td>
                                        <td>
                                            <a href="/admin/order/{{ $order->code }}"><i class="fas fa-eye px-1" data-bs-toggle="tooltip" data-bs-html="true" title="Detail"></i></a>
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
                        <p class="text-center"><strong>Code Order Tidak Ada Dalam Database Atau Code Yang Dimasukkan Salah</strong></p>
                    @endif
                </div>
            </div>
        </div>
    </div>

</div>
@endsection