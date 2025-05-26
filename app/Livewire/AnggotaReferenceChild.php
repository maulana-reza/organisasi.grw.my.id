<?php

namespace App\Livewire;
use Livewire\Attributes\On;
use Livewire\Component;
use \Illuminate\View\View;
use App\Models\Anggota;
use App\Models\Organisasi;

class AnggotaReferenceChild extends Component
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
    public $organisasis = [];

    /**
     * @var array
     */
    protected $rules = [
        'item.nama_anggota' => '',
        'item.alamat' => '',
        'item.foto' => '',
        'item.no_hp' => '',
        'item.email' => '',
        'item.organisasi_id' => 'required',
    ];

    /**
     * @var array
     */
    protected $validationAttributes = [
        'item.nama_anggota' => 'Nama Anggota',
        'item.alamat' => 'Alamat',
        'item.foto' => 'Foto',
        'item.no_hp' => 'No. HP',
        'item.email' => 'Email',
        'item.organisasi_id' => 'Organisasi',
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

    public $anggota ;

    /**
     * @var bool
     */
    public $confirmingItemEdit = false;

    public function render(): View
    {
        return view('livewire.anggota-reference-child');
    }
    #[On('showDeleteForm')]
    public function showDeleteForm(Anggota $anggota): void
    {
        $this->confirmingItemDeletion = true;
        $this->anggota = $anggota;
    }

    public function deleteItem(): void
    {
        $this->anggota->delete();
        $this->confirmingItemDeletion = false;
        $this->anggota = '';
        $this->reset(['item']);
        $this->dispatch('refresh')->to('anggota-reference');
        $this->dispatch('show', 'Record Deleted Successfully')->to('livewire-toast');

    }
 
    #[On('showCreateForm')]
    public function showCreateForm(): void
    {
        $this->confirmingItemCreation = true;
        $this->resetErrorBag();
        $this->reset(['item']);

        $this->organisasis = Organisasi::orderBy('nama_organisasi')->get();
    }

    public function createItem(): void
    {
        $this->validate();
        $item = Anggota::create([
            'nama_anggota' => $this->item['nama_anggota'] ?? '', 
            'alamat' => $this->item['alamat'] ?? '', 
            'foto' => $this->item['foto'] ?? '', 
            'no_hp' => $this->item['no_hp'] ?? '', 
            'email' => $this->item['email'] ?? '', 
            'organisasi_id' => $this->item['organisasi_id'] ?? 0, 
        ]);
        $this->confirmingItemCreation = false;
        $this->dispatch('refresh')->to('anggota-reference');
        $this->dispatch('show', 'Record Added Successfully')->to('livewire-toast');

    }
        
    #[On('showEditForm')]
    public function showEditForm(Anggota $anggota): void
    {
        $this->resetErrorBag();
        $this->anggota = $anggota;
        $this->item = $anggota->toArray();
        $this->confirmingItemEdit = true;

        $this->organisasis = Organisasi::orderBy('nama_organisasi')->get();
    }

    public function editItem(): void
    {
        $this->validate();
        $item = $this->anggota->update([
            'nama_anggota' => $this->item['nama_anggota'] ?? '', 
            'alamat' => $this->item['alamat'] ?? '', 
            'foto' => $this->item['foto'] ?? '', 
            'no_hp' => $this->item['no_hp'] ?? '', 
            'email' => $this->item['email'] ?? '', 
         ]);
        $this->confirmingItemEdit = false;
        $this->primaryKey = '';
        $this->dispatch('refresh')->to('anggota-reference');
        $this->dispatch('show', 'Record Updated Successfully')->to('livewire-toast');

    }

}
