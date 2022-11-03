<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<title>{{ config('app.name', 'Laravel') }} - @yield('title')</title>

	<!-- Fonts -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@100;200;300;400;500;600;700;800&display=swap" rel="stylesheet">

	<!-- Scripts -->
	@vite(['resources/css/app.css'])
	<link rel="stylesheet" href="{{ asset('css/all.min.css') }}">
	<link rel="stylesheet" href="{{ asset('css/datatable.css') }}">
	<link rel="stylesheet" href="{{ asset('css/css-tooltip.min.css') }}">
	<link rel="stylesheet" href="{{ asset('css/prism.css') }}">
	<style>
		html {
			font-size: 16px;
		}
	</style>
	@yield('style')
</head>

<body class="line-numbers bg-slate-50 font-sans antialiased">
	<div class="mx-auto max-w-screen-lg">
		@include('layouts.navbar2')
	</div>
	<main class="mx-auto max-w-screen-lg">
		@yield('content')
	</main>

	{{-- 	@vite(['resources/js/app.js']) --}}
	<script src="{{ asset('js/jquery-3.6.1.min.js') }}"></script>
	<script src="{{ asset('js/prism.js') }}"></script>
	<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
	<script src="https://unpkg.com/flowbite@1.5.3/dist/flowbite.js"></script>
	{{-- 	@include('sweetalert::alert') --}}
	@include('sweetalert::alert', ['cdn' => 'https://cdn.jsdelivr.net/npm/sweetalert2@11'])
	@yield('js-file')
	<script>
		$("#togglesidebar").on("click", function() {
			$("aside").toggle();
		});

		$(".del-cfm").click(function(e) {
			e.preventDefault();
			var x = $(this).closest('tr').find("td:eq(1)").text();
			Swal.fire({
				icon: 'question',
				title: 'ต้องการลบ ' + x + '?',
				showCancelButton: true,
				confirmButtonColor: '#dc3545',
				confirmButtonText: 'ลบ',
				cancelButtonText: 'ยกเลิก'
			}).then((result) => {
				if (result.isConfirmed) {
					$(e.target).closest('form').submit();
				}
			})
		});
	</script>
	@yield('script')
</body>

</html>
