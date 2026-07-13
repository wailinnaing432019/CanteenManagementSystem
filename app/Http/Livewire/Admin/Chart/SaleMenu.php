<?php

namespace App\Http\Livewire\Admin\Chart;

use Carbon\Carbon;
use App\Models\Menu;
use Livewire\Component;
use App\Models\OrderDetail;

class SaleMenu extends Component
{
    public $y,$m;
    public $month;
    public $data;
    public function mount(){
        $this->y=Carbon::now()->format('Y');
        $this->m=Carbon::now()->format('m');
        $this->month=$this->y.'-'.$this->m;
        $this->menuQuantity($this->y,$this->m);
    }
    public function render()
    {
        return view('livewire.admin.chart.sale-menu');
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
        //  dd($year."dl".$month);
        // $year="2023";
        // $month="06";
        $orders=OrderDetail::whereMonth('created_at',$month)
                        ->whereYear('created_at',$year)
                        ->where('status',3)
                        ->get();
        $order_raw=$orders->groupBy(function($orders){
            return $orders->menu_id;
        });
        // dd("$order_raw");
        foreach ($order_raw as $key=>$item) {
            // dd($order_raw[$key]['0']['menu_id']); // getting menu_name
            $mName=Menu::select('name')->where('id',$order_raw[$key]['0']['menu_id'])->first();
            $data['label'][]=$mName->name;
            $data['quantity'][]=$item->sum('quantity');
        }

        if($orders->count() <= 0){
            $this->emit('no-data');
        }else{
            $this->data=json_encode($data);
            $this->emit('update',['data'=>$this->data]);
        }

    }
}