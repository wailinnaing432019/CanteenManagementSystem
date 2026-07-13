<?php

namespace App\Http\Livewire\Admin;

use Storage;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\RestaurantTable;

class TableView extends Component
{
    use WithPagination;
    public $table;
    public $table_no;
    public $table_id;

    // for sorting
    public $sortField='created_at';
    public $sortDirection = 'desc';


        // sorting data
    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortField = $field;
            $this->sortDirection = 'asc';
        }
    }

    // for destroy
    public function delete($id){
        $table=RestaurantTable::where('id',$id)->first();
            if ( Storage::exists('public/'.$table->image)) {
            Storage::delete('public/'.$table->image);
        }
        $success=$table->delete();
        if($success){
            session()->flash('success',"Deleted Success");
        }else{
            session()->flash('error',"Something Went Wrong ! Try Again");
        }
    }
    public function render()
    {

        // $query=RestaurantTable::query();
        $table=RestaurantTable::orderBy($this->sortField,$this->sortDirection)->paginate(5);
        return view('livewire.admin.table-view',
        [
            'tables'=>$table,
        ])->extends('layout.admin')->section('content');
    }
}
