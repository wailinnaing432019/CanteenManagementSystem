<?php

namespace App\Http\Livewire\Admin\Chart;

use App\Models\Menu as MenuDB;
use Livewire\Component;

class Menu extends Component
{
    public $menus;
    protected $listener=['updateData'=>'changeData'];
    public function mount(){
        $menus=MenuDB::get();
            $data[]=$menus->where('status','0')->count();
            $data[]=$menus->where('status','1')->count();
            $data[]=$menus->where('status','2')->count();
        $this->menus=json_encode($data);
        // dd($this->menus);
    }
    public function render()
    {

       return view('livewire.admin.chart.menu');
    }


}