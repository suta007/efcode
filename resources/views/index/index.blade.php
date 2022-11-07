@extends('layouts.home')
@section('title', 'หน้าแรก')
@php
	
	//$datas = App\Models\Post::all();
	//$datas = App\Models\Post::search('vun')->paginate(6);
	//dd($datas);
@endphp
@section('content')
	<div class="grid grid-cols-1 gap-4 p-2 sm:grid-cols-2 sm:p-4 md:grid-cols-3">
		@foreach ($datas as $item)
			<div class="inline-block min-h-[400px] rounded-lg bg-white p-4 shadow hover:p-2">
				<a href="{{ route('acticle', $item->slug) }}">
					<div>
						<img src="{{ asset($item->picture) }}" class="rounded">
					</div>
					<div class="mt-2 flex justify-center font-bold">
						{{ $item->name }}
					</div>

					<div class="prose mt-2 max-w-none p-2 px-4 py-2 text-gray-700 prose-h1:my-3 prose-h2:my-2 prose-h3:my-1 prose-h4:my-1 prose-p:my-2 prose-ol:my-2 prose-ul:my-2 prose-li:my-0">
						@if (!is_null($item->description))
							{!! Str::markdown($item->description) !!}
						@endif
					</div>
				</a>
				<div class="mt-2 flex text-sm text-gray-500">
					หมวดหมู : <a href="{{ route('category', $item->cate->slug) }}" class="ml-2 hover:text-web-900">{{ $item->cate->name }}</a>
				</div>
				<div class="mt-2 flex flex-wrap text-sm text-gray-500">
					@foreach ($item->tags as $tag)
						<a href="{{ route('tag', $tag->slug) }}" class="mr-3 hover:text-web-900"><i class="fa-solid fa-tag mr-1"></i>{{ $tag->name }}</a>
					@endforeach
				</div>
			</div>
		@endforeach

	</div>
	@if ($datas instanceof \Illuminate\Pagination\LengthAwarePaginator)
		<div class="my-4 grid grid-cols-1">
			{{ $datas->links('pagination::tailwind') }}
		</div>
	@endif

@endsection

@section('footer')
	<footer class="sticky top-[100vh] w-full bg-white text-gray-500">
		<div class="mx-auto max-w-screen-lg">
			<div class="grid grid-cols-1 gap-4 p-2 sm:grid-cols-4 sm:p-4">
				<div class="hidden px-6 sm:block">
					<img src="{{ asset('images/logo_ef.png') }}" class="w-full">
				</div>
				<div class="p-2 text-sm">
					<div class="mb-2 font-bold">หมวดหมู่</div>
					<?php
					$cates = \App\Models\Category::all();
					?>
					<div class="pl-2">
						@foreach ($cates as $item)
							<li><a href="{{ route('category', $item->slug) }}" class="hover:font-bold">{{ $item->name }}</a></li>
						@endforeach
					</div>
				</div>
				<div class="p-2 text-sm">
					<div class="mb-2 font-bold">แท็ก</div>
					<?php
					$tags = \App\Models\Tag::where('weight', '>', 0)
					    ->inRandomOrder()
					    ->get();
					?>
					@foreach ($tags as $item)
						<a href="{{ route('tag', $item->slug) }}" class="mr-3 hover:font-bold"><i class="fa-solid fa-tag mr-1"></i>{{ $item->name }}</a>
					@endforeach
				</div>
				<div class="p-2 text-sm">
					<div class="mb-2 font-bold">{{ config('app.url') }}</div>
					<div class="pl-2">
						<li>ติดต่อเรา</li>
						<li>เกี่ยวกับเรา</li>
						<li>ลงโฆษณา</li>
						<li>เลี้ยงกาเฟ่</li>
						<li>รับทำเว็บไซต์</li>
					</div>
				</div>

			</div>
		</div>
	</footer>
@endsection
