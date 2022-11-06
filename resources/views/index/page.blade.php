@extends('layouts.home')
@section('title', $data->name)
@section('content')
	<div id="loading" class="fixed top-0 left-0 z-30 flex min-h-full min-w-full flex-row items-center justify-center bg-slate-900/50">
		<div class="basis-1 text-center">
			<i class="fa-solid fa-spinner fa-5x animate-spin text-gray-50"></i>
		</div>
		<div class="ml-3 basis-1 text-center text-gray-50">
			Loading...
		</div>
	</div>
	<div class="grid grid-cols-4 gap-4 rounded">
		<div class="col-span-full bg-white px-4 pt-4 pb-6 md:col-span-4">
			<div class="mb-4">
				<nav class="flex" aria-label="Breadcrumb">
					<ol class="inline-flex items-center space-x-1 md:space-x-3">
						<li class="inline-flex items-center">
							<a href="/" class="inline-flex items-center font-medium text-gray-700 hover:text-web-700">
								<i class="fa-solid fa-house mr-2"></i>
								หน้าแรก
							</a>
						</li>
						<li aria-current="page">
							<div class="flex items-center">
								<i class="fa-solid fa-angle-right mr-2 text-gray-400" style="-webkit-text-stroke: 1px;"></i>
								<span class="ml-1 font-medium text-gray-500 dark:text-gray-400">{{ $data->name }}</span>
							</div>
						</li>
					</ol>
				</nav>
			</div>

			<div class="mb-2 text-lg font-bold text-web-900">
				{{ $data->name }}
			</div>
			<div class="mb-4 text-sm text-gray-700">
				ผู้เขียน : {{ $data->user->name }}
				@if (Auth::guard('web')->id() == $data->user->id)
					<a href="{{ route('user.page.edit', $data->id) }}" target="_blank" class="ml-2 text-sm text-green-700"><i class="fa-solid fa-pen-to-square"></i></a>
				@endif
				<br />
				เผยแพร่เมื่อ : {{ FullThaiDate($data->created_at) }}
				ปรับปรุงเมื่อ : {{ FullThaiDate($data->updated_at) }}<br />
				ลิงก์ : {{ urldecode(url()->full()) }}
			</div>
			<div>
				{!! $data->content !!}
			</div>

			<div class="tag my-4">
				@foreach ($data->tags as $tag)
					<a href="{{ route('tag', $tag->slug) }}" class="mr-3"><i class="fa-solid fa-tag mr-1"></i>{{ $tag->name }}</a>
				@endforeach
			</div>
		</div>
	</div>

@endsection

@section('script')
	<script>
		$(document).ready(function() {
			$('#loading').hide();
		});

		$('.reply').on('click', function(e) {
			var parent_id = $(this).data('parent-id');
			let url = '{{ route('comment.store', $data->id) }}';


			e.preventDefault();

			var frm =
				'<form action="' + url +
				'" method="post">@csrf<input type="hidden" name="parent_id" value="' + parent_id +
				'"><label for="body" class="my-2 block font-medium text-gray-900 dark:text-gray-400">ความคิดเห็นของคุณ<button type="button" class="frm_remove ml-3 text-red-700">x</button></label><textarea name="body" id="body" rows="5" class="block w-full rounded border border-gray-300 bg-gray-50 p-2.5 text-gray-900 focus:border-web-900 focus:ring-web-900" placeholder="แสดงความคิดเห็นของคุณ...." required></textarea><div class="my-3 text-right"><button type="submit" class="btn-web"><i class="fas fa-floppy-disk mr-2"></i>บันทึก</button></div></form>';

			$(this).closest('.comment').append(frm);
		});

		$(document).on('click', '.frm_remove', function() {
			$(this).closest('form').remove();
		});

		$(document).on('click', '.edit', function() {
			$('#loading').show();
			var c_id = $(this).data('id');
			var url = "{{ url('/comment/get') }}/" + c_id;
			var update_url = "{{ url('/comment/update') }}/" + c_id;
			var did = "#edit" + c_id;



			$.get(url, function(data) {
				var frm =
					'<form action="' + update_url +
					'" method="post">@csrf<label for="body" class="my-2 block font-medium text-gray-900 dark:text-gray-400">แก้ไขความคิดเห็นของคุณ<button type="button" class="frm_remove ml-3 text-red-700">x</button></label><textarea name="body" id="body" rows="5" class="block w-full rounded border border-gray-300 bg-gray-50 p-2.5 text-gray-900 focus:border-web-900 focus:ring-web-900" placeholder="แสดงความคิดเห็นของคุณ...." required>' +
					data + '</textarea><div class="my-3 text-right"><button type="submit" class="btn-web"><i class="fas fa-floppy-disk mr-2"></i>บันทึก</button></div></form>';
				$(did).append(frm);
				$('#loading').hide();
			});
		});
	</script>
@endsection
