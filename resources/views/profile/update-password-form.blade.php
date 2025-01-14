<x-jet-form-section submit="updatePassword">
    <x-slot name="title">
        {{ __('Recuperar Contraseña') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Ingrese su nueva contraseña') }}
    </x-slot>
   
    <x-slot name="form" class="formulario-contraseña">
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="current_password" value="{{ __('Contraseña actual') }}" />
            <x-jet-input id="current_password" type="password" class="mt-1 block w-full" wire:model.defer="state.current_password" autocomplete="current-password" />
            <x-jet-input-error for="current_password" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="password" value="{{ __('Nueva contraseña') }}" />
            <x-jet-input id="password" type="password" class="mt-1 block w-full" wire:model.defer="state.password" autocomplete="new-password" />
            <x-jet-input-error for="password" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="password_confirmation" value="{{ __('Confirmar Contraseña') }}" />
            <x-jet-input id="password_confirmation" type="password" class="mt-1 block w-full" wire:model.defer="state.password_confirmation" autocomplete="new-password" />
            <x-jet-input-error for="password_confirmation" class="mt-2" />
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-jet-action-message class="mr-3" on="saved">
            {{ __('Salvar.') }}
        </x-jet-action-message>

        <x-jet-button>
            {{ __('Recuperar') }}
        </x-jet-button>
    </x-slot>

</x-jet-form-section>

@section('css')
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap5.min.css" rel="stylesheet">
@stop
