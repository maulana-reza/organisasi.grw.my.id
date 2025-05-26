<div>
<div class="bg-white rounded-lg px-8 py-6 my-16 overflow-x-scroll custom-scrollbar">
    <div class="flex justify-between">
        <div class="text-2xl">Organisasi Yang Dinaungi</div>
        <button type="submit" wire:click="$dispatchTo('organisasi-naungan-reference-child', 'showCreateForm');" class="text-blue-500">
            <x-tall-crud-icon-add />
        </button>
    </div>

    <div class="mt-6">
        <div class="flex justify-between">
            <div class="flex">

                <x-tall-crud-filter :filters=$filters />
            </div>
            <div class="flex">

                <x-tall-crud-page-dropdown />
            </div>
        </div>
        <table class="w-full my-8 whitespace-nowrap" wire:loading.class.delay="opacity-50">
            <thead class="bg-secondary text-gray-100 font-bold">
                <tr class="text-left font-bold bg-blue-400">
                <td class="px-3 py-2" >Nama Organisasi</td>
                <td class="px-3 py-2" >Jumlah Anggota</td>
                <td class="px-3 py-2" >Dinaungi oleh organisasi</td>
                <td class="px-3 py-2" >Actions</td>
                </tr>
            </thead>
            <tbody class="divide-y divide-blue-400">
            @foreach($results as $result)
                <tr class="hover:bg-blue-300 {{ ($loop->even ) ? "bg-blue-100" : ""}}">
                    <td class="px-3 py-2" >{{ $result->nama_organisasi }}</td>
                    <td class="px-3 py-2" >{{ $result->jumlah_anggota }}</td>
                    <td class="px-3 py-2" >{{ $result->organisasi->nama_organisasi }}</td>
                    <td class="px-3 py-2" >
                        <button type="submit" wire:click="$dispatchTo('organisasi-naungan-reference-child', 'showEditForm', { organisasinaungan: {{ $result->id}} });" class="text-green-500">
                            <x-tall-crud-icon-edit />
                        </button>
                        <button type="submit" wire:click="$dispatchTo('organisasi-naungan-reference-child', 'showDeleteForm', { organisasinaungan: {{ $result->id}} });" class="text-red-500">
                            <x-tall-crud-icon-delete />
                        </button>
                    </td>
               </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $results->links() }}
    </div>
    @livewire('organisasi-naungan-reference-child')
    @livewire('livewire-toast')
</div>
 </div>
