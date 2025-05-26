<div>

    <x-tall-crud-confirmation-dialog wire:model.live="confirmingItemDeletion">
        <x-slot name="title">
            Delete Record
        </x-slot>

        <x-slot name="content">
            Are you sure you want to Delete Record?
        </x-slot>

        <x-slot name="footer">
            <x-tall-crud-button wire:click="$set('confirmingItemDeletion', false)">Cancel</x-tall-crud-button>
            <x-tall-crud-button mode="delete" wire:loading.attr="disabled" wire:click="deleteItem()">Delete
            </x-tall-crud-button>
        </x-slot>
    </x-tall-crud-confirmation-dialog>

    <x-tall-crud-dialog-modal wire:model.live="confirmingItemCreation">
        <x-slot name="title">
            Add Record
        </x-slot>

        <x-slot name="content">
            <div class="grid grid-cols-2 gap-8">
                <div class="mt-4">
                    <x-tall-crud-label>Alamat Kantor</x-tall-crud-label>
                    <x-tall-crud-input class="block mt-1 w-full" type="text" wire:model="item.alamat"/>
                    @error('item.alamat')
                    <x-tall-crud-error-message>{{$message}}</x-tall-crud-error-message> @enderror
                </div>
                <div class="mt-4">
                    <x-tall-crud-label>Jenis Kantor</x-tall-crud-label>
                    <select class="block mt-1 w-full" type="select" wire:model="item.type">
                        @foreach(\App\Models\AlamatKantor::OPT as $key => $alamatKantor)
                            <option value="{{$key}}">{{$alamatKantor}}</option>
                        @endforeach
                    </select>
                    @error('item.type')
                    <x-tall-crud-error-message>{{$message}}</x-tall-crud-error-message> @enderror
                </div>
            </div>
            <div class="grid grid-cols-2 gap-8">

                <div class="grid grid-cols-3">
                    <div class="mt-4">
                        <x-tall-crud-label>Provinsi</x-tall-crud-label>
                        <x-tall-crud-select class="block mt-1 w-full" wire:model="item.provinsi_id">
                            <option value="">Please Select</option>
                            @foreach($provinsis as $c)
                                <option value="{{$c->id_provinsi}}">{{$c->nama_provinsi}}</option>
                            @endforeach
                        </x-tall-crud-select>
                        @error('item.provinsi_id')
                        <x-tall-crud-error-message>{{$message}}</x-tall-crud-error-message> @enderror
                    </div>
                </div>

                <div class="grid grid-cols-3">
                    <div class="mt-4">
                        <x-tall-crud-label>KabupatenKota</x-tall-crud-label>
                        <x-tall-crud-select class="block mt-1 w-full" wire:model="item.kabupaten_kota_id">
                            <option value="">Please Select</option>
                            @foreach($kabupatenKotas as $c)
                                <option value="{{$c->id_kabupaten_kota}}">{{$c->nama_kabupaten}}</option>
                            @endforeach
                        </x-tall-crud-select>
                        @error('item.kabupaten_kota_id')
                        <x-tall-crud-error-message>{{$message}}</x-tall-crud-error-message> @enderror
                    </div>
                </div>
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-tall-crud-button wire:click="$set('confirmingItemCreation', false)">Cancel</x-tall-crud-button>
            <x-tall-crud-button mode="add" wire:loading.attr="disabled" wire:click="createItem()">Save
            </x-tall-crud-button>
        </x-slot>
    </x-tall-crud-dialog-modal>

    <x-tall-crud-dialog-modal wire:model.live="confirmingItemEdit">
        <x-slot name="title">
            Edit Record
        </x-slot>

        <x-slot name="content">
            <div class="grid grid-cols-2 gap-8">
                <div class="mt-4">
                    <x-tall-crud-label>Alamat Kantor</x-tall-crud-label>
                    <x-tall-crud-input class="block mt-1 w-full" type="text" wire:model="item.alamat"/>
                    @error('item.alamat')
                    <x-tall-crud-error-message>{{$message}}</x-tall-crud-error-message> @enderror
                </div>
                <div class="mt-4">
                    <x-tall-crud-label>Jenis Kantor</x-tall-crud-label>
                    <select class="block mt-1 w-full" type="select" wire:model="item.type">
                        @foreach(\App\Models\AlamatKantor::OPT as $key => $alamatKantor)
                            <option value="{{$key}}">{{$alamatKantor}}</option>
                        @endforeach
                    </select>
                    @error('item.type')
                    <x-tall-crud-error-message>{{$message}}</x-tall-crud-error-message> @enderror
                </div>
            </div>
            <div class="grid grid-cols-2 gap-8">

                <div class="grid grid-cols-3">
                    <div class="mt-4">
                        <x-tall-crud-label>Provinsi</x-tall-crud-label>
                        <x-tall-crud-select class="block mt-1 w-full" wire:model="item.provinsi_id">
                            <option value="">Please Select</option>
                            @foreach($provinsis as $c)
                                <option value="{{$c->id_provinsi}}">{{$c->nama_provinsi}}</option>
                            @endforeach
                        </x-tall-crud-select>
                        @error('item.provinsi_id')
                        <x-tall-crud-error-message>{{$message}}</x-tall-crud-error-message> @enderror
                    </div>
                </div>

                <div class="grid grid-cols-3">
                    <div class="mt-4">
                        <x-tall-crud-label>KabupatenKota</x-tall-crud-label>
                        <x-tall-crud-select class="block mt-1 w-full" wire:model="item.kabupaten_kota_id">
                            <option value="">Please Select</option>
                            @foreach($kabupatenKotas as $c)
                                <option value="{{$c->id_kabupaten_kota}}">{{$c->nama_kabupaten}}</option>
                            @endforeach
                        </x-tall-crud-select>
                        @error('item.kabupaten_kota_id')
                        <x-tall-crud-error-message>{{$message}}</x-tall-crud-error-message> @enderror
                    </div>
                </div>
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-tall-crud-button wire:click="$set('confirmingItemEdit', false)">Cancel</x-tall-crud-button>
            <x-tall-crud-button mode="add" wire:loading.attr="disabled" wire:click="editItem()">Save
            </x-tall-crud-button>
        </x-slot>
    </x-tall-crud-dialog-modal>
</div>
