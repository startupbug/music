<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use DB;
use View;
use Auth;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('*', function ($view) {
                 
            if(Auth::check())
            {
                $total = DB::table('points')                               
                                    ->where('user_id','=',Auth::user()->id)
                                    ->get();
                $total_points = 0;             
                foreach ($total as $value)
                {                                         
                    $total_points += $value->point;
                }      
                // dd($total_points);
                $redeem = DB::table('redeemed_points')                                                
                            ->select('redeemed_points.redeemed_point')                                
                            ->where('redeemed_points.user_id','=',Auth::user()->id)
                            ->get();
                $total_redeemed_points = 0;             
                foreach ($redeem as $value)
                {
                    $total_redeemed_points += $value->redeemed_point;
                }                                     
                    // dd($total_redeemed_points);

                $redeemable_points = $total_points - $total_redeemed_points;
                

                View::composer('layouts.dashboard_partials.sidebar', function($view) use($total_points, $redeemable_points)
                {
                    $view->with('redeemable_points', $redeemable_points)->with('total_points',$total_points);
                });
            }   
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
