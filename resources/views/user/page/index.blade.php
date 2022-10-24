@extends('layouts.app')
@section('content')
	<div class="grid">
		<div class="mx-auto w-full">
			<div class="mb-3 flex justify-between rounded-md bg-white p-6 shadow-md">
				<div class="text-xl font-bold text-web-700">รายการหน้าเว็บ</div>
				<div>
					<a href="{{ route('user.page.create') }}" class="btn-web"><i class="fa-solid fa-plus mr-2"></i></i>เพื่มหน้าเว็บ</a>
				</div>
			</div>
			<div class="rounded-md bg-white py-4 px-8 shadow-md">
				<table id="dataTable" class="display">
					<thead>
						<tr>
							<th class="dt-center dt-nowrap" style="width:1%;">#</th>
							<th class="dt-center">name</th>
							<th class="dt-center dt-nowrap" style="width:1%;">action</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($datas as $item)
							<tr>
								<td class="dt-center dt-nowrap" style="width:1%;">{{ $item->id }}</td>
								<td><a href="{{ route('user.page.slug', $item->slug) }}">{{ $item->name }}</a></td>
								<td class="dt-center dt-nowrap" style="width:1%;">
									<a href="{{ route('user.page.show', $item->id) }}" class="btn-show" data-tooltip="แสดง {{ $item->name }}"><i class="fa-solid fa-eye"></i></a>
									<a href="{{ route('user.page.edit', $item->id) }}" class="btn-edit" data-tooltip="แก้ไข {{ $item->name }}"><i class="fa-solid fa-pen-to-square"></i></a>
									<form method="POST" action="{{ route('user.page.destroy', $item->id) }}" accept-charset="UTF-8" style="display:inline">
										@method('DELETE')
										@csrf
										<button type="submit" class="btn-del del-cfm" data-tooltip="ลบ {{ $item->name }}"><i class="fa-solid fa-trash-can"></i></button>
									</form>
								</td>
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
