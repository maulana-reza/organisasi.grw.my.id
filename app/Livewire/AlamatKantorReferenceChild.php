<?php

namespace App\Livewire;
use Livewire\Attributes\On;
use Livewire\Component;
use \Illuminate\View\View;
use App\Models\AlamatKantor;
use App\Models\Provinsi;
use App\Models\KabupatenKota;

class AlamatKantorReferenceChild extends Component
{

    public $item=[];

    /**
     * @var array
     */
    protected $listeners = [
        'showDeleteForm',
        'showCreateForm',
        'showEditForm',
    ];

    /**
     * @var array
     */
    public $provinsis = [];

    /**
     * @var array
     */
    public $kabupatenKotas = [];

    /**
     * @var array
     */
    protected $rules = [
        'item.alamat' => '',
        'item.type' => '',
        'item.provinsi_id' => 'nullable',
        'item.kabupaten_kota_id' => 'nullable',
    ];

    /**
     * @var array
     */
    protected $validationAttributes = [
        'item.alamat' => 'Alamat Kantor',
        'item.type' => 'Jenis Kantor',
        'item.provinsi_id' => 'Provinsi',
        'item.kabupaten_kota_id' => 'KabupatenKota',
    ];

    /**
     * @var bool
     */
    public $confirmingItemDeletion = false;

    /**
     * @var string | int
     */
    public $primaryKey;

    /**
     * @var bool
     */
    public $confirmingItemCreation = false;

    public $alamatkantor ;

    /**
     * @var bool
     */
    public $confirmingItemEdit = false;

    public function render(): View
    {
        return view('livewire.alamat-kantor-reference-child');
    }
    #[On('showDeleteForm')]
    public function showDeleteForm(AlamatKantor $alamatkantor): void
    {
        $this->confirmingItemDeletion = true;
        $this->alamatkantor = $alamatkantor;
    }

    public function deleteItem(): void
    {
        $this->alamatkantor->delete();
        $this->confirmingItemDeletion = false;
        $this->alamatkantor = '';
        $this->reset(['item']);
        $this->dispatch('refresh')->to('alamat-kantor-reference');
        $this->dispatch('show', 'Record Deleted Successfully')->to('livewire-toast');

    }

    #[On('showCreateForm')]
    public function showCreateForm(): void
    {
        $this->confirmingItemCreation = true;
        $this->resetErrorBag();
        $this->reset(['item']);

        $this->provinsis = Provinsi::orderBy('nama_provinsi')->get();

        $this->kabupatenKotas = KabupatenKota::orderBy('nama_kabupaten')->get();
    }

    public function createItem(): void
    {
        $this->validate();
        $item = AlamatKantor::create([
            'alamat' => $this->item['alamat'] ?? '',
            'type' => $this->item['type'] ?? '',
            'provinsi_id' => $this->item['provinsi_id'] ?? null,
            'kabupaten_kota_id' => $this->item['kabupaten_kota_id'] ?? null,
        ]);
        $this->confirmingItemCreation = false;
        $this->dispatch('refresh')->to('alamat-kantor-reference');
        $this->dispatch('show', 'Record Added Successfully')->to('livewire-toast');

    }

    #[On('showEditForm')]
    public function showEditForm(AlamatKantor $alamatkantor): void
    {
        $this->resetErrorBag();
        $this->alamatkantor = $alamatkantor;
        $this->item = $alamatkantor->toArray();
        $this->confirmingItemEdit = true;

        $this->provinsis = Provinsi::orderBy('nama_provinsi')->get();

        $this->kabupatenKotas = KabupatenKota::orderBy('nama_kabupaten')->get();
    }

    public function editItem(): void
    {
        $this->validate();
        $item = $this->alamatkantor->update([
            'alamat' => $this->item['alamat'] ?? '',
            'type' => $this->item['type'] ?? '',
         ]);
        $this->confirmingItemEdit = false;
        $this->primaryKey = '';
        $this->dispatch('refresh')->to('alamat-kantor-reference');
        $this->dispatch('show', 'Record Updated Successfully')->to('livewire-toast');

    }

}
