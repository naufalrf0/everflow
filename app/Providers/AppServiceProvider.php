<?php

namespace App\Providers;

use App\Models\Bandul;
use App\Observers\BandulObserver;
use App\Repositories\KomentarRepository;
use App\Repositories\KomentarRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(KomentarRepositoryInterface::class, KomentarRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Bandul::observe(BandulObserver::class);
    }

    /**
     * Bootstrap any application services.
     */
}
