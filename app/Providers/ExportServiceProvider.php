<?php

namespace App\Providers;

use App\Services\Export\Contracts\ExportStrategy;
use Illuminate\Support\ServiceProvider;
use App\Services\Export\{
    ExportToCsv,
    ExportToPdf,
    ExportToXlsx,
    ExportToXml
};

class ExportServiceProvider extends ServiceProvider
{
    /**
     * All of the container bindings that should be registered.
     *
     * @var array
     */
    public $bindings = [
        ExportStrategy::class => ExportToCsv::class,
        ExportStrategy::class => ExportToPdf::class,
        ExportStrategy::class => ExportToXlsx::class,
        ExportStrategy::class => ExportToXml::class,
    ];

    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
