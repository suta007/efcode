<div class="mb-3 mt-3 text-center">
	<button type="submit" {!! $attributes->merge(['class' => 'btn-web']) !!}>
		{{ $slot }}
	</button>
</div>
