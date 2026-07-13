<?php

namespace App\Http\Livewire\Admin;
use App\Models\Menu;
use Livewire\Component;
use App\Models\Category;
use Livewire\withPagination;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class CategoryView extends Component
{
    use withPagination;
    public string $name='';
    public string $description='';
    public string $status='';
    public string $category_id='';
    public $category;
    public string $search='';
    protected $queryString=['search'];
    public $sortField='name';
    public $sortDirection = 'asc';

        public $selectedItems = [];
    public $selectAll = false;

        public function mount()
    {
        $this->category = Category::get();
    }

    public function updatedSelectedItems()
    {
        if (count($this->selectedItems) === count($this->category)) {
            $this->selectAll = true;
        } else {
            $this->selectAll = false;
        }
    }

    public function updatedSelectAll()
    {
        if ($this->selectAll) {
            $this->selectedItems = $this->category->pluck('id')->toArray();
        } else {
            $this->selectedItems = [];
        }
    }

    public function deleteSelectedItems()
    {
        Category::whereIn('id', $this->selectedItems)->delete();
        Menu::whereIn('category_id',$this->selectedItems)->delete();
        $this->category = Category::all(); // Refresh the list after deletion
        $this->selectedItems = []; // Clear the selected items
        $this->selectAll = false; // Uncheck "Select All" after deletion
        session()->flash('success',"Deleted Successfully");
    }


    // validation function
    public function rules(){
        return [
            'name'=>['required', Rule::unique('categories')],
            'description'=>'required|min:10|max:255|string',
            'status'=>'nullable',
        ];
    }

    protected $messages = [
        'name.required'=>'Category_Name is required, please fill | name must be character!.',
        'name.unique'=>'Category_Name must be unique! this category_name is alreay exit.',
        'description.required'=>'Menu_Description is required, please fill | description must be character!.',
        'description.string'=>'Menu_Description must be character!.',
    ];
    // reset all fields input
    public function resetInput(){
        $this->name='';
        $this->description='';
        $this->status='';
    }
    // create
    public function add()  {
       $validated= $this->validate();
       $validated['status']=1;
       $validated['employee_id']=Auth::guard('staff')->user()->id;
       $category=Category::create($validated);

       if($category){
            session()->flash('success',"Category is Created  ");
       }
       else{
            session()->flash('error',"Something Went Wrong");
       }
       $this->resetInput();
       return redirect('admin/categories');
    }

    // storing id
    public function storeId(int $id){
        $this->category_id=$id;
        $category=Category::where('id',$id)->first();
        if($category){
            $this->name=$category->name;
            $this->description=$category->description;
            $this->status=$category->status == 0 ? '':'1';
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
    public function updateCategory(){
        Category::where('id',$this->category_id)->update([
            'name'=>$this->name,
            'description'=>$this->description,
            'employee_id'=>Auth::guard('staff')->user()->id,
            'status'=>$this->status ? 1:0,
        ]);
        session()->flash('success',"Updated Successfully");
        $this->resetInput();
    }
    // destory category
        public function destory(){
            $categoryDelete=Category::where('id',$this->category_id)->first();
            // dd($categoryDelete->menus());
            // $categoryDelete->menus->delete();
            $categoryDelete->menus()->delete();
            $categoryDelete->delete();
            if($categoryDelete){
                session()->flash('success',"Category is Deleted");
            }
            else{
                session()->flash('error',"Something Went Wrong");
            }
            $this->resetInput();
        }

    public function updated($property)
    {
                if($property==='search'){
            $this->resetPage();
        }
        $this->validateOnly($property);
    }
    public function render()
    {
         $query=Category::query();
        if($this->search){
            $query->where('name','like',"%{$this->search}%")
                    ->orWhere('description','like',"%{$this->search}%");
                    // ->user()->where('name','like',"%{$this->search}%") ;
        }
        return view('livewire.admin.category-view',[
            'categories'=>$query->orderBy($this->sortField, $this->sortDirection)->paginate(5)
        ])->extends('layout.admin')->section('content');
    }
}