<div class="mb-4 flex space-x-2 py-3">
	<nav class="flex grow flex-wrap items-center">
		<a href="/">
			<img src="{{ asset('images/logo.png') }}" class="mr-2 h-12">
		</a>
		<span class="font-bold text-red-800" style="font-size: 20px;"><a href="/">{{ config('app.name', 'Laravel') }}</a></span>

		<button data-collapse-toggle="navbar-default" type="button" class="ml-auto rounded text-gray-500 hover:bg-gray-100 focus:ring-2 focus:ring-gray-200 md:hidden" aria-controls="navbar-default" aria-expanded="false">
			<svg class="h-6 w-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
				<path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path>
			</svg>
		</button>
		<div class="mt-2 hidden w-full md:ml-auto md:block md:w-auto" id="navbar-default">
			<ul class="flex w-full flex-col space-y-2 md:flex-row md:space-y-0">
				{{-- <li><a href="#" class="navlink md:mdnavlink">1</a></li> --}}
				{{-- <li><a href="#" class="navlink md:mdnavlink">1</a></li> --}}
				@if (Auth::guard('social')->check())
					<li class="md:relative">
						<button type="button" class="navlink md:mdnavlink flex w-full items-center" data-collapse-toggle="profile-nav" id="profile-nav-link">
							{{-- <i class="fa-solid fa-circle-user mr-2"></i> --}}
							<img src="{{ Auth::guard('social')->user()->image }}" class="mr-2 h-8 rounded-full">
							{{ Auth::guard('social')->user()->name }}
							<i class="fa-solid fa-caret-down ml-auto md:ml-1"></i>
						</button>
						<div class="z-10 mt-2 hidden w-full rounded bg-white md:absolute md:right-0 md:min-w-[160px] md:border md:shadow-lg" id="profile-nav">
							<ul>
								{{-- <li><a href="{{ route('dashboard') }}" class="navdropdown md:mdnavdropdown"><i class="fa-solid fa-gauge mr-2"></i>Dashboard</a></li>
								<li><a href="{{ route('user.profile.edit') }}" class="navdropdown md:mdnavdropdown"><i class="fa-solid fa-pen mr-2"></i>แก้ไขข้อมูล</a></li>
								<li><a href="{{ route('user.profile.pass') }}" class="navdropdown md:mdnavdropdown"><i class="fa-solid fa-key mr-2"></i>เปลี่ยนรหัสผ่าน</a></li> --}}
								<li>
									<form method="POST" action="{{ route('social.logout') }}">
										@csrf
										<button type="submit" class="navdropdown md:mdnavdropdown w-full"><i class="fa-solid fa-right-from-bracket mr-2"></i>ออกจากระบบ</button>
									</form>
								</li>
							</ul>
						</div>
					</li>
				@else
					<li class="md:relative">
						<button type="button" class="navlink md:mdnavlink flex w-full items-center" data-collapse-toggle="signin-nav" id="profile-nav-link">
							<i class="fa-solid fa-user-lock mr-2"></i> เข้าสู่ระบบ
							<i class="fa-solid fa-caret-down ml-auto md:ml-1"></i>
						</button>
						<div class="z-10 mt-2 hidden w-full rounded bg-white md:absolute md:right-0 md:min-w-[200px] md:border md:shadow-lg" id="signin-nav">
							<ul>
								{{-- <li><a href="{{ route('dashboard') }}" class="navdropdown md:mdnavdropdown"><i class="fa-solid fa-gauge mr-2"></i>Dashboard</a></li>
							<li><a href="{{ route('user.profile.edit') }}" class="navdropdown md:mdnavdropdown"><i class="fa-solid fa-pen mr-2"></i>แก้ไขข้อมูล</a></li>
							<li><a href="{{ route('user.profile.pass') }}" class="navdropdown md:mdnavdropdown"><i class="fa-solid fa-key mr-2"></i>เปลี่ยนรหัสผ่าน</a></li> --}}
								<li>
									<a href="{{ route('login.redirect', 'google') }}" class="dark:focus:ring-[#DD4B39]/55 mr-2 mb-2 inline-flex w-full items-center rounded-lg bg-[#DD4B39] px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-[#DD4B39]/90 focus:outline-none focus:ring-4 focus:ring-[#DD4B39]/50">
										<i class="fa-brands fa-google mr-2 -ml-1"></i>
										Sign in with Google
									</a>
								</li>
								<li>
									<a href="{{ route('login.redirect', 'facebook') }}" class="dark:focus:ring-[#3b5998]/55 mr-2 mb-2 inline-flex w-full items-center rounded-lg bg-[#3b5998] px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-[#3b5998]/90 focus:outline-none focus:ring-4 focus:ring-[#3b5998]/50">
										<i class="fa-brands fa-facebook-f mr-2 -ml-1"></i>
										Sign in with Facebook
									</a>
								</li>
								{{-- 								<li>
									<a href="{{ route('login.redirect', 'twitter') }}" class="dark:focus:ring-[#1da1f2]/55 mr-2 mb-2 inline-flex w-full items-center rounded-lg bg-[#1da1f2] px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-[#1da1f2]/90 focus:outline-none focus:ring-4 focus:ring-[#1da1f2]/50">
										<i class="fa-brands fa-twitter mr-2 -ml-1"></i>
										Sign in with Twitter
									</a>
								</li> --}}
								<li>
									<a href="{{ route('login.redirect', 'github') }}" class="mr-2 mb-2 inline-flex w-full items-center rounded-lg bg-[#24292F] px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-[#24292F]/90 focus:outline-none focus:ring-4 focus:ring-[#24292F]/50 dark:hover:bg-[#050708]/30 dark:focus:ring-gray-500">
										<i class="fa-brands fa-github mr-2 -ml-1"></i>
										Sign in with Github
									</a>
								</li>
							</ul>
						</div>
					</li>

					{{-- 	<li><a href="{{ route('login') }}" class="navlink md:mdnavlink">เข้าสู่ระบบ</a></li> --}}
				@endif

				@if (Auth::guard('web')->check())
					<li class="md:relative">
						<button type="button" class="navlink md:mdnavlink flex w-full items-center" data-collapse-toggle="profile-nav" id="profile-nav-link">
							<i class="fa-solid fa-circle-user mr-2"></i>
							{{ Auth::guard('web')->user()->name }}
							<i class="fa-solid fa-caret-down ml-auto md:ml-1"></i>
						</button>
						<div class="z-10 mt-2 hidden w-full rounded bg-white md:absolute md:right-0 md:min-w-[160px] md:border md:shadow-lg" id="profile-nav">
							<ul>
								<li><a href="{{ route('user.profile.edit') }}" class="navdropdown md:mdnavdropdown"><i class="fa-solid fa-pen mr-2"></i>แก้ไขข้อมูล</a></li>
								<li><a href="{{ route('user.profile.pass') }}" class="navdropdown md:mdnavdropdown"><i class="fa-solid fa-key mr-2"></i>เปลี่ยนรหัสผ่าน</a></li>
								<li>
									<form method="POST" action="{{ route('logout') }}">
										@csrf
										<button type="submit" class="navdropdown md:mdnavdropdown w-full"><i class="fa-solid fa-right-from-bracket mr-2"></i>ออกจากระบบ</button>
									</form>
								</li>
							</ul>
						</div>
					</li>
				@endif
			</ul>
		</div>
	</nav>
</div>
