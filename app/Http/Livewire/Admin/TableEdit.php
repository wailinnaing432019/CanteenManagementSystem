<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\RestaurantTable;
use Illuminate\Validation\Rule;
use Storage;
class TableEdit extends Component
{
    use WithFileUploads;
    public $image,$dbImage;
    public string $table_no,$status,$description,$table_id;

    public function rules(){
        return [
            'table_no'=>['required', Rule::unique('restaurant_tables')->ignore($this->table_id, 'id')],
            'image'=>'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description'=>'required|string',
            'status'=>'nullable'
        ];
    }
    // get the data to edit
    public function mount($id){
        $table=RestaurantTable::where('id',$id)->first();
        if($table){
            $this->table_id=$table->id;
            $this->table_no=$table->table_no;
            $this->description=$table->description;
            $this->dbImage=$table->image;
            $this->status=$table->status == 2 ? '':'1';
        }
    }
    public function render()
    {
        return view('livewire.admin.table-edit')->extends('layout.admin');
    }

    public function updateData(){
        $validated=$this->validate();
        $validated['status']=$validated['status']==null ? '2':'1';
        $table=RestaurantTable::where('id',$this->table_id)->first();
        if($this->image){
                if ($this->dbImage && Storage::exists('public/'.$this->dbImage)) {
                    Storage::delete('public/'.$this->dbImage);
                }

                $filename=uniqid().'_MM_'.$this->image->getClientOriginalName();
                $this->image->storeAs('public/tables',$filename);
                $file='tables/'.$filename;
        }else{
            $file=$this->dbImage;
        }
        $validated['image']=$file;
        $table->update($validated);
        return redirect('/admin/tables')->with('success',"Table Updated Successfully");
    }
    // validate each step
    public function updated($property){
        $this->validateOnly($property);
    }
}