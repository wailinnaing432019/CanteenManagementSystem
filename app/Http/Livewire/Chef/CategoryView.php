<?php

namespace App\Http\Livewire\Chef;

use Livewire\Component;
use App\Models\Category;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Livewire\withPagination;
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
        $this->category = Category::where('employee_id',Auth::guard('staff')->user()->id)->get();
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
        $this->category = Category::all(); // Refresh the list after deletion
        $this->selectedItems = []; // Clear the selected items
        $this->selectAll = false; // Uncheck "Select All" after deletion
        session()->flash('success',"Deleted Successfully");
    }

    // validation function
    public function rules(){
        return [
            'name'=>['required', Rule::unique('categories')],
            'description'=>'required|min:30|string',
        ];
    }
    protected $messages = [
        'name.required'=>'Category_Name is required, please fill !.',
        'name.unique'=>'Category_Name must be unique!',
        'description.required'=>'Menu_Description is required, please fill!.',
        'description.string'=>'Menu_Description must be character!.',
    ];

    // reset all fields input
    public function resetInput(){
        $this->name='';
        $this->description='';
    }
    // create
    public function add()  {
       $validated= $this->validate();
       $validated['employee_id']=Auth::guard('staff')->user()->id;
       $category=Category::create($validated);

       if($category){
            session()->flash('success',"Category is Created But Wait to admit from admin");
       }
       else{
            session()->flash('error',"Something Went Wrong");
       }
       $this->resetInput();
       return redirect('chef/categories');
       $this->mount();
    }

    // storing id
    public function storeId(int $id){
        $this->category_id=$id;
        $category=Category::where('id',$id)->first();
        if($category){
            $this->name=$category->name;
            $this->description=$category->description;
        }

    }

        public function refreshPage()
{
    $this->emit('refreshPage');
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
        ]);
        session()->flash('success',"Udated Successfully");
        $this->mount();
    }
    // destory employee
    public function destory(){
        $categoryDelete=Category::where('id',$this->category_id)->delete();
        if($categoryDelete){
            session()->flash('success',"Category is Deleted");
        }
        else{
            session()->flash('error',"Something Went Wrong");
        }

        $this->resetInput();
        $this->mount();
        $this->resetPage();
    }
    public function render()
    {
        $query=Category::query();
        if($this->search){
            $query->where('name','like',"%{$this->search}%")
                    ->orWhere('description','like',"%{$this->search}%");
                    // ->user()->where('name','like',"%{$this->search}%") ;
        }
        return view('livewire.chef.category-view',[
            'categories'=>$query->orderBy($this->sortField, $this->sortDirection)->get()
        ])->extends('layouts.chefmain');
    }
    public function updated($property)
    {
                if($property==='search'){
            $this->resetPage();
        }
        $this->validateOnly($property);
    }
}