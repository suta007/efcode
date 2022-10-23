@extends('layouts.app')
@section('content')
	<div class="grid">
		<div class="mx-auto w-full">
			<div class="mb-3 flex justify-between rounded-md bg-white p-6 shadow-md">
				<div class="text-xl font-bold text-web-700">สร้างบทความ</div>
				<div>
					<a href="{{ route('user.post.index') }}" class="btn-web"><i class="fa-solid fa-circle-left mr-2"></i>กลับ</a>
				</div>
			</div>
			<div class="rounded-md bg-white py-4 px-8 shadow-md">
				<form action="{{ route('user.post.store') }}" method="post" enctype="multipart/form-data">
					@csrf
					<x-input type="text" val="name" label="ชื่อบทความ" :value="old('name')" class="col-span-5" lbcls="col-span-1" :errors="$errors" />
					<div class="mb-3 grid grid-cols-6 content-center gap-x-4">
						<label for="content" class="col-span-1 flex md:justify-end">เนื้อหา</label>
						<div class="col-span-5">
							<textarea name="content" id="content" class="w-full"></textarea>
						</div>
					</div>
					<x-submit><i class="fa-solid fa-floppy-disk mr-2"></i>บันทึก</x-submit>
				</form>
			</div>
		</div>
	</div>
@endsection
@section('js-file')
	<script src="{{ asset('js/tinymce/tinymce.min.js') }}"></script>
	<script src="{{ asset('js/tinymceconfig.js') }}"></script>
@endsection
@section('script')
	<script type="module">
		$(document).ready(function() {
			$('#dataTable').DataTable({
				"order": [[0,'desc']],
				pageLength: 25,
				language: {
					url: "{{ asset('js/lang/th2.json') }}",
				},
			});
		});

	</script>
@endsection
