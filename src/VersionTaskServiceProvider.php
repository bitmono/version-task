<?php

namespace Bitmono\VersionTask;

use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class VersionTaskServiceProvider extends ServiceProvider implements DeferrableProvider
{
    /**
     * Boot services.
     *
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/version-task.php' => config_path('version-task.php'),
        ], 'config');

        $this->mergeConfigFrom(__DIR__.'/../config/version-task.php', 'version-task');
        
        if (! class_exists('CreateVersionTasksTable')) {
            $timestamp = date('Y_m_d_His', time());
            $this->publishes([
                __DIR__.'/../migrations/create_version_tasks_table.php.stub' => database_path("/migrations/{$timestamp}_create_version_tasks_table.php"),
            ], 'migrations');
        }
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(\Bitmono\VersionTask\Contracts\VersionTaskServiceContract::class, \Bitmono\VersionTask\Services\VersionTaskService::class);
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [\Bitmono\VersionTask\Contracts\VersionTaskServiceContract::class];
    }
}
