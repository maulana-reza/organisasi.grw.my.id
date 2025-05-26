<?php

namespace App\Livewire;

use Livewire\Attributes\On;
use Livewire\Component;
use \Illuminate\View\View;
use App\Models\OrganisasiNaungan;
use App\Models\Organisasi;
use App\Models\Provinsi;

class OrganisasiNaunganReferenceChild extends Component
{

    public $item = [];

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
    public $organisasis = [];

    /**
     * @var array
     */
    public $provinsis = [];

    /**
     * @var array
     */
    protected $rules = [
        'item.jumlah_anggota' => '',
        'item.organisasi_id' => 'required',
        'item.provinsi_id' => 'required',
    ];

    /**
     * @var array
     */
    protected $validationAttributes = [
        'item.jumlah_anggota' => 'Jumlah Anggota',
        'item.organisasi_id' => 'Organisasi',
        'item.provinsi_id' => 'Provinsi',
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

    public $organisasinaungan;

    /**
     * @var bool
     */
    public $confirmingItemEdit = false;

    public function render(): View
    {
        return view('livewire.organisasi-naungan-reference-child');
    }

    #[On('showDeleteForm')]
    public function showDeleteForm(OrganisasiNaungan $organisasinaungan): void
    {
        $this->confirmingItemDeletion = true;
        $this->organisasinaungan = $organisasinaungan;
    }

    public function deleteItem(): void
    {
        $this->organisasinaungan->delete();
        $this->confirmingItemDeletion = false;
        $this->organisasinaungan = '';
        $this->reset(['item']);
        $this->dispatch('refresh')->to('organisasi-naungan-reference');
        $this->dispatch('show', 'Record Deleted Successfully')->to('livewire-toast');

    }

    #[On('showCreateForm')]
    public function showCreateForm(): void
    {
        $this->confirmingItemCreation = true;
        $this->resetErrorBag();
        $this->reset(['item']);

        $this->organisasis = Organisasi::orderBy('nama_organisasi')->get();

        $this->provinsis = Provinsi::orderBy('nama_provinsi')->get();
    }

    public function createItem(): void
    {
        $this->validate();
        $item = OrganisasiNaungan::create([
            'nama_organisasi' => $this->item['nama_organisasi'] ?? '',
            'jumlah_anggota' => $this->item['jumlah_anggota'] ?? '',
            'organisasi_id' => $this->item['organisasi_id'] ?? null,
            'provinsi_id' => $this->item['provinsi_id'] ?? null,
        ]);
        $this->confirmingItemCreation = false;
        $this->dispatch('refresh')->to('organisasi-naungan-reference');
        $this->dispatch('show', 'Record Added Successfully')->to('livewire-toast');

    }

    #[On('showEditForm')]
    public function showEditForm(OrganisasiNaungan $organisasinaungan): void
    {
        $this->resetErrorBag();
        $this->organisasinaungan = $organisasinaungan;
        $this->item = $organisasinaungan->toArray();
        $this->confirmingItemEdit = true;

        $this->organisasis = Organisasi::orderBy('nama_organisasi')->get();

        $this->provinsis = Provinsi::orderBy('nama_provinsi')->get();
    }

    public function editItem(): void
    {
        $this->validate();
        $item = $this->organisasinaungan->update([
            'nama_organisasi' => $this->item['nama_organisasi'] ?? '',
            'jumlah_anggota' => $this->item['jumlah_anggota'] ?? '',
            'organisasi_id' => $this->item['organisasi_id'] ?? null,
            'provinsi_id' => $this->item['provinsi_id'] ?? null,
        ]);
        $this->confirmingItemEdit = false;
        $this->primaryKey = '';
        $this->dispatch('refresh')->to('organisasi-naungan-reference');
        $this->dispatch('show', 'Record Updated Successfully')->to('livewire-toast');

    }

}
