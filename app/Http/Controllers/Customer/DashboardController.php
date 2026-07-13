<?php

namespace App\Http\Controllers\Customer;

use App\Models\Like;
use App\Models\Menu;
use App\Models\Setting;
use App\Models\Category;
use App\Models\Employee;
use App\Models\SlideSetting;
use Illuminate\Http\Request;
use App\Models\RestaurantTable;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()  {
        $menus=Menu::where('status','1')->orderBy('created_at', 'desc')
                   ->orderBy('updated_at', 'desc')
                   ->take(10)
                   ->get();;
        foreach ($menus as $key => $menu) {
            $menu->likeCount=Like::where('menu_id',$menu->id)->where('status','1')->count();
        }
        $categories=Category::where('status','1')->get();
        $setting=Setting::first();
        $tables=RestaurantTable::get();
        $chefs=Employee::where('role_as',"chef")->get();
        $slides=SlideSetting::where('status','1')->get();
        return view('layout.customerhome',compact( 'slides','menus','categories','setting','tables','chefs'));
    }

    // showing cart

    public function cartShow(){
        $setting=Setting::first();
        return view('customer.customercart',compact('setting'));
    }
}