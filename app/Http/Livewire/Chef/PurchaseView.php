<?php

namespace App\Http\Livewire\Chef;

use Carbon\Carbon;
use Livewire\Component;
use App\Models\PurchaseOrder;
use Illuminate\Support\Facades\Auth;

class PurchaseView extends Component
{
    public $product_name,$small_description,$status='',$quantity;
    public $purchase=NULL;
    public $selectedItems = [];
    public $selectAll = false;

    public $currentTime;
    public $isButtonDisabled;

    // for sorting
    public $sortField='created_at';
    public $sortDirection = 'desc';

    public function rules(){
        return [
            'product_name'=>'required|max:255',
            'small_description'=>'nullable|max:255',
            'quantity'=>'required|numeric ',
        ];

    }
    public function mount()
    {
         $myanmarTime = Carbon::now('Asia/Yangon');
    $this->currentTime = $myanmarTime->format('H:i');
    $this->isButtonDisabled = $this->isTimeInRange($myanmarTime);


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
            $this->selectedItems = $this->purchase->where('employee_id',auth()->guard('staff')->user()->id)->pluck('id')->toArray();
        } else {
            $this->selectedItems = [];
        }
    }

    public function deleteSelectedItems()
    {
        PurchaseOrder::whereIn('id', $this->selectedItems)->delete();
        $this->purchase = PurchaseOrder::all(); // Refresh the list after deletion
        $this->selectedItems = []; // Clear the selected items
        $this->selectAll = false; // Uncheck "Select All" after deletion
        // session()->flash('success',"Deleted Successfully");
        return redirect('chef/purchase-order')->with('success',"Deleted Successfully");
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
    public function add(){
        $validated=$this->validate();
        $validated['employee_id']=auth()->guard('staff')->user()->id;
        $data=PurchaseOrder::create($validated);
        return redirect('chef/purchase-order')->with('success',"One product ordered . But Wait To admit from Admin ");
    }
    public function render()
    {
        $now = Carbon::now('Asia/Yangon');
        $yesterdayStartTime = $now->copy()->subDay()->setTime(16, 0, 0); // 4:00 PM yesterday
        // getting with time
        if ($now->hour >= 16) {
            $todayStartTime = $now->copy()->setTime(16, 0, 0); // 4:00 PM today

                $this->purchase = PurchaseOrder::where('created_at', '>=', $todayStartTime)
                                         ->where('employee_id',auth()->guard('staff')->user()->id)
                                         ->orderBy($this->sortField, $this->sortDirection)->get();
        } else {
            $todayStartTime = $now->copy()->setTime(7, 0, 0); // 7:00 AM today
            $this->purchase = PurchaseOrder::whereBetween('created_at', [$yesterdayStartTime, $todayStartTime])
                                         ->where('employee_id',auth()->guard('staff')->user()->id)
                                         ->orderBy($this->sortField, $this->sortDirection)->get();
        }
        // $purchase=PurchaseOrder::where('employee_id',Auth::guard('staff')->user()->id)->get();
        if($this->purchase->count()>0){
                    return view('livewire.chef.purchase-view',
        ['purchase'=>$this->purchase])->extends('layouts.chefmain');
        }
        else{
            return view('livewire.chef.purchase-view',[
                'message'=>"No Order For Today ",
            ])->extends('layouts.chefmain');
        }

    }
}