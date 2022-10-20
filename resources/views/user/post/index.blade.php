@extends('layouts.app')
@section('content')
	<div class="grid">
		<div class="mx-auto w-full">
			<div class="mb-3 flex justify-between rounded-md bg-white p-6 shadow-md">
				<div class="text-xl font-bold text-web-700">รายการบทความ</div>
				<div>
					<a href="" class="btn-web">เขียนบทความใหม่</a>
				</div>
			</div>
			<div class="rounded-md bg-white py-4 px-8 shadow-md">
				<table id="dataTable" class="display">
					<thead>
						<tr>
							<th class="dt-center dt-nowrap">#</th>
							<th class="dt-center">name</th>
							<th class="dt-center dt-nowrap">action</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($datas as $item)
							<tr>
								<td class="dt-center dt-nowrap" style="width:1%;">{{ $item->id }}</td>
								<td>{{ $item->name }}</td>
								<td class="dt-center dt-nowrap" style="width:1%;">55</td>
							</tr>
						@endforeach

					</tbody>
				</table>
			</div>
		</div>
	</div>
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
