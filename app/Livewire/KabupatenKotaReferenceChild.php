<?php

namespace App\Livewire;
use Livewire\Attributes\On;
use Livewire\Component;
use \Illuminate\View\View;
use App\Models\KabupatenKota;
use App\Models\Provinsi;

class KabupatenKotaReferenceChild extends Component
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
    protected $rules = [
        'item.nama_kabupaten' => '',
        'item.provinsi_id' => 'required',
    ];

    /**
     * @var array
     */
    protected $validationAttributes = [
        'item.nama_kabupaten' => 'Nama Kabupaten',
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

    public $kabupatenkota ;

    /**
     * @var bool
     */
    public $confirmingItemEdit = false;

    public function render(): View
    {
        return view('livewire.kabupaten-kota-reference-child');
    }
    #[On('showDeleteForm')]
    public function showDeleteForm(KabupatenKota $kabupatenkota): void
    {
        $this->confirmingItemDeletion = true;
        $this->kabupatenkota = $kabupatenkota;
    }

    public function deleteItem(): void
    {
        $this->kabupatenkota->delete();
        $this->confirmingItemDeletion = false;
        $this->kabupatenkota = '';
        $this->reset(['item']);
        $this->dispatch('refresh')->to('kabupaten-kota-reference');
        $this->dispatch('show', 'Record Deleted Successfully')->to('livewire-toast');

    }
 
    #[On('showCreateForm')]
    public function showCreateForm(): void
    {
        $this->confirmingItemCreation = true;
        $this->resetErrorBag();
        $this->reset(['item']);

        $this->provinsis = Provinsi::orderBy('nama_provinsi')->get();
    }

    public function createItem(): void
    {
        $this->validate();
        $item = KabupatenKota::create([
            'nama_kabupaten' => $this->item['nama_kabupaten'] ?? '', 
            'provinsi_id' => $this->item['provinsi_id'] ?? 0, 
        ]);
        $this->confirmingItemCreation = false;
        $this->dispatch('refresh')->to('kabupaten-kota-reference');
        $this->dispatch('show', 'Record Added Successfully')->to('livewire-toast');

    }
        
    #[On('showEditForm')]
    public function showEditForm(KabupatenKota $kabupatenkota): void
    {
        $this->resetErrorBag();
        $this->kabupatenkota = $kabupatenkota;
        $this->item = $kabupatenkota->toArray();
        $this->confirmingItemEdit = true;

        $this->provinsis = Provinsi::orderBy('nama_provinsi')->get();
    }

    public function editItem(): void
    {
        $this->validate();
        $item = $this->kabupatenkota->update([
            'nama_kabupaten' => $this->item['nama_kabupaten'] ?? '', 
         ]);
        $this->confirmingItemEdit = false;
        $this->primaryKey = '';
        $this->dispatch('refresh')->to('kabupaten-kota-reference');
        $this->dispatch('show', 'Record Updated Successfully')->to('livewire-toast');

    }

}
