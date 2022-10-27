@props(['val', 'label', 'lbcls' => null, 'required' => true, 'errors' => null])

<div class="mb-3 grid content-center gap-x-4 md:grid-cols-6">
	<label for="{{ $val }}" class="{{ $required ? 'form-required' : '' }} {{ $lbcls }} flex items-center md:justify-end">{{ $label }}</label>
	<input {{ $required ? 'required' : '' }} name="{{ $val }}" id="{{ $val }}" {!! $attributes->merge(['class' => 'rounded border border-gray-300 bg-gray-50 py-1 px-2 focus:border-web-900 focus:ring-web-900']) !!}>
	<div class="col-span-1">
		<button type="button" class="btn-web py-1 text-sm" id="lfm" data-input="{{ $val }}"><i class="fa-solid fa-image mr-2"></i> เลือกรูป</button>
	</div>
	@if ($errors->has($val))
		<span class="col-start-3 col-end-7 mt-1 text-xs font-medium text-red-600">
			@foreach ((array) $errors->get($val) as $message)
				<li>{{ $message }}</li>
			@endforeach
		</span>
	@endif
</div>
