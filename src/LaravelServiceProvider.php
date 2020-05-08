<?php

namespace Cblink\Jddj;

class LaravelServiceProvider extends \Illuminate\Support\ServiceProvider
{
    protected $defer = true;

    public function register()
    {
        $this->app->singleton(Application::class, function(){
            return new Application(config('services.alias'));
        });

        $this->app->alias(Application::class, 'alias');
    }

    public function provides()
    {
        return [Application::class, 'alias'];
    }
}