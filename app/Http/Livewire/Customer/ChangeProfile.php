<?php

namespace App\Http\Livewire\Customer;

use App\Models\User;
use Livewire\Component;
use App\Rules\StartsWithLetter;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class ChangeProfile extends Component
{
        public $name="",
            $email="",
            $address="",
            $phone="";

    public function mount()
    {
        $this->name=auth()->user()->name;
        $this->email=auth()->user()->email;
        $this->phone=auth()->user()->phone;
        $this->address=auth()->user()->address;
    }
    public function rules(){
        return [
        'name' => ['required', 'string', new StartsWithLetter()],
        'email'=>['required','email', Rule::unique('users')->ignore(auth()->user()->id, 'id')],
        'phone' => ['required', 'regex:/^(09|\+?950?9|\+?95950?9)\d{7,9}$/'],
        'address'=>['required','string'],
        ];
    }
    public function update(){
        $validateData=$this->validate();
        $customer=User::where('id',Auth::user()->id)->update($validateData);
        if($customer){
            return redirect()->route('login')->with('success',"Updated Success");
        }else{
            return redirect()->back()->with('error',"Something Went Wrong");
        }

    }
    public function render()
    {
        return view('livewire.customer.change-profile');
    }

    public function updated($property){
        $this->validateOnly($property);
    }
}