<aside class="hidden w-60 overflow-y-auto bg-white py-4 px-3 shadow-md md:block" aria-label="Sidebar">
	<ul class="space-y-2">
		<li class="flex items-center border-b pb-4">
			<img src="{{ asset('images/logo.png') }}" class="mr-2 h-10">
			<span class="text-xl font-bold text-red-800">{{ config('app.name', 'Laravel') }}</span>
		</li>
		<li><a href="{{ url('/dashboard') }}" class="sidelink"><i class="fa-solid fa-gauge mr-2"></i>Dashboard</a></li>
		<li>
			<button aria-controls="menux" data-collapse-toggle="menux" type="button" class="sidelink w-full">
				<i class="fa-solid fa-user-secret mr-2"></i>
				ผู้ดูแลระบบ <i class="fa-solid fa-caret-down ml-auto items-center"></i>
			</button>
			<ul class="mt-2 hidden space-y-2" id="menux">
				<li><a href="#" class="sidelink pl-4"> aaa </a></li>
				<li><a href="#" class="sidelink pl-4"> bbb </a></li>
			</ul>
		</li>
		{{-- <li><a href="#" class="sidelink">Dashboard</a></li> --}}
	</ul>
</aside>
