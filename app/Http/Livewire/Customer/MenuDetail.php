<?php

namespace App\Http\Livewire\Customer;

use App\Models\Cart;
use App\Models\Like;
use App\Models\Menu;
use App\Models\Comment;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

class MenuDetail extends Component
{
    public $menu;
    public $message="",$menu_id,$status;
    public $quantity=1;
    public $added=false;
    public $likeCount=0;
    public $commentCount=0;
     protected $listeners = ['likeAdded' => 'clike','commentAdded'=>'ccomment'];
    public function increment(){
        $this->quantity++;
    }
    public function decrement(){
        if($this->quantity==0){
            return;
        }
        $this->quantity--;
    }
    // count like
    public function clike(){
        $this->likeCount=Like::where('status','1')->where('menu_id',$this->menu_id)->count('status');

    }
    public function ccomment(){
        $this->commentCount=Comment::where('menu_id',$this->menu_id)->count('message');

    }
    public function mount($menu){

        $this->menu=$menu;
        $this->menu_id=$this->menu->id;
        // for like show
        if(Auth::check()){
                    $statusLike=Like::where('menu_id',$this->menu->id)
                ->where('user_id',Auth::user()->id)
                ->first();
        if($statusLike!=null){
            if($statusLike->status == 1){
            $this->status=true;
        }
        }
        }
        $this->clike();
        $this->ccomment();
        $cart = json_decode(Cookie::get('cart', '[]'), true);
        if(isset($cart[$this->menu_id])){
            $this->quantity=$cart[$this->menu_id];
        }
        // if(Cart::where('menu_id',$this->menu_id)->where('user_id',Auth::user()->id)->first()){
        //     $this->added=true;
        // }else{
        //     $this->added=false;
        // }
    }

    // comments
    public function comment($id) {
        if(!Auth::check()){
            return redirect()->route('login')->with('message',"Login First");
        }
        $rules=[
            'message'=>'required|string|max:250',
        ];
        $validated = $this->validate($rules);

        $validated['user_id']=Auth::user()->id;
        $validated['menu_id']=$id;
        $comment=Comment::create($validated);
        $this->emit('commentAdded');
        // session()->flash('success',"Comment Created Successfully");
        $this->message="";

    }

    // like
    public function like($id){
        if(!Auth::check()){
            return redirect()->route('login')->with('message',"Login First");
        }
        $like=Like::where('menu_id',$id)
                        ->where('user_id',Auth::user()->id)
                        ->first();
        if($like){
            if($like->status=='1'){
                $like->update([
                'status'=>'0',
                ]);
                $this->status=false;
            }else{
                $like->update([
                'status'=>'1',
                ]);
                $this->status=true;
            }


                $this->emit('likeAdded');

        }else{
            Like::create(
                [
                    'menu_id'=>$id,
                    'user_id'=>Auth::user()->id,
                    'status'=>1,
                ]
                );
                $this->status=true;
                $this->emit('likeAdded');
        }
    }

    // add to cart
    public function addToCart($menuId, $qty)
    {

        $cart = json_decode(Cookie::get('cart', '[]'), true);

        if (!isset($cart[$menuId])) {
            $cart[$menuId] = 0;
        }

        $cart[$menuId] = $qty;
        Cookie::queue('cart', json_encode($cart), 60 * 24 * 30); // Store the cart data in a cookie for 30 days
         session()->flash('success',"Added Card success");
         $this->qty=$cart[$menuId];
        $this->added=true;
    }

    public function render()
    {
        $cart = json_decode(Cookie::get('cart', '[]'), true);
        foreach ($cart as $menuId => $qty) {
            if($this->menu_id==$menuId && $cart[$menuId]>0){

                $this->added=true;
            }
        }
        // dd($cart);
        // $cartCookie = Cookie::get('cart');

        $relatedMenus=Menu::where('category_id',$this->menu->category_id)->get();
        $comments=Comment::where('menu_id',$this->menu_id)->get();
        return view('livewire.customer.menu-detail',[
            'comments'=>$comments,
            'relatedMenus'=>$relatedMenus,
            'cart'=>$cart,//Cart::where('user_id',Auth::user()->id)->get()
        ]);
    }
}