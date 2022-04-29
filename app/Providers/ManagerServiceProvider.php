<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Managers\Author\AuthorManager;
use App\Managers\Author\AuthorManagerInterface;
use App\Managers\Book\BookManager;
use App\Managers\Book\BookManagerInterface;

/**
 * Description of ManagerServiceProvider
 * @author anupamojha
 */
class ManagerServiceProvider extends ServiceProvider{
    /**
     * Register any Manager services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            AuthorManagerInterface::class,AuthorManager::class
        );
        
        $this->app->bind(
            BookManagerInterface::class,BookManager::class
        );
    }
}
