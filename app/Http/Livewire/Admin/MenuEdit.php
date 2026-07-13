<?php

namespace App\Http\Livewire\Admin;

use Storage;
use App\Models\Menu;
use Livewire\Component;
use App\Models\Category;
use App\Models\Employee;
use App\Models\MenuImage;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;

class MenuEdit extends Component
{
    use WithFileUploads;
    public string $name='';
    public string $price='';
    public string $waiting_time='';
    public string $category_id='';
    public string $description='';
    public string $employee_id='';
    public string $status='',$st='';
    public $menu_id;
    public $image=NULL;


    public function rules(){
        $rules= [
            'name'=>'required|string|max:30',
            'price' => 'required|numeric|min:0',
            'waiting_time' => 'required|integer|min:0',
            'description' => 'required|string',
            'category_id' => 'required',
            'status'=>'required',
            'employee_id'=>'nullable',
        ];
        return $rules;
    }
    protected $messages = [
        'name.required'=>'Menu_Name is required, please fill | name must be character!.',
        'name.string'=>'Menu_Name must be character!.',
         'name.unique'=>'Menu_Name must be unique! this menu_name is alreay exit.',
        'price.required'=>'Menu_Price is required, please fill.',
        'price.numeric'=>'Menu_Price must be number!.',
        'price.min'=>'Menu_price should not less than 0.',
        'waiting_time.required'=>'Waiting_Time is required, please fill.',
        'waiting_time.numeric'=>'Waiting_Time must be number!.',
        'waiting_time.min'=>'Waiting_Time should not less than 0.',
        'description.required'=>'Menu_Description is required, please fill | name must be character!.',
        'description.string'=>'Menu_Description must be character!.',
        'category_id.required'=>'Category field is required, please fill | this need to create menu.',
        'status.required'=>'Status is required, please fill.',

    ];

    public function resetInput(){
        $this->image=NULL;
        $this->name='';
        $this->price='';
        $this->waiting_time='';
        $this->menu_id='';
        $this->category_id='';
        $this->description='';
        $this->status='' ;
        $this->employee_id='' ;
    }

    // delete remove images
        public function destoryImage(int $id){
            $menuImage=MenuImage::where('id',$id)->first();
            if ( Storage::exists('public/'.$menuImage->image)) {
                    Storage::delete('public/'.$menuImage->image);
            }
            $menuImage->delete();
            // $menu=Menu::where('id',$id)->first();
            // if($menu){
            //     // $this->image=NULL;
            //     $this->name=$menu->name;
            //     $this->price=$menu->price;
            //     $this->waiting_time=$menu->waiting_time;
            //     $this->category_id=$menu->category_id;
            //     $this->description=$menu->description;
            //     $this->menuImages=$menu;
            //     $this->menu_id=$id;
            //     $this->status=$menu->status;
            // }
            return redirect('admin/menus/edit/'.$this->menu_id);
        }
    public function mount($id){
        $this->menu_id=$id;
        $menu=Menu::where('id',$id)->first();
        if($menu){
            // $this->image=NULL;
            $this->name=$menu->name;
            $this->price=$menu->price;
            $this->waiting_time=$menu->waiting_time;
            $this->category_id=$menu->category_id;
            $this->description=$menu->description;
            $this->menuImages=$menu;
            $this->menu_id=$id;
            $this->status=$menu->status;
            $this->employee_id=$menu->employee_id;
            // dd($this->employee_id);
        }
    }

    // update
    public function updateMenu(){
        $validated=$this->validate();
        // $validated['status']=$validated['status']== true ? 1:2; // adding 2 or 1
        $menu=Menu::where('id',$this->menu_id)->update($validated);
        $update_id=Menu::where('id',$this->menu_id)->first();
        // storing images
        if($this->image){
            foreach ($this->image as $item) {
                $filename=uniqid().'_MM_'.$item->getClientOriginalName();
                $item->storeAs('public/menus',$filename);
                // dd($update_id->id);
                MenuImage::create([
                    'menu_id'=>$update_id->id,
                    'image'=>'menus/'.$filename,
                ]);

            }
        }
        session()->flash('success',"Udated Successfully");
        $this->resetInput();
        return redirect('admin/menus');
    }
    public function render()
    {
    $chefs=Employee::where('role_as','chef')->get();
        return view('livewire.admin.menu-edit',[
            'categories'=>Category::where('status',1)->get(),
            'chefs'=>$chefs,
        ] )->extends('layout.admin')->section('content');
    }
    public function updated($property){
        $this->validateOnly($property);
    }
}