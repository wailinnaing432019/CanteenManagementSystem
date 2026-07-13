<?php

namespace App\Http\Livewire\Admin;

use Carbon\Carbon;
use Livewire\Component;
use App\Models\PurchaseOrder;

class PurchaseOrderCount extends Component
{
    public $purchase=NULL;
     protected $listeners = ['purchaseAdded' => 'countOrder'];

     public function countOrder(){
        $now = Carbon::now('Asia/Yangon');
        $yesterdayStartTime = $now->copy()->subDay()->setTime(16, 0, 0); // 4:00 PM yesterday
        // getting with time
        if ($now->hour >= 16) {
            $todayStartTime = $now->copy()->setTime(16, 0, 0); // 4:00 PM today

                $this->purchase = PurchaseOrder::where('created_at', '>=', $todayStartTime)
                                        ->count();
        }
        elseif($now->hour<16 && $now->hour >7){
            $this->purchase =PurchaseOrder::whereDate('created_at',$now->format('Y-m-d'))->where('status','1')->count();
        } else {
            $todayStartTime = $now->copy()->setTime(7, 0, 0); // 7:00 AM today
            $this->purchase = PurchaseOrder::whereBetween('created_at', [$yesterdayStartTime, $todayStartTime])
                                        ->count();
        }
     }
    public function render()
    {
        $this->countOrder();
        return view('livewire.admin.purchase-order-count',[
            'count'=>$this->purchase,
        ]);
    }
}