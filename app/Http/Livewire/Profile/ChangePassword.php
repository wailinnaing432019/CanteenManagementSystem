<?php

namespace App\Http\Livewire\Profile;

use Livewire\Component;
use App\Models\Employee;
use Illuminate\Support\Facades\Hash;

class ChangePassword extends Component
{
    public $password="",$oldpassword="",$password_confirmation="";
    public function rules(){
        return [
             'password' => ['required','confirmed', 'string', 'min:8', 'confirmed', 'regex:/^(?=.*[a-zA-Z])(?=.*[!@#$%^&*()\-_=+{};:,<.>])(?=.*\d)(?=.*[A-Z]).*$/'],
             'oldpassword'=>'required|string',
        ];
    }
    public function update() {
        $validated=$this->validate();
        if(Hash::check($validated['oldpassword'], auth()->guard('staff')->user()->password)){
            Employee::where('id',auth()->guard('staff')->user()->id)->update(
                [
                    'password'=>Hash::make($validated['password'])
                ]);
                return redirect()->route('staff.login');
        }else{
            session()->flash('error',"Something went wrong");
        }
    }
    public function render()
    {
        return view('livewire.profile.change-password');
    }
}