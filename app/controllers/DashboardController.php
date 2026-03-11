<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Services\DashboardService;

class DashboardController extends Controller
{
    public function index(array $params = []): void
    {
        $this->view('dashboard/index', (new DashboardService())->summary());
    }
}
