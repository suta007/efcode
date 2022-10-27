@extends('layouts.app')
@section('content')
	<div class="grid">
		<div class="mx-auto w-full lg:w-3/5">
			<div class="mb-3 flex justify-between rounded-md bg-white p-6 text-web-700 shadow-md">
				<div class="text-xl font-bold text-web-700">เพิ่มหมวดหมู่</div>
				<div>
					<a href="{{ route('user.category.index') }}" class="btn-web mr-3"><i class="fa-solid fa-circle-left mr-2"></i>กลับ</a>
				</div>
			</div>
			<div class="rounded-md bg-white py-4 px-8 shadow-md">
				<form action="{{ route('user.category.store') }}" method="post" enctype="multipart/form-data">
					@csrf
					<x-input type="text" val="name" label="ชื่อหมวดหมู่" :value="old('name')" class="col-span-3" lbcls="col-span-2" :errors="$errors" />
					<x-submit><i class="fa-solid fa-floppy-disk mr-2"></i>บันทึก</x-submit>
				</form>
			</div>
		</div>
	</div>
@endsection
