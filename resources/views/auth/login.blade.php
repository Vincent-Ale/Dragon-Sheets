<x-guest-layout>

    <div class="bg-gravel w-80 h-40 mx-auto mt-4 flex items-center justify-center rounded-2xl">
        <div class="bg-blue flex w-72 h-32 rounded-2xl text-6xl text-center items-center pt-2 ">
            <h1>Dragon Sheets</h1>
        </div>
    </div>

    <p class="font-trade-orange text-center text-5xl px-4 mt-8" >Connexion</p>

    <x-authentication-card>
        <x-validation-errors class="" />

        @session('status')
            <div class="font-medium text-sm text-green-600">
                {{ $value }}
            </div>
        @endsession

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-label class="font-trade-orange text-2xl" for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-label class="font-trade-orange text-2xl" for="password" value="{{ __('Password') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-checkbox id="remember_me" name="remember" />
                    <span class="font-trade-orange ms-2 text-lg ">{{ __('Rester Connecté') }}</span>
                </label>
            </div>

            <div class="flex flex-col items-center justify-end mt-2">
                <div class="mt-6 mb-6 flex justify-center">
                    <a href="/" class="btn-cancel inline-flex items-center text-2xl px-4 py-2 border border-transparent rounded-full">
                        Annuler
                    </a>
                    <x-button class="">
                        {{ __('Connecter') }}
                    </x-button>
                </div>

                @if (Route::has('password.request'))
                    <a class="font-trade-orange text-lg underline" href="{{ route('password.request') }}">
                        {{ __('Mot de passe oublié?') }}
                    </a>
                @endif
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
