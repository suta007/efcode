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
		<div class="col-span-full bg-white px-4 pt-4 pb-6 md:col-span-3">
			<div class="mb-4">
				<nav class="flex" aria-label="Breadcrumb">
					<ol class="inline-flex items-center space-x-1 md:space-x-3">
						<li class="inline-flex items-center">
							<a href="/" class="inline-flex items-center font-medium text-gray-700 hover:text-web-700">
								<i class="fa-solid fa-house mr-2"></i>
								หน้าแรก
							</a>
						</li>
						<li>
							<div class="flex items-center">
								<i class="fa-solid fa-angle-right mr-2 text-gray-400" style="-webkit-text-stroke: 1px;"></i>
								<a href="{{ route('category', $data->cate->slug) }}" class="ml-1 inline-flex items-center font-medium text-gray-700 hover:text-web-700">{{ $data->cate->name }}</a>
							</div>
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
					<a href="{{ route('user.post.edit', $data->id) }}" target="_blank" class="ml-2 text-sm text-green-700"><i class="fa-solid fa-pen-to-square"></i></a>
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
			<div>
				<div class="mb-2 text-lg font-bold text-web-900">
					ความคิดเห็น :
				</div>
				@if (!Auth::guard('social')->check())
					<div class="mb-2 font-medium text-emerald-900">เข้าสู่ระบบก่อนจึงจะแสดงความคิดเห็นได้</div>
					<div>
						<a href="{{ route('login.redirect', 'google') }}" class="dark:focus:ring-[#DD4B39]/55 mr-2 mb-2 inline-flex items-center rounded-lg bg-[#DD4B39] px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-[#DD4B39]/90 focus:outline-none focus:ring-4 focus:ring-[#DD4B39]/50">
							<i class="fa-brands fa-google mr-2 -ml-1"></i>
							Sign in with Google
						</a>

						<a href="{{ route('login.redirect', 'facebook') }}" class="dark:focus:ring-[#3b5998]/55 mr-2 mb-2 inline-flex items-center rounded-lg bg-[#3b5998] px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-[#3b5998]/90 focus:outline-none focus:ring-4 focus:ring-[#3b5998]/50">
							<i class="fa-brands fa-facebook-f mr-2 -ml-1"></i>
							Sign in with Facebook
						</a>
						{{-- 					<a href="{{ route('login.redirect', 'twitter') }}" class="dark:focus:ring-[#1da1f2]/55 mr-2 mb-2 inline-flex items-center rounded-lg bg-[#1da1f2] px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-[#1da1f2]/90 focus:outline-none focus:ring-4 focus:ring-[#1da1f2]/50">
						<i class="fa-brands fa-twitter mr-2 -ml-1"></i>
						Sign in with Twitter
					</a> --}}
						<a href="{{ route('login.redirect', 'github') }}" class="mr-2 mb-2 inline-flex items-center rounded-lg bg-[#24292F] px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-[#24292F]/90 focus:outline-none focus:ring-4 focus:ring-[#24292F]/50 dark:hover:bg-[#050708]/30 dark:focus:ring-gray-500">
							<i class="fa-brands fa-github mr-2 -ml-1"></i>
							Sign in with Github
						</a>

					</div>
				@else
					@php($user = Auth::guard('social')->user())
					<div class="mb-2 flex">
						<div class="row-span-2">
							<img src="{{ $user->image }}" class="mr-2 h-12">
						</div>
						<div class="font-semibold">
							{{ $user->name }}
						</div>

					</div>
					<form action="{{ route('comment.store', $data->id) }}" method="post">
						@csrf
						<label for="body" class="form-required my-2 block font-medium text-gray-900 dark:text-gray-400">ความคิดเห็นของคุณ </label>
						<textarea name="body" id="body" rows="5" class="block w-full rounded border border-gray-300 bg-gray-50 p-2.5 text-gray-900 focus:border-web-900 focus:ring-web-900" placeholder="แสดงความคิดเห็นของคุณ...." required></textarea>
						<div class="my-3 text-right">
							<button type="submit" class="btn-web"><i class="fas fa-floppy-disk mr-2"></i>บันทึก</button>
						</div>
					</form>
				@endif

				@foreach ($data->comments as $item)
					<div class="comment mb-4 rounded bg-gray-100 p-6" id="comment{{ $item->id }}">
						<div class="mb-2 flex">
							<div class="row-span-2">
								<img src="{{ $item->user->image }}" class="mr-2 h-12">
							</div>
							<div class="font-semibold">
								{{ $item->user->name }}
								<div class="mt-2 text-sm text-gray-400">
									เมื่อ : {{ \Carbon\Carbon::parse($item->created_at)->diffForHumans() }}
								</div>
							</div>
						</div>
						<div class="prose max-w-none rounded bg-gray-50 px-4 py-2 prose-h1:my-3 prose-h2:my-2 prose-h3:my-1 prose-h4:my-1 prose-p:my-2 prose-ol:my-2 prose-ul:my-2 prose-li:my-0">
							{!! Str::markdown($item->body) !!}
							@if (Auth::guard('social')->id() == $item->user->id || Auth::guard('web')->check())
								<div id="edit{{ $item->id }}"></div>
								<div class="my-2 text-sm text-web-900">
									<button type="button" data-id="{{ $item->id }}" class="edit btn-edit hover:font-bold">แก้ไข</button>
									<form method="POST" action="{{ route('comment.destroy', $item->id) }}" accept-charset="UTF-8" style="display:inline">
										@method('DELETE')
										@csrf
										<button type="submit" class="btn-del del-cfm">ลบ</button>
									</form>
								</div>
							@endif
						</div>

						@if (!is_null($item->replies))
							@foreach ($item->replies as $reply)
								<div class="my-2 ml-6 rounded border border-gray-500 p-4" id="comment{{ $reply->id }}">
									<div class="mb-2 flex">
										<div class="row-span-2">
											<img src="{{ $reply->user->image }}" class="mr-2 h-12">
										</div>
										<div class="font-semibold">
											{{ $reply->user->name }}
											<div class="mt-2 text-sm text-gray-400">
												เมื่อ : {{ \Carbon\Carbon::parse($reply->created_at)->diffForHumans() }}
											</div>
										</div>

									</div>
									<div class="prose max-w-none rounded bg-gray-50 px-4 py-2 prose-h1:my-3 prose-h2:my-2 prose-h3:my-1 prose-h4:my-1 prose-p:my-2 prose-ol:my-2 prose-ul:my-2 prose-li:my-0">
										{!! Str::markdown($reply->body) !!}

										@if (Auth::guard('social')->id() == $reply->user->id || Auth::guard('web')->check())
											<div id="edit{{ $reply->id }}"></div>
											<div class="my-2 text-sm text-web-900">
												<button type="button" data-id="{{ $reply->id }}" class="edit btn-edit hover:font-bold">แก้ไข</button>
												<form method="POST" action="{{ route('comment.destroy', $reply->id) }}" accept-charset="UTF-8" style="display:inline">
													@method('DELETE')
													@csrf
													<button type="submit" class="btn-del del-cfm">ลบ</button>
												</form>
											</div>
										@endif
									</div>
								</div>
							@endforeach
						@endif
						@if (Auth::guard('social')->check())
							<div class="mt-2 text-right"><a href="#" class="reply btn-show text-sm" data-parent-id="{{ $item->id }}">ตอบกลับ</a> </div>
						@endif
					</div>
				@endforeach
			</div>

		</div>
		<div class="col-span-full bg-white px-4 pt-4 pb-6 md:col-span-1">
			@include('layouts.sidebar2')
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
