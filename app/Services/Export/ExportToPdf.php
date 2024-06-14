<?php

namespace App\Services\Export;

use App\Services\Export\Contracts\ExportStrategy;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Storage;

/**
 * ExportToPdf
 *
 * This class provides a method to export data to an PDF file and return the URL
 * of the exported file.
 *
 * @package App\Services\Export
 * @subpackage Exports
 */
class ExportToPdf implements ExportStrategy
{
    /**
     * Return the url of exported file as string.
     *
     * @param array  $data
     * @param string $filename
     *
     * @return string
     */
    public function export(array $data, string $filename = 'export.pdf'): string
    {
        $pdf = Pdf::loadView('exports.pdf', compact('data'));

        Storage::put("public/{$filename}", $pdf->output());

        return Storage::url($filename);
    }
}
