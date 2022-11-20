@extends('layouts.app')
@section('content')
	<div class="grid">
		<div class="mx-auto w-full">
			<div class="mb-3 grid grid-cols-1 gap-4 md:grid-cols-3">
				<div class="rounded-md bg-white p-6 shadow-md">
					<div class="text-right text-xl font-bold text-web-900">จำนวนหน้า</div>
					<div class="py-4 text-center text-3xl font-bold">
						{{ App\Models\Page::count() }}
					</div>
				</div>
				<div class="rounded-md bg-white p-6 shadow-md">
					<div class="text-right text-xl font-bold text-web-900">จำนวนโพส</div>
					<div class="py-4 text-center text-3xl font-bold">
						{{ App\Models\Post::count() }}
					</div>
				</div>
				<div class="rounded-md bg-white p-6 shadow-md">
					<div class="text-right text-xl font-bold text-web-900">จำนวนคอมเมนต์</div>
					<div class="py-4 text-center text-3xl font-bold">
						{{ App\Models\Comment::count() }}
					</div>
				</div>
			</div>
			<div class="mb-3 grid rounded-md bg-white p-6 shadow-md">
				<div class="col-span-full mb-2 text-xl font-bold text-web-900">
					คอมเมนต์
				</div>
				<div class="col-span-full">
					<ul class="divide-y divide-slate-200 pl-10">
						@foreach ($datas as $data)
							<li class="py-2"><a href="{{ route('acticle', $data->post->slug) }}#comment{{ $data->id }}" target="_blank" class="font-bold text-web-900 hover:text-web-500">{{ $data->post->name }}</a> โดย <span class="text-green-700">{{ $data->user->name }}</span> เมื่อ: <span class="text-orange-500">{{ $data->updated_at }}</span> </li>
						@endforeach
					</ul>
				</div>
				@if ($datas instanceof \Illuminate\Pagination\LengthAwarePaginator)
					<div class="my-4 grid grid-cols-1">
						{{ $datas->links('pagination::tailwind') }}
					</div>
				@endif
			</div>
		</div>
	</div>
@endsection
