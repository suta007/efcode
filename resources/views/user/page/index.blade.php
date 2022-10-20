@extends('layouts.app')
@section('content')
	<div class="grid">
		<div class="mx-auto w-full lg:w-3/5">
			<div class="mb-3 rounded-md bg-white p-4 text-xl font-bold text-web-700 shadow-md">แก้ไขข้อมูลส่วนตัว</div>
			<div class="rounded-md bg-white py-4 px-8 shadow-md">
				<form action="{{ route('user.profile.update') }}" method="post" enctype="multipart/form-data">
					@csrf
					@method('PATCH')
					<x-input type="text" val="name" label="ชื่อ - สกุล" :value="old('name', $data->name)" :errors="$errors" />
					<x-input type="email" val="email" label="อีเมล์" :value="old('email', $data->email)" :errors="$errors" />
					<x-submit><i class="fa-solid fa-floppy-disk mr-2"></i>บันทึก</x-submit>
				</form>
			</div>
		</div>
	</div>
@endsection
