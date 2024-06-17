<?php

namespace App\Services\Export;

use App\Services\Export\Contracts\ExportStrategy;
use Illuminate\Support\Facades\Storage;
use Spatie\ArrayToXml\ArrayToXml;

/**
 * ExportToXml
 *
 * This class provides a method to export data to an XML file and return the URL
 * of the exported file.
 *
 * @package App\Services\Export
 * @subpackage Exports
 */
class ExportToXml implements ExportStrategy
{
    /**
     * Return the url of exported file as string.
     *
     * @param array  $data
     * @param string $filename
     *
     * @return string
     */
    public function export(array $data, string $filename = 'export.xml'): string
    {
        $xml = ArrayToXml::convert(['item' => $data]);

        if (! Storage::put("public/{$filename}", $xml)) {
            throw new \Exception("Failed to save XML file");
        }

        return Storage::url($filename);
    }
}
