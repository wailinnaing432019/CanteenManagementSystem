<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Menu;
use App\Models\Order;
use App\Mail\SendInvoice;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class CustomerOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $now=Carbon::now();
        $orders=Order::whereDate('created_at',$now)->paginate(8);
        // dd($orders);
        return view('admin.customers.order',compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show( $id)
    {
        $order=Order::findOrFail($id);
        $order_details=OrderDetail::where('order_id',$id)->get();
        $orderWaitingTime =$this->calculateWaitingTime($order->id);
        if($orderWaitingTime > 60 ){
            $hour=floor($orderWaitingTime / 60 );
            $min=$orderWaitingTime % 60;
            $orderWaitingTime = $hour .' hour '. $min .' minutes';
        }else{
            $orderWaitingTime=$orderWaitingTime. ' minutes';
        }
        // dd($orderWaitingTime);
        if($order!=null){
            return view('admin.customers.order-detail',compact('order','order_details','orderWaitingTime'));
        }
    }

    // preview invoice
    public function previewInvoice($id){
        $order=Order::where('id',$id)->first();
        if($order->status==2){
            return redirect()->back()->with('error',"You changed Order Status to Reject , can not generate invoice ");
        }
        $orderDetails=OrderDetail::where('order_id',$id)->where('status','1')->get();
        if($orderDetails->count() <= 0){
            return redirect()->back()->with('error',"You can not accept any order , can not generate invoice ");
        }
        return view('admin.customers.invoice',compact('order','orderDetails'));
    }

    public function sendMailInvoice($id,Request $request){
        $order=Order::where('id',$id)->where('status',1)->orWhere('status','2')->first();
        if($order==null){
            return redirect()->back()->with('error',"You are not change order status to accept . So, you can not send email");
        }

        $orderDetails=OrderDetail::where('order_id',$id)->where('status','1')->get();
        if($orderDetails->count() <= 0){
            return redirect()->back()->with('error',"You can not accept any order , can not generate invoice ");
        }
        $total=0;
        foreach($orderDetails as $item){
            $total+=$item->price*$item->quantity;
        }
        $order->update([
            'total_amount'=>$total,
            'send_mail'=>'1',
        ]);
        $waiting_time=$request->input('waiting_time');

        // dd($order->user->email);
        $status=$order->status==1 ? 'accept':'reject';
        // dd($status);
        Mail::to($order->user->email)->send(new SendInvoice($order,$orderDetails,$waiting_time,$status));
        return redirect('admin/customers/orders')->with('success',"Change order status and sent order status to  ".$order->user->email);
    }

    // Function to calculate waiting time
private function calculateWaitingTime($order_id) {
    $orderDetails = OrderDetail::where('order_id', $order_id)->get();
    $maxWaitingTime = 0;

    foreach ($orderDetails as $orderDetail) {
        $menu = Menu::find($orderDetail->menu_id);
        $preparationTime = $menu->waiting_time * $orderDetail->quantity;
        if ($preparationTime > $maxWaitingTime) {
            $maxWaitingTime = $preparationTime;
        }
    }

    return $maxWaitingTime;
}
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}