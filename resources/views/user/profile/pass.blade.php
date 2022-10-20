@extends('layouts.app')
@section('content')
	<div class="grid">
		<div class="mx-auto w-full lg:w-3/5">
			<div class="mb-3 rounded-md bg-white p-4 text-xl font-bold text-web-700 shadow-md">เปลี่ยนรหัสผ่าน</div>
			<div class="rounded-md bg-white py-4 px-8 shadow-md">
				<form action="{{ route('user.profile.store') }}" method="post" enctype="multipart/form-data">
					@csrf
					@method('PATCH')
					<x-input type="password" val="current_password" label="รหัสผ่านปัจจุบัน" :errors="$errors" />
					<x-input type="password" val="new_password" label="รหัสผ่านใหม่" :errors="$errors" minlength="8" />
					<x-input type="password" val="new_password_confirmation" label="ยืนยันรหัสผ่านใหม่" :errors="$errors" minlength="8" />
					<x-submit><i class="fa-solid fa-floppy-disk mr-2"></i>บันทึก</x-submit>
				</form>
			</div>
		</div>
	</div>
@endsection
