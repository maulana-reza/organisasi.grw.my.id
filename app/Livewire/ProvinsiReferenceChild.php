<?php

namespace App\Livewire;
use Livewire\Attributes\On;
use Livewire\Component;
use \Illuminate\View\View;
use App\Models\Provinsi;

class ProvinsiReferenceChild extends Component
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
    protected $rules = [
        'item.nama_provinsi' => '',
    ];

    /**
     * @var array
     */
    protected $validationAttributes = [
        'item.nama_provinsi' => 'Nama Provinsi',
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

    public $provinsi ;

    /**
     * @var bool
     */
    public $confirmingItemEdit = false;

    public function render(): View
    {
        return view('livewire.provinsi-reference-child');
    }
    #[On('showDeleteForm')]
    public function showDeleteForm(Provinsi $provinsi): void
    {
        $this->confirmingItemDeletion = true;
        $this->provinsi = $provinsi;
    }

    public function deleteItem(): void
    {
        $this->provinsi->delete();
        $this->confirmingItemDeletion = false;
        $this->provinsi = '';
        $this->reset(['item']);
        $this->dispatch('refresh')->to('provinsi-reference');
        $this->dispatch('show', 'Record Deleted Successfully')->to('livewire-toast');

    }
 
    #[On('showCreateForm')]
    public function showCreateForm(): void
    {
        $this->confirmingItemCreation = true;
        $this->resetErrorBag();
        $this->reset(['item']);
    }

    public function createItem(): void
    {
        $this->validate();
        $item = Provinsi::create([
            'nama_provinsi' => $this->item['nama_provinsi'] ?? '', 
        ]);
        $this->confirmingItemCreation = false;
        $this->dispatch('refresh')->to('provinsi-reference');
        $this->dispatch('show', 'Record Added Successfully')->to('livewire-toast');

    }
        
    #[On('showEditForm')]
    public function showEditForm(Provinsi $provinsi): void
    {
        $this->resetErrorBag();
        $this->provinsi = $provinsi;
        $this->item = $provinsi->toArray();
        $this->confirmingItemEdit = true;
    }

    public function editItem(): void
    {
        $this->validate();
        $item = $this->provinsi->update([
            'nama_provinsi' => $this->item['nama_provinsi'] ?? '', 
         ]);
        $this->confirmingItemEdit = false;
        $this->primaryKey = '';
        $this->dispatch('refresh')->to('provinsi-reference');
        $this->dispatch('show', 'Record Updated Successfully')->to('livewire-toast');

    }

}
