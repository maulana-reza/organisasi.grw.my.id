<?php

namespace App\Livewire;
use Livewire\Attributes\On;
use Livewire\Component;
use \Illuminate\View\View;
use App\Models\Organisasi;

class OrganisasiReferenceChild extends Component
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
        'item.nama_organisasi' => '',
        'item.tahun_berdiri' => '',
        'item.peran' => '',
        'item.tujuan' => '',
        'item.kegiatan' => '',
        'item.sejarah' => '',
        'item.deskripsi' => '',
    ];

    /**
     * @var array
     */
    protected $validationAttributes = [
        'item.nama_organisasi' => 'Nama Organisasi',
        'item.tahun_berdiri' => 'Tahun Berdiri',
        'item.peran' => 'Peran',
        'item.tujuan' => 'Tujuan',
        'item.kegiatan' => 'Kegiatan',
        'item.sejarah' => 'Sejarah',
        'item.deskripsi' => 'Deskripsi Organisasi',
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

    public $organisasi ;

    /**
     * @var bool
     */
    public $confirmingItemEdit = false;

    public function render(): View
    {
        return view('livewire.organisasi-reference-child');
    }
    #[On('showDeleteForm')]
    public function showDeleteForm(Organisasi $organisasi): void
    {
        $this->confirmingItemDeletion = true;
        $this->organisasi = $organisasi;
    }

    public function deleteItem(): void
    {
        $this->organisasi->delete();
        $this->confirmingItemDeletion = false;
        $this->organisasi = '';
        $this->reset(['item']);
        $this->dispatch('refresh')->to('organisasi-reference');
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
        $item = Organisasi::create([
            'nama_organisasi' => $this->item['nama_organisasi'] ?? '', 
            'tahun_berdiri' => $this->item['tahun_berdiri'] ?? '', 
            'peran' => $this->item['peran'] ?? '', 
            'tujuan' => $this->item['tujuan'] ?? '', 
            'kegiatan' => $this->item['kegiatan'] ?? '', 
            'sejarah' => $this->item['sejarah'] ?? '', 
            'deskripsi' => $this->item['deskripsi'] ?? '', 
        ]);
        $this->confirmingItemCreation = false;
        $this->dispatch('refresh')->to('organisasi-reference');
        $this->dispatch('show', 'Record Added Successfully')->to('livewire-toast');

    }
        
    #[On('showEditForm')]
    public function showEditForm(Organisasi $organisasi): void
    {
        $this->resetErrorBag();
        $this->organisasi = $organisasi;
        $this->item = $organisasi->toArray();
        $this->confirmingItemEdit = true;
    }

    public function editItem(): void
    {
        $this->validate();
        $item = $this->organisasi->update([
            'nama_organisasi' => $this->item['nama_organisasi'] ?? '', 
            'tahun_berdiri' => $this->item['tahun_berdiri'] ?? '', 
            'peran' => $this->item['peran'] ?? '', 
            'tujuan' => $this->item['tujuan'] ?? '', 
            'kegiatan' => $this->item['kegiatan'] ?? '', 
            'sejarah' => $this->item['sejarah'] ?? '', 
            'deskripsi' => $this->item['deskripsi'] ?? '', 
         ]);
        $this->confirmingItemEdit = false;
        $this->primaryKey = '';
        $this->dispatch('refresh')->to('organisasi-reference');
        $this->dispatch('show', 'Record Updated Successfully')->to('livewire-toast');

    }

}
