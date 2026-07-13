<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\PurchaseOrder;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Requests\PurchaserUpdate;

class PurchaseOrderController extends Controller
{
    //
     public function index(){
        return view('purchaser.index');
    }

    public function tdorder(){
        $today=Carbon::now();
        $orders=PurchaseOrder::whereDate('created_at',$today)->get();
        return view('purchaser.purchaseorder',compact('orders'));
    }

    public function downloaddata(){
        $today=Carbon::now();
        $order=PurchaseOrder::whereDate('created_at',$today)->get();
        return view('purchaser.printorder',compact('order'));
    }

     public function downloadpdf()
    {
        // return Pdf::loadFile(public_path().'/myfile.html')->save('/path-to/my_stored_file.pdf')->stream('download.pdf');
        $today=Carbon::now();
        $order=PurchaseOrder::whereDate('created_at',$today)->get();
        $data=['order'=>$order];
        $pdf=Pdf::loadView('purchaser.printorder',$data);
        return $pdf->download('BlahBlah001t'.$today.'.pdf');

    }

    public function purchased(){
        $today=Carbon::now();
        $order2=PurchaseOrder::whereDate('created_at',$today)->where('status','1')->get();
        return $order2;
        return view('purchaser.purchased',compact('order2'));
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
    }

}
