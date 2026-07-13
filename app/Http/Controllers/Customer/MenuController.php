<?php

namespace App\Http\Controllers\Customer;

use App\Models\Menu;
use App\Models\Setting;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MenuController extends Controller
{
    public function index(){
        $menus=Menu::where('status','1')->get();
        $setting=Setting::first();
        $categories=Category::where('status','1')->get();
        return view('customer.menupage',compact('menus','setting','categories'));
    }

    public function view($id){
        $setting=Setting::first();
        $menu=Menu::where('id',$id)->first();
        $menu->update([
            'count'=>$menu->count+1,
        ]
        );
        return view('customer.menudetail',compact('menu' ,'setting'));
    }
}
