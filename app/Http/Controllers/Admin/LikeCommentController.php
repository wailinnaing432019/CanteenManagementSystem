<?php

namespace App\Http\Controllers\Admin;

use App\Models\Like;
use App\Models\Menu;
use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LikeCommentController extends Controller
{
    public function index(){
        $menus=Menu::paginate(5);
        foreach ($menus as $menu) {
            $likeCount=Like::where('menu_id',$menu->id)
                            ->where('status','1')
                            ->count();
            $menu->likes=$likeCount;
            $commentCount=Comment::where('menu_id',$menu->id)
                            ->count();
            $menu->comments=$commentCount;
        }
        return view('admin.likes.index',compact('menus'));
    }

    public function viewComment($id)
    {
        $menu=Menu::findOrFail($id);
        $comments=Comment::where('menu_id',$id)->paginate(5);
        return view('admin.likes.comments',compact('menu','comments'));
    }

    public function destoryComment($menuId,$userId,$commentId){
        $status=Comment::where('id',$commentId)->where('menu_id',$menuId)->where('user_id',$userId)->delete();
        if($status)
        {
            return back()->with('success',"Comments Deleted");
        }
        else
        {
            return back()->with('error',"Something Wrong");
        }
    }

}