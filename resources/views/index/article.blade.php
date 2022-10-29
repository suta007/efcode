@extends('layouts.home')
@section('title', 'หน้าแรก')
@section('content')
	<div class="grid grid-cols-4 gap-4">
		<div class="col-span-full md:col-span-3">
			<div class="mb-4">
				<nav class="flex" aria-label="Breadcrumb">
					<ol class="inline-flex items-center space-x-1 md:space-x-3">
						<li class="inline-flex items-center">
							<a href="/" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-web-700">
								<i class="fa-solid fa-house mr-2"></i>
								หน้าแรก
							</a>
						</li>
						<li>
							<div class="flex items-center">
								<i class="fa-solid fa-angle-right mr-2 text-sm text-gray-400" style="-webkit-text-stroke: 1px;"></i>
								<a href="{{ route('category', $data->cate->slug) }}" class="ml-1 inline-flex items-center text-sm font-medium text-gray-700 hover:text-web-700">{{ $data->cate->name }}</a>
							</div>
						</li>
						<li aria-current="page">
							<div class="flex items-center">
								<i class="fa-solid fa-angle-right mr-2 text-sm text-gray-400" style="-webkit-text-stroke: 1px;"></i>
								<span class="ml-1 text-sm font-medium text-gray-500 dark:text-gray-400">{{ $data->name }}</span>
							</div>
						</li>
					</ol>
				</nav>
			</div>

			<div class="mb-2 text-lg font-bold text-web-900">
				{{ $data->name }}
			</div>
			<div class="text-md mb-4 text-gray-700">
				ผู้เขียน : {{ $data->user->name }}<br />
				เผยแพร่เมื่อ : {{ FullThaiDate($data->created_at) }}
				ปรับปรุงเมื่อ : {{ FullThaiDate($data->updated_at) }}<br />
				ลิงก์ : {{ urldecode(url()->full()) }}
			</div>
			<div>
				{!! $data->content !!}
			</div>

			<div class="tag mt-4">
				@foreach ($data->tags as $tag)
					<a href="{{ route('tag', $tag->slug) }}" class="mr-3"><i class="fa-solid fa-tag mr-1"></i>{{ $tag->name }}</a>
				@endforeach
			</div>

			<div>
				<a href="{{ route('login.redirect', 'google') }}" class="dark:focus:ring-[#DD4B39]/55 mr-2 mb-2 inline-flex items-center rounded-lg bg-[#DD4B39] px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-[#DD4B39]/90 focus:outline-none focus:ring-4 focus:ring-[#DD4B39]/50">
					<i class="fa-brands fa-google mr-2 -ml-1"></i>
					Sign in with Google
				</a>

				<a href="{{ route('login.redirect', 'facebook') }}" class="dark:focus:ring-[#3b5998]/55 mr-2 mb-2 inline-flex items-center rounded-lg bg-[#3b5998] px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-[#3b5998]/90 focus:outline-none focus:ring-4 focus:ring-[#3b5998]/50">
					<i class="fa-brands fa-facebook-f mr-2 -ml-1"></i>
					Sign in with Facebook
				</a>
				<a href="{{ route('login.redirect', 'twitter') }}" class="dark:focus:ring-[#1da1f2]/55 mr-2 mb-2 inline-flex items-center rounded-lg bg-[#1da1f2] px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-[#1da1f2]/90 focus:outline-none focus:ring-4 focus:ring-[#1da1f2]/50">
					<i class="fa-brands fa-twitter mr-2 -ml-1"></i>
					Sign in with Twitter
				</a>
				<a href="{{ route('login.redirect', 'github') }}" class="mr-2 mb-2 inline-flex items-center rounded-lg bg-[#24292F] px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-[#24292F]/90 focus:outline-none focus:ring-4 focus:ring-[#24292F]/50 dark:hover:bg-[#050708]/30 dark:focus:ring-gray-500">
					<i class="fa-brands fa-github mr-2 -ml-1"></i>
					Sign in with Github
				</a>

			</div>

		</div>
		<div class="col-span-full md:col-span-1">
			ccc
		</div>

	</div>
@endsection
