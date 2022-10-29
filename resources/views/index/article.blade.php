@extends('layouts.home')
@section('title', 'หน้าแรก')
@section('content')
	<div class="grid grid-cols-4 gap-4">
		<div class="col-span-full md:col-span-3">
			{!! $data->content !!}
		</div>
		<div class="col-span-full md:col-span-1">
			ccc
		</div>
	</div>
@endsection
