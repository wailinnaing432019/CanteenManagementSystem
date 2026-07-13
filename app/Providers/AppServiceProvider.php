<?php

namespace App\Providers;

use Carbon\Carbon;
use App\Models\Menu;
use App\Models\Order;
use App\Models\Setting;
use App\Models\Employee;
use App\Models\RestaurantTable;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        $currentTime=Carbon::now();
        $setting=Setting::first();
        $availableTable=RestaurantTable::where('status','1')->count();
        $totalEmployee=Employee::count();
        $chefCount=Employee::where('role_as','chef')->count();
        $TotalMenu=Menu::count();
        $todayOrder=Order::whereDate('created_at',$currentTime)->count();
        View::share(['availableTable'=>$availableTable,'totalEmployee'=>$totalEmployee,'totalMenu'=>$TotalMenu,'todayOrder'=>$todayOrder,'chef'=>$chefCount]);
        View::share('setting',$setting);
        View::share('currentTime',$currentTime);
    }
}