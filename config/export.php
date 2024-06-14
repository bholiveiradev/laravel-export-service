<?php

return [
    'strategies' => [
        'xlsx' => App\Services\Export\ExportToXlsx::class,
        'csv' => App\Services\Export\ExportToCsv::class,
        'pdf' => App\Services\Export\ExportToPdf::class,
        'xml' => App\Services\Export\ExportToXml::class,
    ],
];
