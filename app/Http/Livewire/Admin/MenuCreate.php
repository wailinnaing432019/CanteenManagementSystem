<?php

namespace App\Http\Livewire\Admin;

use App\Models\Menu;
use Livewire\Component;
use App\Models\Category;
use App\Models\Employee;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;

class MenuCreate extends Component
{
    use WithFileUploads;
    public string $name='';
    public string $price='';
    public string $waiting_time='';
    public string $category_id='';
    public string $description='';
    public string $employee_id='';
    public string $status='';

        public $image=[];


    public function rules(){
        $rules= [
            'name'=>'required|string|max:30',
            'price' => 'required|numeric|min:0',
            'waiting_time' => 'required|integer|min:0',
            'description' => 'required|string|max:255',
            'category_id' => 'required',
            'image' => 'required|array|max:3',
            'image.*' => 'mimes:jpeg,jpg,png|max:2048',
            'status'=>'nullable',
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
        'category_id.required'=>'Category field is required, please fill | category need to create menu.',
         'image.required'=>'Menu_Image is required , please fill.',
         'image.image'=>'Image type must be (peg,png,jpg,gif,svg) , size less than equal 2048.',

    ];
        public function resetInput(){
            $this->image=NULL;
            $this->name='';
            $this->price='';
            $this->waiting_time='';
            $this->category_id='';
            $this->description='';
            $this->employee_id='';
            $this->status='';
        }
    public function add(){
        $rules['image']='required|image|mimes:jpeg,png,jpg,gif|max:2048';
        $validated=$this->validate();
        $validated['status']=$validated['status']== true ? 1:2; // adding 2 or 1
        // $validated['employee_id']=Auth::guard('staff')->user()->id;
        // dd($validated);
        $menu=Menu::create($validated);
        if($this->image){
            foreach ($this->image as $item) {
                $filename=uniqid().'_MM_'.$item->getClientOriginalName();
                $item->storeAs('public/menus',$filename);
                $menu->menuImages()->create([
                    'menu_id'=>$menu->id,
                    'image'=>'menus/'.$filename,
                ]);
            }
        }
        session()->flash('success',"Menu created successfully");
        $this->resetInput();
        return redirect('/admin/menus');
    }
    public function render()
    {
    $chefs=Employee::where('role_as','chef')->get();
        return view('livewire.admin.menu-create',[
            'categories'=>Category::where('status',1)->get(),
            'chefs'=>$chefs,
        ])->extends('layout.admin')->section('content');
    }

    public function updated($property){
        $this->validateOnly($property);
        if ($property === 'image') {
                $this->imagePreviews = [];
                foreach ($this->image as $item) {
                    $this->imagePreviews[] = $item->temporaryUrl();
                }
        }
    }
}