<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
	  	<meta content="width=device-width, initial-scale=1.0" name="viewport">
	  	<meta content="" name="description">
	  	<meta content="" name="keywords">

	  	<title>STAR LAUNDRY</title>

	  	<!-- Favicons -->
	  	<link href="" rel="icon">
	  	<link href="" rel="apple-touch-icon">

	  	<!-- Vendor CSS -->
	  	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
	  	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
	  	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.3.4/sweetalert2.min.css" integrity="sha512-jtQXcnq6H9BVx+dOsdudNCZmNe2hBMqcPpnVgeZcV9L3615F4+QMQebbWW9TV2otOSk/kQgum0MpWefB3uL3pg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	  	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/venobox/1.9.3/venobox.min.css" integrity="sha512-e+0yqAgUQFoRrJ4pZigQXpOE0S7J9IGwmgH801h4H5ODqOCG8/GRfXHQ+9ab754NL79O7wDwdjwY3CcU8sEANg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

		<!-- Main CSS -->
		<link rel="stylesheet" type="text/css" href="/css/admin/template.css">
		<link rel="stylesheet" type="text/css" href="/css/admin/admin.css">
	</head>
	<body id="page-top">

	    <!-- Page Wrapper -->
	    <div id="wrapper">

	        <!-- Sidebar -->
	        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

	            <!-- Sidebar - Brand -->
	            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/admin">
	                <div class="sidebar-brand-icon rotate-n-15">
	                    <i class="fas fa-star"></i>
	                </div>
	                <div class="sidebar-brand-text mx-3">LAUNDRY</div>
	            </a>

	            <!-- Divider -->
	            <hr class="sidebar-divider my-0">

	            <!-- Nav Item - Dashboard -->
	            <li class="nav-item {{ Request::is('admin') ? 'active' : '' }}">
	                <a class="nav-link" href="/admin">
	                    <i class="fab fa-squarespace"></i>
	                    <span>Dashboard</span>
	                </a>
	            </li>

	            <!-- Divider -->
	            <hr class="sidebar-divider">

	            <!-- Heading -->
	            <div class="sidebar-heading">
	                ORDERS
	            </div>

				@can('staf')
	            <li class="nav-item {{ Request::is('admin/order/create') ? 'active' : '' }}">
                	<a class="nav-link" href="/admin/order/create">
                    <i class="fas fa-download"></i>
                    <span>New Order</span></a>
            	</li>

            	<!-- Nav Item - Order -->
	            <li class="nav-item {{ Request::is('admin/order*') ? 'active' : '' }}">
	                <a class="nav-link collapsed" data-bs-toggle="collapse" data-toggle="collapse" href="#collapseOrder" role="button" aria-expanded="true" aria-controls="collapseOrder">
	                	<i class="fas fa-tasks"></i>
	                    <span>Order</span>
	                </a>

	                <div id="collapseOrder" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
	                    <div class="bg-white py-2 collapse-inner rounded">
	                        <h6 class="collapse-header">Order Action:</h6>
	                        <a class="collapse-item" href="/admin/order">Order</a>
	                        <a class="collapse-item" href="/admin/order/list">List Order</a>
	                        <a class="collapse-item" href="/admin/order/progress">Progress Order</a>
	                        <a class="collapse-item" href="/admin/order/ready">Ready Order</a>
	                    </div>
	                </div>
	            </li>
	            @endcan

            	<li class="nav-item {{ Request::is('admin/order/done') ? 'active' : '' }}">
                	<a class="nav-link" href="/admin/order/done">
                    <i class="fas fa-paperclip"></i>
                    <span>Order Done</span></a>
            	</li>

            	<li class="nav-item {{ Request::is('admin/order/cancel') ? 'active' : '' }}">
                	<a class="nav-link" href="/admin/order/cancel">
                    <i class="fas fa-calendar-times"></i>
                    <span>Order Cancel</span></a>
            	</li>
            	
	            <!-- Divider -->
	            <hr class="sidebar-divider">

	            <!-- Heading -->
	            <div class="sidebar-heading">
	                MASTER DATA
	            </div>

	            <!-- Nav Item - Member -->
	            <li class="nav-item {{ Request::is('admin/member*') ? 'active' : '' }}">
	                <a class="nav-link collapsed" data-bs-toggle="collapse" data-toggle="collapse" href="#collapseMember" role="button" aria-expanded="true" aria-controls="collapseMember">
	                	<i class="fas fa-users"></i>
	                    <span>Member</span>
	                </a>

	                <div id="collapseMember" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
	                    <div class="bg-white py-2 collapse-inner rounded">
	                        <h6 class="collapse-header">Member Action:</h6>
	                        <a class="collapse-item" href="/admin/member">View</a>
	                        <a class="collapse-item" href="/admin/member/create">Create</a>
	                    </div>
	                </div>
	            </li>

            	@can('owner')
	            <!-- Nav Item - Barang -->
	            <li class="nav-item {{ Request::is('admin/barang*') ? 'active' : '' }}">
	                <a class="nav-link collapsed" data-bs-toggle="collapse" data-toggle="collapse" href="#collapseBarang" role="button" aria-expanded="true" aria-controls="collapseBarang">
	                	<i class="fas fa-cubes"></i>
	                    <span>Barang</span>
	                </a>

	                <div id="collapseBarang" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
	                    <div class="bg-white py-2 collapse-inner rounded">
	                        <h6 class="collapse-header">Barang Action:</h6>
	                        <a class="collapse-item" href="/admin/barang">View</a>
	                        <a class="collapse-item" href="/admin/barang/create">Create</a>
	                    </div>
	                </div>
	            </li>

	            <!-- Nav Item - Discount -->
	            <li class="nav-item {{ Request::is('admin/discount*') ? 'active' : '' }}">
	                <a class="nav-link collapsed" data-bs-toggle="collapse" data-toggle="collapse" href="#collapseDiscount" role="button" aria-expanded="true" aria-controls="collapseDiscount">
	                	<i class="fas fa-coins"></i>
	                    <span>Discount</span>
	                </a>

	                <div id="collapseDiscount" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
	                    <div class="bg-white py-2 collapse-inner rounded">
	                        <h6 class="collapse-header">Discount Action:</h6>
	                        <a class="collapse-item" href="/admin/discount">View</a>
	                        <a class="collapse-item" href="/admin/discount/create">Create</a>
	                    </div>
	                </div>
	            </li>
	            @endcan

	            @can('admin')
	            <!-- Nav Item - Outlet -->
	            <li class="nav-item {{ Request::is('admin/outlet*') ? 'active' : '' }}">
	                <a class="nav-link collapsed" data-bs-toggle="collapse" data-toggle="collapse" href="#collapseOutlet" role="button" aria-expanded="true" aria-controls="collapseOutlet">
	                	<i class="fas fa-landmark"></i>
	                    <span>Outlet</span>
	                </a>

	                <div id="collapseOutlet" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
	                    <div class="bg-white py-2 collapse-inner rounded">
	                        <h6 class="collapse-header">Outlet Action:</h6>
	                        <a class="collapse-item" href="/admin/outlet">View</a>
	                        <a class="collapse-item" href="/admin/outlet/create">Create</a>
	                    </div>
	                </div>
	            </li>
	            
	            <!-- Divider -->
	            <hr class="sidebar-divider">

	            <!-- Heading -->
	            <div class="sidebar-heading">
	                CONTENT
	            </div>

	            <!-- Nav Item - Member -->
	            <li class="nav-item {{ Request::is('admin/topbar') ? 'active' : '' }} {{ Request::is('admin/hero') ? 'active' : '' }} {{ Request::is('admin/about') ? 'active' : '' }} {{ Request::is('admin/testimoni') ? 'active' : '' }} {{ Request::is('admin/contact') ? 'active' : '' }} {{ Request::is('admin/message') ? 'active' : '' }}">
	                <a class="nav-link collapsed" data-bs-toggle="collapse" data-toggle="collapse" href="#collapseWeb" role="button" aria-expanded="true" aria-controls="collapseWeb">
	                	<i class="fas fa-cloud"></i>
	                    <span>Web</span>
	                </a>

	                <div id="collapseWeb" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
	                    <div class="bg-white py-2 collapse-inner rounded">
	                        <h6 class="collapse-header">Web Action:</h6>
	                        <a class="collapse-item" href="/admin/topbar">Topbar</a>
	                        <a class="collapse-item" href="/admin/hero">Hero</a>
	                        <a class="collapse-item" href="/admin/about">About</a>
	                        <a class="collapse-item" href="/admin/testimoni">Testimoni</a>
	                        <a class="collapse-item" href="/admin/contact">Contact</a>
	                        <a class="collapse-item" href="/admin/message">Message</a>
	                    </div>
	                </div>
	            </li>
	            @endcan

	            <!-- Divider -->
	            <hr class="sidebar-divider">

	            <!-- Heading -->
	            <div class="sidebar-heading">
	                ACCOUNT
	            </div>

	            @can('admin')
	            <!-- Nav Item - User -->
	            <li class="nav-item {{ Request::is('admin/user*') ? 'active' : '' }}">
	                <a class="nav-link collapsed" data-bs-toggle="collapse" data-toggle="collapse" href="#collapseUser" role="button" aria-expanded="true" aria-controls="collapseUser">
	                	<i class="fas fa-user-cog"></i>
	                    <span>User App</span>
	                </a>

	                <div id="collapseUser" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
	                    <div class="bg-white py-2 collapse-inner rounded">
	                        <h6 class="collapse-header">User Action:</h6>
	                        <a class="collapse-item" href="/admin/user">View</a>
	                        <a class="collapse-item" href="/admin/user/create">Create</a>
	                    </div>
	                </div>
	            </li>
	            @endcan

	            <!-- Nav Item - Logout -->
	            <form action="/admin/logout" method="post" class="nav-item" id="logoutform">
				@csrf
		            <button type="button" class="nav-logout nav-link border-0" >
		            	<i class="fas fa-sign-out-alt"></i>
		                <span> Log Out</span>
		            </button>
		        </form>

	            <!-- Sidebar Toggler (Sidebar) -->
	            <div class="text-center d-none d-md-inline mt-4 pb-5">
	                <button class="rounded-circle border-0" id="sidebarToggle"></button>
	            </div>

	        </ul>
	        <!-- End of Sidebar -->

	        <!-- Content Wrapper -->
	        <div id="content-wrapper" class="d-flex flex-column">

	            <!-- Main Content -->
	            <div id="content">

	                <!-- Topbar -->
	                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

	                    <!-- Sidebar Toggle (Topbar) -->
	                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
	                        <i class="fa fa-bars"></i>
	                    </button>

	                    <!-- Topbar Navbar -->
	                    <ul class="navbar-nav ml-auto">

	                        <div class="topbar-divider"></div>

	                        <!-- Nav Item - User Information -->
	                        <li class="nav-item dropdown no-arrow">
	                            <a class="nav-link dropdown-toggle disabled">
	                                <span class="mr-2 fw-bold small text-dark">{{ auth()->user()->outlet->name }}</span>
	                                <i class="fas fa-landmark fs-5 text-dark"></i>
	                            </a>
	                        </li>

	                    </ul>

	                </nav>
	                <!-- End of Topbar -->

	                <!-- Begin Page Content -->
	                <div class="container-fluid">
	                	@yield('container')
	                </div>
	                <!-- /.container-fluid -->

	            </div>
	            <!-- End of Main Content -->

	            <!-- Footer -->
	            <footer class="sticky-footer bg-white">
	                <div class="container my-auto">
	                    <div class="copyright text-center my-auto">
	                        <span>Copyright &copy; STAR LAUNDRY</span>
	                    </div>
	                </div>
	            </footer>
	            <!-- End of Footer -->

	        </div>
	        <!-- End of Content Wrapper -->

	    </div>
	    <!-- End of Page Wrapper -->

	    <!-- Scroll to Top Button-->
	    <a class="scroll-to-top rounded" href="#page-top">
	        <i class="fas fa-angle-up"></i>
	    </a>	    	

		<!-- Vendor JS -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js" integrity="sha512-0QbL0ph8Tc8g5bLhfVzSqxe9GERORsKhIn1IrpxDAgUsbBGz/V7iSav2zzW325XGd1OMLdL4UiqRJj702IeqnQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    	<script src="https://kit.fontawesome.com/4c9c83a78a.js" crossorigin="anonymous"></script>
    	<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.3.4/sweetalert2.min.js" integrity="sha512-GDiDlK2vvO6nYcNorLUit0DSRvcfd7Vc0VRg7e3PuZcsTwQrJQKp5hf8bCaad+BNoBq7YMH6QwWLPQO3Xln0og=="crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    	<script src="https://cdnjs.cloudflare.com/ajax/libs/venobox/1.9.3/venobox.min.js" integrity="sha512-zBTnX97k269iewUwROiWwO82A6uXO4lcjq0Z4xnvO+qAblC/RMQRUu8fQVKtSFhPNKD5Xzh9PMoZG7+LnmH1Hg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    	<!-- Main JS -->
    	<script type="text/javascript" src="/js/admin/template.js"></script>
    	<script type="text/javascript" src="/js/admin/admin.js"></script>
    	<script type="text/javascript" src="/js/admin/chart.min.js"></script>
 
    	@if(session()->has('success'))
			<script type="text/javascript">
				Swal.fire(
				  	'SUCCESS!',
				  	'{{ session('success') }}',
				  	'success'
				)
			</script>
		@endif

		@if(session()->has('error'))
			<script type="text/javascript">
				Swal.fire(
				  	'ERROR!',
				  	'{{ session('error') }}',
				  	'error'
				)
			</script>
		@endif

		@if(Request::is('admin'))

		<script type="text/javascript">
			Chart.defaults.global.defaultFontColor = '#858796';

			function number_format(number, decimals, dec_point, thousands_sep) {
			  // *     example: number_format(1234.56, 2, ',', ' ');
			  // *     return: '1 234,56'
			  number = (number + '').replace(',', '').replace(' ', '');
			  var n = !isFinite(+number) ? 0 : +number,
			    prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
			    sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
			    dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
			    s = '',
			    toFixedFix = function(n, prec) {
			      var k = Math.pow(10, prec);
			      return '' + Math.round(n * k) / k;
			    };
			  // Fix for IE parseFloat(0.55).toFixed(0) = 0;
			  s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
			  if (s[0].length > 3) {
			    s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
			  }
			  if ((s[1] || '').length < prec) {
			    s[1] = s[1] || '';
			    s[1] += new Array(prec - s[1].length + 1).join('0');
			  }
			  return s.join(dec);
			}

			@can('owner')
			// Area Chart Example
			var ctx = document.getElementById("pendapatanChart");
			var myLineChart = new Chart(ctx, {
			  type: 'line',
			  data: {
			    labels: ["Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu"],
			    datasets: [{
			      label: "Pendapatan",
			      lineTension: 0.3,
			      backgroundColor: "rgba(78, 115, 223, 0.05)",
			      borderColor: "rgba(78, 115, 223, 1)",
			      pointRadius: 3,
			      pointBackgroundColor: "rgba(78, 115, 223, 1)",
			      pointBorderColor: "rgba(78, 115, 223, 1)",
			      pointHoverRadius: 3,
			      pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
			      pointHoverBorderColor: "rgba(78, 115, 223, 1)",
			      pointHitRadius: 10,
			      pointBorderWidth: 2,
			      data: [
			      	@if($pendapatanWeeks)
				      @foreach($pendapatanWeeks as $pendapatan)
				      {{ $pendapatan }},
				      @endforeach,
				    @else
				      0
			      	@endif
			      	]
			    }],
			  },
			  options: {
			    maintainAspectRatio: false,
			    layout: {
			      padding: {
			        left: 10,
			        right: 25,
			        top: 25,
			        bottom: 0
			      }
			    },
			    scales: {
			      xAxes: [{
			        time: {
			          unit: 'date'
			        },
			        gridLines: {
			          display: false,
			          drawBorder: false
			        },
			        ticks: {
			          maxTicksLimit: 7
			        }
			      }],
			      yAxes: [{
			        ticks: {
			          maxTicksLimit: 5,
			          padding: 10,
			          // Include a dollar sign in the ticks
			          callback: function(value, index, values) {
			            return 'Rp ' + number_format(value);
			          }
			        },
			        gridLines: {
			          color: "rgb(234, 236, 244)",
			          zeroLineColor: "rgb(234, 236, 244)",
			          drawBorder: false,
			          borderDash: [2],
			          zeroLineBorderDash: [2]
			        }
			      }],
			    },
			    legend: {
			      display: false
			    },
			    tooltips: {
			      backgroundColor: "rgb(255,255,255)",
			      bodyFontColor: "#858796",
			      titleMarginBottom: 10,
			      titleFontColor: '#6e707e',
			      titleFontSize: 14,
			      borderColor: '#dddfeb',
			      borderWidth: 1,
			      xPadding: 15,
			      yPadding: 15,
			      displayColors: false,
			      intersect: false,
			      mode: 'index',
			      caretPadding: 10,
			      callbacks: {
			        label: function(tooltipItem, chart) {
			          var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
			          return datasetLabel + ': Rp ' + number_format(tooltipItem.yLabel);
			        }
			      }
			    }
			  }
			});
			@endcan

			var ctx = document.getElementById("orderChart");
			var myLineChart = new Chart(ctx, {
			  type: 'line',
			  data: {
			    labels: ["Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu"],
			    datasets: [{
			      label: "Order",
			      lineTension: 0.3,
			      backgroundColor: "rgba(78, 115, 223, 0.05)",
			      borderColor: "rgba(78, 115, 223, 1)",
			      pointRadius: 3,
			      pointBackgroundColor: "rgba(78, 115, 223, 1)",
			      pointBorderColor: "rgba(78, 115, 223, 1)",
			      pointHoverRadius: 3,
			      pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
			      pointHoverBorderColor: "rgba(78, 115, 223, 1)",
			      pointHitRadius: 10,
			      pointBorderWidth: 2,
			      data: [
			      	@if($orderWeeks)
			      		@foreach($orderWeeks as $order)
			      			{{ $order }},
			      		@endforeach
			      	@else
			        	0
			        
			        @endif
			        ]
			    }],
			  },
			  options: {
			    maintainAspectRatio: false,
			    layout: {
			      padding: {
			        left: 10,
			        right: 25,
			        top: 25,
			        bottom: 0
			      }
			    },
			    scales: {
			      xAxes: [{
			        time: {
			          unit: 'date'
			        },
			        gridLines: {
			          display: false,
			          drawBorder: false
			        },
			        ticks: {
			          maxTicksLimit: 7
			        }
			      }],
			      yAxes: [{
			        ticks: {
			          maxTicksLimit: 5,
			          padding: 10,
			          // Include a dollar sign in the ticks
			          callback: function(value, index, values) {
			            return number_format(value) + ' Order';
			          }
			        },
			        gridLines: {
			          color: "rgb(234, 236, 244)",
			          zeroLineColor: "rgb(234, 236, 244)",
			          drawBorder: false,
			          borderDash: [2],
			          zeroLineBorderDash: [2]
			        }
			      }],
			    },
			    legend: {
			      display: false
			    },
			    tooltips: {
			      backgroundColor: "rgb(255,255,255)",
			      bodyFontColor: "#858796",
			      titleMarginBottom: 10,
			      titleFontColor: '#6e707e',
			      titleFontSize: 14,
			      borderColor: '#dddfeb',
			      borderWidth: 1,
			      xPadding: 15,
			      yPadding: 15,
			      displayColors: false,
			      intersect: false,
			      mode: 'index',
			      caretPadding: 10,
			      callbacks: {
			        label: function(tooltipItem, chart) {
			          var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
			          return datasetLabel + " : " +number_format(tooltipItem.yLabel);
			        }
			      }
			    }
			  }
			});
		</script>
		@endif

		@if(Request::is('admin/order/create'))
		<script type="text/javascript">
			$('.btn-barang').on('click', function(){
				var newRow = `
				<div class="row">			    		

					<div class="input-box col-md-6">
						<div class="form-floating mb-3">
							<select class="form-select border-left-primary" name="barang[]" required="">
								<option value="0">None</option>
								@foreach ($barangs as $barang)
									@if(old('barang_id') == $barang->id)
										<option value="{{ $barang->id }}" selected="">{{ $barang->name }}</option>
									@else
										<option value="{{ $barang->id }}">{{ $barang->name }}</option>
									@endif
								@endforeach
							</select>
							<label for="type">Barang</label>
						</div>
					</div>		

					<div class="input-box col-md-6 pb-lg-0">
						<div class="form-floating mb-3">
							<input type="text" name="jumlah[]" id="jumlah" required="" class="form-control @error('jumlah') is-invalid @enderror border-left-primary" value="{{ old('jumlah') }}" placeholder="jumlah">
							<label for="jumlah">Jumlah</label>
								@error('jumlah')
								<div class="invalid-feedback">
									{{ $message }}
								</div>
								@enderror
						</div>
					</div>

				</div>
				`;
				$(newRow).appendTo("#barang");
			});
		</script>
		@endif
	</body>
</html>