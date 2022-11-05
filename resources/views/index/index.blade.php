@extends('layouts.home')
@section('title', 'หน้าแรก')
@php
	
	//$datas = App\Models\Post::all();
	//$datas = App\Models\Post::search('vun')->paginate(6);
	//dd($datas);
@endphp
@section('content')

	<div class="grid grid-cols-1 gap-4 p-2 md:grid-cols-2 md:p-4 lg:grid-cols-3">
		@foreach ($datas as $item)
			<div class="inline-block min-h-[400px] rounded-lg bg-white p-2 shadow hover:p-4">
				<a href="{{ route('acticle', $item->slug) }}">
					<div>
						<img src="{{ asset($item->picture) }}" class="rounded">
					</div>
					<div class="mt-2 flex justify-center font-bold">
						{{ $item->name }}
					</div>
					<div class="prose mt-2 max-w-none bg-gray-50 p-2 px-4 py-2 text-gray-700 prose-h1:my-3 prose-h2:my-2 prose-h3:my-1 prose-h4:my-1 prose-p:my-2 prose-ol:my-2 prose-ul:my-2 prose-li:my-0">
						@if (!is_null($item->description))
							{!! Str::markdown($item->description) !!}
						@endif
					</div>
				</a>
			</div>
		@endforeach

	</div>
	<div class="my-4">{!! $datas->onEachSide(5)->links() !!}</div>
@endsection
