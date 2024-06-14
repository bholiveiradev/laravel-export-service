<?php

namespace App\Services\Export;

use App\Exports\GenericExport;
use App\Services\Export\Contracts\ExportStrategy;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

/**
 * ExportToCsv
 *
 * This class provides a method to export data to an CSV file and return the URL
 * of the exported file.
 *
 * @package App\Services\Export
 * @subpackage Exports
 */
class ExportToCsv implements ExportStrategy
{
    /**
     * Return the url of exported file as string.
     *
     * @param array  $data
     * @param string $filename
     *
     * @return string
     */
    public function export(array $data, string $filename = 'export.csv'): string
    {
        Excel::store(new GenericExport($data), $filename, 'public', \Maatwebsite\Excel\Excel::CSV);
        return Storage::url($filename);
    }
}
