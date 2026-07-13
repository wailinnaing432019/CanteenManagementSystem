<?php

namespace App\Http\Livewire\Admin;

use Carbon\Carbon;
use Livewire\Component;
use App\Models\PurchaseOrder;

class PurchaseOrderView extends Component
{
    public $purchase;
        public $selectedItems = [];
    public $selectAll = false;

    public $product_name,$small_description,$quantity;
    public $currentTime;
    public $isButtonDisabled;
    public $status=0;


        // for sorting
    public $sortField='created_at';
    public $sortDirection = 'desc';

    public function mount(){

    }

    public function rules(){
        return [
            'product_name'=>'required|max:255',
            'small_description'=>'nullable|max:255',
            'quantity'=>'required|numeric ',
        ];
    }

    public function add(){
        $validated=$this->validate();
        $validated['employee_id']=auth()->guard('staff')->user()->id;
        $validated['status']='1';
        $data=PurchaseOrder::create($validated);
        return redirect('admin/purchase/order')->with('success',"One product ordered . Contact Your Purchaser to purchase");
    }
     public function changeEvent($value,$id)
    {
        $purchaseOrder=PurchaseOrder::where('id',$id)->update([
            'status'=>$value,
        ]);
    }
    // to disable for time
    public function isTimeInRange()
    {
        $startRange = '08:00';
        $endRange = '16:00';

        return $this->currentTime >= $startRange && $this->currentTime <= $endRange;
    }
    public function updatedSelectedItems()
    {
        if (count($this->selectedItems) === count($this->purchase)) {
            $this->selectAll = true;
        } else {
            $this->selectAll = false;
        }
    }

    public function updatedSelectAll()
    {
        if ($this->selectAll) {
            $this->selectedItems = $this->purchase->pluck('id')->toArray();
        } else {
            $this->selectedItems = [];
        }
    }

    public function deleteSelectedItems()
    {
        PurchaseOrder::whereIn('id', $this->selectedItems)->delete();
        $this->category = PurchaseOrder::all(); // Refresh the list after deletion
        $this->selectedItems = []; // Clear the selected items
        $this->selectAll = false; // Uncheck "Select All" after deletion
        session()->flash('success',"Deleted Successfully");
        // return redirect('chef/purchase-order')->with('success',"Deleted Successfully");
    }

    // sort by
        public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortField = $field;
            $this->sortDirection = 'asc';
        }
    }
    public function render()
    {
        $now = Carbon::now('Asia/Yangon');
        $yesterdayStartTime = $now->copy()->subDay()->setTime(16, 0, 0); // 4:00 PM yesterday
        // getting with time
        if ($now->hour >= 16) {
            $todayStartTime = $now->copy()->setTime(16, 0, 0); // 4:00 PM today

                $this->purchase = PurchaseOrder::where('created_at', '>=', $todayStartTime)
                                        ->whereNot('status','2')
                                        ->orderBy($this->sortField, $this->sortDirection)->get();
        }
        elseif($now->hour<16 && $now->hour >7){
            $this->purchase =PurchaseOrder::whereDate('created_at',$now->format('Y-m-d'))->where('status','1')->get();
        } else {
            $todayStartTime = $now->copy()->setTime(7, 0, 0); // 7:00 AM today
            $this->purchase = PurchaseOrder::whereBetween('created_at', [$yesterdayStartTime, $todayStartTime])
                                        ->whereNot('status','2')
                                        ->orderBy($this->sortField, $this->sortDirection)->get();
        }

        if($this->purchase){
                    return view('livewire.admin.purchase-order-view',
        ['purchase'=>$this->purchase])->extends('layout.admin');
        }
        else{
            return view('livewire.admin.purchase-order-view',[
                'message'=>"No Order For Today ",
            ])->extends('layout.admin');
        }
    }
}
