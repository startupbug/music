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
            
            if(Auth::check()){
            $musician_points = DB::table('points')
                                ->leftjoin('tracks','tracks.id','=','points.track_id')
                                ->leftjoin('users','users.id','=','tracks.user_id')
                                ->select('points.point')                                
                                ->where('users.id','=',Auth::user()->id)
                                ->get();
            $total_points = 0;             
            foreach ($musician_points as $value) {                                         
                $total_points += $value->point;
            }                                           

            View::composer('layouts.dashboard_partials.sidebar', function($view) use($total_points) {
            $view->with('total_points',$total_points);
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
