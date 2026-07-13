<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\OrderDetail;
use App\Models\Order;

class OrderChangeStatus extends Component
{
    public $order_detail_id,$order_id;
    public $status;
    public function mount($order_detail_id,$status,$order_id){
        $this->order_detail_id=$order_detail_id;
        $this->order_id=$order_id;
             OrderDetail::where('id',$this->order_detail_id)->update([
            'status'=>1,
        ]);
        $this->status=$status;
    }

    public function render()
    {
        return view('livewire.admin.order-change-status');
    }

    public function updated($property){
        if($property=="status"){
            $order=Order::where('id',$this->order_id)->first();
            if($order->status=='3'){
                $this->status=1;
            }else{

                OrderDetail::where('id',$this->order_detail_id)->update([
                'status'=>$this->status,
            ]);
            }

        }
    }
}