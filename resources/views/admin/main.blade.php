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
	            @endcan

	            @can('admin')
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

	            @can('owner')
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
	                                <span class="mr-2 text-gray-600 small">{{ auth()->user()->outlet }}</span>
	                                <i class="fas fa-landmark text-primary fs-5"></i>
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
	</body>
</html>