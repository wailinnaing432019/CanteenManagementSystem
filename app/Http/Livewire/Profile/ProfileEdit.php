<?php

namespace App\Http\Livewire\Profile;

use Livewire\Component;
use App\Models\Employee;
use App\Rules\WordCount;
use App\Rules\StartsWithLetter;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class ProfileEdit extends Component
{
    public $name="",
            $email="",
            $address="",
            $phone="",
            $description="";

    public function mount()
    {
        $this->name=auth()->guard('staff')->user()->name;
        $this->email=auth()->guard('staff')->user()->email;
        $this->phone=auth()->guard('staff')->user()->phone;
        $this->address=auth()->guard('staff')->user()->address;
        $this->description=auth()->guard('staff')->user()->description;
    }
    public function rules(){
        return [
        'name' => ['required', 'string', new StartsWithLetter()],
        'email'=>['required','email', Rule::unique('employees')->ignore(auth()->guard('staff')->user()->id, 'id')],
        'phone' => ['required', 'regex:/^(09|\+?950?9|\+?95950?9)\d{7,9}$/'],
        'address'=>['required','string'],
        'description'=>['required', 'string',],
        ];
    }
    public function update(){
        $validateData=$this->validate();
        $employee=Employee::where('id',Auth::guard('staff')->user()->id)->update($validateData);
        if($employee){
            return redirect()->route('staff.login')->with('success',"Updated Success");
        }else{
            return redirect()->back()->with('error',"Something Went Wrong");
        }

    }

    public function render()
    {
        return view('livewire.profile.profile-edit');
    }
    public function updated($property){
        $this->validateOnly($property);
    }
}