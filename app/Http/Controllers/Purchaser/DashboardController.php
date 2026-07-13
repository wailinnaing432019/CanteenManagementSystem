<?php

namespace App\Http\Controllers\Purchaser;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\PurchaseOrder;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('purchaser.index');
    }
    public function todayOrder(){
        $now = Carbon::now('Asia/Yangon');
        $yesterdayStartTime = $now->copy()->subDay()->setTime(16, 0, 0); // 4:00 PM yesterday
        if ($now->hour >= 16) {
            $todayStartTime = $now->copy()->setTime(16, 0, 0); // 4:00 PM today

                $orders = PurchaseOrder::where('created_at', '>=', $todayStartTime)
                                        ->where('status','1')
                                        ->get();
        }elseif($now->hour<16 && $now->hour >7){
            $orders=PurchaseOrder::whereDate('created_at',$now->format('Y-m-d'))->where('status','1')->get();

        }else {
            $todayStartTime = $now->copy()->setTime(7, 0, 0); // 7:00 AM today
            $orders = PurchaseOrder::whereBetween('created_at', [$yesterdayStartTime, $todayStartTime])
                                        ->where('status','1')
                                        ->get();
        }
        return view('purchaser.purchaseorder',compact('orders'));
    }

    public function downloaddata(){
        $now = Carbon::now('Asia/Yangon');
        $yesterdayStartTime = $now->copy()->subDay()->setTime(16, 0, 0); // 4:00 PM yesterday
        if ($now->hour >= 16) {
            $todayStartTime = $now->copy()->setTime(16, 0, 0); // 4:00 PM today

                $orders = PurchaseOrder::where('created_at', '>=', $todayStartTime)
                                        ->where('status','1')
                                        ->get();
        }elseif($now->hour<16 && $now->hour >7){
            $orders=PurchaseOrder::whereDate('created_at',$now->format('Y-m-d'))->where('status','1')->get();

        } else {
            $todayStartTime = $now->copy()->setTime(7, 0, 0); // 7:00 AM today
            $orders = PurchaseOrder::whereBetween('created_at', [$yesterdayStartTime, $todayStartTime])
                                        ->where('status','1')
                                        ->get();
        }
        return view('purchaser.printorder',compact('orders'));
    }

     public function downloadpdf()
    {
        // return Pdf::loadFile(public_path().'/myfile.html')->save('/path-to/my_stored_file.pdf')->stream('download.pdf');
        $now = Carbon::now('Asia/Yangon');
        $yesterdayStartTime = $now->copy()->subDay()->setTime(16, 0, 0); // 4:00 PM yesterday
        if ($now->hour >= 16) {
            $todayStartTime = $now->copy()->setTime(16, 0, 0); // 4:00 PM today

                $orders = PurchaseOrder::where('created_at', '>=', $todayStartTime)
                                        ->where('status','1')
                                        ->get();
        }elseif($now->hour<16 && $now->hour >7){
            $orders=PurchaseOrder::whereDate('created_at',$now->format('Y-m-d'))->where('status','1')->get();

        } else {
            $todayStartTime = $now->copy()->setTime(7, 0, 0); // 7:00 AM today
            $orders = PurchaseOrder::whereBetween('created_at', [$yesterdayStartTime, $todayStartTime])
                                        ->where('status','1')
                                        ->get();
        }
        $data=['orders'=>$orders];
        $pdf=Pdf::loadView('purchaser.printorder',$data);
        return $pdf->download('Hungry Heaven'.$now.'.pdf');

    }

    public function purchased(){
        $now = Carbon::now('Asia/Yangon');
        $yesterdayStartTime = $now->copy()->subDay()->setTime(16, 0, 0); // 4:00 PM yesterday
        if ($now->hour >= 16) {
            $todayStartTime = $now->copy()->setTime(16, 0, 0); // 4:00 PM today

                $orders = PurchaseOrder::where('created_at', '>=', $todayStartTime)
                                        ->where('status','1')
                                        ->get();
        }elseif($now->hour<16 && $now->hour >7){
            $orders=PurchaseOrder::whereDate('created_at',$now->format('Y-m-d'))->where('status','1')->get();

        } else {
            $todayStartTime = $now->copy()->setTime(7, 0, 0); // 7:00 AM today
            $orders = PurchaseOrder::whereBetween('created_at', [$yesterdayStartTime, $todayStartTime])
                                        ->where('status','1')
                                        ->get();
        }
        return view('purchaser.purchased',compact('orders'));
    }

    public function purchasedStore(Request $request){
        // Define validation rules
    $validationRules = [];
    $attributeNames = [];

    // Loop through inputs and add rules

    foreach ($request->all() as $inputName => $inputValue) {

        if(strpos($inputName,'product_')===0){
            $productName=$inputValue;
            }
        if (strpos($inputName, 'price_') === 0) {
            $productId = substr($inputName, strlen('price_'));
            $validationRules[$inputName] = ['required', 'integer'];
             $attributeNames[$inputName] = $productName." Price Field  is needed , Please Fill this field";
        }

        if (strpos($inputName, 'quantity_') === 0) {
            $validationRules[$inputName] = ['required', 'integer'];
             $attributeNames[$inputName] = $productName." Quantity Field  is needed , Please Fill this field";
        }
    }

    // Validate the request
    $validator = Validator::make($request->all(), $validationRules);

    // If validation fails, you can customize the error messages
    $validator->setAttributeNames($attributeNames);

    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
    }
    $now = Carbon::now('Asia/Yangon');
        $yesterdayStartTime = $now->copy()->subDay()->setTime(16, 0, 0); // 4:00 PM yesterday
        if ($now->hour >= 16) {
            $todayStartTime = $now->copy()->setTime(16, 0, 0); // 4:00 PM today

                $orders = PurchaseOrder::where('created_at', '>=', $todayStartTime)
                                        ->where('status','1')
                                        ->get();
        }elseif($now->hour<16 && $now->hour >7){
            $orders=PurchaseOrder::whereDate('created_at',$now->format('Y-m-d'))->where('status','1')->get();

        } else {
            $todayStartTime = $now->copy()->setTime(7, 0, 0); // 7:00 AM today
            $orders = PurchaseOrder::whereBetween('created_at', [$yesterdayStartTime, $todayStartTime])
                                        ->where('status','1')
                                        ->get();
        }
        // dd($request->input('price_'."18"));

        foreach ($orders as $order) {
            $order->update([
                'price_perunit'=>$request->input('price_'.$order->id),
                'quantity'=>$request->input('quantity_'.$order->id),
                'total_price'=>$request->input('price_'.$order->id)*$request->input('quantity_'.$order->id),
                'status'=>'2',
            ]);
        }

        return back()->with('message',"Added success");

    }


    public function orderupdate(Request $request){
        $data=$request->all();
        return($data);
    }

    protected function updata($request){
        return[
            'quantity'=>$request->input('quantity'),
            'price_perunit'=>$request->input('price_perunit'),
        ];
    }        /**
         * Show the form for creating a new resource.
         */
        public function createPage()
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
        public function show(string $id)
        {
            //
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