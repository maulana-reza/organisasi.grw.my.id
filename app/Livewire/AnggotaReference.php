<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Database\Eloquent\Builder;
use \Illuminate\View\View;

use App\Models\Anggota;
use App\Models\Organisasi;

class AnggotaReference extends Component
{
    use WithPagination;

    /**
     * @var array
     */
    protected $listeners = ['refresh' => '$refresh'];
    /**
     * @var string
     */
    public $q;

    /**
     * @var int
     */
    public $per_page = 15;

    /**
     * @var array
     */
    public $filters = [];

    /**
     * @var array
     */
    public $selectedFilters = [];


    public function mount(): void
    {
        $this->initFilters();
    }

    public function render(): View
    {
        $results = $this->query()
            ->with(['jabatans'])
            ->when($this->q, function ($query) {
                return $query->where(function ($query) {
                    $query->where('nama_anggota', 'like', '%' . $this->q . '%')
                        ->orWhere('alamat', 'like', '%' . $this->q . '%')
                        ->orWhere('no_hp', 'like', '%' . $this->q . '%')
                        ->orWhere('email', 'like', '%' . $this->q . '%');
                });
            })
            ->paginate($this->per_page);

        return view('livewire.anggota-reference', [
            'results' => $results
        ]);
    }

    public function updatingQ(): void
    {
        $this->resetPage();
    }

    public function updatingPerPage(): void
    {
        $this->resetPage();
    }

    public function updatingSelectedFilters(): void
    {
        $this->resetPage();
    }

    private function isFilterSet(string $column): bool
    {
        if (isset($this->selectedFilters[$column])) {
            if (is_array($this->selectedFilters[$column])) {
                if (!empty($this->selectedFilters[$column])) {
                    return true;
                }
            } else {
                if ($this->selectedFilters[$column] != '') {
                    return true;
                }
            }
        }
        return false;
    }

    public function resetFilters(): void
    {
        $this->reset('selectedFilters');
        $this->initMultiFilters();
    }

    private function initMultiFilters(): void
    {

    }

    public function query(): Builder
    {
        return Anggota::query()
            ->when($this->isFilterSet('organisasi_id'), function($query) {
                return $query->where('organisasi_id', $this->selectedFilters['organisasi_id']);
            })

;
    }
    private function initFilters(): void
    {


        $organisasis = Organisasi::pluck('nama_organisasi', 'id_organisasi')->map(function($i, $k) {
            return ['key' => $k, 'label' => $i];
        })->toArray();
        $this->filters['organisasi_id']['label'] = 'Organisasi';
        //$this->filters['organisasi_id']['multiple'] = true;
        $this->filters['organisasi_id']['options'] = ['0' => ['key' => '', 'label' => 'Any']] + $organisasis;
        $this->initMultiFilters();
    }

}
