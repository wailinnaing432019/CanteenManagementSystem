<?php

namespace App\Http\Livewire\Admin\Chart;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Order;
use Livewire\Component;
use App\Models\OrderDetail;
use App\Models\PurchaseOrder;

class Customer extends Component
{
    public $month='';
    public $y,$m;
    public $customers;
    // protected $listeners=['updateData'=>'changeData'];
    public function mount(){
        $this->y=Carbon::now()->format('Y');
        $this->m=Carbon::now()->format('m');
        $this->month=$this->y.'-'.$this->m;
        $this->countCustomer($this->y,$this->m);
    }
    public function render()
    {
        return view('livewire.admin.chart.customer');
    }
    public function updated($property){
    if($property=="month"){
        // dd($this->month);
        $arr=explode('-',$this->month);
        $year=$arr[0];
        $month=$arr[1];
        // dd($year);
        $this->countCustomer($year,$month);
    }
   }

   private function countCustomer($year,$month){
    $firstDayOfMonth = "{$year}-{$month}-01";
        $lastDayOfMonth = date('Y-m-t', strtotime($firstDayOfMonth));
        $currentDay = Carbon::createFromFormat('Y-m-d', $firstDayOfMonth);
        $lastDay = Carbon::createFromFormat('Y-m-d', $lastDayOfMonth);
        $customers=[];
        while ($currentDay->lte($lastDay)) {
            $customers[$currentDay->format('Y-m-d')]=User::whereDate('created_at', $currentDay->format('Y-m-d'))->count();
            // dd($customers[$currentDay->format('Y-m-d')]);
            $currentDay->addDay();
        }

            $this->customers=json_encode($customers);
            // dd($this->customers);
            $this->emit('Updata',['customers'=>$this->customers]);
   }
}