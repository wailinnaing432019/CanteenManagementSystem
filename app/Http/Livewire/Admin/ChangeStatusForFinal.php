<?php

namespace App\Http\Livewire\Admin;

use App\Models\Order;
use App\Models\OrderDetail;
use Livewire\Component;
use App\Models\RestaurantTable;

class ChangeStatusForFinal extends Component
{
    public $order;
    public $status;
    public function mount($order) {
        $this->order=$order;
        $this->status=$this->order->status;
    }
    public function render()
    {
        return view('livewire.admin.change-status-for-final');
    }

    public function updated($property){
        if($property=="status"){
            $order=Order::where('id',$this->order->id)->first();
            if($this->status=='3'){
                OrderDetail::where('order_id',$order->id)->where('status','1')->update([
                    'status'=>'3'
                ]);
            }
            if($order->status=='3'){
                Order::where('id',$this->order->id)->update(
                [
                    'status'=>3,
                ]
                );
                $this->status=$order->status;
            }

                Order::where('id',$this->order->id)->update(
                [
                    'status'=>$this->status,
                ]
                );


            // changing table status
            if($this->status=='1'){
                RestaurantTable::where('table_no',$this->order->table_no)->update([
            'status'=>'2',
            ]);
            }else
                {
                RestaurantTable::where('table_no',$this->order->table_no)->update([
                'status'=>'1',
                ]);
            }


        }
    }
}
