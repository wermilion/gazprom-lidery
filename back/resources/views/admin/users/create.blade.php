@extends('admin.layouts.layout')
@section('content')
    <div class="w-max">
        <form method="post" action="{{ route('cp.users.store') }}">
            @csrf
            <div>
                @if($errors->get('tabel_number'))
                    <p class="text-red-600">Поле "Табельный номер" должно быть:</p>
                    <ul class="list-disc ml-4">
                        @foreach($errors->get('tabel_number') as $error)
                            <li class="text-red-600">{{$error}}</li>
                        @endforeach
                    </ul>
                @endif
                <label class="block font-medium text-lg text-gray-700" for="tabel_number">
                    Табельный номер
                </label>
                <input
                    class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 shadow-sm block mt-1"
                    id="tabel_number" type="text" name="tabel_number" autofocus="autofocus" required
                    value="{{ old('tabel_number') }}">
            </div>
            <div class="mt-4">
                @if($errors->get('password'))
                    <p class="text-red-600">Поле "Пароль" должно быть:</p>
                    <ul class="list-disc ml-4">
                        @foreach($errors->get('password') as $error)
                            <li class="text-red-600">{{$error}}</li>
                        @endforeach
                    </ul>
                @endif
                <label class="block font-medium text-lg text-gray-700" for="password">
                    Пароль
                </label>
                <input
                    disabled
                    oninput="switchDisabled()"
                    class="border-gray-300 bg-gray-100 focus:border-indigo-500 focus:ring-indigo-500 shadow-sm block mt-1"
                    id="password" type="text" name="password" autofocus="autofocus" required>
            </div>
            <div class=" mt-4 flex flex-col">
                <button
                    id="generate-password"
                    class="bg-gazprom-500 uppercase hover:bg-gazprom-400 py-2 px-3 text-white">
                    Сгенерировать пароль
                </button>
                <button
                    id="submit"
                    type="submit"
                    class="mt-4 bg-gazprom-500 uppercase hover:bg-gazprom-400 py-2 px-3 text-white disabled:opacity-25">
                    Создать
                </button>
            </div>
        </form>
    </div>
@endsection

@push('scripts')
    <script>
        let submitBtn = document.getElementById('submit')
        let generatePassBtn = document.getElementById('generate-password')
        let passwordInput = document.getElementById('password')
        submitBtn.setAttribute('disabled', true)
        generatePassBtn.addEventListener("click", setRandomPass, false);

        function switchDisabled() {
            if (!passwordInput.value) {
                submitBtn.setAttribute('disabled', true)
            } else {
                submitBtn.removeAttribute('disabled')
            }
        }

        function generatePassword() {
            var length = 15,
                charset = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!?$&@";
            res = '';
            for (var i = 0, n = charset.length; i < length; ++i) {
                res += charset.charAt(Math.floor(Math.random() * n));
            }
            return res;
        }

        function setRandomPass(event) {
            event.preventDefault()
            let randomStr = generatePassword()
            passwordInput.setAttribute('value', randomStr)
            switchDisabled()
        }
    </script>
@endpush

