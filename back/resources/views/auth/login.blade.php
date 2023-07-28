<x-guest-layout>
    <x-auth-session-status class="mb-4" :status="session('status')"/>

    <form method="POST" action="{{ route('cp.login') }}">
        @csrf
        <div>
            <x-input-label for="tabel_number" :value="__('Табельный номер')"/>
            <x-text-input id="tabel_number" class="block mt-1 w-full" type="text" name="tabel_number"
                          :value="old('tabel_number')" required
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
                <input id="remember_me" type="checkbox" value="0"
                       class="hidden border-gray-300 text-gazprom-500 shadow-sm focus:ring-gazprom-500"
                       name="remember">
                <input id="remember_me" type="checkbox" value="1"
                       class="border-gray-300 text-gazprom-500 shadow-sm focus:ring-gazprom-500"
                       name="remember">
                <span
                    class="ml-2 block font-medium font-HeliosCond text-sm text-gray-700">{{ __('Запомнить меня') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button class="ml-3">
                {{ __('Войти') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
