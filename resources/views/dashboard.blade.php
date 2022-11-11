@extends('layouts.app')
@section('content')
	<div class="grid">
		<div class="mx-auto w-full">
			<div class="mb-3 flex justify-between rounded-md bg-white p-6 shadow-md">
				@foreach ($datas as $data)
					<li>{{ $data->post->name }}</li>
				@endforeach
			</div>

		</div>

	</div>
@endsection
