<?php

namespace App\Http\Livewire\Customer;

use App\Models\Menu;
use App\Models\Order;
use App\Models\Setting;
use Livewire\Component;
use App\Models\RestaurantTable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

class CartView extends Component
{
    public $cart=NULL;
    public $total;
    public $leave_note;
    // public $menu=[],$quantity=[];

    public function rules(){
        return [
            'leave_note'=>'nullable|string',
        ];
    }
    public function mount(){
        $cart = json_decode(Cookie::get('cart', '[]'), true);
        $tableNo = json_decode(Cookie::get('tableNo', '[]'), true);

        // foreach ($cart as $key => $value) {
        //     $menu=Menu::select('name')->where('id',$key)->first();

        // }

    }
    public function decrement($id){
        $cart = json_decode(Cookie::get('cart', '[]'), true);
        if (isset($cart[$id])){
            $cart[$id]=$cart[$id]-1;
            Cookie::queue('cart', json_encode($cart), 60 * 24 * 30);
        }
        return redirect('/cart')->with('success',"Decrease Success");
    }
    // increment
    public function increment($id){
        $cart = json_decode(Cookie::get('cart', '[]'), true);
        if (isset($cart[$id])){
            $cart[$id]=$cart[$id]+1;
            Cookie::queue('cart', json_encode($cart), 60 * 24 * 30);
        }
        return redirect('/cart')->with('success',"Increase Success");
    }
    // deleteCartItem
    public function deleteCartItem($id){
        $cart = json_decode(Cookie::get('cart', '[]'), true);
        if (isset($cart[$id])){
            $cart[$id]=0;
            Cookie::queue('cart', json_encode($cart), 60 * 24 * 30);
        }
        return redirect('/cart')->with('success',"Delete Success");
    }

    // order
    public function order(){
        if(!Auth::check()){
            return redirect()->route('login');
        }
        $cart = json_decode(Cookie::get('cart', '[]'), true);
        $total=0;
        foreach ($cart as $key => $quantity) {
            if($cart[$key]>0){
                $menu=Menu::find($key);
                if($menu){
                    if($menu->discount==0){
                        $total+=$menu->price*$cart[$key];
                    }else{
                        $total+=($menu->price*$cart[$key])* ($menu->discount* 0.01);
                    }
                }
            }
        }

        // getting table no
        $tableNo = json_decode(Cookie::get('tableNo', '[]'), true);

        if($tableNo){
            $tables=RestaurantTable::select('table_no')->where('id',$tableNo)->first();
            $tableName=$tables['table_no'];
        }else{
            $tables=RestaurantTable::select('table_no')->where('status','1')->first();
            if($tables==null){
                return redirect()->back()->with('error',"No tables are available ! please , wait until tables are free");
            }
            $tableName=$tables['table_no'];
        }
        // dd($this->leave_note);
        $order=Order::create([
            'user_id'=>Auth::user()->id,
            'total_amount'=>$total,
            'status'=>0,
            'table_no'=>$tableName,
            'leave_note'=>$this->leave_note,
        ]);
        RestaurantTable::where('table_no',$order->table_no)->update([
            'status'=>'2',
        ]);
        if($order){
            foreach($cart as $key => $quantity){
            if($cart[$key]>0){
                $orderItem=Menu::where('id',$key)->first();
                $order->orderDetail()->create([
                'order_id'=>$order->id,
                'menu_id'=>$orderItem->id,
                'price'=>$orderItem->price,
                'quantity'=>$cart[$key],
                'total_price'=>$orderItem->price * $cart[$key],
                ]);
                }
            }
            session()->flash('success',"Ordered Successfully");
             $this->cart = [];
            Cookie::queue(Cookie::forget('cart'));
            return redirect('/');
        }else{
            session()->flash('error',"Somethig Went Wrong");
        }

    }
    public function render()
    {
        $menu=NULL;
        $quantity=NULL;
        $cart = json_decode(Cookie::get('cart', '[]'), true);
            foreach ($cart as $key => $value) {
            $menu[]=Menu::where('id',$key)->first();
            $quantity[]=$value;
        }
        $tableNo = json_decode(Cookie::get('tableNo', '[]'), true);
        // dd($tableNo);
        if($tableNo){
            $tables=RestaurantTable::select('table_no')->where('id',$tableNo)->first();
            // dd($tables);
            $tableName=$tables['table_no'];
        }else{
            $tables=RestaurantTable::select('table_no')->where('status','1')->first();
            if($tables==null){
                            $tableName="";

            }else{

                $tableName=$tables['table_no'];
            }
        }
        // dd($menu);
        // $menus=Menu::get();
        return view('livewire.customer.cart-view',[
            'quantity'=>$quantity ,
            'menus'=>$menu,
            'setting'=>Setting::first(),
            'tableNo'=>$tableName,
            'cart'=>$cart,
        ]);
    }

     public function updated()
    {
        // Check if the order has been successfully placed
        if (session()->has('success')) {
            Cookie::queue(Cookie::forget('cart'));
        }
    }
}