<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <div class="logo-jotared4">
            
            <img src="{{ asset('/imagenesJotaRed/mrJota.webp') }}" alt="Logo">
        </div>

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="po1-po2 mb-2">
            <div class="po1">
                <x-jet-label for="name" value="{{ __('Nombre') }}" />
                <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <div class="po2">
                <x-jet-label for="apellido" value="{{ __('Apellido') }}" />
                <x-jet-input id="apellido" class="block mt-1 w-full" type="text" name="apellido" :value="old('apellido')" required autofocus autocomplete="apellido" />
            </div>
            </div>


            <div class="po1-po2 mb-2">

            <div class="po1">
                <x-jet-label for="telefono" value="{{ __('Telefono') }}" />
                <x-jet-input id="telefono" class="block mt-1 w-full" type="number" name="telefono" :value="old('telefono')" required autofocus autocomplete="telefono" />
            </div>

            <div class="po2">
                <x-jet-label for="email" value="{{ __('Correo') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>
            </div>

            <div class="po1-po2  mb-2">

            <div class="po1">
                <x-jet-label for="password" value="{{ __('Contraseña') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="po2">
                <x-jet-label for="password_confirmation" value="{{ __('Confirmar Contraseña') }}" />
                <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>
           </div>

           <div class="po1-po2 mb-2">

            <div class="po1">
                <x-jet-label for="date" value="{{ __('Fecha-Nacimiento') }}" />
                <x-jet-input id="date" class="block mt-1 w-full" type="date" name="date" :value="old('date')" required autofocus autocomplete="date" />
            </div>

            <div class="po2">
                <x-jet-label for="cargo" value="{{ __('Cargo') }}" />
                <x-jet-input id="cargo" class="block mt-1 w-full" type="text" name="cargo" :value="old('cargo')" required autofocus autocomplete="cargo" />
            </div>
           </div>

           <div class="area">
              <x-jet-label for="area" value="{{ __('Area') }}"/>
              <select id="area" class="form-control" name="area">
              <option value="Compras Nacionales"{{ in_array('comprasNacionales', old('area', [])) ? ' selected' : '' }}>Compras Nacionales</option>
              <option value="Contaibilidad"{{ in_array('contaibilidad', old('area', [])) ? ' selected' : '' }}>Contabilidad</option>
              <option value="Comercial"{{ in_array('comercial', old('area', [])) ? ' selected' : '' }}>Comercial</option>
              <option value="Comex"{{ in_array('comex', old('area', [])) ? ' selected' : '' }}>Comex</option>
              <option value="Gerencia"{{ in_array('gerencia', old('area', [])) ? ' selected' : '' }}>Gerencia</option>
              <option value="Mercadeo Y Comunicaciones"{{ in_array('mercadeo', old('area', [])) ? ' selected' : '' }}>Mercadeo Y Comunicaciones</option>
              <option value="Sistemas E Inventario"{{ in_array('sistemas', old('area', [])) ? ' selected' : '' }}>Sistemas E Inventario</option>
              <option value="Talento Humano"{{ in_array('talentoHumano', old('area', [])) ? ' selected' : '' }}>Talento Humano</option>
              <option value="Logistica"{{ in_array('logistica', old('area', [])) ? ' selected' : '' }}>Logistica</option>
              </select>
            </div>
            <div class="registro-iniciar2">

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Ir al Login') }}
                </a>
                

                <x-jet-button class="ml-4">
                    {{ __('Register') }}
                </x-jet-button>
            </div>
          </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
