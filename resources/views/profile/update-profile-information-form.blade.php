@section('css')

    <link rel="stylesheet" href="{{ asset('css/custom-form.css') }}">
    <link href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap5.min.css" rel="stylesheet">
@stop

<x-jet-form-section submit="updateProfileInformation">
    <x-slot name="title">
        <!-- Add title text here if needed -->
    </x-slot>

    <x-slot name="description">
        <!-- Add description text here if needed -->
    </x-slot>

    <div class="formulario-usuario">
    <x-slot name="form" class="mt-100">
        <!-- Profile Photo -->
        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
            <div x-data="{photoName: null, photoPreview: null}" class="col-span-6 sm:col-span-4">
                <!-- Profile Photo File Input -->
                <input type="file" class="hidden custom-file-input"
                    wire:model="photo"
                    x-ref="photo"
                    x-on:change="
                        photoName = $refs.photo.files[0].name;
                        const reader = new FileReader();
                        reader.onload = (e) => {
                            photoPreview = e.target.result;
                        };
                        reader.readAsDataURL($refs.photo.files[0]);
                    "
                />

                <x-jet-label for="photo" value="{{ __('Photo') }}" />

                <!-- Current Profile Photo -->
                <div class="mt-2" x-show="!photoPreview">
                    <img src="{{ $this->user->profile_photo_url }}" alt="{{ $this->user->name }}" class="rounded-full h-20 w-20 object-cover custom-profile-photo">
                </div>

                <!-- New Profile Photo Preview -->
                <div class="mt-2" x-show="photoPreview">
                    <span class="block rounded-full w-20 h-20 custom-profile-photo-preview"
                        x-bind:style="'background-size: cover; background-repeat: no-repeat; background-position: center center; background-image: url(\'' + photoPreview + '\');'">
                    </span>
                </div>

                <x-jet-secondary-button class="mt-2 mr-2" type="button" x-on:click.prevent="$refs.photo.click()">
                    {{ __('Select A New Photo') }}
                </x-jet-secondary-button>

                @if ($this->user->profile_photo_path)
                    <x-jet-secondary-button type="button" class="mt-2" wire:click="deleteProfilePhoto">
                        {{ __('Remove Photo') }}
                    </x-jet-secondary-button>
                @endif

                <x-jet-input-error for="photo" class="mt-2" />
            </div>
        @endif

        <!-- Name -->
        <div class="col-span-6 sm:col-span-4 custom-form-group">
            <x-jet-label for="name" value="{{ __('Nombre') }}" />
            <x-jet-input id="name" type="text" class="mt-1 block w-full custom-form-control" wire:model.defer="state.name" autocomplete="name" />
            <x-jet-input-error for="name" class="mt-2" />
        </div>

        <!-- Apellido -->
        <div class="col-span-6 sm:col-span-4 custom-form-group">
            <x-jet-label for="apellido" value="{{ __('Apellido') }}" />
            <x-jet-input id="apellido" type="text" class="mt-1 block w-full custom-form-control" wire:model.defer="state.apellido" autocomplete="apellido" />
            <x-jet-input-error for="apellido" class="mt-2" />
        </div>

        <!-- Telefono -->
        <div class="col-span-6 sm:col-span-4 custom-form-group">
            <x-jet-label for="telefono" value="{{ __('Telefono') }}" />
            <x-jet-input id="telefono" type="text" class="mt-1 block w-full custom-form-control" wire:model.defer="state.telefono" autocomplete="telefono" />
            <x-jet-input-error for="telefono" class="mt-2" />
        </div>

        <!-- Email -->
        <div class="col-span-6 sm:col-span-4 custom-form-group">
            <x-jet-label for="email" value="{{ __('Correo') }}" />
            <x-jet-input id="email" type="email" class="mt-1 block w-full custom-form-control" wire:model.defer="state.email" />
            <x-jet-input-error for="email" class="mt-2" />
        </div>

        <!-- Fecha de nacimiento -->
        <div class="col-span-6 sm:col-span-4 custom-form-group">
            <x-jet-label for="date" value="{{ __('Fecha-Nacimiento') }}" />
            <x-jet-input id="date" type="date" class="mt-1 block w-full custom-form-control" wire:model.defer="state.date" />
            <x-jet-input-error for="email" class="mt-2" />
        </div>

        <!-- Cargo -->
        <div class="col-span-6 sm:col-span-4 custom-form-group">
            <x-jet-label for="cargo" value="{{ __('Cargo') }}" />
            <x-jet-input id="cargo" type="text" class="mt-1 block w-full custom-form-control" wire:model.defer="state.cargo" autocomplete="cargo" />
            <x-jet-input-error for="cargo" class="mt-2" />
        </div>

        <!-- Area -->
        <div class="col-span-6 sm:col-span-4 custom-form-group">
            <x-jet-label for="area" value="{{ __('Area') }}" />
            <x-jet-input id="area" type="text" class="mt-1 block w-full custom-form-control" wire:model.defer="state.area" autocomplete="area" />
            <x-jet-input-error for="area" class="mt-2" />
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-jet-action-message class="mr-3" on="saved">
            {{ __('Actualizado.') }}
        </x-jet-action-message>

        <x-jet-button wire:loading.attr="disabled" wire:target="photo">
            {{ __('Actualizar') }}
        </x-jet-button>
    </x-slot>

    </div>
</x-jet-form-section>