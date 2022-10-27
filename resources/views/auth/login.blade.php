<x-guest-layout>
	<x-auth-card>
		<!-- Session Status -->
		<x-auth-session-status class="mb-4" :status="session('status')" />

		<form method="POST" action="{{ route('login') }}">
			@csrf
			<div class="my-6 grid justify-items-center">
				<img src="{{ asset('images/logo.png') }}" style="height:150px;">
			</div>
			<!-- Email Address -->
			<div>
				<x-input-label for="email" :value="__('Email')" />

				<x-text-input id="email" class="mt-1 block w-full" type="email" name="email" :value="old('email')" required autofocus />

				<x-input-error :messages="$errors->get('email')" class="mt-2" />
			</div>

			<!-- Password -->
			<div class="mt-4">
				<x-input-label for="password" :value="__('Password')" />

				<x-text-input id="password" class="mt-1 block w-full" type="password" name="password" required autocomplete="current-password" />

				<x-input-error :messages="$errors->get('password')" class="mt-2" />
			</div>

			<!-- Remember Me -->
			<div class="mt-4 block">
				<label for="remember_me" class="inline-flex items-center">
					<input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
					<span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
				</label>
			</div>

			<div class="mt-4 flex items-center justify-end">
				@if (Route::has('password.request'))
					<a class="text-sm text-gray-600 underline hover:text-gray-900" href="{{ route('password.request') }}">
						{{ __('Forgot your password?') }}
					</a>
				@endif

				<x-submit class="ml-3">
					{{ __('Log in') }}
				</x-submit>
			</div>
		</form>
	</x-auth-card>
</x-guest-layout>
