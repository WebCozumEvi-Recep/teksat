<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\Reporting\ReportService;

class ReportController extends Controller
{
    public function __construct(private readonly ReportService $service)
    {
    }

    public function overview()
    {
        return response()->json($this->service->overview());
    }

    public function domains()
    {
        return response()->json($this->service->domainPerformance());
    }
}
