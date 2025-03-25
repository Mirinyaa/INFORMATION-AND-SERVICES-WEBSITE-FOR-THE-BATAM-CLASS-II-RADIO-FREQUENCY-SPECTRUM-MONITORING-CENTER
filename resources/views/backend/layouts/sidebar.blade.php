				<!-- Sidebar wrapper start -->
				<nav id="sidebar" class="sidebar-wrapper">

					<!-- App brand starts -->
					<div class="app-brand p-4">
						<a href="/dashboard">
							<h4 style="color:white; font-size: 35px; font-weight: bold;" class="ms-4">Balmon</h4>
						</a>
					</div>
					<!-- App brand ends -->

					<!-- Sidebar menu starts -->
					<div class="sidebarMenuScroll">
						<ul class="sidebar-menu">
                            <li class="">
                                <a href="/dashboard">
                                    <i class="bi bi-pie-chart"></i>
                                    <span class="menu-text">Dashboard</span>
                                </a>
                            </li>
							@if(Auth()->user()->role === "admin" || Auth()->user()->role === "superadmin")
							{{-- UNTUK ADMIN DAN SUPER ADMIN --}}
                            <li>
								<a href="/peminjaman_barang">
									<i class="bi bi-slash-square"></i>
									<span class="menu-text">Peminjaman Barang</span>
								</a>
							</li>
							<li>
								<a href="/returned">
									<i class="bi bi-slash-square"></i>
									<span class="menu-text">History Barang Kembali</span>
								</a>
							</li>
							<li>
								<a href="/list-barang">
									<i class="bi bi-window-sidebar"></i>
									<span class="menu-text">List Barang</span>
								</a>
							</li>
							@endif
							@if(Auth()->user()->role === "superadmin")
						    <li class="">
                                <a href="/pegawai">
									<i class="bi bi-person-square"></i>
									<span class="menu-text">Pegawai</span>
								</a>
							</li>
							@endif
							@if(auth()->user()->role === "user")
							<li class="">
                                <a href="/barang">
									<i class="bi bi-code-square"></i>
									<span class="menu-text">List Barang</span>
								</a>
							</li>
							<li class="">
                                <a href="/history-peminjaman-barang">
									<i class="bi bi-box"></i>
									<span class="menu-text">History Peminjaman Barang</span>
								</a>
							</li>
							@endif
								</ul>
							</li>
						</ul>
					</div>
					<!-- Sidebar menu ends -->

				</nav>
				<!-- Sidebar wrapper end -->
