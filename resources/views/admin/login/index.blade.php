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

		<!-- Main CSS -->
		<link rel="stylesheet" type="text/css" href="/css/admin/login.css">
	</head>
	<body>
		<div class="content">
	    	<div class="container">
		      	<div class="row">

			        <div class="col-md-6">
			          <img src="/img/admin/undraw_remotely_2j6y.svg" alt="Image" class="img-fluid">
			        </div>

			        <div class="col-md-6 contents pt-5">
			          	<div class="row justify-content-center">
			            	<div class="col-md-8">

			              		<div class="mb-4">
			              			<h3 class="fw-bold mb-2">Login</h3>
			              			<p class="mb-4">Tempat Mengolah Seluruh Data Untuk Jasa Usaha Laundry (Star Laundry)</p>
			            		</div>

			            		@if(session()->has('loginError'))
			            			<div class="pb-3 fs-6 fw-bold text-danger">Data Yang Dimasukkan Salah</div>
			            		@endif

			            		<form action="" method="post">
			            		@csrf
			            			<div class="form-floating mb-2">
									  	<input type="text" name="username" id="username" class="form-control @error('username') is-invalid @enderror" placeholder="Username" value="{{ old('username') }}" autofocus="" required="">
									  	<label for="username">Username</label>
									  	@error('username')
								      		<div class="invalid-feedback">
								      			{{ $message }}
								      		</div>
								      	@enderror
									</div>
									<div class="form-floating">
									  	<input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" required="">
									  	<label for="password">Password</label>
									  	@error('password')
								      		<div class="invalid-feedback">
								      			{{ $message }}
								      		</div>
								      	@enderror
									</div>

									<div class="form-check mt-2">
										<input class="form-check-input" type="checkbox" name="remember" id="chinput" value="true" checked>
										<label class="form-check-label" for="chinput">
										    Remember Me
									</div>
									
									<div class="mt-4">
										<button type="submit" class="btn btn-success">Submit</button>
										<a href="/"><button type="button" class="btn btn-primary">Home</button></a>	
									</div>
			            		</form>			            		

			            	</div>
			          	</div>
			        </div>
		        
		      	</div>
		    </div>
	  	</div>
		
		<!-- Vendor JS -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    	<script src="https://kit.fontawesome.com/4c9c83a78a.js" crossorigin="anonymous"></script>

    	<!-- Main JS -->
    	<script type="text/javascript" src="/js/admin/login.js"></script>
	</body>
</html>