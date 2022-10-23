<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<title>{{ config('app.name', 'Laravel') }}</title>

	<!-- Fonts -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@100;200;300;400;500;600;700;800&display=swap" rel="stylesheet">

	<!-- Scripts -->
	@vite(['resources/css/app.css'])
	<link rel="stylesheet" href="{{ asset('css/all.min.css') }}">
	<link rel="stylesheet" href="{{ asset('css/datatable.css') }}">
	<link rel="stylesheet" href="{{ asset('css/css-tooltip.min.css') }}">
	<style>
		html {
			font-size: 14px;
		}
	</style>
</head>

<body class="bg-slate-50 font-sans antialiased">
	<div class="flex min-h-screen">
		@include('layouts.sidebar')
		<main class="ml-2 grow">
			@include('layouts.navbar')
			@yield('content')
		</main>
	</div>
	@vite(['resources/js/app.js'])
	<script src="https://unpkg.com/flowbite@1.5.3/dist/flowbite.js"></script>
	{{-- 	@include('sweetalert::alert') --}}
	@include('sweetalert::alert', ['cdn' => 'https://cdn.jsdelivr.net/npm/sweetalert2@11'])
	@yield('js-file')
	<script type="module">
			$("#togglesidebar").on("click", function () {
				$("aside").toggle();
			});
	</script>
	@yield('script')
</body>

</html>
