<?php


namespace Habib\Attachment\Providers;


use Illuminate\Support\ServiceProvider;

class AttachmentServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $package_path = dirname(__DIR__).'/';
        $this->mergeConfigFrom(
            $package_path.'config/attachment.php', 'attachment'
        );
        $this->mergeConfigFrom(
            $package_path.'config/thumbnail.php', 'thumbnail'
        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $package_path = dirname(__DIR__);
        //publish config attachment.php
        $this->publishes([
            $package_path . '/config/attachment.php' => config_path('attachment.php'),
        ], 'attachment config');

        //publish config thumbnail.php
        $this->publishes([
            $package_path . '/config/thumbnail.php' => config_path('thumbnail.php'),
        ], 'attachment thumbnail config');

        //publish views
        $this->publishes([
            $package_path . '/resources/views' => resource_path('views/vendor/attachment'),
        ], 'attachment views');

        //publish assets
        $this->publishes([
            $package_path . '/resources/assets' => public_path('vendor/attachment'),
        ], 'attachment assets');

        $this->loadViewsFrom($package_path . '/resources/views', 'attachment');
        $this->loadTranslationsFrom($package_path . '/resources/lang', 'attachment');
        $this->loadMigrationsFrom($package_path . '/database/migrations');
        $this->loadFactoriesFrom($package_path . '/database/factory');

    }
}
