<?php

namespace App\Http\Livewire\Admin;

use Carbon\Carbon;
use App\Models\Order;
use Livewire\Component;

class CusotomerOrderCount extends Component
{
    public function render()
    {
        $currentTime = Carbon::now();
        $threeHoursAgo = $currentTime->subHours(3);

        $count = Order::where('created_at', '>=', $threeHoursAgo)->count();
        return view('livewire.admin.cusotomer-order-count',['count'=>$count]);
    }
}