<x-guest-layout>
    <x-auth-session-status class="mb-4" :status="session('status')"/>

    <form method="POST" action="{{ route('cp.login') }}">
        @csrf
        <div>
            <x-input-label for="tabel_number" :value="__('Табельный номер')"/>
            <x-text-input id="tabel_number" class="block mt-1 w-full" type="text" name="tabel_number"
                          :value="old('email')" required
                          autofocus autocomplete="username"/>
            <x-input-error :messages="$errors->get('tabel_number')" class="mt-2"/>
        </div>

        <div class="mt-4">
            <x-input-label for="password" :value="__('Пароль')"/>

            <x-text-input id="password" class="block mt-1 w-full"
                          type="password"
                          name="password"
                          required autocomplete="current-password"/>

            <x-input-error :messages="$errors->get('password')" class="mt-2"/>
        </div>

        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox"
                       class="rounded border-gray-300 text-gazprom-500 shadow-sm focus:ring-gazprom-500" name="remember">
                <span class="ml-2 text-sm text-gray-600">{{ __('Запомнить меня') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                   href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ml-3">
                {{ __('Войти') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
