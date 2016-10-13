# laravel-phpjasperxml
A Laravel package to render JasperReports.

###Installation

Add the following lines to your composer.json file

```
...
  sergio-vilchis/laravel-phpjasperxml": "^1.0"
}
```

Then update your packages with:

```
composer update
```

Add the Service Provider to you config/app.php file

```
'providers' => [
  ...
  Sergio\PhpJasperXML\JasperReportsServiceProvider::class,
]
```
And add an alias to the PHPJasperXML class

```
'aliases' => [
  ...
  'PHPJasperXML'  => Sergio\PhpJasperXML\PHPJasperXML::class,
]
```

Create an includes folder on your app and save there your jrxml files.

Create a ReportController with the following code
```
<?php
namespace App\Http\Controllers;
use PHPJasperXML;
use Response;
class ReportController extends Controller {

    public function viewreport($reporte='')
    {
      $PHPJasperXML = new PHPJasperXML();
      $PHPJasperXML->load_xml_file(app_path()."/includes/reports/".$reporte.".jrxml");
      $PHPJasperXML->transferDBtoArray();
      //Clean the end of the buffer before outputting the PDF
      ob_end_clean();
      //page output method I:standard output  D:Download file
      return Response::make($PHPJasperXML->outpage("I"));
    }

}

```
Then modify your app/Http/routes.php file to add a route to access any report.

```
Route::get('report/{report}', 'ReportController@viewreport')->name('report.show');
```
