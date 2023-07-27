
<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <div class="logo-jotared3">
            
            <img src="{{ asset('/imagenesJotaRed/mrJota.webp') }}" alt="Logo">
        </div>
    

        <div class="fondo-formulario">
        
        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('login') }}" class="formulario-estilo">
            @csrf

            <div class="mt-4 input-label">
                <x-jet-label for="email" value="{{ __('Introduzca Correo') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <div class="mt-4 input-label">
                <x-jet-label for="password" value="{{ __('Introduzca Contraseña') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="registro-iniciar">

            <x-jet-button class="ml-4">
                    {{ __('Iniciar') }}
                </x-jet-button>
            
                <a class="volver underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('register') }}">
                    {{ __('Volver a Registro') }}
                </a>

                

               
            </div>
        </form>

       </div>
    </x-jet-authentication-card>
</x-guest-layout>
