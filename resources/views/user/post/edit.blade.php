@extends('layouts.app')
@section('style')
	<link rel="stylesheet" href="{{ asset('css/jquery.flexdatalist.min.css') }}">
	<style>
		.flexdatalist-multiple li.value {
			background: #ffe4e6;
		}
	</style>
@endsection
@section('content')
	<div class="grid">
		<div class="mx-auto w-full">
			<div class="mb-3 flex justify-between rounded-md bg-white p-6 shadow-md">
				<div class="text-xl font-bold text-web-700">แก้ไขบทความ</div>
				<div>
					<a href="{{ route('user.post.index') }}" class="btn-web mr-3"><i class="fa-solid fa-circle-left mr-2"></i>กลับ</a>
					<a href="{{ route('user.post.show', $data->id) }}" class="btn-show rounded-lg py-3 px-4" target="_blank"><i class="fa-solid fa-eye mr-2"></i> ดูหน้าเว็บ</a>
				</div>
			</div>
			<div class="rounded-md bg-white py-4 px-8 shadow-md">
				<form action="{{ route('user.post.update', $data->id) }}" method="post" enctype="multipart/form-data">
					@csrf
					@method('PATCH')
					<x-input type="text" val="name" label="ชื่อบทความ" :value="old('name', $data->name)" class="col-span-5" lbcls="col-span-1" :errors="$errors" />
					<x-input-picture type="text" val="picture" label="รูปบทความ" :value="old('picture', $data->picture)" class="col-span-4" lbcls="col-span-1" :errors="$errors" :required=false />
					<x-select val="category_id" label="หมวดหมู่" class="col-span-5" lbcls="col-span-1" :errors="$errors">
						<option hidden>เลือกหมวดหมู่</option>
						@foreach ($cate as $item)
							<option value="{{ $item->id }}" @selected($data->category_id == $item->id)>{{ $item->name }}</option>
						@endforeach
					</x-select>
					<div class="mb-3 grid grid-cols-6 content-center gap-x-4">
						<label for="content" class="col-span-1 flex md:justify-end">เนื้อหา</label>
						<div class="col-span-5">
							<textarea name="content" id="content" class="w-full">{{ old('content', $data->content) }}</textarea>
						</div>
					</div>
					<div class="mb-3 grid grid-cols-6 content-center gap-x-4">
						<label for="tags" class="form-required col-span-1 flex items-center md:justify-end">Tags</label>
						<div class="col-span-5">
							<input type='text' class='rounded border border-gray-300 bg-gray-50 py-1 px-2 focus:border-web-900 focus:ring-web-900' data-min-length='1' list='taglist' name='tag' id="tag" multiple='multiple' value="@foreach ($data->tags as $tag){{ $tag->name }}, @endforeach">
							<datalist id="taglist">
								@foreach ($tags as $item)
									<option value="{{ $item->name }}">{{ $item->name }}</option>
								@endforeach
							</datalist>
						</div>
					</div>
					<x-submit><i class="fa-solid fa-floppy-disk mr-2"></i>บันทึก</x-submit>
				</form>
			</div>
		</div>
	</div>
@endsection
@section('js-file')
	<script src="{{ asset('js/jquery.flexdatalist.min.js') }}"></script>
	<script src="{{ asset('js/tinymce/tinymce.min.js') }}"></script>
	<script src="{{ asset('js/tinymceconfig.js') }}"></script>
	<script src="{{ asset('vendor/laravel-filemanager/js/stand-alone-button.js') }}"></script>
@endsection
@section('script')
	<script type="module">
		$(document).ready(function() {
			$('#tag').flexdatalist({
				minLength: 1
			});
			$('#lfm').filemanager('image');
		});
	</script>
@endsection
