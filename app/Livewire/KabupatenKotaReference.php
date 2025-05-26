<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Database\Eloquent\Builder;
use \Illuminate\View\View;

use App\Models\KabupatenKota;
use App\Models\Provinsi;

class KabupatenKotaReference extends Component
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
            ->when($this->q, function ($query) {
                return $query->where(function ($query) {
                    $query->where('nama_kabupaten', 'like', '%' . $this->q . '%');
                });
            })
            ->paginate($this->per_page);

        return view('livewire.kabupaten-kota-reference', [
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
        return KabupatenKota::query()
            ->when($this->isFilterSet('provinsi_id'), function($query) {
                return $query->where('provinsi_id', $this->selectedFilters['provinsi_id']);
            })

;
    }
    private function initFilters(): void
    {


        $provinsis = Provinsi::pluck('nama_provinsi', 'id_provinsi')->map(function($i, $k) {
            return ['key' => $k, 'label' => $i];
        })->toArray();
        $this->filters['provinsi_id']['label'] = 'Provinsi';
        //$this->filters['provinsi_id']['multiple'] = true;
        $this->filters['provinsi_id']['options'] = ['0' => ['key' => '', 'label' => 'Any']] + $provinsis;
        $this->initMultiFilters();
    }

}
