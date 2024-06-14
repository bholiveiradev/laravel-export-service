<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\{ FromArray, WithHeadings };

/**
 * GenericExport
 *
 * This class implements the FromArray interface to provide data for Excel exports.
 *
 * @package App\Services\Export
 */
class GenericExport implements FromArray, WithHeadings
{
    /**
     * GenericExport constructor.
     *
     * Initializes the GenericExport with the specified data array.
     *
     * @param array $data The data to be exported.
     */
    public function __construct(protected array $data, protected array $headers = [])
    {
    }

    public function headings(): array
    {
        return $this->headers;
    }

     /**
     * Return the data array.
     *
     * This method is required by the FromArray interface and returns the data
     * to be used for the Excel export.
     *
     * @return array The data to be exported.
     */
    public function array(): array
    {
        return $this->data;
    }
}
