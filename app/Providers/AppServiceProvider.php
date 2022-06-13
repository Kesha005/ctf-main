<?php

namespace App\Providers;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\View as FacadesView;
use Illuminate\Support\ServiceProvider;
use Illuminate\View\View as ViewView;
use App\Models\game_timer;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $date=game_timer::latest()->first();
        $c_month = $date['added_time']->format('F');
        $c_date  = $date['added_time']->format('d');
        $c_year  = $date['added_time']->format('Y');
        $c_time  = $date['added_time']->format('H:i:s');
        $hours   =$date['added_time']->format('H');
        $minutes   =$date['added_time']->format('i');
        $seconds   =$date['added_time']->format('s');
        $mmonth   =$date['added_time']->format('m');
    
        FacadesView::share('date',$date);
        FacadesView::share('c_month',$c_month);
        FacadesView::share('c_date',$c_date);
        FacadesView::share('c_year',$c_year);
        FacadesView::share('c_time',$c_time);
        FacadesView::share('hours',$hours);
        FacadesView::share('minutes',$minutes);
        FacadesView::share('seconds',$seconds);
        FacadesView::share('mmonth',$mmonth);
    
    }
}
