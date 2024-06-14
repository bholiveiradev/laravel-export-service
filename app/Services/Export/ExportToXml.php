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
        $dataToConvert = [
            'item' => function () use ($data) {
                $newItems = [];
                foreach ($data as $item) {
                    $newItems[] = $item;
                }
                return $newItems;
            },
        ];

        $xml = ArrayToXml::convert($dataToConvert);

        Storage::put("public/{$filename}", $xml);

        return Storage::url($filename);
    }
}
