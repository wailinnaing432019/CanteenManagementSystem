<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Employee;
use App\Mail\WelcomeMail;
use Livewire\WithFileUploads;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class EmployeeCreate extends Component
{
   use WithFileUploads;
   public  string $name='';
   public  string $email='';
   public  string $phone='';
   public  string $address='';
   public  string $role_as='';
   public  string $start_time='';
   public  string $end_time='';
   public  string $password='';
   public  string $employee_id='';
   public $image;
   public string $password_confirmation='';
   public function rules(){
       return [
           'name'=>['required','string','max:255 ','regex:/^[^0-9]*$/'],
           'email'=>
               ['required', Rule::unique('employees'),'email'],
           'phone' => ['required', 'regex:/^(09|\+?950?9|\+?95950?9)\d{7,9}$/'],
           'address'=>'required',
           'password'=>'required|confirmed',
           'start_time' => 'required|before:end_time',
            'end_time' => 'required',
           'role_as'=>'required',
           'image'=>'required|image|mimes:jpeg,webp,png,jpg,gif,svg|max:2048',// 2MB
       ];
   }
 protected $messages = [
        'name.required'=>'Name field is required, please fill | name must be character!.',
        'name.string'=>'Your name must be character!.',
        'email.required' => 'Email address is required, please fill.',
        'email.email' => 'Your email address format is invalid, need @ sign',
        'email.unique'=>'Email must be unique ! this email is alreay exit.',
         'phone.required'=>'Phone Number is required, please fill.',
         'phone.regax'=>'Your phone number is invalid, must have at most 9 or 11 ,start with (09,950).',
         'address.required'=>'Address field is required, please fill.',
         'password.required'=>'Password field is required, please fill.',
         'password.confirmed'=>'Your password must equal confirm password.',
         'start_time.required'=>'Start working time is required, please fill.',
         'end_time.required'=>'End working time required, please fill.',
         'role_as.required'=>'Role filed is required, please fill.',
         'image.required'=>'Image field is required , please fill.',
         'image.image'=>'Image type must be (peg,png,jpg,gif,svg) , size less than equal 2048.',

    ];
   public function render()
   {
       return view('livewire.admin.employee-create')->extends('layout.admin')->section('content');
   }


   public  function  save(){
       $validated=$this->validate();
    //    dd($validated);
        $filename=uniqid().'_MM_'.$this->image->getClientOriginalName();
    $this->image->storeAs('public/employees',$filename);
    $validated['image']='employees/'.$filename;
    $validated['password']=Hash::make($validated['password']);
        Employee::create($validated);

        // mail sending welcome
        $mailData=[
            'title'=>"Hungry Heaven",
            'body'=>$validated['name'],
        ];
        Mail::to($validated['email'])->send(new WelcomeMail($mailData));
       $this->name='';
       $this->email='';
       $this->phone='';
       $this->address='';
       $this->role_as='';
       $this->start_time='';
       $this->end_time='';
       $this->password='';
       $this->employee_id='';
       $this->password_confirmation='';

       return redirect('admin/employees')->with('message',"Employee Created Successfully");
   }

   public function  updated($property){
       $this->validateOnly($property);
   }

}