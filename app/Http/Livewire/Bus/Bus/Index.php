<?php

namespace App\Http\Livewire\Bus\Bus;

use App\Models\Bus;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    public $pagination = 20;
    public $attribute = '';
    public $sort = 'id';
    public $direction = 'asc';
    protected $paginationTheme = 'bootstrap';
    
    public function updatingAttribute()
    {
        $this->resetPage();
    }

    public function render()
    {
        $buses = Bus::where('placa', 'ILIKE', '%' . strtolower($this->attribute) . '%')->orderBy($this->sort, $this->direction)->paginate($this->pagination);
        return view('livewire.bus.bus.index',compact('buses'));
    }
}
