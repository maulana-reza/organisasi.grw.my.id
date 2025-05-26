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
                    <x-tall-crud-label>Nama Anggota</x-tall-crud-label>
                    <x-tall-crud-input class="block mt-1 w-full" type="text" wire:model="item.nama_anggota"/>
                    @error('item.nama_anggota')
                    <x-tall-crud-error-message>{{$message}}</x-tall-crud-error-message> @enderror
                </div>
                <div class="mt-4">
                    <x-tall-crud-label>Alamat</x-tall-crud-label>
                    <x-tall-crud-input class="block mt-1 w-full" type="text" wire:model="item.alamat"/>
                    @error('item.alamat')
                    <x-tall-crud-error-message>{{$message}}</x-tall-crud-error-message> @enderror
                </div>
            </div>
            <div class="grid grid-cols-2 gap-8">
                <div class="mt-4">
                    <x-tall-crud-label>Foto</x-tall-crud-label>
                    <x-tall-crud-input class="block mt-1 w-full" type="file" wire:model="item.foto"/>
                    @error('item.foto')
                    <x-tall-crud-error-message>{{$message}}</x-tall-crud-error-message> @enderror
                </div>
                <div class="mt-4">
                    <x-tall-crud-label>No. HP</x-tall-crud-label>
                    <x-tall-crud-input class="block mt-1 w-full" type="text" wire:model="item.no_hp"/>
                    @error('item.no_hp')
                    <x-tall-crud-error-message>{{$message}}</x-tall-crud-error-message> @enderror
                </div>
            </div>
            <div class="grid grid-cols-2 gap-8">
                <div class="mt-4">
                    <x-tall-crud-label>Email</x-tall-crud-label>
                    <x-tall-crud-input class="block mt-1 w-full" type="text" wire:model="item.email"/>
                    @error('item.email')
                    <x-tall-crud-error-message>{{$message}}</x-tall-crud-error-message> @enderror
                </div>

                <div class="mt-4">
                    <x-tall-crud-label>Organisasi</x-tall-crud-label>
                    <x-tall-crud-select class="block mt-1 w-full" wire:model="item.organisasi_id">
                        <option value="">Please Select</option>
                        @foreach($organisasis as $c)
                            <option value="{{$c->id_organisasi}}">{{$c->nama_organisasi}}</option>
                        @endforeach
                    </x-tall-crud-select>
                    @error('item.organisasi_id')
                    <x-tall-crud-error-message>{{$message}}</x-tall-crud-error-message> @enderror
                </div>
            </div>
            <div class="grid grid-cols-2 gap-8">
                <div class="mt-4">
                    <x-tall-crud-label>Alamat Kantor</x-tall-crud-label>
                    <select class="block mt-1 w-full" type="select" wire:model="item.alamat_kantor_id">
                        <option value="">PILIH</option>
                        @foreach(\App\Models\AlamatKantor::selectRaw("concat(type,' - ',alamat) as alamat,id_alamat_kantor")->get()->pluck('alamat','id_alamat_kantor') as $key => $alamatKantor)
                            <option value="{{$key}}">{{$alamatKantor}}</option>
                        @endforeach
                    </select>
                    @error('item.type')
                    <x-tall-crud-error-message>{{$message}}</x-tall-crud-error-message> @enderror
                </div>
                <div class="mt-4">
                    <x-tall-crud-label>Jabatan</x-tall-crud-label>
                    <select class="block mt-1 w-full" type="select" wire:model="item.jabatan">
                        <option value="">PILIH</option>
                        @foreach(\App\Models\Jabatan::JABATAN_OPTIONS_ALL as $key => $jabatan)
                            <option value="{{$jabatan}}">{{$jabatan}}</option>
                        @endforeach
                    </select>
                    @error('item.type')
                    <x-tall-crud-error-message>{{$message}}</x-tall-crud-error-message> @enderror
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
                    <x-tall-crud-label>Nama Anggota</x-tall-crud-label>
                    <x-tall-crud-input class="block mt-1 w-full" type="text" wire:model="item.nama_anggota"/>
                    @error('item.nama_anggota')
                    <x-tall-crud-error-message>{{$message}}</x-tall-crud-error-message> @enderror
                </div>
                <div class="mt-4">
                    <x-tall-crud-label>Alamat</x-tall-crud-label>
                    <x-tall-crud-input class="block mt-1 w-full" type="text" wire:model="item.alamat"/>
                    @error('item.alamat')
                    <x-tall-crud-error-message>{{$message}}</x-tall-crud-error-message> @enderror
                </div>
            </div>
            <div class="grid grid-cols-2 gap-8">
                <div class="mt-4">
                    <x-tall-crud-label>Foto</x-tall-crud-label>
                    <x-tall-crud-input class="block mt-1 w-full" type="file" wire:model="item.foto"/>
                    @error('item.foto')
                    <x-tall-crud-error-message>{{$message}}</x-tall-crud-error-message> @enderror
                </div>
                <div class="mt-4">
                    <x-tall-crud-label>No. HP</x-tall-crud-label>
                    <x-tall-crud-input class="block mt-1 w-full" type="text" wire:model="item.no_hp"/>
                    @error('item.no_hp')
                    <x-tall-crud-error-message>{{$message}}</x-tall-crud-error-message> @enderror
                </div>
            </div>
            <div class="grid grid-cols-2 gap-8">
                <div class="mt-4">
                    <x-tall-crud-label>Email</x-tall-crud-label>
                    <x-tall-crud-input class="block mt-1 w-full" type="text" wire:model="item.email"/>
                    @error('item.email')
                    <x-tall-crud-error-message>{{$message}}</x-tall-crud-error-message> @enderror
                </div>

                <div class="mt-4">
                    <x-tall-crud-label>Organisasi</x-tall-crud-label>
                    <x-tall-crud-select class="block mt-1 w-full" wire:model="item.organisasi_id">
                        <option value="">Please Select</option>
                        @foreach($organisasis as $c)
                            <option value="{{$c->id_organisasi}}">{{$c->nama_organisasi}}</option>
                        @endforeach
                    </x-tall-crud-select>
                    @error('item.organisasi_id')
                    <x-tall-crud-error-message>{{$message}}</x-tall-crud-error-message> @enderror
                </div>
            </div>
            <div class="grid grid-cols-2 gap-8">
                <div class="mt-4">
                    <x-tall-crud-label>Alamat Kantor</x-tall-crud-label>
                    <select class="block mt-1 w-full" type="select" wire:model="item.alamat_kantor_id">
                        <option value="">PILIH</option>
                        @foreach(\App\Models\AlamatKantor::selectRaw("concat(type,' - ',alamat) as alamat,id_alamat_kantor")->get()->pluck('alamat','id_alamat_kantor') as $key => $alamatKantor)
                            <option value="{{$key}}">{{$alamatKantor}}</option>
                        @endforeach
                    </select>
                    @error('item.type')
                    <x-tall-crud-error-message>{{$message}}</x-tall-crud-error-message> @enderror
                </div>
                <div class="mt-4">
                    <x-tall-crud-label>Jabatan</x-tall-crud-label>
                    <select class="block mt-1 w-full" type="select" wire:model="item.jabatan">
                        <option value="">PILIH</option>
                        @foreach(\App\Models\Jabatan::JABATAN_OPTIONS_ALL as $key => $jabatan)
                            <option value="{{$jabatan}}">{{$jabatan}}</option>
                        @endforeach
                    </select>
                    @error('item.type')
                    <x-tall-crud-error-message>{{$message}}</x-tall-crud-error-message> @enderror
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
