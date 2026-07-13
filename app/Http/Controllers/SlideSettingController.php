<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\SlideSetting;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class SlideSettingController extends Controller
{
    //
    public function create(){
        $menus=Menu::where('status','1')->get();
        return view('admin.slides.slidesetting',compact('menus'));
    }

    public function store(Request $request){
        $this->Datavalidationcheck($request,'create');
       $slidedata= $this->slidedata($request);
      $filename=uniqid().$request->file('image')->getClientOriginalName();
    $request->file('image')->storeAs('public',$filename);
    $slidedata['image']=$filename;
    $menu=Menu::where('id',$slidedata['menu_id'])->first();
    $menu->update([
        'discount'=>$slidedata['discount'],
    ]);
    // dd($slidedata['discount']);
    SlideSetting::create($slidedata);
       return redirect('admin/slide')->with('success', 'Slide Created');
    }

    public function list(){
        $slidedata=SlideSetting::orderBy('created_at','desc')
        ->paginate(5);
        $slidedata->appends(request()->all());
        return view('admin.slides.slidesettinglist',compact('slidedata'));
    }

    public function edit($id){
        $data=SlideSetting::where('id',$id)->first();
        $menu=Menu::all();
        return view('admin.slides.slideedit',compact('data','menu'));
    }

    public function update(Request $request,$id){
         $this->Datavalidationcheck($request,'update');
        $slidedata= $this->slidedata($request);
        if($request->hasFile('image')){
            $oldimage=SlideSetting::where('id',$id)->first();
            $oldimage=$oldimage->image;
            if($oldimage !=null){
                Storage::delete('public/slides/'.$oldimage);
            }

            $filename=uniqid().$request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('public/slides',$filename);
            $slidedata['image']='slides/'.$filename;
        }
            $menu=Menu::where('id',$slidedata['menu_id'])->first();
    $menu->update([
        'discount'=>$slidedata['discount'],
    ]);
        SlideSetting::where('id',$id)->update($slidedata);
        return redirect('admin/slide')->with('success', 'slide-updated');
    }

    public function delete($id){
        $slide=SlideSetting::where('id',$id)->first();
            $menu=Menu::where('id',$slide->menu_id)->first();
    $menu->update([
        'discount'=>'0',
    ]);
         SlideSetting::where('id',$id)->delete();
       return back()->with(['success'=>'slide deleted']);
    }
    private function slidedata($request){
        return[
            'menu_id'=>$request->menu_id,
            'discount'=>$request->discount,
            'description'=>$request->description,
        ];
    }

    private function Datavalidationcheck($request,$action){
        $validationrules=[
            'menu_id'=>'required', Rule::unique('slide_settings'),
            'description'=>'required|string|min:50|max:255',
            'discount'=>'required|numeric|min:0|max:100'
        ];
         $validationrules['image'] = $action == "create" ?'required|mimes:png,jpg,jpeg|file' :'mimes:png,jpg,jpeg';
        Validator::make($request->all(),$validationrules)->validate();
    }
}