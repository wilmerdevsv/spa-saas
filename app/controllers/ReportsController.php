<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Core\Response;
use App\Services\ReportService;

class ReportsController extends Controller
{
    public function financial(array $params = []): void
    {
        $this->view('reports/financial', (new ReportService())->financial());
    }

}
