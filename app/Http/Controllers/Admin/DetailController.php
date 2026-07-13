<?php

namespace App\Http\Controllers\Admin;

use App\Models\Menu;
use App\Models\Employee;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DetailController extends Controller
{
    //
    public function menudetail($id){
        $menu=Menu::where('id',$id)->first();
        return view('admin.menus.detail',compact('menu'));
    }

    public function employeedetail($id){
        $employee=Employee::find($id);
        return view('admin.staffs.detail',compact('employee'));
    }
}