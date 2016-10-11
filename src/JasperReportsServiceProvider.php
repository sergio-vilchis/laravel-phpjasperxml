<?php

namespace Sergio\PhpJasperXML;

use Illuminate\Support\ServiceProvider;

class JasperReportsServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
      $this->app->singleton('Sergio\PhpJasperXML\PHPJasperXML', function ($app) {
          return new PhpJasperXML($app['url']);
      });
      $this->app->singleton('Sergio\PhpJasperXML\Response', function ($app) {
          return new Response($app['url']);
      });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['Sergio\PhpJasperXML\Response', 'Sergio\PhpJasperXML\PHPJasperXML'];
    }
}
