<div class="mb-2 rounded bg-web-900 p-2 font-bold text-gray-50 shadow">
	<i class="fa-solid fa-magnifying-glass mr-2"></i>ค้นหา
</div>
<div class="py-4 pl-1">
	<form action="#" method="post" class="">
		<input type="text" name="" id="" class="mb-2 mr-1 block w-full rounded">
		<div class="flex justify-center">
			<button type="submit" class="btn-edit mb-2 block w-full px-3 md:w-auto"><i class="fa-solid fa-magnifying-glass mr-2"></i> ค้นหา</button>
		</div>
	</form>
</div>
<div class="mb-2 rounded bg-web-900 p-2 font-bold text-gray-50 shadow">
	<i class="fa-solid fa-signs-post mr-2"></i>หมวดหมู่
</div>
<div>
	<?php
	$cates = \App\Models\Category::all();
	?>
	<ul class="cate-list space-y-2 pl-4">
		@foreach ($cates as $item)
			<li><a href="{{ route('category', $item->slug) }}" class="">{{ $item->name }}</a></li>
		@endforeach
	</ul>
</div>
<div class="mt-4 mb-2 rounded bg-web-900 p-2 font-bold text-gray-50 shadow">
	<i class="fa-solid fa-layer-group mr-2"></i>5 บทความล่าสุด
</div>
<?php
$posts = \App\Models\Post::orderByDesc('id')
    ->take(5)
    ->get(['name', 'slug']);
?>
<div>
	<ul class="cate-list space-y-2 pl-4">
		@foreach ($posts as $item)
			<li><a href="{{ route('acticle', $item->slug) }}">{{ $item->name }}</a></li>
		@endforeach
	</ul>
</div>
<div class="mt-4 mb-2 rounded bg-web-900 p-2 font-bold text-gray-50 shadow">
	<i class="fa-solid fa-tags mr-2"></i>แท็ก
</div>
<?php
$tags = \App\Models\Tag::where('weight', '>', 0)
    ->inRandomOrder()
    ->get();
$max = \App\Models\Tag::max('weight');
$ratio = 24 / $max;
?>
<style>
	ul.cloud {
		list-style: none;
		padding-left: 0;
		display: flex;
		flex-wrap: wrap;
		align-items: center;
		justify-content: center;
		line-height: 2.5rem;
	}

	ul.cloud a {
		display: block;
		padding: 0.125rem 0.25rem;
		text-decoration: none;
		position: relative;
	}
</style>
<div>
	<ul class="cloud cate-list">
		@foreach ($tags as $item)
			<?php
			$fs = ceil($item->weight * $ratio);
			$fs = $fs < 16 ? 16 : $fs;
			?>
			<li><a href="{{ route('tag', $item->slug) }}" class="hover:font-bold" style="font-size:{{ $fs }}px;">{{ $item->name }}</a></li>
		@endforeach
	</ul>
</div>
