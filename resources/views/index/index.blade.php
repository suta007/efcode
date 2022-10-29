@extends('layouts.home')
@section('title', 'หน้าแรก')
@php
	
	$datas = App\Models\Post::all();
	//$datas = App\Models\Post::search('vun')->paginate(6);
	//dd($datas);
@endphp
@section('content')
	@foreach ($datas as $item)
		<a href="{{ route('acticle', $item->slug) }}">{{ $item->name }}</a><br>
	@endforeach

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
@endsection
