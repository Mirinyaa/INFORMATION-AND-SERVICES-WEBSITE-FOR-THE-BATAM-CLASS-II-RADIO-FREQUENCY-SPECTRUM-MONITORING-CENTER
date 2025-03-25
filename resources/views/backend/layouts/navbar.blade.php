					<!-- App header starts -->
					<div class="app-header d-flex align-items-center">

						<!-- Toggle buttons start -->
						<div class="d-flex">
							<button class="btn btn-outline-primary me-2 toggle-sidebar" id="toggle-sidebar">
								<i class="bi bi-text-indent-left fs-5"></i>
							</button>
							<button class="btn btn-outline-primary me-2 pin-sidebar" id="pin-sidebar">
								<i class="bi bi-text-indent-left fs-5"></i>
							</button>
						</div>
						<!-- Toggle buttons end -->


						<!-- App brand sm start -->
						<div class="app-brand-sm d-md-none d-sm-block">
							<a href="index.html">
								{{-- <img src="/backend/assets/images/logo-sm.svg" class="logo" alt="Bootstrap Gallery"> --}}
							</a>
						</div>
						<!-- App brand sm end -->

						<!-- App header actions start -->
						<div class="header-actions">
							<div class="search-container d-lg-block d-none me-2">
								<!-- Search container start -->
								<form action="@yield('search-engine')" method="get">
									
								<input type="text" id="searchInput" name="search" class="form-control" placeholder="Search" />
								<i class="bi bi-search"></i>
								</form>
								<!-- Search container end -->
							</div>
							<div class="dropdown ms-2">
								<a href="/edit-profile/{{auth()->user()->nama}}" data-bs-toggle="tooltip" data-bs-placement="bottom"
									data-bs-custom-class="custom-tooltip-info" data-bs-title="Settings"
									class="d-flex p-2 border rounded-2">
									<i class="bi bi-gear fs-4 lh-1"></i>
								</a>
							</div>
							<div class="dropdown ms-3">
								<a id="userSettings" class="dropdown-toggle d-flex py-2 align-items-center ps-3 border-start" href="#!"
									role="button" data-bs-toggle="dropdown" aria-expanded="false">
									<span class="d-none d-md-block me-2">{{auth()->user()->nama}}</span>
									
								</a>
								<div class="dropdown-menu dropdown-menu-end shadow">
									<a class="dropdown-item d-flex align-items-center" href="/edit-profile/{{auth()->user()->nama}}"><i
											class="bi bi-gear fs-4 me-2"></i>Account Settings</a>
											<form action="{{route('logout')}}" method="post">
												@csrf
										<button type="submit" class="dropdown-item d-flex align-items-center"><i
											class="bi bi-escape fs-4 me-2"></i>Logout</button>
									</form>
								</div>
							</div>
						</div>
						<!-- App header actions end -->

					</div>
					<!-- App header ends -->

					<!-- App hero header starts -->
					<div class="app-hero-header d-flex align-items-start">

						<!-- Breadcrumb start -->
						<ol class="breadcrumb d-none d-lg-flex align-items-center">
							<li class="breadcrumb-item">
								<i class="bi bi-house"></i>
								<a href="/dashboard">Home</a>
							</li>
							<li class="breadcrumb-item" aria-current="page">@yield('judul')</li>
						</ol>
						<!-- Breadcrumb end -->


					</div>
					<!-- App Hero header ends -->



		