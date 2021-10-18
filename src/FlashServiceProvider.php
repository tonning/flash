<?php

namespace Tonning\Flash;

use Illuminate\Support\Facades\Blade;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Tonning\Flash\View\Components\Warning;

class FlashServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('flash')
            ->hasConfigFile()
            ->hasViews();
    }

    public function registeringPackage()
    {
        $this->app->bind(SessionStore::class, LaravelSessionStore::class);

        $this->app->singleton(Flash::class, function () {
            return $this->app->make(FlashNotifier::class);
        });
    }

    public function bootingPackage()
    {
        Blade::componentNamespace('Tonning\\Flash\\View\\Components', 'flash');
    }
}
