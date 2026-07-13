<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\RestaurantTable;
use Illuminate\Validation\Rule;

class TableCreate extends Component
{
    use WithFileUploads;
    public $image;
    public string $table_no,$status='',$description;


    public function rules(){
        return [
            'table_no'=>['required', Rule::unique('restaurant_tables')],
            'image'=>'required|image|mimes:jpeg,png,webp,jpg,gif|max:2048',
            'description'=>'required|string',
            'status'=>'nullable'
        ];
    }
    public function resetInput(){
        $this->table_no='';
        $this->image=NULL;
        $this->description='';
        $this->status='';
    }
    public function render()
    {
        return view('livewire.admin.table-create')->extends('layout.admin');
    }
    // add table
    public function add(){
        $validated=$this->validate();
        if($this->status==true){
            $validated['status']=1;
        }else{
            $validated['status']=2;
        }
        $filename=uniqid().'_MM_'.$this->image->getClientOriginalName();
        $this->image->storeAs('public/tables',$filename);
        $validated['image']='tables/'.$filename;

        RestaurantTable::create($validated);
        session()->flash('success',"Table Created Successfully");
        $this->resetInput();
        return redirect('admin/tables')->with('success',"Table Created");
    }

       public function  updated($property){
       $this->validateOnly($property);
   }


}
