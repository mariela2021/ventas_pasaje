<?php

namespace App\Http\Livewire\Oficina\Oficina;

use App\Models\Oficina;
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
        $oficinas = Oficina::where('nombre', 'ILIKE', '%' . strtolower($this->attribute) . '%')->orderBy($this->sort, $this->direction)->paginate($this->pagination);
        return view('livewire.oficina.oficina.index',compact('oficinas'));
    }
}
