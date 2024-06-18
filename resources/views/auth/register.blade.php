<x-guest-layout>
    <x-authentication-card>


    <div class="bg-gravel w-80 h-40 mx-auto mt-4 flex items-center justify-center rounded-2xl">
        <div class="bg-blue flex w-72 h-32 rounded-2xl text-6xl text-center items-center pt-2 ">
            <h1>Dragon Sheets</h1>
        </div>
    </div>

    <p class="font-trade-orange text-center text-4xl px-4 mt-8 mb-8" >S'enregistrer</p>

        <x-validation-errors class="" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div>
                <x-label class="font-trade-orange text-2xl" for="name" value="{{ __('Nom') }}" />
                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <x-label class="font-trade-orange text-2xl" for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-label class="font-trade-orange text-2xl" for="password" value="{{ __('Mot de passe') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-label class="font-trade-orange text-2xl" for="password_confirmation" value="{{ __('Confirmer mot de passe') }}" />
                <x-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-label for="terms">
                        <div class="flex items-center">
                            <x-checkbox name="terms" id="terms" required />

                            <div class="ms-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-label>
                </div>
            @endif

            <div class="flex flex-col items-center justify-end mt-4">
                <x-button class="mb-4">
                    {{ __('Valider') }}
                </x-button>

                <a class="font-trade-orange text-lg underline" href="{{ route('login') }}">
                    {{ __('Déjà enregistré?') }}
                </a>

            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
