<?php

namespace App\Services\Export\Contracts;

/**
 * @package App\Services\Export
 * @subpackage Exports\Contracts
 */
interface ExportStrategy
{
    /**
     * Return the url of exported file as string.
     *
     * @param array  $data
     * @param string $filename
     *
     * @return string
     */
    public function export(array $data, string $filename): string;
}
