<!DOCTYPE html>
<html lang="en">
<head>
	@include('layouts.includes.styles')
	<title id="title">@yield('title', 'User Dashboard')</title>
</head>

<body> 
	@include('layouts.user.modal')
	<div class="wrapper">
		<nav id="sidebar" class="sidebar">
			<div class="sidebar-content js-simplebar">
				<a class="sidebar-brand" href="#">
					<img class="img-fluid rounded-circle d-block mx-auto" src="{{ handleNullImage(auth()->user()->avatar_thumbnail) }}"  width="110" alt="avatar.svg" />
        		</a>

				<ul class="sidebar-nav" >
					<p class="text-center mb-0
					">
						<small >User </small>
					</p>
					<li class="sidebar-header text-white">
						Pages
					</li>

					<li class="sidebar-item admin_dashboard">
						 <a class="sidebar-link" href="{{ route('user.dashboard.index') }}">
              				<i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboard</span>
           				 </a>
					</li>

					<li class="sidebar-item admin_patient">
						 <a class="sidebar-link" href="{{ route('profile.index') }}">
              				<i class="align-middle" data-feather="user"></i> <span class="align-middle">Profile</span>
           				 </a>
					</li>


					<li class="sidebar-item">
						<a href="#to_dropdown" data-bs-toggle="collapse" class="sidebar-link collapsed">
              				<i class="align-middle" data-feather="users"></i> <span class="align-middle">Sample Dropdown</span>
            			</a>
						<ul id="to_dropdown" class="sidebar-dropdown list-unstyled collapse " data-bs-parent="#sidebar">
							<li class="sidebar-item">
								<a class="sidebar-link" href="#">Dropdown1</a>
							</li>
							<li class="sidebar-item">
								<a class="sidebar-link" href="#">Dropdown2</a>
							</li>
							
						</ul>
					</li>
					
					<li class="sidebar-item">
						<a class="sidebar-link" href="{{ route('user.activity.index') }}">
							<i class="align-middle" data-feather="activity"></i> <span class="align-middle">Activity Logs</span>
						</a>
					</li>

				
		</nav>

		<div class="main">
			<nav class="navbar navbar-expand navbar-light navbar-bg">
				<a class="sidebar-toggle d-flex">
          			<i class="hamburger align-self-center"></i>
        		</a>
{{-- 				
				@if (url()->current() !== route('brgy_admin.dashboard.index'))
					<a href="{{ url()->previous() }}" class="nav-link text-decoration-none text-muted">
						<i class="fas fa-chevron-left me-1"></i> Go to Prev Page 
					</a>
				@endif --}}

				{{--Avatar--}}
				<div class="navbar-collapse collapse">
					<ul class="navbar-nav navbar-align">
						<li class="nav-item dropdown">
							<a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#" data-bs-toggle="dropdown">
                				<i class="align-middle" data-feather="settings"></i>
              				</a>

							<a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-bs-toggle="dropdown">
                				<img src="{{ handleNullImage(auth()->user()->avatar_thumbnail) }}" class="avatar img-fluid rounded me-1" alt="" /> <span class="text-dark">@auth
									{{ Auth::user()->name }}
								@endauth
								</span>
              				</a>
							<div class="dropdown-menu dropdown-menu-end">
								<a class="dropdown-item" href="{{ route('profile.index') }}"><i class="align-middle me-1" data-feather="user"></i> Profile</a>
								<a class="dropdown-item" href="{{ route('logout') }}"
								onclick="event.preventDefault();
											  document.getElementById('logout-form').submit();">
								 {{ __('Logout') }}
							 	</a>

								<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
									@csrf
								</form>
							</div>
						</li>
					</ul>
				</div>
			</nav>

			<main class="content">
				@yield('content')
			</main>

			<footer class="footer">
				<div class="container-fluid">
					<div class="row text-muted">
						<div class="col-6 text-start">
							<p class="mb-0">
								<a href="index.html" class="text-muted"><strong>Sample Test Kit</strong></a> &copy;
							</p>
						</div>
						<div class="col-6 text-end">
							<ul class="list-inline">
								<li class="list-inline-item">
									<a class="text-muted" href="#">Support</a>
								</li>
								<li class="list-inline-item">
									<a class="text-muted" href="#">Help Center</a>
								</li>
								<li class="list-inline-item">
									<a class="text-muted" href="#">Privacy</a>
								</li>
								<li class="list-inline-item">
									<a class="text-muted" href="#">Terms</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</footer>
		</div>
	</div>

	
	@routes
	@include('layouts.includes.scripts')
	<script src="{{ asset('js/user/script.js') }}"></script>
	@yield('script')

</body>

</html>