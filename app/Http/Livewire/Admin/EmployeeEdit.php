<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Employee;
use App\Mail\UpdateInformation;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Mail;

class EmployeeEdit extends Component
{
    public string $search='';
    public string $position='';
    public $sortField='name';
    public $sortDirection = 'asc';
    public $image,$dbImage,$file;
    public $employee_id,$name,$email,$phone,$address,$role_as,$role,$start_time,$end_time,$password;
    // to search in livewire
    protected $queryString=['search'];
    // to get emp obj
    public $employee;
    public function rules(){
       return [
           'name'=>['required','string','max:255 ','regex:/^[^0-9]*$/'],
           'email'=>['required','email', Rule::unique('employees')->ignore($this->employee_id, 'id')],
           'phone' => ['required', 'regex:/^(09|\+?950?9|\+?95950?9)\d{7,9}$/'],
           'address'=>'required',
           'start_time' => 'required|before:end_time',
            'end_time' => 'required',
           'role_as'=>'required',
           'image'=>'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
           'password'=>'nullable',
       ];
    }
     protected $messages = [
        'name.required'=>'Name field is required, please fill | name must be character!.',
        'name.string'=>'Your name must be character!.',
        'email.required' => 'Email address is required, please fill.',
        'email.email' => 'Your email address format is invalid, need (@ sign).',
        'email.unique'=>'Email must be unique ! this email is alreay exit.',
         'phone.required'=>'Phone Number is required, please fill.',
         'phone.regax'=>'Your phone number is invalid, must have at most 9 or 11 ,start with (09,950).',
         'address.required'=>'Address field is required, please fill.',
         'password.required'=>'Password field is required, please fill.',
         'password.confirmed'=>'Your password must equal confirm password.',
         'start_time.required'=>'Start working time is required, please fill.',
         'end_time.required'=>'End working time required, please fill.',
         'role_as.required'=>'Role filed is required, please fill.',
         'image.image'=>'Image type must be (peg,png,jpg,gif,svg) , size less than equal 2048.',
    ];

    public function mount($id){
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

    public function update() {

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
            // mail sending welcome
        $mailData=[
            'title'=>"Hungry Heaven",
            'body'=>$validated['name'],
        ];
        Mail::to($validated['email'])->send(new UpdateInformation($mailData));
            $this->image=NULL;
            session()->flash('success','Employee Updated Successfully');
            return redirect('admin/employees/')->back()->with('success',"Update succeed ");


    }

    public function render()
    {

        return view('livewire.admin.employee-edit' )->extends('layout.admin')->section('content');
    }

    public function updated($property){
        $this->validateOnly($property);
    }
}