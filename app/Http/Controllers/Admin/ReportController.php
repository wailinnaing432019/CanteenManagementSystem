<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\PurchaseOrder;
use App\Http\Controllers\Controller;

class ReportController extends Controller
{
    public function income(Request $request){
        $firstCreatedAt = Order::orderBy('created_at', 'asc')->value('created_at');
        $lastCreatedAt = Order::orderBy('created_at', 'desc')->value('created_at');
        $firstCreatedAt = $firstCreatedAt ? Carbon::parse($firstCreatedAt)->toDateString() : null;
        $lastCreatedAt = $lastCreatedAt ? Carbon::parse($lastCreatedAt)->toDateString() : null;

        if($request->startDate && $request->endDate){
                    $orders=Order::whereDate('created_at', '>=', $request->startDate)
             ->whereDate('created_at', '<=', $request->endDate)->where('status','3')->paginate(10);
            $totalAmount=Order::whereDate('created_at', '>=', $request->startDate)
             ->whereDate('created_at', '<=', $request->endDate)->where('status','3')->sum('total_amount');
            }else{
            $orders=Order::whereDate('created_at', '>=', $firstCreatedAt)
             ->whereDate('created_at', '<=', $lastCreatedAt)->where('status','3')->paginate(10);
             $totalAmount=Order::whereDate('created_at', '>=', $firstCreatedAt)
             ->whereDate('created_at', '<=', $lastCreatedAt)->where('status','3')->sum('total_amount');
        }


        return view('admin.reports.income',compact('orders','firstCreatedAt','lastCreatedAt','totalAmount'));
    }

    public function expense(Request $request){
         $firstCreatedAt = PurchaseOrder::orderBy('created_at', 'asc')->value('created_at');
        $lastCreatedAt = PurchaseOrder::orderBy('created_at', 'desc')->value('created_at');
        $firstCreatedAt = $firstCreatedAt ? Carbon::parse($firstCreatedAt)->toDateString() : null;
        $lastCreatedAt = $lastCreatedAt ? Carbon::parse($lastCreatedAt)->toDateString() : null;

        if($request->startDate && $request->endDate){
                    $orders=PurchaseOrder::whereDate('created_at', '>=', $request->startDate)
             ->whereDate('created_at', '<=', $request->endDate)->where('status','2')->paginate(10);
             $totalAmount=PurchaseOrder::whereDate('created_at', '>=', $request->startDate)
             ->whereDate('created_at', '<=', $request->endDate)->where('status','2')->sum('total_price');
        }else{
            $orders=PurchaseOrder::whereDate('created_at', '>=', $firstCreatedAt)
             ->whereDate('created_at', '<=', $lastCreatedAt)->where('status','2')->paginate(10);
             $totalAmount=PurchaseOrder::whereDate('created_at', '>=', $firstCreatedAt)
             ->whereDate('created_at', '<=', $lastCreatedAt)->where('status','2')->sum('total_price');
        }


        return view('admin.reports.expense',compact('orders','firstCreatedAt','lastCreatedAt','totalAmount'));

    }
}