<?php

namespace App\Http\Livewire\Oficina\TipoOficina;

use App\Models\Personal_Oficina;
use Illuminate\Support\Facades\DB;
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
        //$personal = Personal_Oficina::where('nombre', 'ILIKE', '%' . strtolower($this->attribute) . '%')->orWhere('apellido', 'ILIKE', '%' . strtolower($this->attribute) . '%')->orderBy($this->sort, $this->direction)->paginate($this->pagination);
        $personal = DB::table('users')->join('personal_oficina','personal_oficina.user_id','=','users.id')->join('oficina','oficina.id','=','personal_oficina.id_oficina')->join('roles','roles.id','=','users.role_id')->select('personal_oficina.*','personal_oficina.id as id','roles.nombre as rol','oficina.nombre as ofi')->where('personal_oficina.estado','=','Activo')->where('personal_oficina.nombre', 'ILIKE', '%' . strtolower($this->attribute) . '%')->paginate($this->pagination);
        return view('livewire.oficina.tipo-oficina.index',compact('personal'));
    }
}
