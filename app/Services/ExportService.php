<?php

namespace App\Services;

use App\Services\Export\Contracts\ExportStrategy;

/**
 * ExportService
 *
 * This service class handles the export of data using a specified export strategy.
 *
 * @package App\Services
 */
class ExportService
{
    /**
     * Initializes the ExportService with the specified export strategy.
     *
     * @param ExportStrategy $strategy The strategy property to be used.
     */
    public function __construct(protected ExportStrategy $strategy)
    {
    }

    /**
     * Set the export strategy.
     *
     * This method allows changing the export strategy used by the service.
     *
     * @param ExportStrategy $strategy The new export strategy instance.
     *
     * @return void
     */
    public function setStrategy(ExportStrategy $strategy)
    {
        $this->strategy = $strategy;
    }

    /**
     * Export data from array and return the URL of the exported file.
     *
     * This method uses the provided export strategy to export the given data
     * and returns the URL of the exported file. Throws an exception if the
     * strategy is not defined.
     *
     * @param array $data
     *
     * @return string
     *
     * @throws \Exception If the export strategy is not defined.
     */
    public function export(array $data, string $filename): string
    {
        if (!$this->strategy) {
            throw new \Exception("Formato de exportação não definido");
        }

        return $this->strategy->export($data, $filename);
    }
}
