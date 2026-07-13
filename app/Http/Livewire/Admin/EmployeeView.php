<?php

namespace App\Http\Livewire\Admin;

use Storage;
use Livewire\Component;
use App\Models\Employee;
use Livewire\withPagination;
use Livewire\WithFileUploads;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class EmployeeView extends Component
{
       use WithFileUploads;
    use withPagination;
    public string $search='';
    public string $position='';
    public $sortField='name';
    public $sortDirection = 'asc';
    public $image,$dbImage,$file;
    public $employee_id,$name,$email,$phone,$address,$role_as,$start_time,$end_time;
    // to search in livewire
    protected $queryString=['search'];
    // to get emp obj
    public $employee;
    //select all
    public $selectedItems = [];
    public $selectAll = false;

       public function rules(){
       return [
           'name'=>'required|string|max:255',
           'email'=>['required', Rule::unique('employees')->ignore($this->employee_id, 'id')],
           'phone' => ['required', 'regex:/^(09|\+?950?9|\+?95950?9)\d{7,9}$/'],
           'address'=>'required',
           'start_time'=>'required',
           'end_time'=>'required',
           'role_as'=>'required',
           'image'=>'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',

       ];
   }
   // delete select items
   public function mount()  {
        $this->employee = Employee::whereNot('id',Auth::guard('staff')->user()->id)->get();
   }
    public function updatedSelectedItems()
    {
        if (count($this->selectedItems) === count($this->employee)) {
            $this->selectAll = true;
        } else {
            $this->selectAll = false;
        }
    }

    public function updatedSelectAll()
    {
        if ($this->selectAll) {
            $this->selectedItems = $this->employee->pluck('id')->toArray();
        } else {
            $this->selectedItems = [];
        }
    }

    public function deleteSelectedItems()
    {
        Employee::whereIn('id', $this->selectedItems)->delete();
        $this->employee = Employee::all(); // Refresh the list after deletion
        $this->selectedItems = []; // Clear the selected items
        $this->selectAll = false; // Uncheck "Select All" after deletion
        session()->flash('success',"Deleted Successfully");
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
    // reset input all field
    public function resetInput(){
            $this->name='';
            $this->email='';
            $this->address='';
            $this->phone='';
            $this->start_time='';
            $this->end_time='';
            $this->role_as='';
            $this->dbImage='';
            $this->employee_id='';
    }

        public function closeModal(){
            $this->resetInput();
    }

    public function edit(int $id){
        $employee=Employee::find($id);
        if($employee){
            $this->employee_id=$employee->id;
            $this->name=$employee->name;
            $this->email=$employee->email;
            $this->address=$employee->address;
            $this->phone=$employee->phone;
            $this->start_time=$employee->start_time;
            $this->end_time=$employee->end_time;
            $this->dbImage=$employee->image;
            $this->role_as=$employee->role_as;
        }
        else{
            return redirect()->to('admin/employees');
        }
    }

        public function updateEmployee() {
            $validated=$this->validate();
            if($this->image){
                if ($this->dbImage && Storage::exists('public/'.$this->dbImage)) {
                    Storage::delete('public/'.$this->dbImage);
                }

                $filename=uniqid().'_MM_'.$this->image->getClientOriginalName();
                $this->image->storeAs('public/employees',$filename);
                $file='employees/'.$filename;
            }else{
                $file=$this->image;
            }
            $employee=Employee::where('id',$this->employee_id)->update([
                'name'=>$validated['name'],
                'email'=>$validated['email'],
                'address'=>$validated['address'],
                'phone'=>$validated['phone'],
                'start_time'=>$validated['start_time'],
                'end_time'=>$validated['end_time'],
                'role_as'=>$validated['role_as'],
                'address'=>$validated['address'],
                'image'=>$file ? $file : $this->dbImage,
            ]);
            $this->image=NULL;
            session()->flash('success','Employee Updated Successfully');
        return redirect()->back()->with('success',"UPdate success");


        }

        // destory employee
        public function destory(int $id){
            $employeeDelete=Employee::where('id',$id)->first();
            if ( Storage::exists('public/'.$employeeDelete->image)) {
                Storage::delete('public/'.$employeeDelete->image);
        }
        $employeeDelete=$employeeDelete->delete();
            if($employeeDelete){
                session()->flash('success',"Employee  Deleted");
            }
            else{
                session()->flash('error',"Something Went Wrong");
            }
        }
    public function render()
    {
        $query=Employee::query();
        if($this->search){
            $query->where('name','like',"%{$this->search}%")
                    ->orWhere('email','like',"%{$this->search}%")
                    ->orWhere('address','like',"%{$this->search}%")
                    ->orWhere('phone','like',"%{$this->search}%")
                    ->orWhere('end_time','like',"%{$this->search}%")
                    ->orWhere('role_as','like',"%{$this->search}%")
                    ->orWhere('start_time','like',"%{$this->search}%");
        }
        return view('livewire.admin.employee-view',[
            'employees'=>$query->when($this->position,function($q){
                                    $q->where('role_as',$this->position);
                                })
                                ->orderBy($this->sortField, $this->sortDirection)
                                ->paginate(5),
        ])->extends('layout.admin');
    }
    public function updated($property){
        if($property==='search'){
            $this->resetPage();
        }
         $this->validateOnly($property);

   }
}