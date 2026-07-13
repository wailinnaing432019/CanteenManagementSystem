<?php

namespace App\Http\Livewire\Admin\Chart;

use Carbon\Carbon;
use App\Models\Order;
use Livewire\Component;
use App\Models\OrderDetail;
use App\Models\PurchaseOrder;

class Account extends Component
{
    public $month='';
    public $y,$m;
    public $income,$expense,$profit;
    public $updatIincome,$updateExpense;

    protected $listeners=['updateData'=>'changeData'];
    public function mount(){
        $this->y=Carbon::now()->format('Y');
        $this->m=Carbon::now()->format('m');
        $this->month=$this->y.'-'.$this->m;
        $this->chartIncome($this->y,$this->m);
    }
    public function render()
    {
        return view('livewire.admin.chart.account');

   }

   public function updated($property){
    if($property=="month"){
        // dd($this->month);
        $arr=explode('-',$this->month);
        $year=$arr[0];
        $month=$arr[1];
        $this->chartIncome($year,$month);
    }
   }

   public function changeData(){
    $arr=explode('-',$this->month);
        $year=$arr[0];
        $month=$arr[1];
        $this->chartIncome($year,$month);
   }
   private function chartIncome($year,$month){
    $firstDayOfMonth = "{$year}-{$month}-01";
        $lastDayOfMonth = date('Y-m-t', strtotime($firstDayOfMonth));

        $currentDay = Carbon::createFromFormat('Y-m-d', $firstDayOfMonth);
        $lastDay = Carbon::createFromFormat('Y-m-d', $lastDayOfMonth);
        $income=[];$expense=[];
        while ($currentDay->lte($lastDay)) {
            $order=OrderDetail::whereDate('created_at', $currentDay->format('Y-m-d'))->where('status','3')->get();
            $totalIncome=$order->sum('total_price');
            $income[$currentDay->format('Y-m-d')]=$totalIncome;
            $purchase=PurchaseOrder::whereDate('created_at',$currentDay->format('Y-m-d'))->where('status','2')->get();
            $totalExpense=$purchase->sum('total_price');
            $expense[$currentDay->format('Y-m-d')]=$totalExpense;
            $profit[$currentDay->format('Y-m-d')]=$totalIncome - $totalExpense;
            $currentDay->addDay();
        }
        $this->income=json_encode($income);
        $this->expense=json_encode($expense);
        $this->profit=json_encode($profit);
        $this->emit('updated',['income'=>$this->income,'expense'=>$this->expense,'profit'=>$this->profit]);
   }
}