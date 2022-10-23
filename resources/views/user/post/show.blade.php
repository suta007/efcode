@extends('layouts.app')
@section('content')
	<div class="grid">
		<div class="mx-auto w-full">
			<div class="mb-3 rounded-md bg-white p-6 shadow-md">
				{!! $data->content !!}
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
