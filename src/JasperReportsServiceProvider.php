<?php

namespace Sergio\PhpJasperXML;

use Illuminate\Support\ServiceProvider;

class JasperReportsServiceProvider extends ServiceProvider
{
     protected $defer = true;
    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
      $this->app->singleton('Sergio\PhpJasperXML\PHPJasperXML', function ($app) {
          return new PHPJasperXML();
      });
      $this->app->singleton('Sergio\PhpJasperXML\Response', function ($app) {
          return new Response();
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
