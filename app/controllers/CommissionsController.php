<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Core\Response;
use App\Services\CommissionService;

class CommissionsController extends Controller
{
    public function index(array $params = []): void
    {
        $this->view('commissions/index', (new CommissionService())->index());
    }

    public function settle(array $params = []): void
    {
        (new CommissionService())->settle($_POST);
        $this->redirect('/commissions');
    }

}
