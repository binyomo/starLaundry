@extends('/admin/main')

@section('container')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
    	<h1 class="h3 mb-0 text-gray-800">Dashboard, {{ auth()->user()->name }}</h1>        
	</div>

	<div class="card border-bottom-primary shadow py-3 mb-5 px-4">
		<h5 class="py-3 h5 mb-0 text-gray-800 fw-bold">Pendapatan</h5>        
		<div class="row mb-0">

	        <div class="col-xl-3 col-md-6 mb-4">
	            <div class="card border-left-primary h-100 py-2">
	                <div class="card-body">
	                    <div class="row no-gutters align-items-center">
							<div class="col mr-2">
	                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Pendapatan (Harian)</div>
	                        	<div class="h5 mb-0 font-weight-bold text-gray-800">$40,000</div>
	                        </div>
	                        <div class="col-auto">
	                        	<i class="fas fa-coins fa-2x text-gray-300"></i>
	                    	</div>
	                	</div>
	            	</div>
				</div>
			</div>

			<div class="col-xl-3 col-md-6 mb-4">
	            <div class="card border-left-primary h-100 py-2">
	                <div class="card-body">
	                    <div class="row no-gutters align-items-center">
							<div class="col mr-2">
	                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Pendapatan (Mingguan)</div>
	                        	<div class="h5 mb-0 font-weight-bold text-gray-800">$40,000</div>
	                        </div>
	                        <div class="col-auto">
	                        	<i class="fas fa-coins fa-2x text-gray-300"></i>
	                    	</div>
	                	</div>
	            	</div>
				</div>
			</div>

			<div class="col-xl-3 col-md-6 mb-4">
	            <div class="card border-left-primary h-100 py-2">
	                <div class="card-body">
	                    <div class="row no-gutters align-items-center">
							<div class="col mr-2">
	                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Pendapatan (Bulanan)</div>
	                        	<div class="h5 mb-0 font-weight-bold text-gray-800">$40,000</div>
	                        </div>
	                        <div class="col-auto">
	                        	<i class="fas fa-coins fa-2x text-gray-300"></i>
	                    	</div>
	                	</div>
	            	</div>
				</div>
			</div>

			<div class="col-xl-3 col-md-6 mb-4">
	            <div class="card border-left-primary h-100 py-2">
	                <div class="card-body">
	                    <div class="row no-gutters align-items-center">
							<div class="col mr-2">
	                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Pendapatan (Semua)</div>
	                        	<div class="h5 mb-0 font-weight-bold text-gray-800">$40,000</div>
	                        </div>
	                        <div class="col-auto">
	                        	<i class="fas fa-coins fa-2x text-gray-300"></i>
	                    	</div>
	                	</div>
	            	</div>
				</div>
			</div>
			
		</div>

		<div class="chart-area mt-0">
        	<canvas id="pendapatanChart"></canvas>
		</div>
	</div>

	<div class="card border-bottom-primary shadow py-3 mb-5 px-4">
		<h5 class="py-3 h5 mb-0 text-gray-800 fw-bold">Order</h5>        
		<div class="row">

	        <div class="col-xl-3 col-md-6 mb-4">
	            <div class="card border-left-primary h-100 py-2">
	                <div class="card-body">
	                    <div class="row no-gutters align-items-center">
							<div class="col mr-2">
	                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Order (Harian)</div>
	                        	<div class="h5 mb-0 font-weight-bold text-gray-800">$40,000</div>
	                        </div>
	                        <div class="col-auto">
	                        	<i class="fas fa-jug-detergent fa-2x text-gray-300"></i>
	                    	</div>
	                	</div>
	            	</div>
				</div>
			</div>

			<div class="col-xl-3 col-md-6 mb-4">
	            <div class="card border-left-primary h-100 py-2">
	                <div class="card-body">
	                    <div class="row no-gutters align-items-center">
							<div class="col mr-2">
	                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Order (Mingguan)</div>
	                        	<div class="h5 mb-0 font-weight-bold text-gray-800">$40,000</div>
	                        </div>
	                        <div class="col-auto">
	                        	<i class="fas fa-jug-detergent fa-2x text-gray-300"></i>
	                    	</div>
	                	</div>
	            	</div>
				</div>
			</div>

			<div class="col-xl-3 col-md-6 mb-4">
	            <div class="card border-left-primary h-100 py-2">
	                <div class="card-body">
	                    <div class="row no-gutters align-items-center">
							<div class="col mr-2">
	                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Order (Bulanan)</div>
	                        	<div class="h5 mb-0 font-weight-bold text-gray-800">$40,000</div>
	                        </div>
	                        <div class="col-auto">
	                        	<i class="fas fa-jug-detergent fa-2x text-gray-300"></i>
	                    	</div>
	                	</div>
	            	</div>
				</div>
			</div>

			<div class="col-xl-3 col-md-6 mb-4">
	            <div class="card border-left-primary h-100 py-2">
	                <div class="card-body">
	                    <div class="row no-gutters align-items-center">
							<div class="col mr-2">
	                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Order (Semua)</div>
	                        	<div class="h5 mb-0 font-weight-bold text-gray-800">$40,000</div>
	                        </div>
	                        <div class="col-auto">
	                        	<i class="fas fa-jug-detergent fa-2x text-gray-300"></i>
	                    	</div>
	                	</div>
	            	</div>
				</div>
			</div>

			<div class="chart-area mt-0">
	        	<canvas id="orderChart"></canvas>
			</div>
			
		</div>
	</div>
@endsection