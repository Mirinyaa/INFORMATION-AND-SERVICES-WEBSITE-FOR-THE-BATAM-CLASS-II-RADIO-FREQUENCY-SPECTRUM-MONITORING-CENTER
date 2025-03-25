<head>
	@include('backend/layouts/header')
	
</head>
<form action="{{route('login')}}" method="post">
@csrf
<body class="bg-secondary">
	<!-- Container start -->
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-xxl-4 col-xl-4 col-lg-5 col-md-6 col-sm-6 col-12 mt-auto">
				<form action="index.html" class="my-5">
					<div class="border border-light rounded-2 p-4 mt-5 bg-light">
						<div class="login-form ">
							<a href="index.html" class="mb-4 d-flex">
							</a>
							<h4 class="fw-semibold mb-4 text-center">Login</h4>
							<div class="mb-3">
								<label class="form-label">Email</label>
								<input type="text" name="email" class="form-control" value="{{old('email')}}" placeholder="Enter your email" required/>
								@error('email')
									<div class="text-danger">
										{{$message}}
									</div>
								@enderror
							</div>
							<div class="mb-3">
								<label class="form-label">Password</label>
								<div class="input-group">
									<input type="password" name="password" class="form-control" placeholder="Enter password" required />
									<a href="#" class="input-group-text">
										<i class="bi bi-eye"></i>
									</a>
								</div>
							</div>
							<div class="d-grid py-3 mt-2">
								<button type="submit" class="btn btn-lg btn-primary">
									Login
								</button>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- Container end -->
</body>
</form>





