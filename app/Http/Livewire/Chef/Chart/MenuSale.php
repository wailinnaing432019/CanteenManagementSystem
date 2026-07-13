<?php

namespace App\Http\Livewire\Chef\Chart;

use Carbon\Carbon;
use App\Models\Menu;
use Livewire\Component;
use App\Models\OrderDetail;

class MenuSale extends Component
{
        public $y,$m;
    public $month;
    public $chef_data;
    public function mount(){
        $this->y=Carbon::now()->format('Y');
        $this->m=Carbon::now()->format('m');
        $this->month=$this->y.'-'.$this->m;
        $this->menuQuantity($this->y,$this->m);
    }
    public function render()
    {
        return view('livewire.chef.chart.menu-sale');
    }

    public function updated($property){
        if($property=="month"){
            $arr=explode('-',$this->month);
        $year=$arr[0];
        $month=$arr[1];
        $this->menuQuantity($year,$month);
        }
    }

    private function menuQuantity($year,$month){
        $orders=OrderDetail::whereMonth('created_at',$month)
                        ->whereYear('created_at',$year)
                        ->where('status',3)
                        ->get();
        $order_raw=$orders->groupBy(function($orders){
            return $orders->menu_id;
        }); 
        $data['label']=[];
        $data['quantity']=[];
        foreach ($order_raw as $key=>$item) {
            // dd($order_raw[$key]['0']['menu_id']); // getting menu_name
            $mName=Menu::select('name')->where('id',$order_raw[$key]['0']['menu_id'])->first();
            $data['label'][]=$mName->name;
            $data['quantity'][]=$item->sum('quantity');
        }

        if($orders->count() <= 0){
            $this->emit('chef-no-data');
        }else{
            $this->chef_data=json_encode($data);
            $this->emit('chefUpdata',['chef_data'=>$this->chef_data]);
        }

    }
}