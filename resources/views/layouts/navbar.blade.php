<div class="mb-4 flex space-x-2 bg-white p-3 shadow-md">
	<button type="button" id="togglesidebar" class="text-gray-300 hover:text-gray-400">
		<i class="fa-solid fa-sliders"></i>
	</button>

	<nav class="container flex flex-wrap items-center">
		<img src="{{ asset('images/logo.png') }}" class="mr-2 h-6">
		<span class="font-bold text-red-800">{{ config('app.name', 'Laravel') }}</span>
		<button data-collapse-toggle="navbar-default" type="button" class="ml-auto rounded text-gray-500 hover:bg-gray-100 focus:ring-2 focus:ring-gray-200 md:hidden" aria-controls="navbar-default" aria-expanded="false">
			<svg class="h-6 w-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
				<path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path>
			</svg>
		</button>
		<div class="mt-2 hidden w-full md:ml-auto md:block md:w-auto" id="navbar-default">
			<ul class="flex w-full flex-col space-y-2 md:flex-row md:space-y-0">
				{{-- <li><a href="#" class="navlink md:mdnavlink">1</a></li> --}}
				{{-- <li><a href="#" class="navlink md:mdnavlink">1</a></li> --}}
				<li class="md:relative">
					<button type="button" class="navlink md:mdnavlink flex w-full items-center" data-collapse-toggle="profile-nav" id="profile-nav-link">
						<i class="fa-solid fa-circle-user mr-2"></i>
						{{ Auth::user()->name }}
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
			</ul>
		</div>
	</nav>
</div>
