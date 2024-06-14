<?php

namespace App\Http\Controllers;

use App\Services\ExportService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;

/**
 * ExportController
 *
 * This controller handles requests to export data in various formats.
 *
 * @package App\Http\Controllers
 */
class ExportController extends Controller
{
    /**
     * ExportController constructor.
     *
     * Initializes the ExportController with the specified export service.
     *
     * @param ExportService $exportService The export service instance.
     */
    public function __construct(protected ExportService $exportService)
    {
    }

    /**
     * Export data and return the URL of the exported file.
     *
     * This method handles the export request, sets the appropriate export strategy,
     * and returns the URL of the exported file. If the format is not supported,
     * it returns an error response.
     *
     * @param Request $request The HTTP request instance.
     *
     * @return \Illuminate\Http\JsonResponse The JSON response containing the URL of the exported file or an error message.
     *
     * @throws \InvalidArgumentException When the format of the exported file is not supported.
     * @throws \Throwable For any other exceptions that occur during export.
     */
    public function export(Request $request)
    {
        $data = [
            ['Nome' => 'João', 'Idade' => 25, 'Email' => 'joao@example.com'],
            ['Nome' => 'Maria', 'Idade' => 30, 'Email' => 'maria@example.com'],
            ['Nome' => 'José', 'Idade' => 35, 'Email' => 'jose@example.com'],
        ];

        $format     = $request->input('format', 'xlsx');
        $strategies = config('export.strategies');

        try {
            if (!array_key_exists($format, $strategies)) {
                throw new \InvalidArgumentException('Formato não suportado', Response::HTTP_BAD_REQUEST);
            }

            $strategy = $strategies[$format];
            $this->exportService->setStrategy(new $strategy());

            $filename   = sprintf('%s.%s', 'export', $format);
            $url        = $this->exportService->export($data, $filename);
            return response()->json(['url' => $url]);
        } catch (\InvalidArgumentException $e) {
            Log::error('Invalid Argument Exception', [
                'code'      => $e->getCode(),
                'message'   => $e->getMessage(),
                'trace'     => $e->getTrace(),
            ]);

            return response()->json(['error' => $e->getMessage()], $e->getCode());
        } catch (\Throwable $e) {
            Log::error('Internal Server Error', [
                'code'      => $e->getCode(),
                'message'   => $e->getMessage(),
                'trace'     => $e->getTrace(),
            ]);

            return response()->json(['error' => 'Internal Server Error'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
