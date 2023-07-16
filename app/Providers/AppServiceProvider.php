<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use View;
use App\Models\Setting;
use App\Models\Project;
use App\Models\Service;
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
    public function boot(): void
    {
        $settings = Setting::first();
        $services = Service::where('is_active' , 1 )->latest()->get();
        $projects = Project::where('is_active' , 1 )->latest()->get();
        $data = [
            'settings' => $settings , 
            'services' => $services , 
            'projects' => $projects , 
        ];
        View::share('data', $data);
    }
}
