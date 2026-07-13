<?php

namespace App\Http\Livewire\Admin;

use App\Models\Setting;
use Livewire\Component;
use App\Rules\MaxWordCount;
use Livewire\WithFileUploads;
use Storage;

class SettingView extends Component
{
    use WithFileUploads;
    public $name,
            $email,
            $address,
            $phone,
            $about_us,
            $facebook_link,
            $instagram_link,
            $logo,
            $image1,
            $image2,
            $image3,
            $telegram_link,
            $btn_name,
            $service_one,
            $service_two,
            $service_three
            ;

    public $logo_image,$images;

    public function rules()
    {
        return [
            'name' => 'required|string',
            'email' => 'required|email',
            'address' => 'required|string',
            'phone' => ['required', 'regex:/^(09|\+?950?9|\+?95950?9)\d{7,9}$/'], // Assuming Myanmar phone format is +95-XXX-XXXXXXX
            'about_us' => 'required|string|max:1000',
            'facebook_link' => 'nullable|url',
            'instagram_link' => 'nullable|url',
            'telegram_link' => 'nullable|url',
            'logo_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Max file size: 2MB
            'images' => 'nullable|array|max:3|min:3', // Multiple file upload validation
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Individual file validation within the array

        ];
    }
    public function mount(){
        $originSetting=Setting::first();
        if($originSetting){
            $this->name=$originSetting->name;
            $this->email=$originSetting->email;
            $this->address=$originSetting->address;
            $this->phone=$originSetting->phone;
            $this->about_us=$originSetting->about_us;
            $this->facebook_link=$originSetting->facebook_link;
            $this->instagram_link=$originSetting->instagram_link;
            $this->telegram_link=$originSetting->telegram_link;
            $this->logo=$originSetting->logo_image;
            $this->image1=$originSetting->image_one;
            $this->image2=$originSetting->image_two;
            $this->image3=$originSetting->image_three;
            $this->service_one=$originSetting->service_one;
            $this->service_two=$originSetting->service_two;
            $this->service_three=$originSetting->service_three;
            $this->btn_name="Update";
        }
    }
    public function save(){
        $validated=$this->validate();
        $setting=Setting::first();
        if($setting){
            if($this->images){
                if ($this->image1 && Storage::exists('public/'.$this->image1)) {
                    Storage::delete('public/'.$this->image1);
                }
                if ($this->image2&& Storage::exists('public/'.$this->image2)) {
                    Storage::delete('public/'.$this->image2);
                }
                if ($this->image3 && Storage::exists('public/'.$this->image3)) {
                    Storage::delete('public/'.$this->image3);
                }
                $filename_image_one=uniqid().'_MM_'.$this->images[0]->getClientOriginalName();
                $this->images[0]->storeAs('public/setting',$filename_image_one);
                $validated['image_one']='setting/'.$filename_image_one;
                // image two
                $filename_image_two=uniqid().'_MM_'.$this->images[1]->getClientOriginalName();
                $this->images[1]->storeAs('public/setting',$filename_image_two);
                $validated['image_two']='setting/'.$filename_image_two;
                // image three
                $filename_image_three=uniqid().'_MM_'.$this->images[2]->getClientOriginalName();
                $this->images[2]->storeAs('public/setting',$filename_image_three);
                $validated['image_three']='setting/'.$filename_image_three;
            }else{
                $validated['image_one']=$this->image1;
                $validated['image_two']=$this->image2;
                $validated['image_three']=$this->image3;

            }
            // for logo
            if($this->logo_image){
                if ($this->logo && Storage::exists('public/'.$this->logo)) {
                    Storage::delete('public/'.$this->logo);
                }
                $filename_logo=uniqid().'_MM_'.$this->logo_image->getClientOriginalName();
            $this->logo_image->storeAs('public/setting',$filename_logo);
            $validated['logo_image']='setting/'.$filename_logo;
            }else{
                $validated['logo_image']=$this->logo;
            }
            $setting=$setting->update($validated);
            return redirect('/admin/setting')->with('success',"Updated Successfully");
        }
        else{
            if($this->images){

            $filename_image_one=uniqid().'_MM_'.$this->images[0]->getClientOriginalName();
            $this->images[0]->storeAs('public/setting',$filename_image_one);
            $validated['image_one']='setting/'.$filename_image_one;
            // image two
            $filename_image_two=uniqid().'_MM_'.$this->images[1]->getClientOriginalName();
            $this->images[1]->storeAs('public/setting',$filename_image_two);
            $validated['image_two']='setting/'.$filename_image_two;
            // image three
                $filename_image_three=uniqid().'_MM_'.$this->images[2]->getClientOriginalName();
                $this->images[2]->storeAs('public/setting',$filename_image_three);
                $validated['image_three']='setting/'.$filename_image_three;
            }
            // for logo
            if($this->logo_image){

                $filename_logo=uniqid().'_MM_'.$this->logo_image->getClientOriginalName();
                $this->logo_image->storeAs('public/setting',$filename_logo);
                $validated['logo_image']='setting/'.$filename_logo;
            }
            Setting::create($validated);
            return redirect('/admin/setting')->with('success',"Setting Configure Successfully");
        }


    }
    public function render()
    {
        return view('livewire.admin.setting-view')->extends('layout.admin');
    }

    public function updated($property){
        $this->validateOnly($property);

    }


}