<?php

namespace Sergio\PhpJasperXML;

use Illuminate\Support\ServiceProvider;
include_once("tcpdf/tcpdf.php");
include_once("PHPJasperXML.php");
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
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['Sergio\PhpJasperXML\PHPJasperXML'];
    }
}
