<?php

namespace App\Http\Livewire\Chef;
use Storage;
use App\Models\Menu;
use Livewire\Component;
use App\Models\Category;
use App\Models\MenuImage;
use Livewire\withPagination;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;

class MenuView extends Component
{
    use withPagination;
    use WithFileUploads;
    public string $name='';
    public string $price='';
    public string $waiting_time='';
    public string $category_id='';
    public string $description='';
    public string $employee_id='';
    public $image;
    public $menuImages;
    // for serching
    public string $menu_id;
    public string $search='';
    protected $queryString=['search'];
    // for sorting
    public $sortField='created_at';
    public $sortDirection = 'desc';
    // to show delete nane
    public $menu;

    public $selectedItems = [];
    public $selectAll = false;

    public function mount()
    {
        $this->menu = Menu::where('employee_id',Auth::guard('staff')->user()->id)->get();
    }

    public function updatedSelectedItems()
    {
        if (count($this->selectedItems) === count($this->menu)) {
            $this->selectAll = true;
        } else {
            $this->selectAll = false;
        }
    }

    public function updatedSelectAll()
    {
        if ($this->selectAll) {
            $this->selectedItems = $this->menu->pluck('id')->toArray();
        } else {
            $this->selectedItems = [];
        }
    }

    public function deleteSelectedItems()
    {
        $menus=Menu::whereIn('id', $this->selectedItems)->get();
        if($menus){
            foreach ($menus as $menu) {
                foreach($menu->menuImages as $menuImage){
                    if ($menuImage->image && Storage::exists('public/'.$menuImage->image)) {
                    Storage::delete('public/'.$menuImage->image);
                    }
                }
                MenuImage::where('menu_id',$menu->id)->delete();
            }
            $menu->delete();
        }

        $this->menu = Menu::all(); // Refresh the list after deletion
        $this->selectedItems = []; // Clear the selected items
        $this->selectAll = false; // Uncheck "Select All" after deletion
        session()->flash('success',"Deleted Successfully");
    }
    // validate function
    public function rules(){
        $rules= [
            'name'=>'required|string|max:30',
            'price' => 'required|numeric|min:0', // Example rule: The price field is required and must be a non-negative numeric value.
            'waiting_time' => 'required|integer|min:0', // Example rule: The waiting_time field is required and must be a non-negative integer.
            'description' => 'required|string',
            'category_id' => 'required',
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
    // reset the inputfields
    public function resetInput(){
        $this->image=NULL;
       $this->name='';
       $this->price='';
       $this->waiting_time='';
       $this->category_id='';
       $this->description='';
    }
    public function add(){
        $rules['image']='required|image|mimes:jpeg,png,jpg,gif|max:2048';
        $validated=$this->validate();
        $validated['employee_id']=Auth::guard('staff')->user()->id;
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
        session()->flash('success',"menu created successfully");
        $this->resetInput();
        return view('livewire.chef.menu-view');
    }

        // storing id
    public function edit(int $id){
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
        }
    }
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
    // update
    public function updateMenu(){
        $validated=$this->validate();
        $validated['employee_id']=Auth::guard('staff')->user()->id;
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
        $this->resetInput();
        session()->flash('success',"Updated Successfully");
    }
    // destory Menu
        public function destory(){
            $menuDelete=Menu::where('id',$this->menu_id)->delete();
            MenuImage::where('menu_id',$this->menu_id)->delete();
            if($menuDelete){
                session()->flash('success',"Category is Deleted");
            }
            else{
                session()->flash('error',"Something Went Wrong");
            }
        }
        public function close_modal(){
            $this->resetInput();
        }
        // delete remove images
        public function destoryImage(int $id){
            $menuImage=MenuImage::where('id',$id)->first();
            if ( Storage::exists('public/'.$menuImage->image)) {
                    Storage::delete('public/'.$menuImage->image);
            }
            $menuImage->delete();
            $this->edit($this->menu_id);// no refresh image reduce for deletetion image

        }

        public function delete(int $id)  {
            $this->menu_id=$id;
            $this->menu=Menu::select('name')->where('id',$id)->first();
            $this->name=$this->menu->name;
        }
    public function render()
    {
        $query=Menu::query();
        if($this->search){
            $query->where('name','like',"%{$this->search}%")
                    ->orWhere('price','like',"%{$this->search}%")
                    ->orWhere('waiting_time','like',"%{$this->search}%")
                    ->orWhere('description','like',"%{$this->search}%")
                    ;
                    // ->user()->where('name','like',"%{$this->search}%") ;
        }
        // dd($query->get());
        return view('livewire.chef.menu-view',[
            'categories'=>Category::where('status','1')->get(),
            'menus'=>$query->where('employee_id',Auth::guard('staff')->user()->id)->orderBy($this->sortField, $this->sortDirection)->paginate(5),
        ])->extends('layouts.chefmain');
    }

        public function updated($property){
        if($property==='search'){
            $this->resetPage();
        }
         $this->validateOnly($property);

   }
}