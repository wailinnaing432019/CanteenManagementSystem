<?php

namespace App\Http\Livewire\Customer;

use App\Models\User;
use Livewire\Component;
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
    protected $message=[
        'password.regex'=>"Password can be this format [A-Z,a-z,0-1,@#$%] ",
    ];
    public function update() {
        $validated=$this->validate();
        if(Hash::check($validated['oldpassword'], auth()->user()->password)){
            User::where('id',auth()->user()->id)->update(
                [
                    'password'=>Hash::make($validated['password'])
                ]);
                return redirect()->route('login');

                        // mail sending welcome
        $mailData=[
            'title'=>"Hungry Heaven",
            'body'=>auth()->user()->name,
            'content'=>"Password Changed",
        ];
        Mail::to($user->email)->send(new UpdateInformation($mailData));
        event(new Registered($user));
        }else{
            session()->flash('error',"Something went wrong");
        }
    }
    public function render()
    {
        return view('livewire.customer.change-password');
    }
}