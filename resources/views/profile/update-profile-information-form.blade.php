<x-jet-form-section submit="updateProfileInformation">
    <x-slot name="title">
        {{ __('Informasi Profil') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Untuk mempermudah proses transaksi jual beli rumput laut, lengkapi data diri anda.') }}
    </x-slot>

    <x-slot name="form">
        <!-- Profile Photo -->
        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
        <div x-data="{photoName: null, photoPreview: null}" class="col-span-6 sm:col-span-4">
            <!-- Profile Photo File Input -->
            <input type="file" class="hidden" wire:model="photo" x-ref="photo" x-on:change="
                                    photoName = $refs.photo.files[0].name;
                                    const reader = new FileReader();
                                    reader.onload = (e) => {
                                        photoPreview = e.target.result;
                                    };
                                    reader.readAsDataURL($refs.photo.files[0]);
                            " />

            <x-jet-label for="photo" value="{{ __('Photo') }}" />

            <!-- Current Profile Photo -->
            <div class="mt-2" x-show="! photoPreview">
                <img src="{{ $this->user->profile_photo_url }}" alt="{{ $this->user->name }}" class="rounded-full h-20 w-20 object-cover">
            </div>

            <!-- New Profile Photo Preview -->
            <div class="mt-2" x-show="photoPreview">
                <span class="block rounded-full w-20 h-20" x-bind:style="'background-size: cover; background-repeat: no-repeat; background-position: center center; background-image: url(\'' + photoPreview + '\');'">
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
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="no_ktp" value="{{ __('No. KTP') }}" />
            <x-jet-input id="no_ktp" type="text" class="mt-1 block w-full" wire:model.defer="state.no_ktp" autocomplete="no_ktp" />
            <x-jet-input-error for="no_ktp" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="nama" value="{{ __('Nama') }}" />
            <x-jet-input id="nama" type="text" class="mt-1 block w-full" wire:model.defer="state.nama" autocomplete="nama" />
            <x-jet-input-error for="nama" class="mt-2" />
        </div>

        <!-- Email -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="email" value="{{ __('Email') }}" />
            <x-jet-input id="email" type="email" class="mt-1 block w-full" wire:model.defer="state.email" />
            <x-jet-input-error for="email" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="no_hp" value="{{ __('No. HP') }}" />
            <x-jet-input id="no_hp" type="text" class="mt-1 block w-full" wire:model.defer="state.no_hp" autocomplete="no_hp" />
            <x-jet-input-error for="no_hp" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="tgl_lahir" value="{{ __('Tanggal Lahir') }}" />
            <x-jet-input id="tgl_lahir" type="date" class="mt-1 block w-full" wire:model.defer="state.tgl_lahir" autocomplete="tgl_lahir" />
            <x-jet-input-error for="tgl_lahir" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="jenkel" value="{{ __('Jenis Kelamin') }}" />
            <x-jet-input id="jenkel" type="radio" class="mt-1 block w-full" wire:model.defer="state.jenkel" autocomplete="jenkel" />
            <x-jet-input id="jenkel" type="radio" class="mt-1 block w-full" wire:model.defer="state.jenkel" autocomplete="jenkel" />
            <x-jet-input-error for="jenkel" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="alamat" value="{{ __('Alamat') }}" />
            <x-jet-input id="alamat" type="text" class="mt-1 block w-full" wire:model.defer="state.alamat" autocomplete="alamat" />
            <x-jet-input-error for="alamat" class="mt-2" />
        </div>




    </x-slot>

    <x-slot name="actions">
        <x-jet-action-message class="mr-3" on="saved">
            {{ __('Simpan') }}
        </x-jet-action-message>

        <x-jet-button wire:loading.attr="disabled" wire:target="photo">
            {{ __('Simpan') }}
        </x-jet-button>
    </x-slot>
</x-jet-form-section>