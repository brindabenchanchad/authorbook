<?php

namespace App\Providers;

use App\Managers\Author\AuthorManager;
use App\Managers\Author\AuthorManagerInterface;
use Illuminate\Support\ServiceProvider;
use App\Components\FormRequest;

class RequestValidationServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

    }
    
    public function boot(): void
    {
        $this->app->afterResolving(FormRequest::class, function ($resolved) {
            $resolved->validateResolved();
        });

        $this->app->resolving(FormRequest::class, function ($request, $app) {
            $request = FormRequest::createFrom($app['request'], $request);
            $request->setContainer($app);
        });
    }
}
