<?php

namespace App\Providers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;


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
        Paginator::useBootstrap();

        $profiles=DB::table('founder_profiles')->get();
        View::share('founder_profiles',$profiles);

        $skilledprofiles=DB::table('skilled_profiles')->get();
        View::share('skilled_profiles',$skilledprofiles);
        
        $investorprofile=DB::table('investor_profiles')->get();
        View::share('investor_profiles',$investorprofile);
        
        $commentss=DB::table('comments')->get();
        View::share('comments', $commentss);

        // $projectposts=DB::table('project_posts')->get();
        // View::share('project_posts',$projectposts);
    }
}
